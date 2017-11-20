<?php
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$id=$_GET['id'];
	$query = "select schedule_location from webid_schedule where sts_deleted=0 and schedule_id=$id";

	$rquery = mysql_query($query);
	while($result = mysql_fetch_assoc($rquery)){
		$arrayjson[] = $result;
	}
	
	/* 	bagian ini digunakan untuk meng-encode ke dalam JSON 
		agar bisa digunakan oleh getjson maupun ajax JQUERY */
	echo json_encode($arrayjson);
?>