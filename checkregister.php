<?php 
	$useridRegister=$_POST['useridRegister'];
	$nameRegister=$_POST['nameRegister'];
	$passwordRegister=$_POST['passwordRegister'];
	$userSelect=$_POST['userSelect'];

	if($userSelect=="stu"){
		$tableName="student";
	}else{
		$tableName="teacher";
	}
	
	header("Content-type:text/html;charset=utf-8");
	include_once('conn/Oracle_oci.class.php');
	$dbe=new Oracle_oci();
	$dbe->conn();
	if($dbe->conn){
		$sql_op="insert into ".$tableName." values('".$useridRegister."','".$nameRegister."','','".$passwordRegister."')";
		$sql_re=$dbe->insert($sql_op);
		if($sql_re){
			echo "注册成功";
		}else{
			echo "注册失败";
		}
		$dbe->close();
	}else {
		echo "数据库连接失败";
	}
?>