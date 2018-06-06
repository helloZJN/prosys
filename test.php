<?php 
	header("Content-type:text/html;charset=utf-8");
	include_once('conn/Oracle_oci.class.php');
	$dbe=new Oracle_oci();
	$dbe->conn();
	if($dbe->conn){
		//增加
		//$dbe->insert("insert into admin values('我是你爸爸','5')");	
		//更新	
		//$dbe->update("update admin set  admid='666666' where admid='000000'");
		//删除
		//$dbe->delete('delete from admin');
		//查找
		$stid=$dbe->select("select * from admin");
		while($row=oci_fetch_array($stid)){
			foreach ($row as $value) {
				echo "$value";
			}
		}
		$dbe->close();
	}else {
		echo "no";
	}


 ?>