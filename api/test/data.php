<?php
	error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$bulan=date('m');
	$tahun=date('Y');
	$query = "select * from webid_schedule where month(schedule_date)>='$bulan' ";
	$rquery = mysql_query($query);
	while($result = mysql_fetch_assoc($rquery)){
		$arrayjson[] = $result;
	}
	
	/* 	bagian ini digunakan untuk meng-encode ke dalam JSON 
		agar bisa digunakan oleh getjson maupun ajax JQUERY */
	echo json_encode($arrayjson);
?>