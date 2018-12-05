<?php
function ile($tab, $where)
{
	$sql = 'SELECT COUNT(*) AS "a" FROM '.$tab;

	if(isset($where))
		if($where!=="")
		{
			$sql = $sql." WHERE ".$where;
		}

	$con = new DB;
	$res = $con->getRekord($sql);
	return $res['a'];
	

}