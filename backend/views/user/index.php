<body>
<div class="x-nav">
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i>
    </a>
</div>
<div class="x-body">
    <xblock>
        <button class="layui-btn" onclick="x_admin_show('添加管理员','<?= yii\helpers\Url::toRoute(['user/add'])?>','600','400')"><i class="layui-icon"></i>添加管理员</button>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>最后登陆时间</th>
            <th>最后修改时间</th>
            <th>操作</th>
        </thead>
        <tbody>
        <?php foreach ($model as $admin): ?>
        <tr>
            <td><?=$admin->id?></td>
            <td><?=$admin->username?></td>
            <td><?=date('Y-m-d H:i:s',$admin->created_at)?></td>
            <td><?=$admin->updated_at?date('Y-m-d H:i:s',$admin->updated_at):'未修改'?></td>
            <td>
                <a title="修改" href="javascript:;" onclick="x_admin_show('修改','<?=\yii\helpers\Url::toRoute(['user/edit','id'=>$admin->id])?>','600','400')" class="ml-5" style="text-decoration:none">修改</a>
                <?php if($admin->id!=1):?>
                    <a href="javascript:;" class="del" name="<?=$admin->id?>">删除</a>
                <?php endif;?>
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
</script>
</body>

