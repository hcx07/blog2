<?php
/**
 * Created by PhpStorm.
 * User: 木鸟
 * Date: 2017/11/26
 * Time: 9:30
 */
namespace frontend\controllers;
use backend\helpers\Helper;
use backend\models\Article;
use backend\models\Category;
use backend\models\Guestbook;
use yii\data\Pagination;
use yii\db\Exception;
use yii\db\Expression;
use yii\web\Controller;

class IndexController extends Controller{
    public $enableCsrfValidation = false;
    /**
     * @return string
     * 首页
     */
    public function actionIndex(){
        $query=Article::find();
        if($key=\Yii::$app->request->get('search')){
            $query->where(['like','title',trim($key)]);
        }
        $total=$query->count();
        $page=new Pagination([
            'totalCount'=>$total,
            'defaultPageSize'=>10,
        ]);
        $model=$query
            ->offset($page->offset)
            ->limit($page->limit)
            ->orderBy(['article.is_top'=>SORT_DESC,'article.created_time'=>SORT_DESC])
            ->all();
        foreach ($model as &$item){
            $guest_count=Guestbook::find()->where(['article_id'=>$item->article_id])->count();
            $item['guest_count']=$guest_count?$guest_count.' 条评论':'暂无评论';
        }
        return $this->render('index',['model'=>$model,'page'=>$page]);
    }

    /**
     * @param $article_id
     * @return string
     * 文章详情页
     */
    public function actionArticle($article_id){
        $model=Article::find()
            ->innerJoin(Category::tableName(),"article.cate_id=category.cate_id")
            ->select('article.*,category.cate_id,category.cate_name')
            ->where(['article_id'=>$article_id])
            ->one();
        $guest=Guestbook::find()
            ->where(['article_id'=>$article_id,'parent_id'=>0,'flag'=>0])
            ->orderBy('created_time desc')
            ->all();
        $count=Guestbook::find()
            ->where(['article_id'=>$article_id])
            ->count();
        foreach ($guest as &$item){
            $item['created_time']=Helper::getSimpleTime($item['created_time']);
            $son=Guestbook::find()->where(['parent_id'=>$item['guest_id'],'flag'=>0])->orderBy('created_time asc')->all();
            foreach ($son as &$val){
                $val['created_time']=Helper::getSimpleTime($val['created_time']);
                $val['reply']=Guestbook::find()->where(['guest_id'=>$val['two_id'],'flag'=>0])->select('username')->one()->username;
            }
            $item['son']=$son;
        }
        //文章浏览量+1
        $article=Article::findOne(['article_id'=>$article_id]);
        $article->views+=1;
        $article->save();
        return $this->render('article',['model'=>$model,'guest'=>$guest,'count'=>$count]);
    }
    /**
     * 文章评论
     */
    public function actionGuest(){
        if(\Yii::$app->request->isPost){
            $post=\Yii::$app->request->post();
            foreach ($post as &$item){
                $item=preg_replace("/<script[^>]*?>.*?<\/script>/si", "", strip_tags(html_entity_decode($item)));
            }
            $model=new Guestbook();
            if($model->load($post,'') && $model->validate()){
                $model->save();
                $data=Guestbook::find()
                    ->where(['guest_id'=>\Yii::$app->db->lastInsertID])
                    ->asArray()
                    ->one();
                $reply=Guestbook::find()->where(['guest_id'=>$data['two_id'],'flag'=>0])->select('username')->one();
                if($reply){
                    $data['reply']=$reply->username;
                }else{
                    $data['reply']='';
                }
                $data['count']=Guestbook::find()
                    ->where(['article_id'=>$data['article_id']])
                    ->count();
                Helper::response($data,'评论成功');
            }else{
                $error=array_values($model->getFirstErrors());
                Helper::response([],$error[0],300);
            }
        }
    }

    /**
     * @return string
     * 获取当前文章分类
     */
    public function actionCate(){
        $cate_id=\Yii::$app->request->get('cate_id');
        $query=Article::find();
        $total=$query->where(['cate_id'=>$cate_id])->count();
        $page=new Pagination([
            'totalCount'=>$total,
            'defaultPageSize'=>10,
        ]);
        $model=$query
            ->offset($page->offset)
            ->limit($page->limit)
            ->where(['cate_id'=>$cate_id])
            ->orderBy(['article.is_top'=>SORT_DESC,'article.created_time'=>SORT_DESC])
            ->all();
        foreach ($model as &$item){
            $guest_count=Guestbook::find()->where(['article_id'=>$item->article_id])->count();
            $item['guest_count']=$guest_count?$guest_count.' 条评论':'暂无评论';
        }
        return $this->render('index',['model'=>$model,'page'=>$page]);
    }

    /**
     * 获取右栏推荐
     */
    public function actionGetHot(){
        //获取热门文章
        $model=Article::find()
            ->where(['article.status'=>1])
            ->select([
                "guest_num"=>new Expression("(select count(*) from guestbook where guestbook.article_id=article.article_id and guestbook.flag=0)"),
                "article.title",
                "article.article_id",
                "article.views"
            ]);
        $hot=$model
            ->orderBy("guest_num desc,article.views desc,article.created_time desc")
            ->limit(2)
            ->asArray()
            ->all();
        //获取最新评论
        $guest=Guestbook::find()
            ->innerJoin(Article::tableName(),"article.article_id=guestbook.article_id")
            ->where(['article.status'=>1,'guestbook.flag'=>0])
            ->select('guestbook.username,guestbook.content,guestbook.article_id')
            ->orderBy("guestbook.created_time desc")
            ->limit(2)
            ->asArray()
            ->all();
        //获取随机文章
        $article=$model
            ->limit(2)
            ->asArray()
            ->all();
        Helper::response(['hot'=>$hot,'guest'=>$guest,'article'=>$article]);
    }
}