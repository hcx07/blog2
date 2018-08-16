<?php
/**
 * Created by muniao.
 * User: muniao
 * Date: 2018/8/16
 * Time: 10:43
 */

namespace backend\controllers;


use yii\web\Controller;

class IndexController extends BackendController
{
    public function actionIndex(){
        $user=\Yii::$app->user->getIdentity();
        return $this->render('index',['user'=>$user]);
    }
    public function actionWelcome(){
        $user=\Yii::$app->user->getIdentity();
        return $this->render('welcome',['user'=>$user]);
    }

}