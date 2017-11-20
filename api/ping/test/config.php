<?php
	/* 
	Script ini ditulis oleh Loka Dwiartara, 
	Website : www.ilmuwebsite.com 
	Email : lokadwiartara@ilmuwebsite.com
	*/
	$host = "localhost";
	$user = "root";
	$password = "usbw";
	$database = "ibid_ims";
	$connect = mysql_connect($host, $user, $password);
	mysql_select_db($database,$connect);
?>