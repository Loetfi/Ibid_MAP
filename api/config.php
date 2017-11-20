<?php
	$host = "localhost:3307";
	$user = "root";
	$password = "telkomd2";
	$database = "dev_map_ibid";
	$connect = mysql_connect($host, $user, $password);
	mysql_select_db($database,$connect);
?>