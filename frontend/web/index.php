<?php
//defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_ENV') or define('YII_ENV', 'dev');
defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');

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
?>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?6de0f0860f70302c41a63a4992da7ad8";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>

