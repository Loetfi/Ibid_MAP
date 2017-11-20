<?php
	error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$bulan=date('m');
	$tahun=date('Y');
	$lot=$_GET['lot'];
	$query = "select * from webid_auctions where idauction_item=$lot";
	$rquery = mysql_query($query);
	while($result = mysql_fetch_assoc($rquery)){
		$arrayjson[] = $result;
		//$arrayjson['foto1']="http://eauction.ibid.co.id/blue-t/ImageShare/".$result['idauction_item']."/img/photo/1.jpg";
		//$arrayjson['foto2']="http://eauction.ibid.co.id/blue-t/ImageShare/".$result['idauction_item']."/img/photo/2.jpg";
		//$arrayjson['foto3']="http://eauction.ibid.co.id/blue-t/ImageShare/".$result['idauction_item']."/img/photo/3.jpg";
		//$arrayjson['foto4']="http://eauction.ibid.co.id/blue-t/ImageShare/".$result['idauction_item']."/img/photo/4.jpg";
		//$arrayjson['foto5']="http://eauction.ibid.co.id/blue-t/ImageShare/".$result['idauction_item']."/img/photo/5.jpg";
		//$arrayjson['foto6']="http://eauction.ibid.co.id/blue-t/ImageShare/".$result['idauction_item']."/img/photo/6.jpg";
		//$arrayjson['foto7']="http://eauction.ibid.co.id/blue-t/ImageShare/".$result['idauction_item']."/img/photo/7.jpg";
		//$arrayjson['foto8']="http://eauction.ibid.co.id/blue-t/ImageShare/".$result['idauction_item']."/img/photo/8.jpg";
		//$arrayjson['foto9']="http://eauction.ibid.co.id/blue-t/ImageShare/".$result['idauction_item']."/img/photo/9.jpg";
		//$arrayjson['foto10']="http://eauction.ibid.co.id/blue-t/ImageShare/".$result['idauction_item']."/img/photo/10.jpg";
		//$arrayjson['foto11']="http://eauction.ibid.co.id/blue-t/ImageShare/".$result['idauction_item']."/img/photo/11.jpg";
		
	}
	if ($rquery){
		echo json_encode($arrayjson);
	}else{
		$arrayjson[]['error']="No Data";
		echo json_encode($arrayjson);
	}
	
?>