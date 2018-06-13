<?php 
	header("Content-type:text/html;charset=utf-8");
	$userid=$_POST['userid'];
	$table=$_POST['table'];
	$username=$_POST['username'];
	$userpwd=$_POST['userpwd'];
	// echo "$userid $table $username $userpwd";
	session_start();
	include_once('conn/Oracle_oci.class.php');
	$dbe=new Oracle_oci();
	$dbe->conn();
	if($dbe->conn){
		if($table=="student"){
			$op="update ".$table." set stuname = '".$username."' , password= '".$userpwd."' where stuid = '".$userid."'";
			$dbe->update($op);
		}else {
			$op="update ".$table." set teaname = '".$username."' , password = '".$userpwd."' where teaid = '".$userid."'";
			$dbe->update($op);
		}
		
		$dbe->close();
		$_SESSION['username']=$username;
		echo "yes";
	}else {
		echo "no";
	}

 ?>