<?php

use yii\helpers\Html;

?>
<div id="content" class="app-content markdown-body">
    <div id="loadingbar" class="butterbar hide">
        <span class="bar"></span>
    </div>
    <a class="off-screen-toggle hide"></a>
    <main class="app-content-body">
        <div class="hbox hbox-auto-xs hbox-auto-sm">
            <div class="col">
                <header id="small_widgets" class="bg-light lter b-b wrapper-md">
                    <h1 class="entry-title m-n font-thin h3 text-black l-h"><?= $model->title ?></h1>
                    <ul class="entry-meta text-muted list-inline m-b-none small">
                        <li class="meta-author"><i class="fa fa-user" aria-hidden="true"></i><span
                                    class="sr-only">作者：</span>  <?= $model->author ?></li>
                        <li class="meta-date"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<span
                                    class="sr-only">发布时间：</span>
                            <time class="meta-value"><?=date('Y-m-d',$model->created_time)?></time>
                        </li>
                        <li class="meta-views"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;<span
                                    class="meta-value"><?= $model->views ?>&nbsp;次浏览</span></li>
                        <li class="meta-comments"><i class="iconfont icon-comments" aria-hidden="true"></i>&nbsp;<a
                                    class="meta-value" href="#comments">&nbsp;<?php
                                $res = \backend\models\Guestbook::find()->where(['article_id' => $model->article_id])->count();
                                if ($res > 0) {
                                    echo $res . ' 条评论';
                                } else {
                                    echo '暂无评论';
                                }
                                ?></a></li>
                        <li class="meta-categories"><i class="fa fa-tags" aria-hidden="true"></i> <span class="sr-only">分类：</span>
                            <span class="meta-value"><a
                                        href="<?= \yii\helpers\Url::toRoute(['index/cate', 'cate_id' => $model->cate_id]) ?>"><?= $model->cate_name ?></a></span>
                        </li>
                    </ul>
                </header>
                <div class="wrapper-md">
                    <ol class="breadcrumb bg-white b-a" itemscope="">
                        <li>
                            <a href="<?= \yii\helpers\Url::toRoute(['index/index']) ?>" itemprop="breadcrumb"
                               title="返回首页" data-toggle="tooltip"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;首页</a>
                        </li>
                        <li class="active">正文&nbsp;&nbsp;</li>
                        <div style="float:right;">
                            分享到：
                            <style>i.iconfont.icon-qzone:after {
                                    padding: 0 0px 0 5px;
                                    color: #ccc;
                                    content: "/\00a0";
                                }</style>
                            <a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=http://muniao.org<?= \yii\helpers\Url::toRoute(['index/index', 'article_id' => $model->article_id]) ?>&title=<?= $model->title ?>&site=http://muniao.org<?= \yii\helpers\Url::toRoute(['index/index']) ?>"
                               itemprop="breadcrumb" target="_blank" title="" data-toggle="tooltip"
                               data-original-title="分享到QQ空间"
                               onclick="window.open(this.href, 'qzone-share', 'width=550,height=335');return false;"><i
                                        style="font-size:15px;" class="iconfont icon-qzone" aria-hidden="true"></i></a>
                            <a href="http://service.weibo.com/share/share.php?url=http://muniao.org<?= \yii\helpers\Url::toRoute(['index/index', 'article_id' => $model->article_id]) ?>&title=<?= $model->title ?>"
                               target="_blank" itemprop="breadcrumb" title="" data-toggle="tooltip"
                               data-original-title="分享到微博"
                               onclick="window.open(this.href, 'weibo-share', 'width=550,height=335');return false;"><i
                                        style="font-size:15px;" class="fa fa-weibo" aria-hidden="true"></i></a>
                        </div>
                    </ol>
                    <div id="postpage" class="blog-post">
                        <article class="panel">
                            <?php if($model->img):?>
                                <div class="entry-thumbnail" aria-hidden="true">
                                    <div class="item-thumb" style="background-image: url(<?=$model->img?>)"></div>
                                </div>
                            <?php endif;?>
                            <div id="post-content" class="wrapper-lg">
                                <div class="entry-content l-h-2x">
                                    <?php
                                    $res = preg_replace('/\/ueditor\/php\/upload\/image/', "http://blog2.com/ueditor/php/upload/image", $model->content);
                                    echo $res;
                                    ?>
                                </div>
                                <div class="show-foot">
                                    <div class="notebook">
                                        <i class="fa fa-clock-o"></i>
                                        <span>最后修改：<?= date('Y-m-d H:i:s') ?></span>
                                    </div>
                                    <div class="copyright" data-toggle="tooltip" data-html="true"
                                         data-original-title="转载请联系作者获得授权，并注明转载地址"><span>© 著作权归作者所有</span>
                                    </div>
                                </div>
                                <div class="support-author">
                                    <button data-toggle="modal" data-target="#myModal" class="btn btn-pay btn-danger"><i
                                                class="fa fa-gratipay" aria-hidden="true"></i>&nbsp;赞赏支持
                                    </button>
                                    <div class="mt20 text-center article__reward-info">
                                        <span class="mr10">如果你喜欢这篇文章，请随意赞赏</span>
                                    </div>
                                </div>
                                <div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
                                     aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">&times;</span><span
                                                            class="sr-only">Close</span></button>
                                                <h4 class="modal-title">赞赏作者</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center"><strong
                                                            class="article__reward-text">扫一扫支付</strong></p>
                                                <div class="tab-content">
                                                    <?php echo Html::img('@web/common/img/ali.png', ['class' => 'pay-img tab-pane fade in active', 'aria-labelledby' => 'alipay-tab', 'id' => 'alipay_author', 'role' => 'tabpanel']) ?>

                                                    <?php echo Html::img('@web/common/img/we.png', ['class' => 'pay-img tab-pane fade', 'aria-labelledby' => 'alipay-tab', 'id' => 'wechatpay_author', 'role' => 'tabpanel']) ?>
                                                </div>
                                                <div class="article__reward-border mb20 mt10"></div>
                                                <div class="text-center" role="tablist">
                                                    <div class="pay-button" role="presentation" class="active">
                                                        <button href="#alipay_author" id="alipay-tab"
                                                                aria-controls="alipay_author" role="tab"
                                                                data-toggle="tab" class="btn m-b-xs btn-info"><i
                                                                    class="iconfont icon-alipay" aria-hidden="true"></i><span>&nbsp;支付宝支付</span>
                                                        </button>
                                                    </div>
                                                    <div class="pay-button" role="presentation">
                                                        <button href="#wechatpay_author" id="wechatpay-tab"
                                                                aria-controls="wechatpay_author" role="tab"
                                                                data-toggle="tab" class="btn m-b-xs btn-success"><i
                                                                    class="iconfont icon-wechatpay"
                                                                    aria-hidden="true"></i><span>&nbsp;微信支付</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div id="comments">
                        <div id="respond-post-735" class="respond comment-respond">
                            <h4 id="reply-title" class="comment-reply-title m-t-lg m-b">发表评论</h4>
                            <form id="comment_form" method="post" onsubmit="return false" class="comment-form" role="form">
                                <input type="hidden" name="article_id" value="<?=$model->article_id?>">
                                <div class=" form-group">
                                    <label for="comment">评论 <span class=" text-danger">*</span></label>
                                    <textarea class="textarea form-control OwO-textarea" name="content" rows="5" placeholder="说点什么吧……" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
                                    <div class="OwO"></div>
                                </div>
                                <div id="author_info" class="row row-sm">
                                    <div class=" form-group col-sm-6 col-md-4">
                                        <label for="author">名称 <span class=" text-danger">*</span></label>
                                        <input class="form-control" name="username" type="text" maxlength="245" placeholder="姓名或昵称" required>
                                    </div>
                                    <div class=" form-group col-sm-6 col-md-4">
                                        <label >邮箱 <span class=" text-danger">*</span>
                                        </label>
                                        <input type="text" name="email" class="form-control" placeholder="邮箱 (必填,将保密)" required/>
                                    </div>
                                    <div class=" form-group col-sm-12 col-md-4">
                                        <label for="url">地址</label>
                                        <input class="form-control" name="url" type="url" maxlength="200" placeholder="网站或博客"></div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" id="submit"
                                            class="submit btn btn-success padder-lg">
                                        <span class="text">发表评论</span>
                                        <span class="text-active">提交中...</span>
                                    </button>
                                    <i class="animate-spin fa fa-spinner hide" id="spin"></i>
                                </div>
                            </form>
                        </div>
                        <h4 class="comments-title m-t-lg m-b"><?=$count?> 条评论</h4>
                        <ol class="comment-list">
                            <?php foreach ($guest as $item):?>
                                <li id="comment-5053" class="comment-body comment-parent comment-odd">
                                    <div class="comment-body">
                                        <a class="pull-left thumb-sm">
                                            <img nogallery src="/common/img/me.jpg" class="avatar-40 photo img-circle" style="height:40px!important; width: 40px!important;"> </a>
                                        <div class="m-b m-l-xxl">
                                            <div class="comment-meta">
                                            <span class="comment-author vcard">
                                            <b class="fn"><a href="https://9sb.org" target="_blank" rel="external nofollow"><?=$item['username']?></a></b>
                                            </span>
                                                <div class="comment-metadata">
                                                    <time class="format_time text-muted text-xs block m-t-xs" pubdate="pubdate" datetime="2018-05-06T17:58:25+08:00"><?=$item['created_time']?></time>
                                                </div>
                                            </div>
                                            <div class="comment-content m-t-sm">
                                            <span class="comment-author-at">
                                                <b></b>
                                            </span>
                                                <span class="comment-content-true">
                                                <p><?=$item['content']?></p>
                                            </span>
                                            </div>
                                            <div class="comment-reply m-t-sm">
                                                <a href="https://www.ihewro.com/archives/780/comment-page-1?replyTo=5053#respond-post-780" rel="nofollow" onclick="return TypechoComment.reply('comment-5053', 5053);">回复</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach;?>
                            <li id="comment-5051" class="comment-body comment-parent comment-even">
                                <div id="div-comment-5051" class="comment-body">
                                    <a class="pull-left thumb-sm">
                                        <img nogallery src="images/e6dd8c39eae24f72865196a3f9aafa3c.gif"
                                             class="avatar-40 photo img-circle"
                                             style="height:40px!important; width: 40px!important;"> </a>
                                    <div class="m-b m-l-xxl">
                                        <div class="comment-meta">
<span class="comment-author vcard">
<b class="fn"><a href="http://www.1900.live" target="_blank" rel="external nofollow">1900</a></b> </span>
                                            <div class="comment-metadata">
                                                <time class="format_time text-muted text-xs block m-t-xs"
                                                      pubdate="pubdate" datetime="2018-05-06T13:29:47+08:00">1 星期前
                                                </time>
                                            </div>
                                        </div>
                                        <div class="comment-content m-t-sm">
                                            <span class="comment-author-at"><b></b></span><span
                                                    class="comment-content-true">
<p>不恋爱只有一种感觉：孤独。</p>
<p>恋爱后你会感到：幸福、开心、失落、嫉妒...，你以往想都没想过的感觉会淋在<br>
你的身心。</p> </span>
                                        </div>
                                        <div class="comment-reply m-t-sm">
                                            <a href="https://www.ihewro.com/archives/780/comment-page-1?replyTo=5051#respond-post-780"
                                               rel="nofollow"
                                               onclick="return TypechoComment.reply('comment-5051', 5051);">回复</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-children list-unstyled m-l-xxl">
                                    <ol class="comment-list">
                                        <li id="comment-5058"
                                            class="comment-body comment-child comment-level-odd comment-odd comment-by-author">
                                            <div id="div-comment-5058" class="comment-body">
                                                <a class="pull-left thumb-sm">
                                                    <img nogallery src="/common/img/me.jpg" class="avatar-40 photo img-circle" style="height:40px!important; width: 40px!important;"> </a>
                                                <div class="m-b m-l-xxl">
                                                    <div class="comment-meta">
                                                        <span class="comment-author vcard">
                                                        <b class="fn">
                                                            <a href="http://www.ihewro.com/" target="_blank" rel="external nofollow">友人C</a>
                                                        </b><label class="label bg-dark m-l-xs">博主</label> </span>
                                                        <div class="comment-metadata">
                                                            <time class="format_time text-muted text-xs block m-t-xs" pubdate="pubdate" datetime="2018-05-09T19:26:55+08:00">5 天前
                                                            </time>
                                                        </div>
                                                    </div>
                                                    <div class="comment-content m-t-sm">
                                                        <span class="comment-author-at"><b><a href="#comment-5051">@1900</a></b></span>
                                                        <span class="comment-content-true"><p>但是就是想尝试恋爱的幸福呢 <img src="/common/img/me.jpg" class="emotion-aru"> </p> </span>
                                                    </div>
                                                    <div class="comment-reply m-t-sm">
                                                        <a href="https://www.ihewro.com/archives/780/comment-page-1?replyTo=5058#respond-post-780" rel="nofollow" onclick="return TypechoComment.reply('comment-5058', 5058);">回复</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-children list-unstyled m-l-xxl">
                                                <ol class="comment-list">
                                                    <li id="comment-5062"
                                                        class="comment-body comment-child2 comment-level-even comment-even">
                                                        <div id="div-comment-5062" class="comment-body">
                                                            <a class="pull-left thumb-sm">
                                                                <img nogallery
                                                                     src="images/e6dd8c39eae24f72865196a3f9aafa3c.gif"
                                                                     class="avatar-40 photo img-circle"
                                                                     style="height:40px!important; width: 40px!important;">
                                                            </a>
                                                            <div class="m-b m-l-xxl">
                                                                <div class="comment-meta">
<span class="comment-author vcard">
<b class="fn"><a href="http://www.1900.live" target="_blank" rel="external nofollow">1900</a></b> </span>
                                                                    <div class="comment-metadata">
                                                                        <time class="format_time text-muted text-xs block m-t-xs"
                                                                              pubdate="pubdate"
                                                                              datetime="2018-05-11T14:43:32+08:00">4
                                                                            天前
                                                                        </time>
                                                                    </div>
                                                                </div>
                                                                <div class="comment-content m-t-sm">
                                                                        <span class="comment-author-at"><b><a
                                                                                        href="#comment-5058">@友人C</a></b></span><span
                                                                            class="comment-content-true">
<p>对呀，还是有这么多人前仆后继~，也许这就是人生吧。</p>
<p>回想起夕阳下的奔跑，那是我逝去的青春。<br>
（话说没有邮件回复很不方便那。）</p> </span>
                                                                </div>
                                                                <div class="comment-reply m-t-sm">
                                                                    <a href="https://www.ihewro.com/archives/780/comment-page-1?replyTo=5062#respond-post-780"
                                                                       rel="nofollow"
                                                                       onclick="return TypechoComment.reply('comment-5062', 5062);">回复</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li id="comment-5061"
                                                        class="comment-body comment-child2 comment-level-even comment-odd">
                                                        <div id="div-comment-5061" class="comment-body">
                                                            <a class="pull-left thumb-sm">
                                                                <img nogallery
                                                                     src="images/8f4ff4290e964805a6f097b60f920123.gif"
                                                                     class="avatar-40 photo img-circle"
                                                                     style="height:40px!important; width: 40px!important;">
                                                            </a>
                                                            <div class="m-b m-l-xxl">
                                                                <div class="comment-meta">
<span class="comment-author vcard">
<b class="fn"><a href="http://longxianwen.net" target="_blank" rel="external nofollow">龙显文</a></b> </span>
                                                                    <div class="comment-metadata">
                                                                        <time class="format_time text-muted text-xs block m-t-xs"
                                                                              pubdate="pubdate"
                                                                              datetime="2018-05-11T08:38:18+08:00">4
                                                                            天前
                                                                        </time>
                                                                    </div>
                                                                </div>
                                                                <div class="comment-content m-t-sm">
                                                                        <span class="comment-author-at"><b><a
                                                                                        href="#comment-5058">@友人C</a></b></span><span
                                                                            class="comment-content-true">
<p>年轻人的烦恼总是那么相似<img src="images/knife.png" class="emotion-aru"> </p> </span>
                                                                </div>
                                                                <div class="comment-reply m-t-sm">
                                                                    <a href="https://www.ihewro.com/archives/780/comment-page-1?replyTo=5061#respond-post-780"
                                                                       rel="nofollow"
                                                                       onclick="return TypechoComment.reply('comment-5061', 5061);">回复</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </li>
                        </ol>
                        <nav class="text-center m-t-lg m-b-lg" role="navigation"></nav>

                    </div>
                    <script type="text/javascript">
                        $('#submit').click(function () {
                            var from_data = $('#comment_form').serializeArray();
                            var data = [];
                            $.each(from_data,function(i){
                                data[from_data[i].name] = from_data[i].value;
                            });
                            console.log(data);
                            data = array_to_object(data);
                            var add_url="<?= \yii\helpers\Url::toRoute(['index/guest'])?>";
                            var list=$('.comment-list');
                            if(data){
                                ajax_post(add_url,data,function (re) {
                                    console.log(re);
                                    check_data(re,1);

                                    if(re.code==200){
                                        var html='<li id="comment-5053" class="comment-body comment-parent comment-odd">\n' +
                                            '<div class="comment-body">\n' +
                                            '<a class="pull-left thumb-sm">\n' +
                                            '<img nogallery src="/common/img/me.jpg" class="avatar-40 photo img-circle" style="height:40px!important; width: 40px!important;"> </a>\n' +
                                            '<div class="m-b m-l-xxl">\n' +
                                            '<div class="comment-meta">\n' +
                                            '<span class="comment-author vcard">\n' +
                                            '<b class="fn"><a href="https://9sb.org" target="_blank" rel="external nofollow">'+data['username']+'</a></b>\n' +
                                            '</span>\n' +
                                            '<div class="comment-metadata">\n' +
                                            '<time class="format_time text-muted text-xs block m-t-xs" pubdate="pubdate" datetime="2018-05-06T17:58:25+08:00">刚刚</time>\n' +
                                            '</div>\n' +
                                            '</div>\n' +
                                            '<div class="comment-content m-t-sm">\n' +
                                            '<span class="comment-author-at">\n' +
                                            '<b></b>\n' +
                                            '</span>\n' +
                                            '<span class="comment-content-true">\n' +
                                            '<p>' + data['content']+
                                            '</p>\n' +
                                            '</span>\n' +
                                            '</div>\n' +
                                            '<div class="comment-reply m-t-sm">\n' +
                                            '<a href="https://www.ihewro.com/archives/780/comment-page-1?replyTo=5053#respond-post-780" rel="nofollow" onclick="return TypechoComment.reply(\'comment-5053\', 5053);">回复</a>\n' +
                                            '</div>\n' +
                                            '</div>\n' +
                                            '</div>\n' +
                                            '</li>';

                                        layer.msg(re.msg, {icon: 1,time:1000});
                                        console.log(html);
                                        list.prepend(html);


//                                        parent.window.location.reload();
                                    }else{
                                        layer.msg(re.msg, {icon: 5,time:2000});
                                    }
                                });
                            }else{
                                layer.msg('请填写资料', {icon: 5,time:2000});
                            }
                        });
                    </script>

                </div>
            </div>
