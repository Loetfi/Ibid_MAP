<?php
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	
	$merk=$_GET['merk'];
	$query = "select * from webid_msattrdetail where id_parent='$merk' and sts_deleted=0 order by attributedetail";
	$rquery = mysql_query($query);
	while($result = mysql_fetch_assoc($rquery)){
		$arrayjson[] = $result;
	}
	
	/* 	bagian ini digunakan untuk meng-encode ke dalam JSON 
		agar bisa digunakan oleh getjson maupun ajax JQUERY */
	echo json_encode($arrayjson);
?>