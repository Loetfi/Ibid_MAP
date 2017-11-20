<?php
	error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$bulan=date('m');
	$tahun=date('Y');
	$id=$_GET['id'];
	$item=$_GET['item'];
	$query = "select * from webid_auctions  order by id_schedule desc limit 100";
	$rquery = mysql_query($query);
	while($result = mysql_fetch_assoc($rquery)){
		$arrayjson[] = $result;
	}
if ($rquery){
		echo json_encode($arrayjson);
	}else{
		$arrayjson[]['error']="No Data";
		echo json_encode($arrayjson);
	}	

?>