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
		$dbe->delete('delete from '.$table.' where '.($table=="student"?"stuid":"teaid")." =".$userid);
		if($table=="student"){
			$dbe->insert("insert into ".$table." (stuid,stuname,password) values('".$userid."','".$username."','".$userpwd."')");
		}else {
			$dbe->insert("insert into ".$table." (teaid,teaname,password) values('".$userid."','".$username."','".$userpwd."')");
		}
		
		$dbe->close();
		$_SESSION['username']=$username;
		echo "yes";
	}else {
		echo "no";
	}

 ?>