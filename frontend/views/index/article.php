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
                        <div class="respond comment-respond">
                            <h4 id="reply-title" class="comment-reply-title m-t-lg m-b">发表评论</h4>
                            <form method="post" onsubmit="return false" class="comment-form" role="form">
                                <input type="hidden" name="article_id" value="<?=$model->article_id?>">
                                <div class=" form-group">
                                    <label for="comment">评论 <span class=" text-danger">*</span></label>
                                    <textarea class="textarea form-control OwO-textarea" name="content" rows="5" placeholder="说点什么吧……" ></textarea>
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
                                    <button type="submit" name="submit" class="submit btn btn-success padder-lg" data-pid="0">
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
                                <li class="comment-body comment-parent comment-odd comment-<?=$item['guest_id']?>">
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
                                                <a href="javascript:void(0);" class="reply-msg" data-id="<?=$item['guest_id']?>" data-article="<?=$model->article_id?>" onclick="reply(this,<?=$item['guest_id']?>,<?=$model->article_id?>,<?=$item['guest_id']?>)">回复</a>
                                                <div class="reply">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-children list-unstyled m-l-xxl">
                                        <ol class="comment-list">
                                            <li class="comment-body comment-son-<?=$item['guest_id']?> comment-odd">
                                                <?php foreach ($item['son'] as $son):?>
                                                    <div class="comment-body">
                                                        <a class="pull-left thumb-sm">
                                                            <img nogallery src="/common/img/me.jpg" class="avatar-40 photo img-circle" style="height:40px!important; width: 40px!important;"> </a>
                                                        <div class="m-b m-l-xxl">
                                                            <div class="comment-meta">
                                            <span class="comment-author vcard">
                                            <b class="fn"><a href="https://9sb.org" target="_blank" rel="external nofollow"><?=$son['username']?></a></b>
                                            </span>
                                                                <div class="comment-metadata">
                                                                    <time class="format_time text-muted text-xs block m-t-xs" pubdate="pubdate" datetime="2018-05-06T17:58:25+08:00"><?=$son['created_time']?></time>
                                                                </div>
                                                            </div>
                                                            <div class="comment-content m-t-sm">
                                            <span class="comment-author-at">
                                                <b></b>
                                            </span>
                                                                <span class="comment-content-true">
                                                                    <p><b>@<?=$son['reply']?></b> <?=$son['content']?></p>
                                            </span>
                                                            </div>
                                                            <div class="comment-reply m-t-sm">
                                                                <a href="javascript:void(0);" class="reply-msg" data-id="<?=$item['guest_id']?>" data-article="<?=$model->article_id?>" onclick="reply(this,<?=$item['guest_id']?>,<?=$model->article_id?>,<?=$son['guest_id']?>)">回复</a>
                                                                <div class="reply">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach;?>
                                            </li>
                                        </ol>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        </ol>
                        <nav class="text-center m-t-lg m-b-lg" role="navigation"></nav>
                    </div>
                    <script type="text/javascript">
                        /**
                         * 提交评论
                         */
                        $("body").on("click", ".submit", function() {
                            var pid=$(this).attr('data-pid');
                            var from_data;
                            if(pid>0){
                                from_data =$('.comment-form-'+pid).serializeArray();
                            }else{
                                from_data =$('.comment-form').serializeArray();
                            }
                            var data = [];
                            $.each(from_data,function(i){
                                data[from_data[i].name] = from_data[i].value;
                            });
                            data = array_to_object(data);
                            var add_url="<?= \yii\helpers\Url::toRoute(['index/guest'])?>";
                            var list=$('.comment-list');
                            if(data){
                                ajax_post(add_url,data,function (re) {
                                    check_data(re,1);
                                    if(re.code==200){
                                        var pid=0;
                                        var content='';
                                        if(re.data.parent_id>0){
                                            pid=re.data.parent_id;
                                            content='<p><b>@'+re.data.reply+'</b> ' + re.data.content+ '</p>';
                                        }else{
                                            pid=re.data.guest_id;
                                            content='<p>' + re.data.content+ '</p>';
                                        }
                                        var html='<li id="comment-'+re.data.guest_id+'" class="comment-body comment-parent comment-odd">';
                                        var body=
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
                                            content+
                                            '</span>\n' +
                                            '</div>\n' +
                                            '<div class="comment-reply m-t-sm">\n' +
                                            '<a href="javascript:void(0);" class="reply-msg" data-id="'+pid+'" data-article="'+pid+'" onclick="reply(this,'+pid+','+re.data.article_id+','+re.data.guest_id+')">回复</a>\n'+
'                                                <div class="reply"></div>'+
                                            '</div>\n' +
                                            '</div>\n' +
                                            '</div>\n' ;
                                        var html2= '</li>';
                                        layer.msg(re.msg, {icon: 1,time:1000});
                                        if(re.data.parent_id>0){
                                            $('.comment-son-'+re.data.parent_id).append(body);
                                        }else{
                                            list.prepend(html+body+html2);
                                        }
                                        //如果是回复，评论后关闭回复框
                                        if(pid>0){
                                            $('.comment-form-'+pid).parent('.reply').html('');
                                        }
                                    }else{
                                        layer.msg(re.msg, {icon: 5,time:2000});
                                    }
                                });
                            }else{
                                layer.msg('请填写资料', {icon: 5,time:2000});
                            }
                        });

                        /**
                         * 点击回复
                         * @param obj
                         * @param guest_id
                         * @param article_id
                         * @param two_id
                         */
                        function reply(obj,guest_id,article_id,two_id) {
                            var html=
                                '<h4 id="reply-title" class="comment-reply-title m-t-lg m-b">发表评论\n' +
                                '                                <small class="cancel-comment-reply">\n' +
                                '                                    <a id="cancel-comment-reply-link" href="javascript:void(0);" onclick="cacel(this);" style="">取消回复</a> </small>\n' +
                                '                            </h4>' +
                                '<form method="post" onsubmit="return false" class="comment-form-'+guest_id+'" role="form">\n' +
                                '                                <input type="hidden" name="article_id" value="'+article_id+'">\n' +
                                '                                <input type="hidden" name="parent_id" value="'+guest_id+'">\n' +
                                '                                <input type="hidden" name="two_id" value="'+two_id+'">\n' +
                                '                                <div class=" form-group">\n' +
                                '                                    <label for="comment">评论 <span class=" text-danger">*</span></label>\n' +
                                '                                    <textarea class="textarea form-control OwO-textarea" name="content" rows="5" placeholder="说点什么吧……" ></textarea>\n' +
                                '                                    <div class="OwO"></div>\n' +
                                '                                </div>\n' +
                                '                                <div id="author_info" class="row row-sm">\n' +
                                '                                    <div class=" form-group col-sm-6 col-md-4">\n' +
                                '                                        <label for="author">名称 <span class=" text-danger">*</span></label>\n' +
                                '                                        <input class="form-control" name="username" type="text" maxlength="245" placeholder="姓名或昵称" required>\n' +
                                '                                    </div>\n' +
                                '                                    <div class=" form-group col-sm-6 col-md-4">\n' +
                                '                                        <label >邮箱 <span class=" text-danger">*</span>\n' +
                                '                                        </label>\n' +
                                '                                        <input type="text" name="email" class="form-control" placeholder="邮箱 (必填,将保密)" required/>\n' +
                                '                                    </div>\n' +
                                '                                    <div class=" form-group col-sm-12 col-md-4">\n' +
                                '                                        <label for="url">地址</label>\n' +
                                '                                        <input class="form-control" name="url" type="url" maxlength="200" placeholder="网站或博客"></div>\n' +
                                '                                </div>\n' +
                                '                                <div class="form-group">\n' +
                                    '<button type="submit" name="submit" class="submit btn btn-success padder-lg" data-pid="'+guest_id+'">' +
                                '                                        <span class="text">发表评论</span>\n' +
                                '                                        <span class="text-active">提交中...</span>\n' +
                                '                                    </button>'+
                                '                                    <i class="animate-spin fa fa-spinner hide" id="spin"></i>\n' +
                                '                                </div>\n' +
                                '                            </form>';
                            $(obj).next('.reply').html(html);
                        }

                        /**
                         * 取消回复
                         * @param obj
                         */
                        function cacel(obj) {
                            $(obj).parents('.reply').html('');
                        }
                    </script>

                </div>
            </div>
