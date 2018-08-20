<?php
/**
 * Created by PhpStorm.
 * User: 木鸟
 * Date: 2017/11/25
 * Time: 10:37
 */
namespace backend\controllers;
use common\models\Log;
use common\models\User;
use yii\data\Pagination;
use yii\web\Controller;

class UserController extends BackendController {

    public function actionIndex()
    {
        $query=User::find();
        $total=$query->count();
        $page=new Pagination([
            'totalCount'=>$total,
            'defaultPageSize'=>10,
        ]);
        $model=$query->offset($page->offset)->limit($page->limit)->orderBy(['id'=>SORT_ASC])->all();
        return $this->render('index',['model'=>$model,'page'=>$page]);
    }

    public function actionAdd()
    {
        $model = new User();
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                $hash=\Yii::$app->security->generatePasswordHash($model->password);
                $model->password_hash=$hash;
                $model->save();
                $log=new Log();
                $log->addLog('添加管理员-'.$model->username);
                exit;
            }
        }
        return $this->renderPartial('add', ['model' => $model]);
    }
    public function actionEdit($id='')
    {
        if ($post=\Yii::$app->request->post()) {
            $model = User::findOne(['id' => $post['User']['id']]);
            unset($post['User']['id']);
            if ($model->load($post) && $model->validate()) {
                $hash=\Yii::$app->security->generatePasswordHash($model->password);
                $model->password_hash=$hash;
                $model->save();
                $log=new Log();
                $log->addLog('修改管理员-'.$model->username);
                exit;
            }else{
                var_dump($model->getFirstErrors());exit;
            }
        }else{
            $model = User::findOne(['id'=>$id]);
            return $this->renderPartial('edit', ['model' => $model]);
        }

    }
    public function actionDel($id){
        $model = User::findOne(['id'=>$id]);
        $model->delete();
        $log=new Log();
        $log->addLog('删除管理员-'.$model->username);
        return $this->redirect(['user/index']);
    }
}