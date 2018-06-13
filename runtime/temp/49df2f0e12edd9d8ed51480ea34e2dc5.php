<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:86:"C:\xampp\htdocs\AirTicketReservation\public/../application/index\view\admin\login.html";i:1528804872;s:76:"C:\xampp\htdocs\AirTicketReservation\application\index\view\public\base.html";i:1528804382;s:78:"C:\xampp\htdocs\AirTicketReservation\application\index\view\public\header.html";i:1528849477;s:76:"C:\xampp\htdocs\AirTicketReservation\application\index\view\public\anav.html";i:1528878383;s:78:"C:\xampp\htdocs\AirTicketReservation\application\index\view\public\footer.html";i:1528644870;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>机票预订系统</title>

    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="/AirTicketReservation/public/static/bootstrap/css/bootstrap.min.css" />-->
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo url('index/admin/index'); ?>">ATR</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">机票查询</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if(!USER_ID): ?>
                <li class=""><a href="<?php echo url('admin/login'); ?>">管理员登陆</a></li>
                <?php else: ?>
                <li><a href="<?php echo url('admin/index'); ?>">
                    <?php echo session('user_info.username'); ?>
                </a>
                </li>
                <li><a href="<?php echo url('admin/logout'); ?>">退出登录</a></li>
                <?php endif; ?>
                <ul/>

                <!--<ul class="nav navbar-nav navbar-right">-->
                <!--<li><a href="<?php echo url('Admin/login'); ?>">管理员登录</a></li>-->
                <!--<li><a href="<?php echo url('User/login'); ?>">用户登录</a></li>-->
                <!--<li><a href="<?php echo url('User/reg'); ?>">注册</a></li>-->
                <!--</ul>-->
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>


<div class="container">
    <div class="col-md-8">
        <div class="page-header">
            <h3>管理员登录</h3>
        </div>
        <FORM method="post" class="login_form" class="form" style="width: 50%;">

            <div class="form-group">
                <label for="doc_title">手机号</label>
                <input type="text" name="mobile" class="form-control" id="doc_title" placeholder="输入您的手机号">
            </div>

            <div class="form-group">
                <label for="doc_password">密  码</label>
                <input type="password" name="password" class="form-control" id="doc_password" placeholder="密码">
            </div>
            <input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
            <INPUT type="button" class="btn btn-default login_btn" value="登录">
            <div class="err_tips" ></div>
        </FORM>
    </div>
</div>


<!--要将jquery的引入放到js代码之前-->
<script type="text/javascript" src="/AirTicketReservation/public/static/jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/AirTicketReservation/public/static/bootstrap/js/bootstrap.min.js"></script>


<script>
    $('.login_btn').click(function(){
        $.ajax({
            type: 'post',
            url: "<?php echo url('index/admin/doLogin'); ?>",
            data: $(".login_form").serialize(),
            dataType:'json',
            success: function(data) {
                if(data.status){
                    $('.err_tips').html(data.msg);
                    setTimeout(function(){
                        window.location.href = "<?php echo url('index/admin/index'); ?>";
                    },1000);
                }
                else{
                    $('.err_tips').html(data.msg);
                }
            }
        });
    });
</script>


</body>
</html>