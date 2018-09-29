<?php
/**
 * Created by muniao.
 * User: muniao
 * Date: 2018/9/29
 * Time: 14:55
 */

namespace backend\models;


use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use yii\base\Model;

class Qiniu extends Model
{
    static  public function auth($url,$key)
    {
        $qiniu=\Yii::$app->params['qiniu'];
        $auth=new Auth($qiniu['accessKey'], $qiniu['secretKey']);
        $token = $auth->uploadToken($qiniu['bucket']);
        $uploadMgr = new UploadManager();
        list($ret, $err) = $uploadMgr->putFile($token, $key, $url);
        if ($err !== null) {
            return false;
        } else {
            return $qiniu['url'].$ret['key'];
        }
    }
}