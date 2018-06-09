<?php include_once('conn/Oracle_oci.class.php'); 
	if(($_SESSION['usertype'])!='teacher_info'){
		echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
	}
	$nowtime=time();
	$nowtime=date("Y-m-d H:i:s",$nowtime);
?>
<h1 class="page-header" id="pageheader">发布公告</h1>
<div class="row clearfix">
	<div class="col-md-12 column">
		<form class="form-horizontal">
			<div class="form-group">
				<label for="notice-title" class="col-sm-2 control-label"></label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="notice-title" placeholder="标题" >
				</div>
			</div>
			<?php echo '<a style="display: none" id="deliverid">'.$_SESSION["userid"].'</a>'; ?>
			<?php echo '<a style="display: none" id="delievername">'.$_SESSION["username"].'</a>'; ?>
			<?php echo '<a style="display: none" id="delieverinfotime">'.$nowtime.'</a>'; ?>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-6">
					<textarea rows="10" cols="50" id="notice-content" class="form-control" placeholder="请输入公告内容"></textarea>
				</div>	
			</div>
			<div class="form-group">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6">
					<button type="button" class="btn btn-info col-sm-3" onclick="submit_info(this)">发布</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">

	function submit_info(e){	
		var myDate = new Date();
		$.ajax({
			type: "POST",
			url: "delivernotice.php",
			data: {
				infoid:myDate.getTime(),
				teaid:$("#deliverid").text(),
				teaname:$("#delievername").text(),
				title:$("#notice-title").val(),
				content:$("#notice-content").val(),
				infotime:$("#delieverinfotime").text() },
			success: function(res) {
				if(res=="发布成功"){
					alert("发布成功!");
					window.location.href="main.php?content=notice";
				}else {
					alert("发布失败！");
				}

			}
		});
	}
</script>