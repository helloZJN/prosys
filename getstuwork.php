<?php 
header("Content-type:text/html;charset=utf-8");
session_start();
if(($_SESSION['usertype'])!='teacher_info'){
	echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
}
$foldid=$_POST['foldid'];
include_once('conn/Oracle_oci.class.php');
$dbe=new Oracle_oci();
$dbe->conn();
if($dbe->conn){
	$sql_op="select * from stufile where folderid='".$foldid."'";
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
							<a id="del'.$numfile.'" onclick="deletefile(this)" class="tpl-table-black-operation-del">
								<i class="am-icon-trash"></i> 删除
							</a>
							<span style="display:none" id="namefile'.$numfile.'">'.$row['0'].'</span>
							<span style="display:none" id="pathfile'.$numfile.'">'.$row['5'].'</span>
							<span style="display:none" id="namedel'.$numfile.'">'.$row['0'].'</span>
							<span style="display:none" id="pathdel'.$numfile.'">'.$row['5'].'</span>
						</div>
					</td>
				</tr>

			';
			$numfile=$numfile+1;
		}
	}else{
		echo "失败";
	}
	$dbe->close();
}else {
	echo "数据库连接失败";
}

?>