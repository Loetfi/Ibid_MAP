<?php
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$bulan=date('m');
	$tahun=date('Y');
    $id=$_GET['id'];
	$query="select id,auc_seq,id_schedule,idauction_item,title,subtitle,auc_location,id_company,num_bids,minimum_bid as minimum_price,
	(select image_path from webid_kenza_image where id_auctionitem=webid_auctions.idauction_item and image_no=1 limit 1) as photo,
	(select schedule_date from webid_schedule  where schedule_id=webid_auctions.id_schedule limit 1) as auc_date,
	(select bid from webid_proxybid where itemid=webid_auctions.id limit 1) as final_price,
    (select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=1 limit 1) as merk,
    (select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=2 limit 1) as seri,
	(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=3 limit 1) as cc,
    (select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=4 limit 1) as grade,
	(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=6 limit 1) as model,
	(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=8 limit 1) as transmisi,
	(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=9 limit 1) as bahanbakar,
	(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=10 limit 1) as tahun,
	(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=11 limit 1) as nopol,
	(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=19 limit 1) as nobpkb,
	(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=20 limit 1) as nostnk,
	(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=24 limit 1) as km,
	(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=32 limit 1) as warna,
	(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as score
	
	from webid_auctions where status_item=0 and id_schedule=$id order by id";


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