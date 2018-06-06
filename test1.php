
			<!--—右侧管理控制台---->
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				<h1 class="page-header">管理控制台</h1>

				<p>
					<!--—一组按钮控件---->
					<button type="button" class="btn btn-lg btn-default">操作1</button>
					<button type="button" class="btn btn-lg btn-primary">操作2</button>
					<button type="button" class="btn btn-lg btn-success">操作3</button>
					<button type="button" class="btn btn-lg btn-info">操作4</button>
					<button type="button" class="btn btn-lg btn-warning">操作5</button>
					<button type="button" class="btn btn-lg btn-danger">操作6</button>
				</p>
				<div class="row">
					<div class="col-md-6">
						<!--—panel面板，里面放置一些控件，下同---->
						<div class="panel panel-primary">
							<!--—panel面板的标题，下同---->
							<div class="panel-heading">
								<h3 class="panel-title">最新提醒</h3>
							</div>
							<!--—panel面板的内容，下同---->
							<div class="panel-body">
								<div class="alert alert-success" role="alert">
									<strong>提示</strong>您的订单（2014001）已经审批通过！
								</div>
								<div class="alert alert-danger" role="alert">
									<strong>提示</strong>您的订单（2014002）被打回！
								</div>
								<div class="alert alert-warning" role="alert">
									<strong>提示</strong>您的订单（2013001）客户付款延迟！
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">

						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">我的任务</h3>
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
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">最新订单</h3>
							</div>
							<div class="panel-body">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>产品</th>
											<th>数量</th>
											<th>总金额</th>
											<th>业务员</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Apple Macbook air</td>
											<td>10</td>
											<td>80000</td>
											<td>王小贱</td>
										</tr>
										<tr>
											<td>2</td>
											<td>Apple iPad air</td>
											<td>20</td>
											<td>65000</td>
											<td>尹开花</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Apple Macbook pro</td>
											<td>5</td>
											<td>50000</td>
											<td>刘老根</td>
										</tr>
									</tbody>
								</table>
								<p><a class="btn btn-primary" href="#" role="button">查看详细»</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">工程进度</h3>
							</div>
							<div class="panel-body">
								<h3><span class="label label-primary">水井挖掘工程</span></h3>

								<div class="progress">
									<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 60%"><span class="sr-only">80% Complete</span>
									</div>
								</div>
								<h3><span class="label label-danger">基建工程</span></h3>

								<div class="progress">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 80%"><span class="sr-only">30% Complete (danger)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>