<?php 
/**
 * json 返回数据
 */
class Response
{
	function __construct(argument)
	{
		# code...
	}
	/** 
	*按json方式输出通信数据 
	*@param integer $code 状态码 
	*@param string $message 提示信息 
	*@param array $data 数据 
	*return string 返回值为json 
	*/
	//静态方法，构造json数据 
	public static function json($code,$message='',$data=array()){ 
	  
		if(!is_numeric($code)){ 
			return ''; 
		} 
		$result=array( 
			'code'=>$code, 
			'message'=>$message, 
			'data'=>$data
		); 
		echo json_encode($result); 
		exit;  
	} 

}


 ?>