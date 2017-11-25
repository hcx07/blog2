<script type="text/javascript" src="lib/html5shiv.js"></script>
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


<script type="text/javascript" charset="utf-8" src="uedit/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="uedit/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="uedit/lang/zh-cn/zh-cn.js"></script>

<style type="text/css">
    div{
        width:100%;
    }
</style>

<article class="page-container">
    <?=\common\widgets\Alert::widget()?>
    <?php
    $form = \yii\bootstrap\ActiveForm::begin([
        'options' => ['class' => 'form form-horizontal', 'id' => 'form-article-add']
    ]); ?>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>标题：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <?= $form->field($model, 'title')->textInput(['class' => 'input-text'])->label(false) ?>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章分类：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <?= $form->field($model, 'cate_id')->dropDownList($category,['class' => 'input-text'])->label(false) ?>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>作者：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <?= $form->field($model, 'author')->textInput(['class' => 'input-text','value'=>'木鸟'])->label(false) ?>
        </div>
    </div>
    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>查看次数：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <?= $form->field($model, 'views')->textInput(['class' => 'input-text','value'=>'0'])->label(false) ?>
        </div>
    </div>

    <div class="row cl">
        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章内容：</label>
        <div class="formControls col-xs-8 col-sm-9">
            <div>
                <script id="editor"  name="content"   type="text/plain" style="width:1024px;height:500px;"><?=$model->content?></script>
                </div>
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
    $('.form-group').css('width', '100%');
    $('#tijiao').on('click',function(){
        var index = layer.load(1, {
            shade: [0.1,'#fff'] //0.1透明度的白色背景
        });
    });
                //实例化编辑器
                //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                var ue = UE.getEditor('editor');


                function isFocus(e){
                    alert(UE.getEditor('editor').isFocus());
                    UE.dom.domUtils.preventDefault(e)
                }
                function setblur(e){
                    UE.getEditor('editor').blur();
                    UE.dom.domUtils.preventDefault(e)
                }
                function insertHtml() {
                    var value = prompt('插入html代码', '');
                    UE.getEditor('editor').execCommand('insertHtml', value)
                }
                function createEditor() {
                    enableBtn();
                    UE.getEditor('editor');
                }
                function getAllHtml() {
                    alert(UE.getEditor('editor').getAllHtml())
                }
                function getContent() {
                    var arr = [];
                    arr.push("使用editor.getContent()方法可以获得编辑器的内容");
                    arr.push("内容为：");
                    arr.push(UE.getEditor('editor').getContent());
                    alert(arr.join("\n"));
                }
                function getPlainTxt() {
                    var arr = [];
                    arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
                    arr.push("内容为：");
                    arr.push(UE.getEditor('editor').getPlainTxt());
                    alert(arr.join('\n'))
                }
                function setContent(isAppendTo) {
                    var arr = [];
                    arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
                    UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
                    alert(arr.join("\n"));
                }
                function setDisabled() {
                    UE.getEditor('editor').setDisabled('fullscreen');
                    disableBtn("enable");
                }

                function setEnabled() {
                    UE.getEditor('editor').setEnabled();
                    enableBtn();
                }

                function getText() {
                    //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
                    var range = UE.getEditor('editor').selection.getRange();
                    range.select();
                    var txt = UE.getEditor('editor').selection.getText();
                    alert(txt)
                }

                function getContentTxt() {
                    var arr = [];
                    arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
                    arr.push("编辑器的纯文本内容为：");
                    arr.push(UE.getEditor('editor').getContentTxt());
                    alert(arr.join("\n"));
                }
                function hasContent() {
                    var arr = [];
                    arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
                    arr.push("判断结果为：");
                    arr.push(UE.getEditor('editor').hasContents());
                    alert(arr.join("\n"));
                }
                function setFocus() {
                    UE.getEditor('editor').focus();
                }
                function deleteEditor() {
                    disableBtn();
                    UE.getEditor('editor').destroy();
                }
                function disableBtn(str) {
                    var div = document.getElementById('btns');
                    var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
                    for (var i = 0, btn; btn = btns[i++];) {
                        if (btn.id == str) {
                            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
                        } else {
                            btn.setAttribute("disabled", "true");
                        }
                    }
                }
                function enableBtn() {
                    var div = document.getElementById('btns');
                    var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
                    for (var i = 0, btn; btn = btns[i++];) {
                        UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
                    }
                }

                function getLocalData () {
                    alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
                }

                function clearLocalData () {
                    UE.getEditor('editor').execCommand( "clearlocaldata" );
                    alert("已清空草稿箱")
                }
</script>












