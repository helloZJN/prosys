<?php  
include_once('conn/Oracle_oci.class.php');
header("Content-type:text/html;charset=utf-8");
session_start();

$file_name = $_POST['file_name'];   
$file_dir = $_POST['file_dir']; 
$file_a= $file_dir ."/". $file_name;
if (! file_exists ( iconv("utf-8", "gbk", $file_a) )) {    
    echo "文件找不到";    
    exit ();    
} else {    
        
    Header ( "Content-type: application/octet-stream" );    
    Header ( "Accept-Ranges: bytes" );    
    Header ( "Accept-Length: " . filesize ( iconv("utf-8", "gbk", $file_a)) );    
    Header ( "Content-Disposition: attachment; filename=" . $file_name );  
    $file = fopen (iconv("utf-8", "gbk", $file_a), "r" );  
    readfile(iconv("utf-8", "gbk", $file_a));
    //echo fread ( $file, filesize ( iconv("utf-8", "gbk", $file_a)) );    
    fclose ( $file );    
    exit ();    
}    
?>   