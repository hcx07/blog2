<?php
/**
 * Created by PhpStorm.
 * User: 木鸟
 * Date: 2017/11/26
 * Time: 9:30
 */
namespace frontend\controllers;
use backend\models\Article;
use backend\models\Category;
use backend\models\Guestbook;
use yii\data\Pagination;
use yii\web\Controller;

class IndexController extends Controller{
    public function actionIndex(){
        $query=Article::find();
        $total=$query->count();
        $page=new Pagination([
            'totalCount'=>$total,
            'defaultPageSize'=>10,
        ]);
        $model=$query->offset($page->offset)->limit($page->limit)->orderBy(['article.created_time'=>SORT_ASC])->all();
        return $this->render('index',['model'=>$model,'page'=>$page]);
    }
    public function actionArticle($article_id){
        $model=Article::find()
            ->innerJoin(Category::tableName(),"article.cate_id=category.cate_id")
            ->select('article.*,category.cate_id,category.cate_name')
            ->where(['article_id'=>$article_id])
            ->one();
        return $this->render('article',['model'=>$model]);
    }
}