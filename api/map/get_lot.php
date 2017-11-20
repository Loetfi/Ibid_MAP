<?php
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$bulan=date('m');
	$tahun=date('Y');
	$lmt=$_GET['lmt'];
	$id=$_GET['a'];
	$query = "select *,(count(*) from webid_auctions where schedule_id=) as lot from webid_auctions where schedule_id='$id' order by id desc limit $lmt";
	$rquery = mysql_query($query);
	while($result = mysql_fetch_assoc($rquery)){
		$arrayjson[] = $result;
	}
	
	/* 	bagian ini digunakan untuk meng-encode ke dalam JSON 
		agar bisa digunakan oleh getjson maupun ajax JQUERY */
	echo json_encode($arrayjson);
?>