<?php include_once('conn/Oracle_oci.class.php'); 
	$filename=$_POST['filename'];
	$filepath=$_POST['filepath'];

	$dbe=new Oracle_oci();
	$dbe->conn();

	if($dbe->conn){
		$sql_op="delete from stufile where fileid='".$filename."'";
		$sql_re=$dbe->delete($sql_op);
		if($sql_re){
			
		}else{
			echo "数据库删除失败";
			return false;
		}
		$dbe->close();
	    if (!unlink(iconv("utf-8","gbk",$filepath))){  
	        echo "文件删除失败";  
	    }else{  
	        echo "删除成功";  
	    }  

	}

 ?>