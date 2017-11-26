<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
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
    <link rel="icon" type="image/ico" href="ihewro/favicon.ico">
    <script type="text/javascript" src="ihewro/js/aplayer.min.js"></script>
    <script>var meting_api = "https://www.ihewro.com/action/metingapi?server=:server&type=:type&id=:id&r=:r";</script>
    <meta name="description" content="我们这一生很短，我们终将会失去它，所以不妨大胆一点。"/>
    <meta name="keywords" content="木鸟,博客,个人记录,,技术博客,PHP,JS"/>
    <meta name="template" content="handsome"/>
    <link rel="pingback" href="https://www.ihewro.com/action/xmlrpc"/>
    <link href="ihewro/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="ihewro/css/function.min.css" type="text/css"/>
    <link rel="stylesheet" href="ihewro/css/handsome.min.css" type="text/css"/>
    <link rel="stylesheet" href="ihewro/css/jquery.fancybox.min.css" type="text/css"/>
    <link rel="stylesheet" href="ihewro/css/font.css" type="text/css"/>
    <style type="text/css">
        html.bg {
            background-image: -moz-radial-gradient(-20% 140%, ellipse, rgba(143, 192, 193, .6) 30%, rgba(255, 255, 227, 0) 50%), -moz-radial-gradient(60% 40%, ellipse, #d9e3e5 10%, rgba(44, 70, 76, .0) 60%), -moz-linear-gradient(-45deg, rgba(143, 181, 158, .8) -10%, rgba(213, 232, 211, .8) 80%);
            background-image: -o-radial-gradient(-20% 140%, ellipse, rgba(143, 192, 193, .6) 30%, rgba(255, 255, 227, 0) 50%), -o-radial-gradient(60% 40%, ellipse, #d9e3e5 10%, rgba(44, 70, 76, .0) 60%), -o-linear-gradient(-45deg, rgba(143, 181, 158, .8) -10%, rgba(213, 232, 211, .8) 80%);
            background-image: -ms-radial-gradient(-20% 140%, ellipse, rgba(143, 192, 193, .6) 30%, rgba(255, 255, 227, 0) 50%), -ms-radial-gradient(60% 40%, ellipse, #d9e3e5 10%, rgba(44, 70, 76, .0) 60%), -ms-linear-gradient(-45deg, rgba(143, 181, 158, .8) -10%, rgba(213, 232, 211, .8) 80%);
            background-image: -webkit-radial-gradient(-20% 140%, ellipse, rgba(143, 192, 193, .6) 30%, rgba(255, 255, 227, 0) 50%), -webkit-radial-gradient(60% 40%, ellipse, #d9e3e5 10%, rgba(44, 70, 76, .0) 60%), -webkit-linear-gradient(-45deg, rgba(143, 181, 158, .8) -10%, rgba(213, 232, 211, .8) 80%);
        }
    </style>
    <script src="ihewro/js/jquery.min.js"></script>
    <script data-no-instant type="text/javascript">var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?3b1f6198215a81b2f56b1387c009c48f";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
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
            <a href="<?=\yii\helpers\Url::toRoute(['index/index'])?>" class="navbar-brand text-lt">
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
                <li class="music-box hidden-xs hidden-sm">
                    <div id="skPlayer"></div>
                </li>
                <li class="dropdown "><a class="skPlayer-list-switch dropdown-toggle"><i
                                class="fa fa-headphones"></i><span class="visible-xs-inline"></span></a></li>
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
                <li class="dropdown" id="easyLogin">
                    <a onclick="return false" data-toggle="dropdown" class="dropdown-toggle clear"
                       data-toggle="dropdown">
                        <span class="text">登录</span>
                        <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu w-lg wrapper bg-white" aria-labelledby="navbar-login-dropdown">
                        <form id="Login_form"
                              action="https://www.ihewro.com/index.php/action/login?_=14a288339ad09b0756bf9b95bec5bf59"
                              method="post">
                            <div class="form-group">
                                <label for="navbar-login-user">用戶名</label>
                                <input type="text" name="name" id="navbar-login-user" class="form-control"
                                       placeholder="用戶名或電子郵箱"></div>
                            <div class="form-group">
                                <label for="navbar-login-password">密碼</label>
                                <input type="password" name="password" id="navbar-login-password" class="form-control"
                                       placeholder="密碼"></div>
                            <button type="submit" id="login-submit" name="submitLogin"
                                    class="btn btn-block btn-primary">
                                <span class="text">登录</span>
                                <span class="text-active">登录中...</span>
                                <span class="banLogin_text">刷新页面后登录</span>
                                <i class="animate-spin  fa fa-spinner hide" id="spin-login"></i>
                                <i class="animate-spin fa fa-refresh hide" id="ban-login"></i>
                            </button>
                            <input type="hidden" name="referer" value="https://www.ihewro.com" data-current-url="value">
                        </form>
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
                        <a href="https://www.ihewro.com/cross.html">
<span class="thumb-lg w-auto-folded avatar m-t-sm">
<img src="ihewro/picture/1739964761.jpg" class="img-full">
</span>
                        </a>
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
<span class="clear">
<span class="block m-t-sm">
<strong class="font-bold text-lt">ihewro</strong>
<b class="caret"></b>
</span>
<span class="text-muted text-xs block">A student</span>
</span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                            <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                                <span class="arrow top hidden-folded arrow-info"></span>
                                <div>
                                    <p>晚上好，注意早點休息</p>
                                </div>
                                <div class="progress progress-xs m-b-none dker">
                                    <div class="progress-bar bg-white" data-toggle="tooltip"
                                         data-original-title="79.17%" style="width: 79.17%"></div>
                                </div>
                            </li>
                            <li>
                                <a href="https://www.ihewro.com/feed/" data-toggle="tooltip" title="订阅文章 Feed 源">
                                    <i style="position: relative;width: 30px;margin: -11px -10px;margin-right: 0px;overflow: hidden;line-height: 30px;text-align: center;"
                                       class="fa fa-rss"></i><span>文章RSS</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.ihewro.com/feed/comments/" data-toggle="tooltip"
                                   title="订阅评论 Feed 源"><i
                                            style="position: relative;width: 30px;margin: -11px -10px;margin-right: 0px;overflow: hidden;line-height: 30px;text-align: center;"
                                            class="fa fa-rss-square"></i><span>評論RSS</span></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a data-no-instant href="https://www.ihewro.com/admin/login.php">登錄</a>
                            </li>
                        </ul>
                    </div>
                    <div class="line dk hidden-folded"></div>
                </div>
                <nav ui-nav class="navi clearfix">
                    <ul class="nav">
                        <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                            <span>导航</span>
                        </li>
                        <li>
                            <a href="<?=\yii\helpers\Url::toRoute(['index/index'])?>" class="auto">
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
                                <li><a href="https://www.ihewro.com/category/tech/"><span>设计开发</span></a></li>
                                <li><a href="https://www.ihewro.com/category/share/"><span>资源技巧</span></a></li>
                                <li><a href="https://www.ihewro.com/category/hobby/"><span>兴趣爱好</span></a></li>
                                <li><a href="https://www.ihewro.com/category/life/"><span>生活随笔</span></a></li>
                                <li><a href="https://www.ihewro.com/category/others/"><span>文章杂烩</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a data-no-instant class="auto">
<span class="pull-right text-muted">
<i class="fa icon-fw fa-angle-right text"></i>
<i class="fa icon-fw fa-angle-down text-active"></i>
</span>
                                <i class="iconfont icon-176pages"></i>
                                <span>页面</span>
                            </a>
                            <ul class="nav nav-sub dk">
                                <li class="nav-sub-header">
                                    <a data-no-instant>
                                        <span>页面</span>
                                    </a>
                                </li>
                                <li><a href="https://www.ihewro.com/links.html"><span>链接库</span></a></li>
                                <li><a href="https://www.ihewro.com/archives.html"><span>归档栏</span></a></li>
                                <li><a href="https://www.ihewro.com/msg.html"><span>留言板</span></a></li>
                                <li><a href="https://www.ihewro.com/about.html"><span>关于我</span></a></li>
                                <li><a href="https://www.ihewro.com/cross.html"><span>时光机</span></a></li>
                                <li><a href="https://www.ihewro.com/loves.html"><span>万花筒</span></a></li>
                                <li><a href="https://www.ihewro.com/project.html"><span>实验室</span></a></li>
                                <li><a href="https://www.ihewro.com/donate.html"><span>赞助我</span></a></li>
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
                                <li><a href="http://yufanboke.top/" target="_blank" title="一个爱折腾的高二学生博客"><span>yufan 's blog</span></a>
                                </li>
                                <li><a href="https://1314.li/" target="_blank" title="吹灯拔蜡剑!"><span>晓日·落霞 </span></a>
                                </li>
                                <li><a href="http://www.longxianwen.net/" target="_blank"
                                       title="互联网最难的不是知识，是学不完的知识"><span>资料收藏夹</span></a></li>
                                <li><a href="https://www.liaronce.win" target="_blank"
                                       title="高一学生的搞事日常 "><span>LiarOnce</span></a></li>
                                <li><a href="https://www.mocurio.com/" target="_blank" title="安静的做一个沉默中的分享、记录小站"><span>初夏阳光</span></a>
                                </li>
                                <li><a href="https://biji.io" target="_blank"
                                       title="热爱前端，喜欢编程，也会一些设计，知识杂而不精，善于折腾并乐此不疲。"><span>设计笔记</span></a></li>
                                <li><a href="http://demo.ycool.top" target="_blank"
                                       title="三世如流水，一梦难追回"><span>梦逸笔谈</span></a></li>
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
                        <li class="active" role="presentation"><a href="#widget-tabs-4-hots" role="tab"
                                                                  aria-controls="widget-tabs-4-hots"
                                                                  aria-expanded="true" data-toggle="tab"> <i
                                        class="glyphicon glyphicon-fire text-md text-muted wrapper-sm"
                                        aria-hidden="true"></i> <span class="sr-only">推荐文章</span> </a></li>
                        <li role="presentation"><a href="#widget-tabs-4-comments" role="tab"
                                                   aria-controls="widget-tabs-4-comments"
                                                   aria-expanded="false" data-toggle="tab"> <i
                                        class="glyphicon glyphicon-comment text-md text-muted wrapper-sm"
                                        aria-hidden="true"></i> <span class="sr-only">最新评论</span> </a></li>
                        <li role="presentation"><a href="#widget-tabs-4-random" role="tab"
                                                   aria-controls="widget-tabs-4-random"
                                                   aria-expanded="false" data-toggle="tab"> <i
                                        class="glyphicon glyphicon-transfer text-md text-muted wrapper-sm"
                                        aria-hidden="true"></i> <span class="sr-only">随机文章</span> </a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="widget-tabs-4-hots" class="tab-pane wrapper-md active" role="tabpanel">
                        <h3 class="widget-title m-t-none text-md">热门文章</h3>
                        <ul class="list-group no-bg no-borders pull-in m-b-none">
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/489/"
                                   class="pull-left thumb-sm m-r">
                                    <img style="height: 40px!important;width: 40px!important;"
                                         src="ihewro/picture/15.jpg" class="img-circle wp-post-image">
                                </a>
                                <div class="clear">
                                    <h4 class="h5 l-h"><a href="https://www.ihewro.com/archives/489/"
                                                          title="handsome —— 一如少年般模样"> handsome ——
                                            一如少年般模样 </a></h4>
                                    <small class="text-muted">
<span class="meta-views"> <i class="iconfont icon-comments" aria-hidden="true"></i> <span
            class="sr-only">评论数：</span> <span class="meta-value">840</span>
</span>
                                        <span class="meta-date m-l-sm"> <i class="fa fa-eye"
                                                                           aria-hidden="true"></i> <span
                                                    class="sr-only">浏览次数:</span> <span
                                                    class="meta-value">285165</span>
</span>
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/378/"
                                   class="pull-left thumb-sm m-r">
                                    <img style="height: 40px!important;width: 40px!important;"
                                         src="ihewro/picture/14.jpg" class="img-circle wp-post-image">
                                </a>
                                <div class="clear">
                                    <h4 class="h5 l-h"><a href="https://www.ihewro.com/archives/378/"
                                                          title="Leaf — A Typecho Theme"> Leaf — A Typecho
                                            Theme </a></h4>
                                    <small class="text-muted">
<span class="meta-views"> <i class="iconfont icon-comments" aria-hidden="true"></i> <span
            class="sr-only">评论数：</span> <span class="meta-value">91</span>
</span>
                                        <span class="meta-date m-l-sm"> <i class="fa fa-eye"
                                                                           aria-hidden="true"></i> <span
                                                    class="sr-only">浏览次数:</span> <span
                                                    class="meta-value">15875</span>
</span>
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/634/"
                                   class="pull-left thumb-sm m-r">
                                    <img style="height: 40px!important;width: 40px!important;"
                                         src="ihewro/picture/2.jpg" class="img-circle wp-post-image">
                                </a>
                                <div class="clear">
                                    <h4 class="h5 l-h"><a href="https://www.ihewro.com/archives/634/"
                                                          title="deepin 15.4 beta 简单体验反馈"> deepin 15.4 beta
                                            简单体验反馈 </a></h4>
                                    <small class="text-muted">
<span class="meta-views"> <i class="iconfont icon-comments" aria-hidden="true"></i> <span
            class="sr-only">评论数：</span> <span class="meta-value">86</span>
</span>
                                        <span class="meta-date m-l-sm"> <i class="fa fa-eye"
                                                                           aria-hidden="true"></i> <span
                                                    class="sr-only">浏览次数:</span> <span
                                                    class="meta-value">22011</span>
</span>
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/524/"
                                   class="pull-left thumb-sm m-r">
                                    <img style="height: 40px!important;width: 40px!important;"
                                         src="ihewro/picture/1.jpg" class="img-circle wp-post-image">
                                </a>
                                <div class="clear">
                                    <h4 class="h5 l-h"><a href="https://www.ihewro.com/archives/524/"
                                                          title=" 再见，2016"> 再见，2016 </a></h4>
                                    <small class="text-muted">
<span class="meta-views"> <i class="iconfont icon-comments" aria-hidden="true"></i> <span
            class="sr-only">评论数：</span> <span class="meta-value">81</span>
</span>
                                        <span class="meta-date m-l-sm"> <i class="fa fa-eye"
                                                                           aria-hidden="true"></i> <span
                                                    class="sr-only">浏览次数:</span> <span
                                                    class="meta-value">12069</span>
</span>
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/598/"
                                   class="pull-left thumb-sm m-r">
                                    <img style="height: 40px!important;width: 40px!important;"
                                         src="ihewro/picture/5.jpg" class="img-circle wp-post-image">
                                </a>
                                <div class="clear">
                                    <h4 class="h5 l-h"><a href="https://www.ihewro.com/archives/598/"
                                                          title="利用upyun又拍云CDN服务配置全站HTTPS">
                                            利用upyun又拍云CDN服务配置全站HTTPS </a></h4>
                                    <small class="text-muted">
<span class="meta-views"> <i class="iconfont icon-comments" aria-hidden="true"></i> <span
            class="sr-only">评论数：</span> <span class="meta-value">55</span>
</span>
                                        <span class="meta-date m-l-sm"> <i class="fa fa-eye"
                                                                           aria-hidden="true"></i> <span
                                                    class="sr-only">浏览次数:</span> <span
                                                    class="meta-value">9432</span>
</span>
                                    </small>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="widget-tabs-4-comments" class="tab-pane wrapper-md no-js-show" role="tabpanel">
                        <h3 class="widget-title m-t-none text-md">最新評論</h3>
                        <ul class="list-group no-borders pull-in auto m-b-none">
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/737/comment-page-1#comment-4576"
                                   class="pull-left thumb-sm avatar m-r">
                                    <img nogallery src="ihewro/picture/852eafdd49a348c1a4138811e6664b76.gif"
                                         class="avatar-40 photo img-circle"
                                         style="height:40px!important; width: 40px!important;"> </a>
                                <a href="https://www.ihewro.com/archives/737/comment-page-1#comment-4576"
                                   class="text-muted">
                                    <i class="fa fa-comment-o pull-right m-t-sm text-sm" title="詳情"
                                       aria-hidden="true" data-toggle="tooltip"
                                       data-placement="auto left"></i>
                                    <span class="sr-only">評論詳情</span>
                                </a>
                                <div class="clear">
                                    <div class="text-ellipsis">
                                        <a href="https://www.ihewro.com/archives/737/comment-page-1#comment-4576"
                                           title="jcomey"> jcomey </a>
                                    </div>
                                    <small class="text-muted"><span>摩羯座</span>
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/737/comment-page-1#comment-4575"
                                   class="pull-left thumb-sm avatar m-r">
                                    <img nogallery src="ihewro/picture/e0a3ca7c536c4261af8d7b1220e4ec0a.gif"
                                         class="avatar-40 photo img-circle"
                                         style="height:40px!important; width: 40px!important;"> </a>
                                <a href="https://www.ihewro.com/archives/737/comment-page-1#comment-4575"
                                   class="text-muted">
                                    <i class="fa fa-comment-o pull-right m-t-sm text-sm" title="詳情"
                                       aria-hidden="true" data-toggle="tooltip"
                                       data-placement="auto left"></i>
                                    <span class="sr-only">評論詳情</span>
                                </a>
                                <div class="clear">
                                    <div class="text-ellipsis">
                                        <a href="https://www.ihewro.com/archives/737/comment-page-1#comment-4575"
                                           title="LiarOnce"> LiarOnce </a>
                                    </div>
                                    <small class="text-muted"><span>我期中考刚刚考完
一说11月刚好我弟过生日，真巧</span>
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/737/comment-page-1#comment-4573"
                                   class="pull-left thumb-sm avatar m-r">
                                    <img nogallery src="ihewro/picture/94e5f08b43d04a6288b95b88c9d50bdd.gif"
                                         class="avatar-40 photo img-circle"
                                         style="height:40px!important; width: 40px!important;"> </a>
                                <a href="https://www.ihewro.com/archives/737/comment-page-1#comment-4573"
                                   class="text-muted">
                                    <i class="fa fa-comment-o pull-right m-t-sm text-sm" title="詳情"
                                       aria-hidden="true" data-toggle="tooltip"
                                       data-placement="auto left"></i>
                                    <span class="sr-only">評論詳情</span>
                                </a>
                                <div class="clear">
                                    <div class="text-ellipsis">
                                        <a href="https://www.ihewro.com/archives/737/comment-page-1#comment-4573"
                                           title="蔡锶铎"> 蔡锶铎 </a>
                                    </div>
                                    <small class="text-muted"><span>我现在已经开始被中考逼着了 绝望的一批 （这么巧我今天生日）</span>
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/489/comment-page-1#comment-4571"
                                   class="pull-left thumb-sm avatar m-r">
                                    <img nogallery src="ihewro/picture/417349c52cd848bc891a3fb65d68fb8a.gif"
                                         class="avatar-40 photo img-circle"
                                         style="height:40px!important; width: 40px!important;"> </a>
                                <a href="https://www.ihewro.com/archives/489/comment-page-1#comment-4571"
                                   class="text-muted">
                                    <i class="fa fa-comment-o pull-right m-t-sm text-sm" title="詳情"
                                       aria-hidden="true" data-toggle="tooltip"
                                       data-placement="auto left"></i>
                                    <span class="sr-only">評論詳情</span>
                                </a>
                                <div class="clear">
                                    <div class="text-ellipsis">
                                        <a href="https://www.ihewro.com/archives/489/comment-page-1#comment-4571"
                                           title="KeerDi"> KeerDi </a>
                                    </div>
                                    <small class="text-muted"><span>后生可畏，后生可畏啊！</span>
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/734/comment-page-1#comment-4570"
                                   class="pull-left thumb-sm avatar m-r">
                                    <img nogallery src="ihewro/picture/1dc148597bde451482bab4fc6c086e7d.gif"
                                         class="avatar-40 photo img-circle"
                                         style="height:40px!important; width: 40px!important;"> </a>
                                <a href="https://www.ihewro.com/archives/734/comment-page-1#comment-4570"
                                   class="text-muted">
                                    <i class="fa fa-comment-o pull-right m-t-sm text-sm" title="詳情"
                                       aria-hidden="true" data-toggle="tooltip"
                                       data-placement="auto left"></i>
                                    <span class="sr-only">評論詳情</span>
                                </a>
                                <div class="clear">
                                    <div class="text-ellipsis">
                                        <a href="https://www.ihewro.com/archives/734/comment-page-1#comment-4570"
                                           title="Yprisoner"> Yprisoner </a>
                                    </div>
                                    <small class="text-muted">
                                        <span>哇，主题更新了(๑`･ᴗ･´๑)。忽然觉得大学再多一年就好了~...</span>
                                    </small>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="widget-tabs-4-random" class="tab-pane wrapper-md no-js-show" role="tabpanel">
                        <h3 class="widget-title m-t-none text-md">隨機文章</h3>
                        <ul class="list-group no-bg no-borders pull-in m-b-none">
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/443/"
                                   class="pull-left thumb-sm m-r">
                                    <img style="height: 40px!important;width: 40px!important;"
                                         src="ihewro/picture/12.jpg" class="img-circle wp-post-image">
                                </a>
                                <div class="clear">
                                    <h4 class="h5 l-h"><a href="https://www.ihewro.com/archives/443/"
                                                          title="此内容被密码保护"> 此内容被密码保护 </a></h4>
                                    <small class="text-muted">
<span class="meta-views"> <i class="iconfont icon-comments" aria-hidden="true"></i> <span
            class="sr-only">评论数：</span> <span class="meta-value">0</span>
</span>
                                        <span class="meta-date m-l-sm"> <i class="fa fa-eye"
                                                                           aria-hidden="true"></i> <span
                                                    class="sr-only">浏览次数:</span> <span
                                                    class="meta-value">387</span>
</span>
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/523/"
                                   class="pull-left thumb-sm m-r">
                                    <img style="height: 40px!important;width: 40px!important;"
                                         src="ihewro/picture/14.jpg" class="img-circle wp-post-image">
                                </a>
                                <div class="clear">
                                    <h4 class="h5 l-h"><a href="https://www.ihewro.com/archives/523/"
                                                          title="锚点链接跳转后位置上下偏移一定位置方法">
                                            锚点链接跳转后位置上下偏移一定位置方法 </a></h4>
                                    <small class="text-muted">
<span class="meta-views"> <i class="iconfont icon-comments" aria-hidden="true"></i> <span
            class="sr-only">评论数：</span> <span class="meta-value">10</span>
</span>
                                        <span class="meta-date m-l-sm"> <i class="fa fa-eye"
                                                                           aria-hidden="true"></i> <span
                                                    class="sr-only">浏览次数:</span> <span
                                                    class="meta-value">4235</span>
</span>
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/479/"
                                   class="pull-left thumb-sm m-r">
                                    <img style="height: 40px!important;width: 40px!important;"
                                         src="ihewro/picture/14.jpg" class="img-circle wp-post-image">
                                </a>
                                <div class="clear">
                                    <h4 class="h5 l-h"><a href="https://www.ihewro.com/archives/479/"
                                                          title="我们是不是一定要这么着急"> 我们是不是一定要这么着急 </a></h4>
                                    <small class="text-muted">
<span class="meta-views"> <i class="iconfont icon-comments" aria-hidden="true"></i> <span
            class="sr-only">评论数：</span> <span class="meta-value">4</span>
</span>
                                        <span class="meta-date m-l-sm"> <i class="fa fa-eye"
                                                                           aria-hidden="true"></i> <span
                                                    class="sr-only">浏览次数:</span> <span
                                                    class="meta-value">1232</span>
</span>
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/177/"
                                   class="pull-left thumb-sm m-r">
                                    <img style="height: 40px!important;width: 40px!important;"
                                         src="ihewro/picture/14.jpg" class="img-circle wp-post-image">
                                </a>
                                <div class="clear">
                                    <h4 class="h5 l-h"><a href="https://www.ihewro.com/archives/177/"
                                                          title="Ueditor1.3.6+七牛云云存储整合 for typecho">
                                            Ueditor1.3.6+七牛云云存储整合 for typecho </a></h4>
                                    <small class="text-muted">
<span class="meta-views"> <i class="iconfont icon-comments" aria-hidden="true"></i> <span
            class="sr-only">评论数：</span> <span class="meta-value">11</span>
</span>
                                        <span class="meta-date m-l-sm"> <i class="fa fa-eye"
                                                                           aria-hidden="true"></i> <span
                                                    class="sr-only">浏览次数:</span> <span
                                                    class="meta-value">2255</span>
</span>
                                    </small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.ihewro.com/archives/225/"
                                   class="pull-left thumb-sm m-r">
                                    <img style="height: 40px!important;width: 40px!important;"
                                         src="ihewro/picture/1.jpg" class="img-circle wp-post-image">
                                </a>
                                <div class="clear">
                                    <h4 class="h5 l-h"><a href="https://www.ihewro.com/archives/225/"
                                                          title="每周晚安歌单"> 每周晚安歌单 </a></h4>
                                    <small class="text-muted">
<span class="meta-views"> <i class="iconfont icon-comments" aria-hidden="true"></i> <span
            class="sr-only">评论数：</span> <span class="meta-value">10</span>
</span>
                                        <span class="meta-date m-l-sm"> <i class="fa fa-eye"
                                                                           aria-hidden="true"></i> <span
                                                    class="sr-only">浏览次数:</span> <span
                                                    class="meta-value">8715</span>
</span>
                                    </small>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <section id="categories-2" class="widget widget_categories wrapper-md clear">
                <h3 class="widget-title m-t-none text-md">分類</h3>
                <ul class="list-group">
                    <li class="list-group-item"><a href="https://www.ihewro.com/category/tech/"> <span
                                    class="badge pull-right">37</span>设计开发</a></li>
                    <li class="list-group-item"><a href="https://www.ihewro.com/category/share/"> <span
                                    class="badge pull-right">33</span>资源技巧</a></li>
                    <li class="list-group-item"><a href="https://www.ihewro.com/category/hobby/"> <span
                                    class="badge pull-right">8</span>兴趣爱好</a></li>
                    <li class="list-group-item"><a href="https://www.ihewro.com/category/life/"> <span
                                    class="badge pull-right">58</span>生活随笔</a></li>
                    <li class="list-group-item"><a href="https://www.ihewro.com/category/others/"> <span
                                    class="badge pull-right">5</span>文章杂烩</a></li>
                </ul>
            </section>
            <section id="tag_cloud-2" class="widget widget_tag_cloud wrapper-md clear">
                <h3 class="widget-title m-t-none text-md">標籤雲</h3>
                <div class="tags l-h-2x">
                    <a href="https://www.ihewro.com/tag/%E6%97%B6%E5%80%99/" class="label bg-info"
                       title="时候" data-toggle="tooltip">时候</a>
                    <a href="https://www.ihewro.com/tag/%E4%BB%A3%E7%A0%81/" class="label bg-info"
                       title="代码" data-toggle="tooltip">代码</a>
                    <a href="https://www.ihewro.com/tag/%E5%96%9C%E6%AC%A2/" class="label bg-info"
                       title="喜欢" data-toggle="tooltip">喜欢</a>
                    <a href="https://www.ihewro.com/tag/%E7%94%9F%E6%B4%BB/" class="label bg-info"
                       title="生活" data-toggle="tooltip">生活</a>
                    <a href="https://www.ihewro.com/tag/%E5%86%85%E5%AE%B9/" class="label bg-info"
                       title="内容" data-toggle="tooltip">内容</a>
                    <a href="https://www.ihewro.com/tag/%E5%8D%9A%E5%AE%A2/" class="label bg-info"
                       title="博客" data-toggle="tooltip">博客</a>
                    <a href="https://www.ihewro.com/tag/%E4%BA%8B%E6%83%85/" class="label bg-info"
                       title="事情" data-toggle="tooltip">事情</a>
                    <a href="https://www.ihewro.com/tag/%E9%AB%98%E4%B8%AD/" class="label bg-info"
                       title="高中" data-toggle="tooltip">高中</a>
                    <a href="https://www.ihewro.com/tag/%E6%95%88%E6%9E%9C/" class="label bg-info"
                       title="效果" data-toggle="tooltip">效果</a>
                    <a href="https://www.ihewro.com/tag/%E6%96%87%E7%AB%A0/" class="label bg-info"
                       title="文章" data-toggle="tooltip">文章</a>
                    <a href="https://www.ihewro.com/tag/css/" class="label bg-info" title="css"
                       data-toggle="tooltip">css</a>
                    <a href="https://www.ihewro.com/tag/%E7%99%BE%E5%BA%A6/" class="label bg-info"
                       title="百度" data-toggle="tooltip">百度</a>
                    <a href="https://www.ihewro.com/tag/%E4%B8%BB%E9%A2%98/" class="label bg-info"
                       title="主题" data-toggle="tooltip">主题</a>
                    <a href="https://www.ihewro.com/tag/%E5%8A%9E%E6%B3%95/" class="label bg-info"
                       title="办法" data-toggle="tooltip">办法</a>
                    <a href="https://www.ihewro.com/tag/function/" class="label bg-info" title="function"
                       data-toggle="tooltip">function</a>
                    <a href="https://www.ihewro.com/tag/%E9%A1%B5%E9%9D%A2/" class="label bg-info"
                       title="页面" data-toggle="tooltip">页面</a>
                    <a href="https://www.ihewro.com/tag/typecho/" class="label bg-info" title="typecho"
                       data-toggle="tooltip">typecho</a>
                    <a href="https://www.ihewro.com/tag/%E5%9C%B0%E5%9D%80/" class="label bg-info"
                       title="地址" data-toggle="tooltip">地址</a>
                    <a href="https://www.ihewro.com/tag/%E4%BD%9C%E8%80%85/" class="label bg-info"
                       title="作者" data-toggle="tooltip">作者</a>
                    <a href="https://www.ihewro.com/tag/%E6%96%87%E4%BB%B6/" class="label bg-info"
                       title="文件" data-toggle="tooltip">文件</a>
                    <a href="https://www.ihewro.com/tag/%E5%9B%BE%E7%89%87/" class="label bg-info"
                       title="图片" data-toggle="tooltip">图片</a>
                    <a href="https://www.ihewro.com/tag/%E4%BD%9C%E4%B8%9A/" class="label bg-info"
                       title="作业" data-toggle="tooltip">作业</a>
                    <a href="https://www.ihewro.com/tag/%E5%AE%A4%E5%8F%8B/" class="label bg-info"
                       title="室友" data-toggle="tooltip">室友</a>
                    <a href="https://www.ihewro.com/tag/%E5%AD%A6%E6%A0%A1/" class="label bg-info"
                       title="学校" data-toggle="tooltip">学校</a>
                    <a href="https://www.ihewro.com/tag/%E7%95%8C%E9%9D%A2/" class="label bg-info"
                       title="界面" data-toggle="tooltip">界面</a>
                    <a href="https://www.ihewro.com/tag/%E7%9B%AE%E5%BD%95/" class="label bg-info"
                       title="目录" data-toggle="tooltip">目录</a>
                    <a href="https://www.ihewro.com/tag/html/" class="label bg-info" title="html"
                       data-toggle="tooltip">html</a>
                    <a href="https://www.ihewro.com/tag/%E5%9B%9E%E5%AE%B6/" class="label bg-info"
                       title="回家" data-toggle="tooltip">回家</a>
                    <a href="https://www.ihewro.com/tag/%E5%AE%BF%E8%88%8D/" class="label bg-info"
                       title="宿舍" data-toggle="tooltip">宿舍</a>
                    <a href="https://www.ihewro.com/tag/%E8%AF%84%E8%AE%BA/" class="label bg-info"
                       title="评论" data-toggle="tooltip">评论</a>
                </div>
            </section>
        </div>
    </aside>
</div>
</main>
</div>
    <footer id="footer" class="app-footer" role="footer">
        <script type="text/template" id="tmpl-customizer">
            <div class="settings panel panel-default setting_body_panel" aria-hidden="true">
                <button class="btn btn-default no-shadow pos-abt" data-toggle="tooltip" data-placement="left"
                        data-original-title="设置" data-toggle-class=".settings=active, .settings-icon=animate-spin">
                    <i class="fa fa-gear settings-icon"></i>
                </button>
                <div class="panel-heading">
                    <button class="pull-right btn btn-xs btn-rounded btn-danger" name="reset" data-toggle="tooltip"
                            data-placement="top" data-original-title="恢復默認值">重置
                    </button>
                    设置
                </div>
                <div class="setting_body">
                    <div class="panel-body">
                        <# for ( var keys = _.keys( data.sections.settings ), i = 0, name; keys.length > i; ++i ) { #>
                            <div
                            <# if ( i !== ( keys.length - 1 ) ) print( ' class="m-b-sm"' ); #>>
                                <label class="i-switch bg-info pull-right">
                                    <input type="checkbox" name="{{ keys[i] }}" value="1"
                                    <# if ( data.defaults[keys[i]] ) print( ' checked="checked"' ); #> />
                                        <i></i>
                                </label>
                                {{ data.sections.settings[keys[i]] }}
                    </div>
                    <# } #>
                </div>
                <div class="wrapper b-t b-light bg-light lter r-b">
                    <div class="row row-sm">
                        <div class="col-xs-6">
                            <#
                                    _.each( data.sections.colors, function( color, i ) {
                                    var newColumnBefore = ( i % 7 ) === 6;
                                    #>
                                <label class="i-checks block<# if ( !newColumnBefore ) print( ' m-b-sm' ); #>">
                                    <input type="radio" name="color" value="{{ i }}"
                                    <# if ( data.defaults['color'] === i ) print( ' checked="checked"' ); #> />
                                        <span class="block bg-light clearfix pos-rlt">
								<span class="active pos-abt w-full h-full bg-black-opacity text-center">
									<i class="fa fa-check text-md text-white m-t-xs"></i>
								</span>
								<b class="{{ color.navbarHeader }} header"></b>
								<b class="{{ color.navbarCollapse }} header"></b>
								<b class="{{ color.aside.replace( ' b-r', '' ) }}"></b>
							</span>
                                </label>
                                <#
                                        if ( newColumnBefore && ( i + 1 )
                                <
                                data.sections.colors.length )
                                print( '
                                <
                                /div>
                                <div class="col-xs-6">' );
                                    } );
                                    #>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </script>
        <div class="topButton panel panel-default">
            <button id="goToTop" class="btn btn-default no-shadow pos-abt hide">
                <i class="fa fa-chevron-circle-up" aria-hidden="true"></i>
            </button>
        </div>
    </footer>
</div><!--end of .app app-header-fixed-->
<script type="text/javascript" src="ihewro/js/meting.min.js"></script>
<script type="text/javascript">window['LocalConst'] = {
        COMMENT_NAME_INFO: '必須填寫暱稱或姓名',
        COMMENT_EMAIL_INFO: '必須填寫電子郵箱地址',
        COMMENT_EMAIL_LEGAL_INFO: '郵箱地址不合法',
        COMMENT_CONTENT_INFO: '必須填寫評論內容',
        COMMENT_SUBMIT_ERROR: '提交失敗，請重試！',
        COMMENT_CONTENT_LEGAL_INFO: '提交失敗,您的輸入內容不符合規則！',
        LOGIN_USERNAME_INFO: '必須填寫用戶名',
        LOGIN_PASSWORD_INFO: '請填寫密碼',
        LOGIN_SUBMIT_ERROR: '登錄失敗，請重新登錄',
        LOGIN_SUBMIT_INFO: '用戶名或者密碼錯誤，請重試',
        LOGIN_SUBMIT_SUCCESS: '登錄成功',
        LOGOUT_SUCCESS_REFRESH: '退出成功，正在刷新當前頁面',
        LOGOUT_ERROR: '退出失敗，請重試',
        LOGOUT_SUCCESS: '退出成功',
        SUBMIT_PASSWORD_INFO: '密碼錯誤，請重試',
        ChANGYAN_APP_KEY: '',
        CHANGYAN_CONF: '',
        COMMENT_SYSTEM: '0',
        COMMENT_SYSTEM_ROOT: '0',
        COMMENT_SYSTEM_CHANGYAN: '1',
        COMMENT_SYSTEM_OTHERS: '2',
        EMOJI: '表情',
        IS_PJAX: '1',
        IS_PAJX_COMMENT: '1',
        BASE_SCRIPT_URL: 'https://www.ihewro.com/usr/themes/handsome/',
        THEME_COLOR: '8',
        THEME_HEADER_FIX: '1',
        THEME_ASIDE_FIX: '1',
        THEME_ASIDE_FOLDED: '',
        THEME_ASIDE_DOCK: '',
        THEME_CONTAINER_BOX: '1',
        THEME_HIGHLIGHT_CODE: '1',
        THEME_TOC: '1',
        TOC_TITLE: '文章目錄',
        HEADER_FIX: '固定頭部',
        ASIDE_FIX: '固定導航',
        ASIDE_FOLDED: '折疊導航',
        ASIDE_DOCK: '置頂導航',
        CONTAINER_BOX: '盒子模型',
        OFF_SCROLL_HEIGHT: '50',
        COMMENT_REJECT_PLACEHOLDER: '居然什么也不说，哼',
        COMMENT_PLACEHOLDER: '说点什么吧……'
    };</script>
<script src="ihewro/js/bootstrap.min.js"></script>
<script src="ihewro/js/jquery.pjax.min.js" type="text/javascript"></script>
<script>$(document).pjax('a[href^="https://www.ihewro.com/"]:not(a[target="_blank"], a[no-pjax])', {
        container: '#content', fragment: '#content', timeout: 8000
    }).on('pjax:start', function () {
        window['Page'].doPJAXSendAction();
    }).on('pjax:complete', function () {
        window['Page'].doPJAXCompleteAction();
    })
</script>
<script src="ihewro/js/jquery.fancybox.min.js"></script>
<script src="ihewro/js/owo.min.js"></script>
<script src="ihewro/js/music.min.js"></script>
<script>var player = new skPlayer({
        autoplay: false,
        listshow: false,
        mode: 'listloop',
        music: {type: 'cloud', source: '888233349', media: 'tencent',}
    });</script>
<script src="ihewro/js/function.min.js"></script>
<script src="ihewro/js/core.min.js"></script>
<script data-no-instant type="text/javascript"></script>
</body><!--#body end-->
</html>

