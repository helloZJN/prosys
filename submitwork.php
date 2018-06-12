<?php 
include_once('conn/Oracle_oci.class.php');
header("Content-type:text/html;charset=utf-8");
session_start();
if(($_SESSION['usertype'])!='student'){
	echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
}

$teaid=$_POST['teaid'];
$stuid=$_POST['stuid'];
$foldid=$_POST['foldid'];
$foldname=$_POST['foldname'];
$filecontent=$_FILES['file']['name'];
$fileid=$stuid."_". $_FILES["file"]["name"];
$base_dir="folder/".$teaid."/".$foldname;
if(!file_exists(iconv("utf-8", "gbk",$base_dir."/".$stuid."_". $_FILES["file"]["name"]))){
	$dbe=new Oracle_oci();
	$dbe->conn();
	if($dbe->conn){
		$sql_op="insert into stufile values('".$fileid."','".$teaid."','".$stuid."','".$foldid."','".$foldname."','".$base_dir."')";
		$sql_re=$dbe->insert($sql_op);
		if($sql_re){
			move_uploaded_file($_FILES["file"]["tmp_name"],
				iconv("utf-8", "gbk",$base_dir."/".$stuid."_". $_FILES["file"]["name"]));
			echo '上传成功';
		}else{
			echo '上传失败';
		}
		$dbe->close();
	}else {
		echo "数据库连接失败";
	}
}else{
	move_uploaded_file($_FILES["file"]["tmp_name"],
		iconv("utf-8", "gbk",$base_dir."/".$stuid."_". $_FILES["file"]["name"]));
	echo "上传成功";
}
?>