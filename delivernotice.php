<?php 
	$infoid=$_POST['infoid'];
	$teaname=$_POST['teaname'];
	$teaid=$_POST['teaid'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$infotime=$_POST['infotime'];
	
	header("Content-type:text/html;charset=utf-8");
	include_once('conn/Oracle_oci.class.php');
	$dbe=new Oracle_oci();
	$dbe->conn();
	if($dbe->conn){
		$sql_op="insert into info values('".$infoid."','".$teaname."','".$teaid."','".$title."','".$content."','".$infotime."',0)";
		$sql_re=$dbe->insert($sql_op);
		if($sql_re){
			echo "发布成功";
		}else{
			echo "发布失败";
		}
		$dbe->close();
	}else {
		echo "数据库连接失败";
	}
?>