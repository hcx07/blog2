<?php
/**
 * Created by muniao.
 * User: muniao
 * Date: 2018/8/20
 * Time: 17:19
 */

namespace backend\controllers;


use common\models\Log;
use yii\data\Pagination;

class LogController extends BackendController
{
    public $enableCsrfValidation = false;
    /**
     * 留言列表
     */
    public function actionIndex(){
        $return=[];
        $query = Log::find();
        if($intro=\Yii::$app->request->get('intro')){
            $return['intro']=$intro;
            $query->andWhere(['like','intro',$intro]);
        }
        if($start=\Yii::$app->request->get('start')){
            $return['start']=$start;
            $query->andWhere(['>=','created_time',strtotime($start)]);
        }
        if($end=\Yii::$app->request->get('end')){
            $return['end']=$end;
            $query->andWhere(['<=','created_time',strtotime($end)]);
        }
        $total = $query->count();
        $page = new Pagination([
            'totalCount' => $total,
            'defaultPageSize' => 10,
        ]);
        $model = $query->offset($page->offset)->limit($page->limit)->orderBy(['created_time' => SORT_DESC])->all();
        return $this->render('index', ['model' => $model, 'page' => $page,'return'=>$return]);
    }

}