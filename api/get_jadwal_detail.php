<?php
	error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$id=$_GET['id'];
	$query = "select *,(select count(*) from webid_auctions where id_schedule=webid_schedule.schedule_id and status_item=0 limit 1) as jml_lot from webid_schedule where schedule_id='$id'";
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