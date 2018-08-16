<body>
<div class="x-nav">
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i>
    </a>
</div>
<div class="x-body">
    <div class="layui-row">
        <?php $form = \yii\widgets\ActiveForm::begin([
            'method' => 'get',
            'action'=>\yii\helpers\Url::to(['article/index']),
            'options'=>['class'=>'layui-form layui-col-md12 x-so']
        ]); ?>
        <form class="layui-form layui-col-md12 x-so">
            <input <?php if(isset($return['start'])):?> value="<?=$return['start']?>" <?php endif;?> class="layui-input" placeholder="开始日" name="start" id="start">
            <input <?php if(isset($return['end'])):?> value="<?=$return['end']?>" <?php endif;?> class="layui-input" placeholder="截止日" name="end" id="end">
            <div class="layui-input-inline">
                <select name="cate_id">
                    <option value="0">全部分类</option>
                    <?php
                    foreach ($cate as $item):?>
                        <option value="<?=$item['cate_id']?>" <?php if(isset($return['cate_id']) && $return['cate_id']==$item['cate_id']){
                            echo 'selected';
                        }?>><?=$item['cate_name']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <input <?php if(isset($return['title'])):?> value="<?=$return['title']?>" <?php endif;?> type="text" name="title"  placeholder="标题" autocomplete="off" class="layui-input">
            <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
    <xblock>
        <button class="layui-btn" onclick="x_admin_show('添加文章','<?= yii\helpers\Url::toRoute(['article/add'])?>')"><i class="layui-icon"></i>添加文章</button>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>标题</th>
            <th>分类</th>
            <th>封面</th>
            <th>作者</th>
            <th>查看次数</th>
            <th>创建时间</th>
            <th>修改时间</th>
            <th>状态</th>
            <th>是否置顶</th>
            <th>操作</th>
        </thead>
        <tbody>
        <?php foreach ($model as $item): ?>
        <tr>
            <td><?=$item->title?></td>
            <td><?=$item->cate['cate_name']?></td>
            <td width="200px"><img src="<?=$item['img']?>" style="width: 200px"></td>
            <td><?=$item->author?></td>
            <td><?=$item->views?></td>
            <td><?=date('Y-m-d H:i:s',$item->created_time)?></td>
            <td><?=date('Y-m-d H:i:s',$item->update_time)?></td>
            <td><?=$item->status==1?'<span class="label label-success radius">正常</span>':'<span class="label label-danger radius">隐藏</span>'?></td>
            <td><?=$item->is_top==1?'<span class="label label-success radius">置顶</span>':'<span class="label label-danger radius">普通</span>'?></td>
            <td>
                <a title="修改" href="javascript:;" onclick="x_admin_show('修改','<?=\yii\helpers\Url::toRoute(['article/edit','article_id'=>$item->article_id])?>')" class="ml-5" style="text-decoration:none">修改</a>
                <?php
                if($item->status==1){?>
                    <a title="隐藏" href="javascript:;" onclick="edit(this,'<?=\yii\helpers\Url::toRoute(['article/operation','article_id'=>$item->article_id,'status'=>0])?>',0)" class="ml-5" style="text-decoration:none">隐藏</a>
                <?php }else{?>
                    <a title="显示" href="javascript:;" onclick="edit(this,'<?=\yii\helpers\Url::toRoute(['article/operation','article_id'=>$item->article_id,'status'=>1])?>',1)" class="ml-5" style="text-decoration:none">显示</a>
                <?php }?>
                <?php
                if($item->is_top==1){?>
                    <a title="取消置顶" href="javascript:;" onclick="edit(this,'<?=\yii\helpers\Url::toRoute(['article/operation','article_id'=>$item->article_id,'is_top'=>0])?>',2)" class="ml-5" style="text-decoration:none">取消置顶</a>
                <?php }else{?>
                    <a title="置顶" href="javascript:;" onclick="edit(this,'<?=\yii\helpers\Url::toRoute(['article/operation','article_id'=>$item->article_id,'is_top'=>1])?>',3)" class="ml-5" style="text-decoration:none">置顶</a>
                <?php }?>
            </td>
        </tr>
        <?php endforeach;?>
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
<script>
    layui.use('laydate', function () {
        var laydate = layui.laydate;
        //执行一个laydate实例
        laydate.render({
            elem: '#start' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
            elem: '#end' //指定元素
        });
    });
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

    /**
     * 操作
     * @param obj
     * @param url
     * @param type
     */
    function edit(obj,url,type) {
        var str='确认？';
        if(type==0){
            str='确认要隐藏吗？';
        } else if(type==1){
            str='确认要显示吗？';
        }else if(type==2){
            str='确认要取消置顶吗？';
        }else if(type==3){
            str='确认要置顶吗？';
        }
        layer.confirm(str,function(index){
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    if(data.code==200){
                        layer.msg('操作成功',{icon:1,time:1000});
                        layer.closeAll();
                        window.location.reload();
                    }else{
                        layer.msg(data.msg,{icon:6,time:5000});
                    }
                },
                error:function(data) {
                    layer.msg('操作失败',{icon:6,time:5000});
                },
            });
        });
    }
</script>
</body>

