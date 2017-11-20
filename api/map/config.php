<?php
	$host = "192.168.0.100";
	$user = "root";
	$password = "Serasi123";
	$database = "new_eauction";
	$connect = mysql_connect($host, $user, $password);
	mysql_select_db($database,$connect);
?>