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
		while($row=oci_fetch_array($sql_re)){
			echo '
        		<tr class="gradeX">
					<td>'.$row['0'].'</td>
					<td>'.$row['2'].'</td>
					<td>
						<div class="tpl-table-black-operation">
							<a href="javascript:;">
								<i class="am-icon-pencil"></i>下载
							</a>
							<a href="javascript:;" class="tpl-table-black-operation-del">
								<i class="am-icon-trash"></i> 删除
							</a>
						</div>
					</td>
				</tr>
			';
		}
	}else{
		echo "失败";
	}
	$dbe->close();
}else {
	echo "数据库连接失败";
}
// <div class="col-md-2">
     //          			<h2>Heading</h2>
     //          			<p>'.$row['0'].'</p>
     //          			<p>'.$row['1'].'</p>
     //          			<p>'.$row['2'].'</p>
     //          			<p>'.$row['3'].'</p>
     //          			<p>'.$row['4'].'</p>
     //          			<p>'.$row['5'].'</p>
     //          			<p>'.$row['6'].'</p>
     //          			<p>'.$row['7'].'</p>
     //          			<button>下载</button>
     //          			<button>删除</button>
     //        		</div>
?>