<body>
<div class="container">
    <div class="logo"><a href="<?= \yii\helpers\Url::toRoute(['index/index'])?>">木鸟后台管理系统</a></div>
    <div class="left_open">
        <i title="展开左侧栏" class="iconfont">&#xe699;</i>
    </div>
    <ul class="layui-nav right" lay-filter="">
        <li class="layui-nav-item">
            <a href="javascript:;"><?=$user->username?></a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd>
                    <?php
                    echo \yii\helpers\Html::beginForm(['/glggf/logout'], 'post');
                    echo \yii\helpers\Html::submitButton(
                        '安全退出',
                        ['class' => 'btn btn-link logout']
                    );
                    echo \yii\helpers\Html::endForm();

                    ?>
                </dd>
            </dl>
        </li>
        <li class="layui-nav-item to-index"><a href="https://blog.muniao.org" target="view_window">前台首页</a></li>
    </ul>
</div>
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6a2;</i>
                    <cite>文章管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?= \yii\helpers\Url::toRoute(['article/index'])?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>文章列表</cite>

                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe699;</i>
                    <cite>分类管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?= \yii\helpers\Url::toRoute(['article/cate'])?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>分类列表</cite>

                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe69b;</i>
                    <cite>留言管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?= \yii\helpers\Url::toRoute(['message/index'])?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>留言列表</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6c0;</i>
                    <cite>友情链接管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?= \yii\helpers\Url::toRoute(['url/index'])?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>链接列表</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6fc;</i>
                    <cite>操作日志</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?= \yii\helpers\Url::toRoute(['log/index'])?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>日志列表</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6b8;</i>
                    <cite>管理员管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="<?= \yii\helpers\Url::toRoute(['user/index'])?>">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>管理员列表</cite>
                        </a>
                    </li >
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="page-content">
    <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
        <ul class="layui-tab-title">
            <li class="home"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='<?= \yii\helpers\Url::toRoute(['index/welcome'])?>' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="page-content-bg"></div>
<div class="footer">
    <div class="copyright">Copyright ©2017 x-admin v2.3 All Rights Reserved</div>
</div>
</body>