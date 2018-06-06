
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

		<div class="intro-video">
			<video id="video" class="video" autoplay="autoplay" loop="loop" src="//qzonestyle.gtimg.cn/qz-proj/wy-pc-v2/static/img/web/top.webm">
			</video>
		</div>

		<div align="center">
			<img src="imgs/logo.png" height="200">
		</div>

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
					var userid = $("#userid").val();
					if (!userid) {
						$("#login-msg").css('visibility', 'visible');
						$("#login-msg").html("学号不能为空");
						return false;
					}else{
						$("#login-msg").css('visibility', 'hidden');
					}
					
					var password = $("#password").val();
					if (!password) {
						$("#login-msg").css('visibility', 'visible');
						$("#login-msg").html("密码不能为空");
						return false;
					}else{
						$("#login-msg").css('visibility', 'hidden');
					}
			
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
					if (password.length < 6) {
						$("#strength").attr('class', 'red');
						$("#strength").html("密码长度不能少于6位");
					}
				});
		
				// 提交表单
				$("#register").click(function() {
					var userid-register = $("#userid-register").val();
					var password = $("#password-register").val();
					var confirmPassword = $("#confirm-password").val();
					if (!password && !) {
						$("#register-msg").css('visibility', 'visible');
						$("#register-msg").html("学号或密码不能为空");
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