<?php
/**
 * Created by PhpStorm.
 * User: 木鸟
 * Date: 2017/11/25
 * Time: 16:44
 */
namespace backend\controllers;
use backend\helpers\Helper;
use backend\models\Article;
use backend\models\Category;
use common\models\Log;
use function GuzzleHttp\Psr7\str;
use yii\data\Pagination;
class ArticleController extends BackendController
{
    public $enableCsrfValidation = false;
    /**
     * 文章列表
     * @return string
     */
    public function actionIndex()
    {
        $return=[];
        $query = Article::find()->innerJoin(Category::tableName(), "category.cate_id=article.cate_id");
        if($cate_id=\Yii::$app->request->get('cate_id')){
            $return['cate_id']=$cate_id;
            $query->andWhere(['category.cate_id'=>$cate_id]);
        }
        if($title=\Yii::$app->request->get('title')){
            $return['title']=$title;
            $query->andWhere(['like','article.title',$title]);
        }
        if($start=\Yii::$app->request->get('start')){
            $return['start']=$start;
            $query->andWhere(['>=','article.created_time',strtotime($start)]);
        }
        if($end=\Yii::$app->request->get('end')){
            $return['end']=$end;
            $query->andWhere(['<=','article.created_time',strtotime($end)]);
        }


        $total = $query->count();
        $page = new Pagination([
            'totalCount' => $total,
            'defaultPageSize' => 10,
        ]);
        $model = $query->offset($page->offset)->limit($page->limit)->orderBy(['article.is_top'=>SORT_DESC,'article.created_time' => SORT_DESC])->all();
        $cate = Category::find()->select('cate_id,cate_name')->asArray()->all();
        return $this->render('index', ['model' => $model, 'page' => $page,'cate'=>$cate,'return'=>$return]);
    }

    /**
     * 文章添加
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new Article();
        $cate = Category::find()->asArray()->all();
        $category = [];
        foreach ($cate as $item) {
            $category[$item['cate_id']] = $item['cate_name'];
        }
        if (empty($category)) {
            \Yii::$app->session->setFlash('error', '还没有文章分类哟！');
            return $this->redirect(['article/cate-add']);
        }
        if($post=\Yii::$app->request->post()){
            $post['content']=html_entity_decode(trim($post['content']));
            $post['created_time']=strtotime(str_replace("T"," ",$post['created_time']));
            if(empty($post['content'])){
                \Yii::$app->session->setFlash('error', '请输入文章内容！');
                return $this->redirect(['article/add']);
            }
            if($model->load($post) && $model->load($post,'') && $model->validate()){
                if($post['created_time']){
                    $model->created_time=$post['created_time'];
                }else{
                    $model->created_time=time();
                }
                $model->save();
                $log=new Log();
                $log->addLog("添加文章-".$model->title);
                Helper::response();
            }else{
                $error=array_values($model->getFirstErrors());
                Helper::response([],$error,300);
            }
        }
        return $this->renderPartial('add', ['model' => $model, 'category' => $category]);
    }

    /**
     * 文章修改
     * @param $article_id
     * @return string|\yii\web\Response
     */
    public function actionEdit($article_id='')
    {
        $model = Article::findOne(['article_id' => $article_id]);
        $cate = Category::find()->asArray()->all();
        $category = [];
        foreach ($cate as $item) {
            $category[$item['cate_id']] = $item['cate_name'];
        }
        if (empty($category)) {
            \Yii::$app->session->setFlash('error', '还没有文章分类哟！');
            return $this->redirect(['cate/add']);
        }
        $post = \Yii::$app->request->post();
        if($post){
            $model=Article::findOne(['article_id' => $post['article_id']]);
            $post['created_time']=strtotime(str_replace("T"," ",$post['created_time']));
            if (empty($post['content']) || (!$post['content'])) {
                \Yii::$app->session->setFlash('error', '必须要输入内容哦！');
                return $this->redirect(['article/edit']);
            }
            if ($model->load($post) && $model->load($post,'') && $model->validate()) {
                if(!isset($post['img'])){
                    $model->img='';
                }
                if($post['created_time']){
                    $model->created_time=$post['created_time'];
                }else{
                    $model->created_time=time();
                }
                $model->save();
                $log=new Log();
                $log->addLog("修改文章-".$model->title);
                Helper::response();
            }else{
                $error=array_values($model->getFirstErrors());
                Helper::response([],$error,300);
            }
        }

        return $this->renderPartial('edit', ['model' => $model, 'category' => $category]);
    }

    /**
     * 操作
     */
    public function actionOperation(){
        $get=\Yii::$app->request->get();
        $article_id=$get['article_id'];
        $model=Article::findOne(['article_id'=>$article_id]);
        $log=new Log();
        if(isset($get['status'])){//显示隐藏
            if($get['status']==1){
                $str='显示文章-';
            }else{
                $str='隐藏文章-';
            }
            $model->status=$get['status'];
            $res=$model->update();
            if($res!==false){
                $log->addLog($str.$model->title);
                Helper::response([],'操作成功');
            }else{
                $error=array_values($model->getFirstErrors());
                Helper::response([],$error[0],300);
            }
        }
        if(isset($get['is_top'])){//置顶
            if($get['is_top']==1){
                $str='置顶文章-';
            }else{
                $str='取消置顶文章-';
            }
            $model->is_top=$get['is_top'];
            $res=$model->update();
            if($res>=0){
                $log->addLog($str.$model->title);
                Helper::response([],'操作成功');
            }else{
                $error=array_values($model->getFirstErrors());
                Helper::response([],$error[0],300);
            }
        }
        Helper::response([],'请刷新后再试',300);
    }

    /**
     * 分类列表
     * @return string
     */
    public function actionCate()
    {
        $query = Category::find();
        $total = $query->count();
        $page = new Pagination([
            'totalCount' => $total,
            'defaultPageSize' => 10,
        ]);
        $model = $query->offset($page->offset)->limit($page->limit)->orderBy(['cate_id' => SORT_ASC])->all();
        return $this->render('cate', ['model' => $model, 'page' => $page]);
    }

    /**
     * 分类添加
     * @return string
     */
    public function actionCateAdd()
    {
        $model = new Category();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            $log=new Log();
            $log->addLog('添加分类-'.$model->cate_name);
            exit;
        }
        return $this->renderPartial('cate-add', ['model' => $model]);
    }

    /**
     * 分类修改页面
     * @param $cate_id
     * @return string
     */
    public function actionCateEdit($cate_id)
    {
        $model = Category::findOne(['cate_id' => $cate_id]);
        return $this->renderPartial('cate-edit', ['model' => $model]);
    }

    /**
     * 分类修改
     */
    public function actionDoCateEdit()
    {
        $post=\Yii::$app->request->post();
        $model = Category::findOne(['cate_id' => $post['Category']['cate_id']]);
        unset($post['Category']['cate_id']);
        if ($model->load($post) && $model->validate()) {
            $model->save();
            $log=new Log();
            $log->addLog('修改分类-'.$model->cate_name);
            exit;
        }
    }

    /**
     * 删除分类
     * @param $cate_id
     * @return \yii\web\Response
     */
    public function actionCateDel($cate_id)
    {
        $result=Article::findOne(['cate_id'=>$cate_id]);
        if($result){
            \Yii::$app->session->setFlash('error','该分类下有文章，是不能删除的哟！');
            return $this->redirect(['article/cate']);
        }
        $model = Category::findOne(['cate_id' => $cate_id]);
        $model->delete();
        $log=new Log();
        $log->addLog('删除分类-'.$result->cate_name);
        \Yii::$app->session->setFlash('success', '删除成功！');
        return $this->redirect(['article/cate']);
    }
}