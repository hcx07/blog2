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
            'action'=>\yii\helpers\Url::to(['log/index']),
            'options'=>['class'=>'layui-form layui-col-md12 x-so']
        ]); ?>
        <form class="layui-form layui-col-md12 x-so">
            <input <?php if(isset($return['start'])):?> value="<?=$return['start']?>" <?php endif;?> class="layui-input" placeholder="开始日" name="start" id="start">
            <input <?php if(isset($return['end'])):?> value="<?=$return['end']?>" <?php endif;?> class="layui-input" placeholder="截止日" name="end" id="end">
            <input <?php if(isset($return['intro'])):?> value="<?=$return['intro']?>" <?php endif;?> type="text" name="intro"  placeholder="关键字" autocomplete="off" class="layui-input">
            <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
    <table class="layui-table">
        <thead>
        <tr>
            <th>管理员</th>
            <th>操作</th>
            <th>地址</th>
            <th>IP</th>
            <th>创建时间</th>
        </thead>
        <tbody>
        <?php foreach ($model as $item): ?>
        <tr>
            <td><?=$item->username?></td>
            <td><?=$item->intro?></td>
            <td><?=$item->url?></td>
            <td><?=$item->ip?></td>
            <td><?=date('Y-m-d H:i:s',$item->created_time)?></td>
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
</script>
</body>

