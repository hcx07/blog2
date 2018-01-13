<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'ihewro/css/bootstrap.min.css',
        'ihewro/css/function.min.css',
        'ihewro/css/handsome.min.css',
        'ihewro/css/jquery.fancybox.min.css',
        'ihewro/css/font.css',
    ];
    public $js = [
        'ihewro/js/aplayer.min.js',
        'ihewro/js/jquery.min.js',
        'ihewro/js/meting.min.js',
        'ihewro/js/bootstrap.min.js',
        'ihewro/js/jquery.pjax.min.js',
        'ihewro/js/jquery.fancybox.min.js',
        'ihewro/js/owo.min.js',
        'ihewro/js/music.min.js',
        'ihewro/js/function.min.js',
        'ihewro/js/core.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
