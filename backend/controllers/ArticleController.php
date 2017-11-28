<?php
/**
 * Created by PhpStorm.
 * User: 木鸟
 * Date: 2017/11/25
 * Time: 16:44
 */
namespace backend\controllers;
use backend\models\Article;
use backend\models\Category;
use yii\data\Pagination;

class ArticleController extends BackendController{
    public function actionIndex(){
        $query=Article::find()->innerJoin(Category::tableName(),"category.cate_id=article.cate_id");
        $total=$query->count();
        $page=new Pagination([
            'totalCount'=>$total,
            'defaultPageSize'=>10,
        ]);
        $model=$query->offset($page->offset)->limit($page->limit)->orderBy(['article.created_time'=>SORT_ASC])->all();
        return $this->render('index',['model'=>$model,'page'=>$page]);
    }
    public function actionAdd(){
        $model = new Article();
        $cate=Category::find()->asArray()->all();
        $category=[];
        foreach ($cate as $item){
            $category[$item['cate_id']]=$item['cate_name'];
        }
        if(empty($category)){
            \Yii::$app->session->setFlash('error', '还没有文章分类哟！');
            return $this->redirect(['cate/add']);
        }
        if ($model->load(\Yii::$app->request->post())) {
            $post=\Yii::$app->request->post();
            if(empty($post['content']) || (!$post['content'])){
                \Yii::$app->session->setFlash('error', '必须要输入内容哦！');
                return $this->redirect(['article/add']);
            }
            if ($model->validate()) {
                $model->content=$post['content'];
                $model->created_time=time();
                $model->save();
                \Yii::$app->session->setFlash('success', '添加成功！');
                return $this->redirect(['article/index']);
            }
        }
        return $this->renderPartial('add', ['model' => $model,'category'=>$category]);
    }

    public function actionEdit($article_id){
        $model = Article::findOne(['article_id'=>$article_id]);
        $cate=Category::find()->asArray()->all();
        $category=[];
        foreach ($cate as $item){
            $category[$item['cate_id']]=$item['cate_name'];
        }
        if(empty($category)){
            \Yii::$app->session->setFlash('error', '还没有文章分类哟！');
            return $this->redirect(['cate/add']);
        }
        if ($model->load(\Yii::$app->request->post())) {
            $post=\Yii::$app->request->post();
            if(empty($post['content']) || (!$post['content'])){
                \Yii::$app->session->setFlash('error', '必须要输入内容哦！');
                return $this->redirect(['article/edit']);
            }
            if ($model->validate()) {
                $model->content=$post['content'];
                $model->created_time=time();
                $model->save();
                \Yii::$app->session->setFlash('success', '修改成功！');
                return $this->redirect(['article/index']);
            }
        }
        return $this->renderPartial('add', ['model' => $model,'category'=>$category]);
    }

    public function actionCate(){
        $query=Category::find();
        $total=$query->count();
        $page=new Pagination([
            'totalCount'=>$total,
            'defaultPageSize'=>10,
        ]);
        $model=$query->offset($page->offset)->limit($page->limit)->orderBy(['cate_id'=>SORT_ASC])->all();
        return $this->render('cate',['model'=>$model,'page'=>$page]);
    }
    public function actionCateAdd(){
        $model = new Category();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            \Yii::$app->session->setFlash('success', '添加成功！');
            exit;
        }
        return $this->renderPartial('cate-add', ['model' => $model]);
    }
}