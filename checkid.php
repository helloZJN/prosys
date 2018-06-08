<?php 
	$useridRegister=$_POST['useridRegister'];
	$userSelect=$_POST['userSelect'];
	
	header("Content-type:text/html;charset=utf-8");
	include_once('conn/Oracle_oci.class.php');
	$dbe=new Oracle_oci();
	$dbe->conn();
	if($dbe->conn){
		if($userSelect=="stu"){
			$stid=$dbe->select("select * from student where stuid='".$useridRegister."'");
			if($row=oci_fetch_array($stid)){
				echo "n";
			}else{
				echo "y";
			}
		}else{
			$stid=$dbe->select("select * from teacher_info where teaid='".$useridRegister."'");
			if($row=oci_fetch_array($stid)){
				echo "n";
			}else{
				echo "y";
			}
		}
		$dbe->close();
	}else {
		echo "数据库连接失败";
	}
 ?>