<?php
	error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$bulan=date('m');
	$tahun=date('Y');
	$title=$_GET['title'];
	
	$query = "select *,(select image_path from webid_kenza_image where id_auctionitem=webid_auctions.idauction_item and image_no=1 limit 1) as photo from webid_auctions where title like '".$title."%' order by id desc limit 10";
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