<?php
	error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$bulan=date('m');
	$tahun=date('Y');
	$lot=$_GET['id'];
	$query = "select id_auctionitem,total_evaluation_result as score,
	(select evaluation from webid_nilai_kenza_detail where damage_code=4 and id_nilaikenza=webid_nilai_kenza.id_nilaikenza limit 1) as frame,
	(select evaluation from webid_nilai_kenza_detail where damage_code=3 and id_nilaikenza=webid_nilai_kenza.id_nilaikenza limit 1) as engine,
	(select evaluation from webid_nilai_kenza_detail where damage_code=2 and id_nilaikenza=webid_nilai_kenza.id_nilaikenza limit 1) as interior,
	(select evaluation from webid_nilai_kenza_detail where damage_code=1 and id_nilaikenza=webid_nilai_kenza.id_nilaikenza limit 1) as exterior
	
	from webid_nilai_kenza where id_auctionitem=$lot";
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