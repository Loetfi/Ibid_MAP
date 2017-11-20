<?php
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	
	//$merk=$_GET['merk'];
	
	if (isset($_GET['seri'])){
		$seri=$_GET['seri'];
		$query = "select webid_msattribute.id_attribute,webid_msattribute.name_attribute,webid_msattrdetail.id_attrdetail,webid_msattrdetail.attributedetail,webid_msattrdetail.id_parent from webid_msattribute,webid_msattrdetail where webid_msattrdetail.master_attribute=webid_msattribute.id_attribute and webid_msattribute.master_item=6 and webid_msattribute.sts_deleted=0 and webid_msattribute.name_attribute='GRADE' and id_parent='$seri' order by webid_msattribute.id_attribute";
	}else{
		$query = "select webid_msattribute.id_attribute,webid_msattribute.name_attribute,webid_msattrdetail.id_attrdetail,webid_msattrdetail.attributedetail,webid_msattrdetail.id_parent from webid_msattribute,webid_msattrdetail where webid_msattrdetail.master_attribute=webid_msattribute.id_attribute and webid_msattribute.master_item=6 and webid_msattribute.sts_deleted=0 and webid_msattribute.name_attribute='GRADE' order by webid_msattribute.id_attribute";
	}
	$rquery = mysql_query($query);
	while($result = mysql_fetch_assoc($rquery)){
		$arrayjson[] = $result;
	}
	
	/* 	bagian ini digunakan untuk meng-encode ke dalam JSON 
		agar bisa digunakan oleh getjson maupun ajax JQUERY */
	echo json_encode($arrayjson);
?>