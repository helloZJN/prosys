<?php 
header("Content-type:text/html;charset=utf-8");
session_start();
if(($_SESSION['usertype'])!='student'){
	echo "<script>alert('你没有权限进入该页面！即将跳转到登陆界面');window.location.href='index.php';</script>";
}
$fileid=$_POST['fileid'];
$teaid=$_POST['teaid'];
$stuid=$_POST['stuid'];
$foldid=$_POST['foldid'];
$foldname=$_POST['foldname'];
$filecontent=$_FILES['file']['name'];
echo "$fileid
$teaid
$stuid
$foldid
$foldname
$filecontent
";
// include_once('conn/Oracle_oci.class.php');
// $dbe=new Oracle_oci();
// $dbe->conn();
// if($dbe->conn){
// 	$sql_op="select * from folder where teaid='".$teaid."'";
// 	$sql_re=$dbe->select($sql_op);
// 	if($sql_re){
// 		echo '<label for="selectfold">选择文件夹</label>
// 				<select name="selectfold" id="selectfold" class="form-control" required="required">';
// 			while($row=oci_fetch_array($sql_re)){
// 				echo '<option value="'.$row['0'].'">'.$row['1'].'</option>';
// 			}
// 		echo '</select>';
// 	}else{
// 		echo "失败";
// 	}
// 	$dbe->close();
// }else {
// 	echo "数据库连接失败";
// }

?>