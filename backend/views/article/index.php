<section class="Hui-article-box">
    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i>首页
        <span class="c-gray en">&gt;</span>
        文章管理
        <span class="c-gray en">&gt;</span>
        文章列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
                href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <div class="Hui-article">
        <article class="cl pd-20">
            <?=\common\widgets\Alert::widget()?>
            <div class="text-c">
                <?php $form = \yii\widgets\ActiveForm::begin([
                    'method' => 'get',
                    'action'=>\yii\helpers\Url::to(['article/index']),
                    'options'=>['class'=>'form-inline']
                ]); ?>
				<span class="select-box inline">
				<select name="cate_id" class="select">
					<option value="0">全部分类</option>
                    <?php
                        foreach ($cate as $item):?>
                            <option value="<?=$item['cate_id']?>" <?php if(isset($return['cate_id']) && $return['cate_id']==$item['cate_id']){
                                echo 'selected';
                            }?>><?=$item['cate_name']?></option>
                    <?php endforeach;?>
				</select>
				</span>
                创建时间：
                <input <?php if(isset($return['start'])){?>
                        value="<?=$return['start']?>"
                        <?php }?>   type="text" name="start" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}'})" id="logmin" class="input-text Wdate" style="width:120px;">
                -
                <input <?php if(isset($return['end'])){?>
                        value="<?=$return['end']?>"
                        <?php }?>   type="text" name="end" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d'})" id="logmax" class="input-text Wdate" style="width:120px;">
                <input
                    <?php if(isset($return['title'])){?>
                        value="<?=$return['title']?>"
                        <?php }?>   type="text" name="title" id="" placeholder=" 标题" style="width:250px" class="input-text">
                <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
            <div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a href="<?=\yii\helpers\Url::toRoute(['article/add'])?>"
                   class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加文章</a>
            </span>
            </div>
            <div class="mt-20">
                <table class="table table-border table-bordered table-hover table-bg table-sort">
                    <thead>
                    <tr class="text-c">
                        <th>标题</th>
                        <th>分类</th>
                        <th>作者</th>
                        <th>查看次数</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model as $item): ?>
                        <tr>
                            <td><?=$item->title?></td>
                            <td><?=$item->cate['cate_name']?></td>
                            <td><?=$item->author?></td>
                            <td><?=$item->views?></td>
                            <td><?=date('Y-m-d H:i:s',$item->created_time)?></td>
                            <td><?=date('Y-m-d H:i:s',$item->update_time)?></td>
                            <td><?=$item->status==1?'<span class="label label-success radius">正常</span>':'<span class="label label-danger radius">隐藏</span>'?></td>
                            <td>
                                <a title="修改" href="javascript:;" onclick="member_edit('修改','<?=\yii\helpers\Url::toRoute(['article/edit','article_id'=>$item->article_id])?>','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                                <?php
                                    if($item->status==1){?>
                                        <a title="隐藏" href="javascript:;" onclick="member_hide(this,'<?=\yii\helpers\Url::toRoute(['article/hide','article_id'=>$item->article_id])?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
                                    <?php }else{?>
                                        <a title="显示" href="javascript:;" onclick="member_show(this,'<?=\yii\helpers\Url::toRoute(['article/show','article_id'=>$item->article_id])?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe725;</i></a>
                                <?php }?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?= \yii\widgets\LinkPager::widget([
                    'pagination' => $page,
                    'firstPageLabel' => '首页',
                    'lastPageLabel' => '尾页',
                    'hideOnSinglePage' => false,
                    'maxButtonCount' => 5,
                ]); ?>
            </div>

        </article>
    </div>
</section>
<script type="text/javascript">
    $('.del').on('click',function(){
        var id=$(this).attr('name');
        layer.confirm('确定要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            window.location.href = "/index.php?r=user/del&id="+id;
            var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
        });
    });

    /*资讯-添加*/
    function article_add(title,url,w,h){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }

    /*用户-添加*/
    function member_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-查看*/
    function member_show(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-编辑*/
    function member_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*密码-修改*/
    function change_password(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-删除*/
    function member_show(obj,id){
        layer.confirm('确认要显示吗？',function(index){
            $.ajax({
                type: 'POST',
                url: id,
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").remove();
                    layer.msg('已显示!',{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
    function member_hide(obj,id){
        layer.confirm('确认要隐藏吗？',function(index){
            $.ajax({
                type: 'POST',
                url: id,
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").remove();
                    layer.msg('已隐藏!',{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
</script>





