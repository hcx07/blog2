<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;

?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html class="no-js bg" lang="zh-cmn-Hant">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="theme-color" content="#3a3f51"/>
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <title>木鸟</title>
    <meta name="description" content="我们这一生很短，我们终将会失去它，所以不妨大胆一点。"/>
    <meta name="keywords" content="木鸟,博客,个人记录,,技术博客,PHP,JS"/>
    <meta name="template" content="handsome"/>
    <?= Html::cssFile('@web/ihewro/css/bootstrap.min.css') ?>
    <?= Html::cssFile('@web/ihewro/css/function.min.css') ?>
    <?= Html::cssFile('@web/ihewro/css/handsome.min.css') ?>
    <?= Html::cssFile('@web/ihewro/css/jquery.fancybox.min.css') ?>
    <?= Html::cssFile('@web/ihewro/css/font.css') ?>
    <style type="text/css">
        html.bg {
            background-image: -moz-radial-gradient(-20% 140%, ellipse, rgba(143, 192, 193, .6) 30%, rgba(255, 255, 227, 0) 50%), -moz-radial-gradient(60% 40%, ellipse, #d9e3e5 10%, rgba(44, 70, 76, .0) 60%), -moz-linear-gradient(-45deg, rgba(143, 181, 158, .8) -10%, rgba(213, 232, 211, .8) 80%);
            background-image: -o-radial-gradient(-20% 140%, ellipse, rgba(143, 192, 193, .6) 30%, rgba(255, 255, 227, 0) 50%), -o-radial-gradient(60% 40%, ellipse, #d9e3e5 10%, rgba(44, 70, 76, .0) 60%), -o-linear-gradient(-45deg, rgba(143, 181, 158, .8) -10%, rgba(213, 232, 211, .8) 80%);
            background-image: -ms-radial-gradient(-20% 140%, ellipse, rgba(143, 192, 193, .6) 30%, rgba(255, 255, 227, 0) 50%), -ms-radial-gradient(60% 40%, ellipse, #d9e3e5 10%, rgba(44, 70, 76, .0) 60%), -ms-linear-gradient(-45deg, rgba(143, 181, 158, .8) -10%, rgba(213, 232, 211, .8) 80%);
            background-image: -webkit-radial-gradient(-20% 140%, ellipse, rgba(143, 192, 193, .6) 30%, rgba(255, 255, 227, 0) 50%), -webkit-radial-gradient(60% 40%, ellipse, #d9e3e5 10%, rgba(44, 70, 76, .0) 60%), -webkit-linear-gradient(-45deg, rgba(143, 181, 158, .8) -10%, rgba(213, 232, 211, .8) 80%);
        }
    </style>
    <?= Html::jsFile('@web/ihewro/js/jquery.min.js') ?>
    <?= Html::jsFile('@web/layer/layer.js') ?>
    <?= Html::jsFile('@web/common/common.js') ?>

</head>
<body id="body">
<div id="alllayout" class="app app-aside-fixed container app-header-fixed ">
    <header id="header" class="app-header navbar" role="menu">
        <div class="navbar-header bg-dark">
            <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
                <i class="fa fa-gear text-lg"></i>
            </button>
            <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
                <i class="fa fa-menu text-lg"></i>
            </button>
            <a href="<?= \yii\helpers\Url::toRoute(['index/index']) ?>" class="navbar-brand text-lt">
                <i class="iconfont icon-shouyeshouye"></i>
                <span class="hidden-folded m-l-xs">木鸟</span>
            </a>
        </div>
        <div class="collapse pos-rlt navbar-collapse box-shadow bg-dark">
            <form id="searchform" class="navbar-form navbar-form-sm navbar-left shift" method="post" role="search">
                <div class="form-group">
                    <div class="input-group">
                        <input data-instant id="keyword" type="search" name="s"
                               class="form-control input-sm bg-light no-border rounded padder" required
                               placeholder="输入关键词搜索">
                        <span class="input-group-btn">
<button data-instant type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
</span>
                    </div>
                </div>
            </form>
            <a href="" style="display: none" id="searchUrl"></a>
            <ul class="nav navbar-nav navbar-right">


                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="fa fa-bell icon-fw"></i>
                        <span class="visible-xs-inline">
閒言碎語 </span>
                        <span class="badge badge-sm up bg-danger pull-right-xs"></span>
                    </a>
                    <div class="dropdown-menu w-xl animated fadeInUp">
                        <div class="panel bg-white">
                            <div class="panel-heading b-light bg-light">
                                <strong>
                                    随便写写 </strong>
                            </div>
                            <div class="list-group" id="smallRecording">
                                <a href="https://www.ihewro.com/index.php/cross.html" class="list-group-item"><span
                                            class="clear block m-b-none words_contents">我们一路奋战，不是为了改变这个世界 而是为了不让世界改变我们。这个世界的阴暗面比黑夜还黑，只是我们看不见，别以为在白天看着太阳，以为这个世界有多光明。 ​​​<br><small
                                                class="text-muted">2017-11-24 00:02:00</small></span></a><a
                                        href="https://www.ihewro.com/index.php/cross.html" class="list-group-item"><span
                                            class="clear block m-b-none words_contents">“都崭新，都暗淡，都独立，都有明天。”<br><small
                                                class="text-muted">2017-11-23 22:22:47</small></span></a><a
                                        href="https://www.ihewro.com/index.php/cross.html" class="list-group-item"><span
                                            class="clear block m-b-none words_contents">想来handsome已经一年。
这一年的变化，真的太大了，我也经历了很多...很多感慨，然而还得先去写作业……<br><small class="text-muted">2017-11-17 21:39:32</small></span></a></div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </header>
    <aside id="aside" class="app-aside hidden-xs bg-light">
        <div class="aside-wrap">
            <div class="navi-wrap">
                <div class="clearfix hidden-xs text-center hide show" id="aside-user">
                    <div class="dropdown wrapper">

                    <span class="thumb-lg w-auto-folded avatar m-t-sm">
                    <?php echo Html::img('@web/common/img/me.jpg',['class'=>'img-full'])?>
                    </span>
                    <span class="clear">
                    <span class="block m-t-sm">
                    <strong class="font-bold text-lt">木鸟</strong>

                    </div>
                    <div class="line dk hidden-folded"></div>
                </div>
                <nav ui-nav class="navi clearfix">
                    <ul class="nav">
                        <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                            <span>导航</span>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::toRoute(['index/index']) ?>" class="auto">
                                <i class="fa fa-home icon text-md"></i>
                                <span>首页</span>
                            </a>
                        </li>
                        <li class="line dk"></li>
                        <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                            <span>组成</span>
                        </li>
                        <li>
                            <a data-no-instant class="auto">
                                <span class="pull-right text-muted">
                                <i class="fa icon-fw fa-angle-right text"></i>
                                <i class="fa icon-fw fa-angle-down text-active"></i>
                                </span>
                                <i class="iconfont icon-c-classification"></i>
                                <span>分类</span>
                            </a>
                            <ul class="nav nav-sub dk">
                                <li class="nav-sub-header">
                                    <a data-no-instant>
                                        <span>分类</span>
                                    </a>
                                </li>
                                <?php
                                $cate=\backend\models\Category::find()
                                    ->select([
                                        "article_num"=>new \yii\db\Expression("(select count(*) from article where article.cate_id=category.cate_id and article.status=1)"),
                                        "category.cate_id",
                                        "category.cate_name",
                                    ])
                                    ->all();
                                foreach ($cate as $item):
                                ?>
                                    <li><a href="<?=\yii\helpers\Url::toRoute(['index/cate','cate_id'=>$item->cate_id])?>"><span><?=$item->cate_name?></span></a></li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                        <li>
                            <a data-no-instant class="auto">
                            <span class="pull-right text-muted">
                            <i class="fa icon-fw fa-angle-right text"></i>
                            <i class="fa icon-fw fa-angle-down text-active"></i>
                            </span>
                                <i class="iconfont icon-pengyouquan"></i>
                                <span>友链</span>
                            </a>
                            <ul class="nav nav-sub dk">
                                <li class="nav-sub-header">
                                    <a data-no-instant>
                                        <span>友链</span>
                                    </a>
                                </li>
                                <li><a href="https://smallk.net" target="_blank"
                                       title="给你想知道的科技信息、数码前沿、PC经验、休闲趣事、浏览器交流等，这就是科技临时站的意义~"><span>科技临时站</span></a></li>
                                <li><a href="https://wiki.ihewro.com/" target="_blank"
                                       title="友人C的笔记本"><span>友人C的wiki</span></a></li>
                                <li><a href="https://www.acgbuster.com/" target="_blank" title="以梦为马，不负韶华"><span>面码的buster</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </aside>
    <?= Alert::widget() ?>
    <?= $content ?>
    <aside class="col w-md bg-white-only b-l bg-auto no-border-xs" role="complementary">
        <div id="sidebar">
            <section id="tabs-4" class="widget widget_tabs clear">
                <div class="nav-tabs-alt no-js-hide">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="active" role="presentation">
                            <a href="#widget-tabs-4-hots" role="tab" aria-controls="widget-tabs-4-hots" aria-expanded="true" data-toggle="tab">
                                <i class="glyphicon glyphicon-fire text-md text-muted wrapper-sm" aria-hidden="true"></i>
                                <span class="sr-only">推荐文章</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#widget-tabs-4-comments" role="tab" aria-controls="widget-tabs-4-comments" aria-expanded="false" data-toggle="tab">
                                <i class="glyphicon glyphicon-comment text-md text-muted wrapper-sm" aria-hidden="true"></i>
                                <span class="sr-only">最新评论</span>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#widget-tabs-4-random" role="tab" aria-controls="widget-tabs-4-random" aria-expanded="false" data-toggle="tab">
                                <i class="glyphicon glyphicon-transfer text-md text-muted wrapper-sm" aria-hidden="true"></i>
                                <span class="sr-only">随机文章</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="widget-tabs-4-hots" class="tab-pane wrapper-md active" role="tabpanel">
                        <h3 class="widget-title m-t-none text-md">热门文章</h3>
                        <ul class="list-group no-bg no-borders pull-in m-b-none list-hot">

                        </ul>
                    </div>
                    <div id="widget-tabs-4-comments" class="tab-pane wrapper-md no-js-show" role="tabpanel">
                        <h3 class="widget-title m-t-none text-md">最新评论</h3>
                        <ul class="list-group no-borders pull-in auto m-b-none list-guest">

                        </ul>
                    </div>
                    <div id="widget-tabs-4-random" class="tab-pane wrapper-md no-js-show" role="tabpanel">
                        <h3 class="widget-title m-t-none text-md">随机文章</h3>
                        <ul class="list-group no-bg no-borders pull-in m-b-none list-article">

                        </ul>
                    </div>
                </div>
            </section>
            <section id="categories-2" class="widget widget_categories wrapper-md clear">
                <h3 class="widget-title m-t-none text-md">分类</h3>
                <ul class="list-group">
                    <?php foreach ($cate as $item):?>
                        <li class="list-group-item">
                            <a href="<?=\yii\helpers\Url::toRoute(['index/cate','cate_id'=>$item->cate_id])?>"> <span class="badge pull-right"><?=$item->article_num?></span><?=$item->cate_name?></a>
                        </li>
                    <?php endforeach;?>

                </ul>
            </section>
        </div>
    </aside>
</div>
</main>
</div>

</div
<?= Html::jsFile('@web/ihewro/js/meting.min.js') ?>
<?= Html::jsFile('@web/ihewro/js/bootstrap.min.js') ?>
<?= Html::jsFile('@web/ihewro/js/jquery.pjax.min.js') ?>
<?= Html::jsFile('@web/ihewro/js/jquery.fancybox.min.js') ?>
<?= Html::jsFile('@web/ihewro/js/owo.min.js') ?>
<?= Html::jsFile('@web/ihewro/js/music.min.js') ?>
<?= Html::jsFile('@web/ihewro/js/function.min.js') ?>
<script>
    $('.auto').click(function () {
        var ul=$(this).next();
        if(ul.attr('class')=='nav nav-sub dk'){
            ul.attr('class','nav nav-sup dk');
        }else{
            ul.attr('class','nav nav-sub dk');
        }
    });
    ajax_post("<?= \yii\helpers\Url::toRoute(['index/get-hot'])?>",{},function (res) {
        var hot=res.data.hot;
        var guest=res.data.guest;
        var article=res.data.article;
        var hot_html='';
        var guest_html='';
        var article_html='';
        $(hot).each(function (key,item) {
            var src="<?=\yii\helpers\Url::toRoute(['index/article'])?>?article_id="+item.article_id;
            hot_html+='<li class="list-group-item"><div class="clear">'+
                    '<h4 class="h5 l-h"><a href="'+src+'">'+item.title+'</a></h4>'+
                    '<small class="text-muted">'+
                    '<span class="meta-views"><i class="iconfont icon-comments" aria-hidden="true"></i><span class="sr-only">评论数：</span><span class="meta-value">'+item.guest_num+'</span></span>'+
                    '<span class="meta-date m-l-sm"><i class="fa fa-eye" aria-hidden="true"></i><span class="sr-only">浏览次数:</span><span class="meta-value">'+item.views+'</span></span>'+
                    '</small></div></li>';
        });
        $(guest).each(function (key,item) {
            var src="<?=\yii\helpers\Url::toRoute(['index/article'])?>?article_id="+item.article_id;
            guest_html+='<li class="list-group-item"><div class="clear"><div class="text-ellipsis">'+
                    '<a href="'+src+'">'+item.username+'</a></div>'+
                    '<small class="text-muted"><span>'+item.content+'</span>'+
                    '</small></div></li>';
        });
        $(article).each(function (key,item) {
            var src="<?=\yii\helpers\Url::toRoute(['index/article'])?>?article_id="+item.article_id;
            article_html+='<li class="list-group-item"><div class="clear">'+
                    '<h4 class="h5 l-h"><a href="'+src+'">'+item.title+'</a></h4>'+
                    '<small class="text-muted"><span class="meta-views"><i class="iconfont icon-comments" aria-hidden="true"></i>'+
                    '<span class="sr-only">评论数：</span> <span class="meta-value">'+item.guest_num+'</span></span>'+
                    '<span class="meta-date m-l-sm"><i class="fa fa-eye" aria-hidden="true"></i><span class="sr-only">浏览次数:</span>'+
                    '<span class="meta-value">'+item.views+'</span></span></small></div></li>';
        });
        $(".list-hot").html(hot_html);
        $(".list-guest").html(guest_html);
        $(".list-article").html(article_html);
    });
</script>
</body>
</html>

