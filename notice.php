<h1 class="page-header" id="pageheader">公告</h1>
<div class="row">     
	<div class="col-md-6">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">系统公告</h3>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked" role="tablist">
					<li role="presentation">
						<a href="#" class="alert alert-info">
							<span class="badge pull-right">42</span>
							订单审批
						</a>
					</li>
					<li role="presentation">
						<a href="#" class="alert alert-info">
							<span class="badge pull-right">20</span>
							收款确认
						</a>
					</li>
					<li role="presentation">
						<a href="#" class="alert alert-info">
							<span class="badge pull-right">10</span>
							付款确认
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
// $.ajax({
	// 	type: $("#login-form").attr("method"),
	// 	type: 'POST',
	// 	url: '../services/users/check-user.php',
	// 	data: "email="+email+"&password="+password,
	// 	success: function(html) {
	// 		if (html == "OK") {
	// 			if(callback){
	// 				window.location=callback;
	// 			}else{
	// 				window.location="../index.php";
	// 			}

	// 			$("#login-msg").css('visibility', 'hidden');
	// 		} else {
	// 			$("#login-msg").css('visibility', 'visible');
	// 			$("#login-msg").html(html);

	// 			setTimeout (function () {
	// 				$("#login-msg").css('visibility', 'hidden');
	// 			}, 10000);
	// 		}
	// 	}
	// });