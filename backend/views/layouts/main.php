<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 2016/12/13
 * Time: 13:59
 */
/* @var $this \yii\web\View*/
/* @var $content string */

use backend\assets\AppAsset;

AppAsset::register($this);

$this->title = isset($this->params['title']) ? $this->params['title'] : "木鸟后台管理系统";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="UTF-8">
    <title>木鸟后台管理系统</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="xadmin/css/font.css">
    <link rel="stylesheet" href="xadmin/css/xadmin.css">
    <script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
    <script src="xadmin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="xadmin/js/xadmin.js"></script>
    <!--[if lt IE 9]>
    <script src="xadmin/js/html5.js"></script>
    <script src="xadmin/js/respond.js"></script>
    <![endif]-->
</head>

<body>
<?php $this->beginBody() ?>

<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
