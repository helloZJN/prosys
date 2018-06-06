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

		<style type="text/css">
			html {
				width: 100%;
				height: 100%;
			}
			body {
				background-color: #36679c;
				overflow: hidden;
			}
			@media (max-width: 768px) {
				body {
					background-color: #ffffff;
				}
			}
			
			.btn:focus,
			input:focus {
				outline: none;
				border: none;
			}
			
			.padding-line {
				height: 1px;
				margin-top: 150px;
				/*background-color: #506776;*/
				margin-left: -5%;
				margin-right: -5%;
			}
			.container {
				max-width: 480px;
				border-radius: 4px;
				background-color: #ffffff;
			}
			
			#nav-menu {
				height: 48px;
				max-width: 480px;
				margin-left: -15px;
				margin-right: -15px;
				padding-left: 10%;
				padding-right: 10%;
				background-color: #fafafa;
				border-radius: 4px;
			}
			#nav-menu ul li {
				line-height: 48px;
				text-align: center;
				font-size: 16px;
				margin: 0;
				color: #868d9b;
			}
			#nav-menu .login {
				width: 44%;
			}
			#nav-menu .divider {
				width: 10%;
				color: #dde1e7;
			}
			#nav-menu .register {
				width: 44%;
			}
			#nav-menu .active {
				color: #4d95fb;
				border-bottom: 2px solid #4d95fb;
			}
			#login-overview,
			#register-overview {
				padding: 8% 0px;
			}
			#login-msg,
			#register-msg {
				/*display: none;*/
				visibility: hidden;
				margin-bottom: 10px;
				/*text-indent: -999px;*/
			}
			.container .alert-warning {
				border: none;
				background-color: #fee8e8;
				font-size: 12px;
				color: #d15a5a;
				padding: 10px 15px;
				border-radius: 2px;
				/*text-align: center;*/
			}
			.container form input {
				height: 50px;
				color: #cacdd3;
				background-color: #ffffff;
				border: 1px solid #dde1e7;
				border-radius: 2px;
				font-size: 16px;
				-webkit-box-shadow: none;
				box-shadow: none;
				-webkit-appearance: none;
				outline: none;
			}
			.container form input:hover,
			.container form input:focus {
				border: 1px solid #9ba1ac;
				color: #7b8392;
				-webkit-box-shadow: none;
				box-shadow: none;
				-webkit-appearance: none;
				outline: none;
			}
			input:-webkit-autofill {
				-webkit-box-shadow: 0 0 0px 1000px #ffffff inset !important;
				-webkit-text-fill-color: #7b8392;
			}
			.container form input.btn {
				background-color: #4d95fb;
				color: #ffffff;
				border: 0;
			}
			.container form input.btn:hover,
			.container form input.btn:focus,
			.container form input.btn:active,
			.container form input.btn:visited {
				background-color: #64a3fd;
				color: #c2dafe;
				border: none;
				outline: none;
			}
			.container .forgot-password {
				color: #868d9b;
				font-size: 14px;
				margin-top: -10px;
				/*text-decoration: underline;*/
			}
			.container .forgot-password:hover,
			.container .forgot-password:focus,
			.container .forgot-password:active,
			.container .forgot-password:visited {
				text-decoration: none;
			}
			.container .form-group {
				margin-bottom: 20px;
				width: 100%;
			}
			.container .form-group:first-child {
				margin-bottom: 0;
			}
			.container .form-group:nth-child(2) {
				display: inline-block;
			}
			#login-overview {
				/*display: none;*/
			}
			#register-overview {
				display: none;
				/*
				 position: absolute;
				 top: 0;
				 width: 100%;
				 margin-top: 33%;
				 right: 100%;
				 */
			}
			#strength {
				display: none;
				position: absolute;
				font-size: 12px;
				line-height: 18px;
			}
			.red {
				color: #fb4738;
			}
			.low {
				color: #fecf71;
			}
			.middle {
				color: #669ae1;
			}
			.high {
				color: #61d01c;
			}
			
		</style>
	</head>

	<body>
		<!-- 用于PC端 增大上边距 -->
		<div class="padding-line visible-md visible-lg"></div>
		
		<div class="container">
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
					<form id="login-form" role="form" action="../services/users/check-user.php" method="post">
						<div class="form-group">
							<div id="login-msg" class="col-xs-12 col-sm-12 col-md-12 alert alert-warning">
								警告：
							</div>
						</div>

						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control input-lg" placeholder="请输入邮箱地址">
						</div>

						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="请输入密码">
						</div>

						<span class="button-checkbox sr-only">
							<button type="button" class="btn" data-color="info">
								记住
							</button>
							<input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
						</span>

						<div class="form-group">
							<input id="login" type="submit" class="btn btn-default btn-lg btn-block" value="登录">
						</div>

						<div class="form-group">
							<a href="./forgot-password.php" class="forgot-password pull-right">忘记密码</a>
						</div>
					</form>
				</div>
			</div>
		<!-- </div> -->

		<!-- <div class="container"> -->
			<div class="row" id="register-overview">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<form id="register-form" role="form" action="../services/users/check-user.php" method="post">
						<div class="form-group">
							<div id="register-msg" class="col-xs-12 col-sm-12 col-md-12 alert alert-warning">
								警告：
							</div>
						</div>

						<div class="form-group">
							<input type="email" name="email-register" id="email-register" class="form-control input-lg" placeholder="请输入邮箱地址">
						</div>

						<div class="form-group">
							<input type="password" name="password-register" id="password-register" class="form-control input-lg" placeholder="请输入密码">
							<span id="strength" class="low">低</span>
						</div>

						<div class="form-group">
							<input type="password" name="confirm-password" id="confirm-password" class="form-control input-lg" placeholder="确认密码">
						</div>

						<div class="form-group">
							<input id="register" type="submit" class="btn btn-lg btn-primary btn-block" value="注册">
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
			// 验证需要演示登录，注册视图
			if(window.location.search.indexOf('register') >= 0) {
				$('#nav-menu').find('.nav .login').removeClass('active');
				$('#nav-menu').find('.nav .register').addClass('active');
				
				$('#login-overview').css('display', 'none');
				$('#register-overview').css('display', 'block');
			}
		
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
		
				var callback = "/nanolink/app/index.php";
				$("#login").click(function() {
					var email = $("#email").val();
					if (!email) {
						$("#login-msg").css('visibility', 'visible');
						$("#login-msg").html("用户名不能为空");
						return false;
					}
					var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
					if(!reg.test(email)) {
						$("#login-msg").css('visibility', 'visible');
						$("#login-msg").html("邮件地址不合法");
						$("#email").focus();
						return false;
					}
					
					var password = $("#password").val();
			
					$.ajax({
						//type: $("#login-form").attr("method"),
						type: 'POST',
						url: '../services/users/check-user.php',
						data: "email="+email+"&password="+password,
						success: function(html) {
							if (html == "OK") {
								if(callback){
									window.location=callback;
								}else{
									window.location="../index.php";
								}
				
								$("#login-msg").css('visibility', 'hidden');
							} else {
								$("#login-msg").css('visibility', 'visible');
								$("#login-msg").html(html);
							
								setTimeout (function () {
									$("#login-msg").css('visibility', 'hidden');
								}, 10000);
							}
						}
					});
		
					return false;
				});
		
				// 注册账号
				// 验证密码强度
				$("#password-register").keyup(function() {
					var password = $("#password-register").val();
			
					if (password.length >= 6) {
						$.ajax({
							type: $("#register-form").attr("method"),
							url: '../services/users/get-pwd-strength.php',
							data: "password=" + password,
					
							success: function(res) {
								$("#strength").css('display', 'block');
								if (res >= 0 && res <= 2) {
									$("#strength").attr('class', 'low');
									$("#strength").html("低：尝试用大小写混合，以及特殊字符");
									return false;
								} else if (res >= 3 && res <= 5) {
									$("#strength").attr('class', 'middle');
									$("#strength").html("中：尝试用大小写混合，以及特殊字符");
									return false;
								} else {
									$("#strength").attr('class', 'high');
									$("#strength").html("高：请牢记您的密码");
									return false;
								}
							}
						});
					} else {
						$("#strength").attr('class', 'red');
						$("#strength").html("密码长度不能少于6位");
					}
				});
		
				// 提交表单
				$("#register").click(function() {
					var email = $("#email-register").val();
					var password = $("#password-register").val();
					var confirmPassword = $("#confirm-password").val();
					if (!password && !email) {
						$("#register-msg").css('visibility', 'visible');
						$("#register-msg").html("邮件或密码不能为空");
						return false;
					}
			
					if(password.length < 6) {
						$("#register-msg").css('visibility', 'visible');
						$("#register-msg").html("密码长度不能少于6位");
						return false;
					}
			
					if (password != confirmPassword) {
						$("#register-msg").css('visibility', 'visible');
						$("#register-msg").html("密码不一致,请确认");
						return false;
					}
			
					$.ajax({
						type: $("#register-form").attr("method"),
						url: '../services/users/new-user.php',
						data: "email="+email+"&password="+password+"&confirmPassword="+confirmPassword,
				
						success: function(html) {
						if (html == "OK") {
								alert("注册成功，请登录到邮箱激活账号");
								window.location="./login.php";
					
								$("#register-msg").css('visibility', 'hidden');
							} else {
								$("#register-msg").css('visibility', 'visible');
								$("#register-msg").html(html);
						
								setTimeout (function () {
									$("#register-msg").css('visibility', 'hidden');
								}, 10000);
							}
						}
					});
			
					return false;
				});
		
			});
		</script>
		
		<script>
			var _hmt = _hmt || [];
			(function() {
			  var hm = document.createElement("script");
			  hm.src = "https://hm.baidu.com/hm.js?8d9919453b9a1af92ad7e888ffd0cc12";
			  var s = document.getElementsByTagName("script")[0]; 
			  s.parentNode.insertBefore(hm, s);
			})();
		</script>
	</body>
</html>