<script type="text/javascript" src="lib/respond.min.js"></script>
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css"/>
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css"/>
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css"/>
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin"/>
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css"/>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js"></script>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.page.js"></script>
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>

<article class="page-container">
    <?=\common\widgets\Alert::widget()?>
    <?php
    $form = \yii\bootstrap\ActiveForm::begin([
        'options' => ['class' => 'form form-horizontal', 'id' => 'form-article-add']
    ]); ?>
    <?= $form->field($model, 'url_id')->textInput(['type' => 'hidden'])->label(false) ?>
    <div class="row cl">
        <label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>名称：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <?= $form->field($model, 'name')->textInput(['class' => 'input-text','style'=>'width: 400px'])->label(false) ?>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>简介：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <?= $form->field($model, 'intro')->textInput(['class' => 'input-text','style'=>'width: 400px'])->label(false) ?>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>地址：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <?= $form->field($model, 'src')->textInput(['class' => 'input-text','style'=>'width: 400px'])->label(false) ?>
        </div>
    </div>
    <div class="row cl">
        <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
            <input  id="tijiao" class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </div>
    </div>
    <?php \yii\bootstrap\ActiveForm::end(); ?>
</article>
<script type="text/javascript">
    $("#form-article-add").validate({
        rules:{
            "name":"required",
            "intro":"required",
            "src":"url"
        },
        onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitHandler:function(form){
            $(form).ajaxSubmit({
                type: 'post',
                url: '<?=\yii\helpers\Url::toRoute(['url/do-edit'])?>',
                success: function(data) {
                    layer.msg('修改成功', {icon: 1, time: 2000}, function () {
                        setTimeout("window.parent.location.reload()", 1);
                    });
                },
                error: function (data) {
                    console.log(data);
                    layer.alert("网络错误");
                }
            });
        }
    });
</script>















