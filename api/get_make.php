<?php
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	
	$query = "select *,(select * from webid_msattrdetail where master_attribute=1 and id_attrdetail=webid_auction_detail.value) as merk  from webid_auction_detail where idauction_item='$id' and id_attribute=1 order by attributedetail";

	$rquery = mysql_query($query);
	while($result = mysql_fetch_assoc($rquery)){
		$arrayjson[] = $result;
	}
	
	/* 	bagian ini digunakan untuk meng-encode ke dalam JSON 
		agar bisa digunakan oleh getjson maupun ajax JQUERY */
	echo json_encode($arrayjson);
?>