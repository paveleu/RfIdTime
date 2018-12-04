<?php
if(isset($_SESSION['errorlogin'])){
	echo($_SESSION['errorlogin'].'<br />');
	unset($_SESSION['errorlogin']);
}

?>

<form action="index.php" method="post">
	Login:<input name="login" /><br />
	Hasło:<input name="pass" /><br />
	<input type="submit" value="wyślij" />
</form>