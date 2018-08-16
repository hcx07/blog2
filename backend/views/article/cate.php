<body>
<div class="x-nav">
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i>
    </a>
</div>
<div class="x-body">
    <xblock>
        <button class="layui-btn" onclick="x_admin_show('添加分类','<?= yii\helpers\Url::toRoute(['article/cate-add'])?>','400','250')"><i class="layui-icon"></i>添加分类</button>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>排序</th>
            <th>名称</th>
            <th>操作</th>
        </thead>
        <tbody>
        <?php foreach ($model as $item): ?>
        <tr>
            <td><?=$item->order_no?></td>
            <td><?=$item->cate_name?></td>
            <td>
                <a title="修改" href="javascript:;" onclick="x_admin_show('修改','<?=\yii\helpers\Url::toRoute(['article/cate-edit','cate_id'=>$item->cate_id])?>','400','250')" class="ml-5" style="text-decoration:none">修改</a>
                <a title="删除" href="javascript:;" onclick="member_show(this,'<?=\yii\helpers\Url::toRoute(['article/cate-del','cate_id'=>$item->cate_id])?>')" class="ml-5" style="text-decoration:none">删除</a>
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
    function member_show(obj,id){
        layer.confirm('确定要删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            window.location.href = id;
            var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
        });
    }
</script>
</body>

