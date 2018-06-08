<?php include_once('conn/Oracle_oci.class.php'); 
	session_start();
	if(($_SESSION['usertype'])!='teacher_info'){
		echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
	}
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
<h1 class="page-header" id="pageheader">发布公告</h1>
<div class="row clearfix">
	<div class="col-md-12 column">
		<form class="form-horizontal">
			<div class="form-group">
				<label for="usertype" class="col-sm-2 control-label"></label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="usertype" placeholder="标题" >
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-6">
					<textarea rows="10" cols="50" name="comment" id="content-text" class="form-control" placeholder="请输入公告内容"></textarea>
				</div>	
			</div>
			<div class="form-group">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6">
					<button type="button" class="btn btn-info col-sm-3" onclick="submit_update()">发布</button>
				</div>
			</div>
		</form>
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
