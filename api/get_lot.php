<?php
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	if (isset($_GET['a'])){
		$id=$_GET['a'];
		$from=$_GET['b'];
		$to=$_GET['c'];
		//$query = "select *,(select value from webid_auction_detail where id_attribute=8 and  idauction_item=webid_auctions.idauction_item limit 1) as trans,(select value from webid_auction_detail where id_attribute=9 and  idauction_item=webid_auctions.idauction_item limit 1) as fuel,(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as score from webid_auctions where id_schedule='$id' order by auc_seq limit $from,$to";
	$query = "select *,(select value from webid_auction_detail where id_attribute=8 and  idauction_item=webid_auctions.idauction_item limit 1) as trans,(select value from webid_auction_detail where id_attribute=9 and  idauction_item=webid_auctions.idauction_item limit 1) as fuel,(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as score from webid_auctions where id_schedule='$id' where status_item=0 order by auc_seq";
	}else{
		$query = "select *,(select value from webid_auction_detail where id_attribute=8 and  idauction_item=webid_auctions.idauction_item limit 1) as trans,(select value from webid_auction_detail where id_attribute=9 and  idauction_item=webid_auctions.idauction_item limit 1) as fuel,(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as score from webid_auctions where status_item=0 order by auc_seq";
	}
	$rquery = mysql_query($query);
	while($result = mysql_fetch_assoc($rquery)){
		$arrayjson[] = $result;
	}
	
	/* 	bagian ini digunakan untuk meng-encode ke dalam JSON 
		agar bisa digunakan oleh getjson maupun ajax JQUERY */
	echo json_encode($arrayjson);
?>