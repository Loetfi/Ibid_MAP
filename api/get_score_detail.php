<?php
	//error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$lot=$_GET['id'];
	$query = "select *,(select * from webid_nilai_kenza_detail where id_nilaikenza=webid_nilai_kenza.id_nilaikenza and damage_code=2 limit 1) as Interior from webid_nilai_kenza_detail where id_nilaikenza=$lot";
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