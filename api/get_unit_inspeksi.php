<?php
//select *,(select evaluation from webid_view_nilai_kenza where damage_code='4' and id_auctionitem=webid_auctions.idauction_item limit 1) as rangka,(select evaluation from webid_view_nilai_kenza where damage_code='3' and id_auctionitem=webid_auctions.idauction_item limit 1) as mesin,(select evaluation from webid_view_nilai_kenza where damage_code='1' and id_auctionitem=webid_auctions.idauction_item limit 1) as exterior,(select evaluation from webid_view_nilai_kenza where damage_code='2' and id_auctionitem=webid_auctions.idauction_item limit 1) as interior,(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as grade,(select value from webid_auction_detail where id_attribute='24' and idauction_item=webid_auctions.idauction_item limit 1) as km,(select value from webid_auction_detail where id_attribute='8' and idauction_item=webid_auctions.idauction_item limit 1) as trans,(select value from webid_auction_detail where id_attribute='9' and idauction_item=webid_auctions.idauction_item limit 1) as fuel from webid_auctions where id_schedule='$id_page' and idauction_item='$id_item' order by id

	error_reporting(0);
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$bulan=date('m');
	$tahun=date('Y');
	$id=$_GET['id'];
	if (isset($_GET['id'])){
		$query = "select count(*) as jumlah from webid_auction_subdetail where taksasi='true' and id_biodata='$id' and remove=0";
	}else{
		$query = "select * from webid_auction_subdetail where and remove=0";
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