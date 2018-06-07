<?php 
	$userid=$_POST['userid'];
	$password=$_POST['password'];
	$userSelect=$_POST['userSelect'];

	if($userSelect=="stu"){
		$tableName="student";
		$sql_op="select * from student where stuid='".$userid."' and password='".$password."'";
	}else if ($userSelect=="tea") {
		$tableName="teacher_info";
		$sql_op="select * from teacher_info where teaid='".$userid."' and password='".$password."'";
	}else{
		$tableName="admin";
		$sql_op="select * from admin where admid='".$userid."' and password='".$password."'";
	}
	
	header("Content-type:text/html;charset=utf-8");
	include_once('conn/Oracle_oci.class.php');
	$dbe=new Oracle_oci();
	$dbe->conn();
	if($dbe->conn){
		$sql_re=$dbe->select($sql_op);
		if($sql_re){
			echo "y";
		}else{
			echo "n";
		}
		$dbe->close();
	}else {
		echo "数据库连接失败";
	}
?>