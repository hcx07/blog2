<?php
/**
 * Created by PhpStorm.
 * User: hcx_0
 * Date: 2018/8/11
 * Time: 11:48
 */

namespace backend\controllers;


use common\models\Url;
use yii\data\Pagination;

class UrlController extends BackendController
{
    /**
     * 友链列表
     */
    public function actionIndex(){
        $query = Url::find()->where(['status'=>0]);
        $total = $query->count();
        $page = new Pagination([
            'totalCount' => $total,
            'defaultPageSize' => 10,
        ]);
        $model = $query->offset($page->offset)->limit($page->limit)->orderBy(['created_time' => SORT_DESC])->all();
        return $this->render('index', ['model' => $model, 'page' => $page]);
    }
    /**
     * 分类添加
     * @return string
     */
    public function actionAdd()
    {
        $model = new Url();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            \Yii::$app->session->setFlash('success', '添加成功！');
            exit;
        }
        return $this->renderPartial('add', ['model' => $model]);
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
        \Yii::$app->session->setFlash('success', '删除成功！');
        return $this->redirect(['article/cate']);
    }

}