<?php include_once('conn/Oracle_oci.class.php'); 
	if(($_SESSION['usertype'])!='teacher_info'){
		echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
	}
	$nowtime=time();
	$nowtime=date("Y-m-d H:i:s",$nowtime);
?>
<?php echo '<a style="display: none" id="deliverid">'.$_SESSION["userid"].'</a>'; ?>
<?php echo '<a style="display: none" id="delievername">'.$_SESSION["username"].'</a>'; ?>
<?php echo '<a style="display: none" id="delieverinfotime">'.$nowtime.'</a>'; ?>

<div class="widget-head am-cf">
	<div class="widget-title am-fl"><span style="font-size: 30px">发布公告</span></div>
</div>
<div class="widget-body am-fr">
	<div class="col-md-8" style="left:15%;">
	<form class="am-form tpl-form-line-form" class="col-md-8">
		<div class="am-form-group">
			<label for="user-name" class="am-u-sm-3 am-form-label">标题&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span class="tpl-form-line-small-title">Title</span></label>
			<div class="am-u-sm-9">
				<input class="tpl-form-input" id="notice-title" placeholder="请输入标题文字" type="text">
			</div>
		</div>

		<div class="am-form-group">
			<label for="user-intro" class="am-u-sm-3 am-form-label">文章内容
				<span class="tpl-form-line-small-title">Content</span>
			</label>
			<div class="am-u-sm-9">
				<textarea class="" rows="10" placeholder="请输入文章内容"  id="notice-content"></textarea>
			</div>
		</div>

		<div class="am-form-group">
			<div class="am-u-sm-9 am-u-sm-push-3">
				<button type="button" class="am-btn am-btn-primary tpl-btn-bg-color-success" onclick="submit_info()">
				发布</button>
			</div>
		</div>
	</form>
	</div>
</div>



<script type="text/javascript">

	function submit_info(){	
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