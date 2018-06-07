<?php 
	$userid=$_POST['userid'];
	$table=$_POST['table'];
	header("Content-type:text/html;charset=utf-8");
	include_once('conn/Oracle_oci.class.php');
	$dbe=new Oracle_oci();
	$dbe->conn();
	if($dbe->conn){
		$dbe->delete('delete from '.$table.' where '.($table=="student"?"stuid":"teaid")." =".$userid);
		$dbe->close();
		echo "yes";
	}else {
		echo "no";
	}

 ?>