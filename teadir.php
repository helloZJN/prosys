<?php 
header("Content-type:text/html;charset=utf-8");
session_start();
if(($_SESSION['usertype'])!='teacher_info'){
	echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
}
$foldid=$_POST['foldid'];
$teaid=$_POST['teaid'];
$foldname=$_POST['foldname'];
$base_dir="./folder/".$teaid;
if(!file_exists($base_dir)) { 
 	mkdir($base_dir);
 }
include_once('conn/Oracle_oci.class.php');
$dbe=new Oracle_oci();
$dbe->conn();
if($dbe->conn){
	if(!file_exists(iconv('utf-8', 'gbk', $base_dir."/".$foldname))){
		mkdir(iconv('utf-8', 'gbk', $base_dir."/".$foldname));
		$sql_op="insert into folder values('".$foldid."','".$foldname."','".$teaid."')";
		$sql_re=$dbe->insert($sql_op);
		if($sql_re){
				echo "创建成功"; 
		}else{
			echo "创建失败";
		}
	}else{
		echo "文件夹已存在";
	}
	$dbe->close();
}else {
	echo "数据库连接失败";
}

?>