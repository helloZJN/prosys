<?php

/**
 * 数据库的一些基本操作
 */
class Oracle_oci
{
	var $user;
	var $pwd;
	var $dbname;
	var $conn;
	function __construct($user='c##scott',$pwd='tiger',$dbname='//localhost/orcl')
	{
		$this->user=$user;
		$this->pwd=$pwd;
		$this->dbname=$dbname;
	}
	function conn(){
		$this->conn = oci_connect($this->user, $this->pwd,$this->dbname,'utf8');
	}
	function close(){
		oci_close($this->conn);
	}
	function insert($query){
		$stid = oci_parse($this->conn, $query);
		oci_execute($stid);
		return $stid;
	}
	function select($query){
		$stid = oci_parse($this->conn, $query);
		oci_execute($stid);
		return $stid;
	}
	function update($query){
		$stid = oci_parse($this->conn, $query);
		oci_execute($stid);
		return $stid;
	}
	function delete($query){
		$stid = oci_parse($this->conn, $query);
		oci_execute($stid);
		return $stid;
	}
}

?>
