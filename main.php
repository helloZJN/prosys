<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>专业综合实训管理系统</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <script src="assets/js/echarts.min.js"></script>
    <link rel="stylesheet" href="assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="assets/js/jquery.min.js"></script>
    <?php session_start(); ?>
    
    <style type="text/css">
        div.mar { 
            margin-top: 20px;
            margin-right: 30px;
            margin-left: 30px;
        }
        a.fon{
            font-size: 20px;
        }
    </style>
</head>

<body>
    <!--下面是顶部导航栏的代码-->
    <script src="assets/js/theme.js"></script>

    <div class="am-g tpl-g" >
        <!-- 头部 -->
        <header >
            <!-- logo -->
            <div class="am-fl tpl-header-logo">
                <a href="javascript:;"><img src="imgs/logo.png" alt=""></a>
            </div>
            <!-- 右侧内容 -->
            <div class="tpl-header-fluid">
                <div class="am-fr tpl-header-navbar">
                    <ul>
                        <!-- 欢迎语 -->
                        <li class="am-text-sm tpl-header-navbar-welcome">
                            <a href="javascript:;">欢迎你, <span><?php echo $_SESSION['usertype']; ?></span> </a>
                        </li>
                        <!-- 退出 -->
                        <li class="am-text-sm">
                            <a href="javascript:;">
                                <span class="am-icon-sign-out"></span> 退出
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="row">
            <div class="left-sidebar">
                <!-- 用户信息 -->
                <div class="tpl-sidebar-user-panel">
                    <div class="tpl-user-panel-slide-toggleable">
                        <div class="tpl-user-panel-profile-picture">
                            <img src="assets/img/user04.png" alt="">
                        </div>
                        <span class="user-panel-logged-in-text">
                          <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
                          ZJN
                      </span>
                  </div>
                </div>

              <!-- 菜单 -->
                <ul class="sidebar-nav">

                <li class="sidebar-nav-link">
                    <a href="main.php" class="fon">首页</a>
                </li>

                <?php echo ($_SESSION['usertype']=='teacher_info')?'
                            <li class="sidebar-nav-link">
                                <a href="#" onclick="get_deliver_notice(this)" class="fon">发布公告</a>
                            </li>':""; 
                ?>

                <?php echo ($_SESSION['usertype']=='student')?'
                            <li class="sidebar-nav-link">
                                <a href="#" onclick="get_submit_work(this)" class="fon">提交作业</a>
                            </li>':""; 
                ?>

                <?php echo ($_SESSION['usertype']=='student')?'
                            <li class="sidebar-nav-link">
                                <a href="#" onclick="get_watch_work(this)" class="fon">查看作业</a>
                            </li>':""; 
                ?>

                <?php echo ($_SESSION['usertype']=='teacher_info')?'
                            <li class="sidebar-nav-link">
                                <a href="#" onclick="get_make_dir(this)" class="fon">文件夹</a>
                            </li>':""; 
                ?>

                <?php echo ($_SESSION['usertype']=='admin')?'
                            <li class="sidebar-nav-link">
                                <a href="#" onclick="get_user_manager(this) class="fon">用户管理</a>
                            </li>':""; 
                ?>

                <li class="sidebar-nav-link">
                    <a href="#" onclick="get_help(this)" class="fon">帮助</a>
                </li>
                <li class="sidebar-nav-link">
                    <div style="padding-top: 900px">
                </li>

                </ul>
            </div>

            <div class="tpl-content-wrapper" >
                <div class="row-content am-cf">
                    <div class="mar">
                    <div class="widget am-cf">
                        <div class="widget-body">
                            <div class="tpl-page-state">          
                                <?php 
                                    $content = isset($_GET['content']) ? trim(strtolower($_GET['content'])) : "notice";
                                    $allowedPages = array(
                                        'notice'     => 'notice.php',
                                        'about'    => 'about.php',
                                        'delivernotice' => 'deliver_notice.php',
                                        'submit_work' => 'submit_work.php',
                                        'watch_work' => 'watch_work.php',
                                        'tea_dir' => 'tea_dir.php',
                                        'per_info' => 'per_info.php',
                                        'user_manager' => 'user_manager.php'
                                    );
                                    include(isset($allowedPages[$content]) ? $allowedPages[$content] : $allowedPages["notice"]);
                                ?>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
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
            window.location='main.php?content=tea_dir';
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



