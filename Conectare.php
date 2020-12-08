<html>
<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "magazin";
	$mysqli = new mysqli($hostname, $username, $password, $database);
	if(mysqli_connect_errno())
	{
		echo 'Nu se poate conecta';
		exit();
	}
	?>
</html>