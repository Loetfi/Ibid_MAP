<?php
	error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$bulan=date('m');
	$tahun=date('Y');
	$id=$_GET['idbio'];
	if (!$_GET['idbio']){
		$query = "select * from webid_auction_subdetail";
	}else{
		$query = "select * from webid_auction_subdetail where id_biodata=$id";
	}
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