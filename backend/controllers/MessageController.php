<?php
/**
 * Created by muniao.
 * User: muniao
 * Date: 2018/8/20
 * Time: 15:40
 */

namespace backend\controllers;


use backend\helpers\Helper;
use backend\models\Article;
use backend\models\Guestbook;
use common\models\Log;
use yii\data\Pagination;

class MessageController extends BackendController
{
    public $enableCsrfValidation = false;
    /**
     * 留言列表
     */
    public function actionIndex(){
        $return=[];
        $query = Guestbook::find()
            ->where(['guestbook.flag'=>0])
            ->innerJoin(Article::tableName(), "article.article_id=guestbook.article_id")
            ->select('guestbook.*,article.title');
        if($title=\Yii::$app->request->get('title')){
            $return['title']=$title;
            $query->andWhere(['like','article.title',$title]);
        }
        if($start=\Yii::$app->request->get('start')){
            $return['start']=$start;
            $query->andWhere(['>=','guestbook.created_time',strtotime($start)]);
        }
        if($end=\Yii::$app->request->get('end')){
            $return['end']=$end;
            $query->andWhere(['<=','guestbook.created_time',strtotime($end)]);
        }
        $total = $query->count();
        $page = new Pagination([
            'totalCount' => $total,
            'defaultPageSize' => 10,
        ]);
        $model = $query->offset($page->offset)->limit($page->limit)->orderBy(['guestbook.created_time' => SORT_DESC])->all();
        return $this->render('index', ['model' => $model, 'page' => $page,'return'=>$return]);
    }
    /**
     * 删除
     */
    public function actionDel(){
        $guest_id=\Yii::$app->request->get('guest_id');
        if($guest_id){
            $res=Guestbook::updateAll(['flag'=>1],"guest_id=$guest_id or two_id=$guest_id or parent_id=$guest_id");
            if($res!==false){
                $log=new Log();
                $log->addLog('删除留言-'.$guest_id);
                Helper::response([],'删除成功');
            }else{
                Helper::response([],'删除失败',300);
            }
        }
        Helper::response([],'请刷新后重试',300);

    }

}