<?php include_once('conn/Oracle_oci.class.php'); 
	if(($_SESSION['usertype'])!='student'){
		echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
	}
?>
<h1 class="page-header" id="pageheader">查看作业</h1>
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
				<?php 
					$dbe=new Oracle_oci();
					$dbe->conn();
					$numfile=0;
					if($dbe->conn){
						$sql_op="select * from stufile where stuid='".$_SESSION['userid']."'";
						$sql_re=$dbe->select($sql_op);
						if($sql_re){
							while($row=oci_fetch_row($sql_re)){
								echo '<div class="alert alert-success" role="alert">';
								echo '<strong>'.$row['0'].'</strong><button class="btn btn-primary pull-right" id=file'.$numfile.' onclick="downloadfile(this)">下载</button>';
								echo '</div>';
								echo '<a style="display:none" id="namefile'.$numfile.'">'.$row['0'].'</a>';
								echo '<a style="display:none" id="pathfile'.$numfile.'">'.$row['5'].'</a>';
								$numfile=$numfile+1;
							}
						}
						$dbe->close();
					}
				 ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function downloadfile(argument) {
		var index=argument.id;
		var filenameindex="#name"+index;
		var filename=$(filenameindex).text();
		var filepathindex="#path"+index;
		var filepath=$(filepathindex).text();
		var url="download.php";  
		var form=$("<form></form>");  
		form.attr("action",url);  
		form.attr("method","post");  
		var inputfile_name=$("<input type='text' name='file_name'/>");  
		inputfile_name.attr("value",filename);  
		var inputfile_path=$("<input type='text' name='file_dir'/>");  
		inputfile_path.attr("value",filepath);   
		form.append(inputfile_name);  
		form.append(inputfile_path);  
		form.appendTo("body");    
		form.hide();  
		form.submit(); 
	}
</script>