<?php
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$seri=$_GET['seri'];
	$query = "select * from webid_msattrdetail where master_attribute=3 and id_parent='$seri' and sts_deleted=0 order by attributedetail";
	$rquery = mysql_query($query);
	while($result = mysql_fetch_assoc($rquery)){
		$arrayjson[] = $result;
	}
	
	/* 	bagian ini digunakan untuk meng-encode ke dalam JSON 
		agar bisa digunakan oleh getjson maupun ajax JQUERY */
	echo json_encode($arrayjson);
?>