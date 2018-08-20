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
            'action'=>\yii\helpers\Url::to(['message/index']),
            'options'=>['class'=>'layui-form layui-col-md12 x-so']
        ]); ?>
        <form class="layui-form layui-col-md12 x-so">
            <input <?php if(isset($return['start'])):?> value="<?=$return['start']?>" <?php endif;?> class="layui-input" placeholder="开始日" name="start" id="start">
            <input <?php if(isset($return['end'])):?> value="<?=$return['end']?>" <?php endif;?> class="layui-input" placeholder="截止日" name="end" id="end">
            <input <?php if(isset($return['title'])):?> value="<?=$return['title']?>" <?php endif;?> type="text" name="title"  placeholder="文章标题" autocomplete="off" class="layui-input">
            <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
    <table class="layui-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>文章</th>
            <th>用户名</th>
            <th>内容</th>
            <th>邮箱</th>
            <th>地址</th>
            <th>引用ID</th>
            <th>IP</th>
            <th>创建时间</th>
            <th>操作</th>
        </thead>
        <tbody>
        <?php foreach ($model as $item): ?>
        <tr>
            <td><?=$item->guest_id?></td>
            <td><?=$item->title?></td>
            <td><?=$item->username?></td>
            <td width="400"><?=$item->content?></td>
            <td><?=$item->email?></td>
            <td><?=$item->url?></td>
            <td><?=$item->two_id?></td>
            <td><?=$item->ip?></td>
            <td><?=date('Y-m-d H:i:s',$item->created_time)?></td>
            <td>
                <a title="删除" href="javascript:;" onclick="del(this,'<?=\yii\helpers\Url::toRoute(['message/del','guest_id'=>$item->guest_id])?>',0)" class="ml-5" style="text-decoration:none">删除</a>
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

    /**
     * 操作
     * @param obj
     * @param url
     * @param type
     */
    function del(obj,url,type) {
        layer.confirm('确定要删除吗？',function(index){
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

