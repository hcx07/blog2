<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/10/25
 * Time: 16:18
 */

namespace backend\controllers;


use backend\models\LoginForm;
use common\models\Log;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class GlggfController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['Zuazf', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'minLength'=>5,
                'maxLength'=>5,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['glggf/zuazf']);
        }
        return $this->redirect(['index/index']);
    }

    /**
     * Login action.
     *
     * @return string
     * 登陆
     */
    public function actionZuazf()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['index/index']);
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $log=new Log();
            $log->addLog("登录-".$model->username.'-'.Yii::$app->request->getUserIP());
            return $this->redirect(['index/index']);
        }
        return $this->renderPartial('zuazf',['model'=>$model]);
    }
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['glggf/zuazf']);
    }

}