<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<title>专业实训 - 登陆｜注册</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<!-- Bootstrap core CSS -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
</head>

<body>
	<!-- 背景动画 -->
	<div class="intro-video">
		<video id="video" class="video" autoplay="autoplay" loop="loop" src="imgs/top.webm">
		</video>
	</div>
	
	<div style="padding-top: 50px">
		
	</div>
	

	<div class="container">
		<div align="center">
			<img src="imgs/logo.png" height="100">
		</div>
		<nav id="nav-menu">
			<ul class="nav nav-pills">
				<li class="login active" value="login">
					登录
				</li>
				<li class="divider" value="">
					｜
				</li>
				<li class="register" value="register">
					注册
				</li>
			</ul>
		</nav>

		<div class="row" id="login-overview">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<form id="login-form" role="form" action="checkuser.php" method="post">
					<div class="form-group">
						<div id="login-msg" class="col-xs-12 col-sm-12 col-md-12 alert alert-warning">
							警告：
						</div>
					</div>
					<div class="form-group">
						<select class="form-control" name="user-select" id="user-select">
							<option value="1">我是学生</option>
							<option value="2">我是老师</option>
							<option value="3">我是管理员</option>
						</select>
					</div>

					<div class="form-group">
						<input type="text" name="userid" id="userid" class="form-control input-lg" 
						placeholder="请输入学工号">
					</div>

					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" 
						placeholder="请输入密码">
					</div>
					
					<div class="form-group">
						<button id="login" type="button" class="btn btn-default btn-lg btn-block">登录</button>
					</div>

				</form>
			</div>
		</div>

		<!-- <div class="container"> -->
		<div class="row" id="register-overview">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<form id="register-form" role="form" action="checkregister.php" method="post">
					<div class="form-group">
						<div id="register-msg" class="col-xs-12 col-sm-12 col-md-12 alert alert-warning">
							警告：
						</div>
					</div>
					
					<div class="form-group">
						<select class="form-control" id="user-select-register" 
						name="user-select-register">
							<option value="stu">我是学生</option>
							<option value="tea">我是老师</option>
						</select>
					</div>

					<div class="form-group">
						<input type="text" name="userid-register" id="userid-register" class="form-control input-lg" 
						placeholder="请输入学工号">
					</div>

					<div class="form-group">
						<input type="text" name="name-register" id="name-register" class="form-control input-lg" 
						placeholder="请输入姓名">
					</div>

					<div class="form-group">
						<input type="password" name="password-register" 
						id="password-register" class="form-control input-lg" placeholder="请输入密码">
					</div>

					<div class="form-group">
						<input type="password" name="confirm-password" id="confirm-password" class="form-control input-lg" placeholder="确认密码">
					</div>
					
					<div class="form-group">
						<button id="register" type="button" class="btn btn-lg btn-primary btn-block" value="注册">注册</button>
					</div>
				</form>
			</div>
		</div>

	</div>

	<!-- Jquery -->

	<script src="libs/jquery.min.js"></script>

	<!-- Bootstrap -->
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		
		$(function() {
			$('#nav-menu .login, #nav-menu .register').on('click', function() {
				$(this).addClass('active').siblings().removeClass('active')
				var val = $(this).attr('value');
				if (val == 'register') {
					$('#register-overview').css('display', 'block');
					$('#login-overview').css('display', 'none');
				} else if (val == 'login') {
					$('#register-overview').css('display', 'none');
					$('#login-overview').css('display', 'block');
				}
			});
			$('.button-checkbox').each(function() {
				var $widget = $(this),
				$button = $widget.find('button'),
				$checkbox = $widget.find('input:checkbox'),
				color = $button.data('color'),
				settings = {
					on: {
						icon: 'glyphicon glyphicon-check'
					},
					off: {
						icon: 'glyphicon glyphicon-unchecked'
					}
				};
				$button.on('click', function () {
					$checkbox.prop('checked', !$checkbox.is(':checked'));
					$checkbox.triggerHandler('change');
					updateDisplay();
				});
				$checkbox.on('change', function () {
					updateDisplay();
				});
				function updateDisplay() {
					var isChecked = $checkbox.is(':checked');
						// Set the button's state
						$button.data('state', (isChecked) ? "on" : "off");
						// Set the button's icon
						$button.find('.state-icon').removeClass().addClass('state-icon ' + settings[$button.data('state')].icon);
						// Update the button's color
						if (isChecked) {
							$button.removeClass('btn-default').addClass('btn-' + color + ' active');
						} else {
							$button.removeClass('btn-' + color + ' active').addClass('btn-default');
						}
					}
					function init() {
						updateDisplay();
						// Inject the icon if applicable
						if ($button.find('.state-icon').length == 0) {
							$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
						}
					}
					init();
				});
			//登录 检查学工号和密码是否为空
			$("#login").click(function() {
				var userid = $("#userid").val();
				var password = $("#password").val();
				var userSelect = $("#user-select").val();
				if (!userid) {
					$("#login-msg").css('visibility', 'visible');
					$("#login-msg").html("学工号不能为空");
					return false;
				}else{
					$("#login-msg").css('visibility', 'hidden');
				}
				if(password.length==0){
					$("#login-msg").css('visibility', 'visible');
					$("#login-msg").html("密码不能为空");
					return false;
				}else{
					$("#login-msg").css('visibility', 'hidden');
				}
				$.ajax({
					type: "POST",
					url: "checkuser.php",
					data: {userid:userid,
						password:password,
						userSelect:userSelect},
					success: function(res) {
						if(res=="n"){
							$("#register-msg").css('visibility', 'visible');
							$("#register-msg").html("账号或密码错误");
						}else if(res=="y"){
							$("#register-msg").css('visibility', 'hidden');
						}else{
							alert(res);
						}
					}
				});
			});
			//注册 判断id是否存在
			$("#userid-register").keyup(function() {
				var useridRegister = $("#userid-register").val();
				var userSelect = $("#user-select-register").val();
				if(useridRegister.length==0){
					$("#register-msg").css('visibility', 'visible');
					$("#register-msg").html("学工号不能为空");
					return false;
				}
				$.ajax({
					type: "POST",
					url: "checkid.php",
					data: {useridRegister:useridRegister,
						userSelect:userSelect},
					success: function(res) {
						if(res=="n"){
							$("#register-msg").css('visibility', 'visible');
							$("#register-msg").html("学工号已存在");
						}else if(res=="y"){
							$("#register-msg").css('visibility', 'hidden');
						}else{
							alert(res);
						}
					}
				});
				
			});
			
			//注册 判断为空 和 注册成功
			$("#register").click(function() {
				var useridRegister = $("#userid-register").val();
				var passwordRegister = $("#password-register").val();
				var confirmPassword = $("#confirm-password").val();
				var nameRegister = $("#name-register").val();
				var userSelect = $("#user-select-register").val();
				
				if (!useridRegister) {
					$("#register-msg").css('visibility', 'visible');
					$("#register-msg").html("学工号不能为空");
					return false;
				}
				if(passwordRegister.length < 1) {
					$("#register-msg").css('visibility', 'visible');
					$("#register-msg").html("密码长度不能少于6位");
					return false;
				}
				if (nameRegister.length==0) {
					$("#register-msg").css('visibility', 'visible');
					$("#register-msg").html("姓名不能为空");
					return false;
				}
				if (passwordRegister != confirmPassword) {
					$("#register-msg").css('visibility', 'visible');
					$("#register-msg").html("密码不一致,请确认");
					return false;
				}
				$.ajax({
					type: "POST",    
					url: "checkregister.php",    
					data: {useridRegister:useridRegister, 
						passwordRegister:passwordRegister,
						nameRegister:nameRegister,
						userSelect:userSelect},
					success: function(data){ 
						alert(data);  
					}
				}); 
			});
		});
	</script>
		
</body>
</html>