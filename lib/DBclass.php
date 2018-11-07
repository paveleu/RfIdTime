<?php
class DB
{
	private $connect;
	private function __construct()
	{
		$dbconf = require 'dbconf.php';
		$this->connect = mysqli_connect($dbconf['host'], $dbconf['login'], $dbconf['pass'], $dbconf['name']);
		if(!$conn){
    		echo ("Connection failed: " . mysqli_connect_error());
    		return false;
		}
	}
	public function insert($sql)
	{
		if(mysqli_query($this->connect, $sql)){
    		return true;
		} else {
    		return false;
	}
	}
	private function __desctruct()
	{
		mysqli_close($this->connect);
	}
}