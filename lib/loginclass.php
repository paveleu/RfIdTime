<?php
class LOGIN
{
	
	public function conect($login, $password)
	{
		$password = md5($password);
		$conect = new DB;
		$row = $conect->getRekord('SELECT * FROM user WHERE `nameuser`="'.$login.'"');
		if(isset($row['nameuser'])){
			if($row['nameuser']==$login && $row['passuser']==$password)
			{
				$_SESSION['nameuser'] = $row['nameuser'];
				$_SESSION['iduser'] = $row['iduser'];
			} else {
				$_SESSION['errorlogin'] = 'Dane niepoprawne';
				return false;
			}
		} else {
			$_SESSION['errorlogin'] = 'Dane niepoprawne';
			return false;
		}
	}
	public function corect($login, $password)
	{
		$password = md5($password);
		$conect = new DB;
		$row = $conect->getRekord('SELECT * FROM user WHERE `nameuser`="'.$login.'"');
		if(isset($row['nameuser'])){
			if($row['nameuser']==$login && $row['passuser']==$password)
			{
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}



	
}
