<?php include_once('conn/Oracle_oci.class.php'); 
	if(($_SESSION['usertype'])!='student'){
		echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
	}
?>

<div class="widget-head am-cf">
	<div class="widget-title am-fl"><span style="font-size: 30px">查看作业</span></div>
</div>

<div  class="row" >
	<div class="col-md-8">
	<table class="am-table am-table-compact am-table-striped tpl-table-black" id="example-r" width="100%">
		<thead>
			<tr>
				<th>文件名</th>
				<th>作者</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
<?php 
	$dbe=new Oracle_oci();
	$dbe->conn();
	if($dbe->conn){
		$sql_op="select * from stufile where stuid='".$_SESSION['userid']."'";
		$sql_re=$dbe->select($sql_op);
		if($sql_re){
			$numfile=0;
			while($row=oci_fetch_array($sql_re)){
				echo '
	        		<tr class="gradeX">
						<td>'.$row['0'].'</td>
						<td>'.$row['2'].'</td>
						<td>
							<div class="tpl-table-black-operation">
								<a id="file'.$numfile.'" onclick="downloadfile(this)">
									<i class="am-icon-pencil"></i>下载
								</a>
								<span style="display:none" id="namefile'.$numfile.'">'.$row['0'].'</span>
								<span style="display:none" id="pathfile'.$numfile.'">'.$row['5'].'</span>
							</div>
						</td>
					</tr>
				';
				$numfile=$numfile+1;
			}
			$dbe->close();
		}
	}
?>
		</tbody>
	</table>
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