<?php
class connect
{
	var $db=null;
	public function __construct() 
	{
		$dsn='mysql:host=localhost;dbname=webhoctap';
		$user='root';
		$pass='';
		$this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
	}
	public function getInstance($select)
	{
		$results=$this->db->query($select);
		$result=$results->fetch();
		return $result;
	}
	public function getList($select)
	{
		$results=$this->db->query($select);
		return($results);
	}
	public function exec($query)
	{
		$results=$this->db->exec($query);
		return($results);
	}
	public function execP($query)
	{
		$statement=$this->db->prepare($query);
		return $statement;
	}
	public function getListPrepare($select)
	{
		$results=$this->db->prepare($select);// có thể dùng cho select,insert, update,delete
		return($results);
	}
}
?>