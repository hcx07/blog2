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
use yii\web\Controller;

class IndexController extends Controller{
    public $enableCsrfValidation = false;
    /**
     * @return string
     * 首页
     */
    public function actionIndex(){
        $query=Article::find();
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
}