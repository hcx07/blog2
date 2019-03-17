<?php
//defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_ENV') or define('YII_ENV', 'dev');
defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');

header("content-type:text/html;charset=utf-8");
require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../../common/config/bootstrap.php';
require __DIR__ . '/../config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../common/config/main.php',
    require __DIR__ . '/../../common/config/main-local.php',
    require __DIR__ . '/../config/main.php',
    require __DIR__ . '/../config/main-local.php'
);

(new yii\web\Application($config))->run();
$log=new \common\models\Log();
$h=date('Y-m-d');
$fp = fopen("./log/$h.txt", "a+");
$url=Yii::$app->request->getHostInfo().Yii::$app->request->url;
$ip=Yii::$app->request->getUserIP();
$HTTP_REFERER=array_key_exists('HTTP_REFERER',$_SERVER)?$_SERVER['HTTP_REFERER']:'';
fwrite($fp, date("Y-m-d H:i:s") . ' url:' . $url .' ip:'.$ip.' HTTP_REFERER:'.$HTTP_REFERER.' browser:'.$log->GetBrowser().' os:'.$log->GetOs().' HTTP_USER_AGENT:'.$_SERVER['HTTP_USER_AGENT'] ."\r\n");
fclose($fp);