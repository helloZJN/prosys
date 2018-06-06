<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>专业综合实训管理系统</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<style>
body {
    padding-top: 50px;
    padding-bottom: 40px;
    color: #5a5a5a;
}


.sidebar {
    position: fixed;
    top: 51px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto;
    background-color: #ddd;
    border-right: 1px solid #eee;
}

.nav-sidebar {
    margin-right: -21px;
    margin-bottom: 20px;
    margin-left: -20px;
}

.nav-sidebar > li > a {
    padding-right: 20px;
    padding-left: 20px;
}

.nav-sidebar > .active > a,
.nav-sidebar > .active > a:hover,
.nav-sidebar > .active > a:focus {
    color: #fff;
    background-color: #428bca;
}


.main {
    padding: 20px;
}

.main .page-header {
    margin-top: 0;
}
</style>

</head>

<body>
    <!--下面是顶部导航栏的代码-->
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">专业实训综合管理系统</a>
            </div>
            <form class="navbar-form navbar-right" role="search">
                <button type="submit" class="btn btn-default">登录</button>
            </form>
            </div>
        </div>
    </nav>

    <!--—自适应布局---->
    <div class="container-fluid">
        <div class="row">
            <!--—左侧导航栏---->

            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="#">首页</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="#" onclick="get_notice(this)">公告</a></li>
                    <li><a href="#" onclick="get_deliver_notice(this)">发布公告</a></li>
                    <li><a href="#" onclick="get_submit_work(this)">提交作业</a></li>
                    <li><a href="#" onclick="get_watch_work(this)">查看作业</a></li>
                    <li><a href="#" onclick="get_make_dir(this)">创建文件夹</a></li>
                    <li><a href="#" onclick="get_per_info(this)">个人信息</a></li>
                    <li><a href="#" onclick="get_user_manager(this)">用户管理</a></li>
                    <li><a href="#" onclick="get_help(this)">帮助</a></li>
                </ul>
            </div>
            <!--—右侧管理控制台---->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">           
                <?php 
                    $content = isset($_GET['content']) ? trim(strtolower($_GET['content'])) : "notice";
                    $allowedPages = array(
                        'notice'     => 'notice.php',
                        'about'    => 'about.php',
                        'delivernotice' => 'deliver_notice.php',
                        'submit_work' => 'submit_work.php',
                        'watch_work' => 'watch_work.php',
                        'make_dir' => 'make_dir.php',
                        'per_info' => 'per_info.php',
                        'user_manager' => 'user_manager.php'
                    );
                    include(isset($allowedPages[$content]) ? $allowedPages[$content] : $allowedPages["home"]);
                ?>
            </div>


        </div>
    </div>

    <script type="text/javascript">
        function get_notice(argument) {
            window.location='main.php?content=notice';
        }
        function get_help(argument) {
            window.location='main.php?content=about';
        }
        function get_user_manager(argument) {
            window.location='main.php?content=user_manager';
        }
        function get_per_info(argument) {
            window.location='main.php?content=per_info';
        }
        function get_make_dir(argument) {
            window.location='main.php?content=make_dir';
        }
        function get_watch_work(argument) {
            window.location='main.php?content=watch_work';
        }
        function get_submit_work(argument) {
            window.location='main.php?content=submit_work';
        }
        function get_deliver_notice(argument) {
            window.location='main.php?content=delivernotice';
        }
    </script>
    <script src="bootstrap/js/jquery-1.11.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>



