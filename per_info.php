<?php include_once('conn/Oracle_oci.class.php'); 
	/*session_start();
	if(!isset($_SESSION['userid'])){
		echo "<script>alert('当前未登录！即将跳转到登陆界面');window.location.href='index.php';</script>";
	}*/
	$dbe=new Oracle_oci();
	$dbe->conn();
	if($dbe->conn){
		//$table=$_SESSION['usertype'];
		$table='student';
		$stid=$dbe->select("select * from ".$table." where stuid=333333");
		while($row=oci_fetch_array($stid)){
			if($table=="admin"){
				$username='admin';
				$userid=$row['0'];
				$userpwd=$row['1'];
			}else {
				$username=$row['0'];
				//$_SESSION['username']=$row['0'];
				$userid=$row['1'];
				//$_SESSION['userid']=$row['1'];
				$userpwd=$row['3'];
			}
		}
		$dbe->close();
	}
?>
<h1 class="page-header" id="pageheader">个人信息</h1>
<div class="row clearfix">
	<div class="col-md-3 column">
	</div>
	<div class="col-md-6 column">
		<form class="form-horizontal">
			<div class="form-group">
				<label for="usertype" class="col-sm-2 control-label">用户类型</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="usertype" placeholder="<?php echo($userid); ?>" disabled="true">
				</div>
			</div>
			<div class="form-group">
				<label for="userid" class="col-sm-2 control-label">学工号</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="userid" placeholder="请输入你的学工号" disabled="true" value="<?php echo($userid); ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="username" class="col-sm-2 control-label">姓名</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="username" placeholder="请输入你的姓名" value="<?php echo($userid); ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="userpwd" class="col-sm-2 control-label">密码</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="userpwd" placeholder="密码" value="<?php echo($userid); ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="userpwd" class="col-sm-2 control-label">密码</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="userpwd" placeholder="密码" value="<?php echo($userid); ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6">
					<button type="button" class="btn btn-info col-sm-3" onclick="submit_update()">修改</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-3 column">
	</div>
</div>
<script type="text/javascript">
	function submit_update(){
		$.ajax({
			type: "POST",
			url: "updateuser.php",
			data: {userid:$("#userid").val(),
			username:$("#username").val(),
			userpwd:$("#userpwd").val(),
			table:user_table},
			success: function(res) {
				if(res=="yes"){
					alert("修改成功!");
					window.location.href="main.php?content=user_manager";
				}else {
					alert("修改失败！");
				}

			}
		});
	}

</script>
