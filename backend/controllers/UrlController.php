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
            $model->created_time=time();
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
    public function actionEdit($url_id)
    {
        $model = Url::findOne(['url_id' => $url_id]);
        return $this->renderPartial('edit', ['model' => $model]);
    }

    /**
     * 分类修改
     */
    public function actionDoEdit()
    {
        $post=\Yii::$app->request->post();
        $model = Url::findOne(['url_id' => $post['Url']['url_id']]);
        unset($post['Url']['url_id']);
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
    public function actionDel($url_id)
    {
        $model = Url::findOne(['url_id' => $url_id]);
        $model->status=1;
        $model->save();
        \Yii::$app->session->setFlash('success', '删除成功！');
        return $this->redirect(['url/index']);
    }

}