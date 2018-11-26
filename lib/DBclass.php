<?php
class DB
{
	private $connect;
	public function __construct()
	{
		$dbconf = require 'dbconf.php';
		$this->connect = mysqli_connect($dbconf['host'], $dbconf['login'], $dbconf['pass'], $dbconf['name']);
		if(!$this->connect){
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
	
	public function getRekord($sql)
	{
		$result = mysqli_query($this->connect, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			return $row;
		} else {
			return array();}
	}

    public function select($sql)
    {
        $rows = array();
        $result = mysqli_query($this->connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $record = array();
                foreach ($row as $key => $value) {
                    $record[$key] = $row[$key];
                }
                $rows[] = $record;
            };
            return $rows;
        } else {
            return array();
        }
    }

	public function __desctruct()
	{
		mysqli_close($this->connect);
	}
}