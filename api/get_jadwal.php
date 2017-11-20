<?php
	error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	if (isset($_GET['kota'])){
		$bulan=$_GET['bulan'];
		$tahun=date('Y');
		$kota=$_GET['kota'];
		$query = "select *,(select count(*) from webid_auctions where id_schedule=webid_schedule.schedule_id and status_item=0 limit 1) as jml_lot from webid_schedule where cabang='$kota' and month(schedule_date)='$bulan' and year(schedule_date)='$tahun' and sts_deleted='0' order by schedule_date desc";
	}else{
		$bulan=date('m');
		$tahun=date('Y');
		$query = "select *,(select count(*) from webid_auctions where id_schedule=webid_schedule.schedule_id and status_item=0 limit 1) as jml_lot from webid_schedule where month(schedule_date)>='$bulan' and year(schedule_date)>='$tahun' and sts_deleted='0' order by schedule_date desc";
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