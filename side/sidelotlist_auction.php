
<?php
	//include connection file 
/* Database connection start */
$servername = "localhost:45633";
$username = "web";
$password = "IndiaDelta12345%$#@!";
$dbname = "ims_eauction";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
	
	//$timenow = date('Y-m-d',time());
	
	//$id = 7427;
	$id = $_POST['id'];
	
	//$timenow = date('Y-m-d',strtotime('-50 days'));
	
	date_default_timezone_set('Asia/Jakarta');
	
	$timeA = date('Y-m-d',strtotime('-30 days'));
	$timenow = date('Y-m-d',time());
	 
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		0 =>'id',
		1 =>'auc_location'
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		//$where .=" ( (select value from webid_auction_detail where idauction_item = webid_auctions.idauction_item and id_attribute=16 limit 1) LIKE '".$params['search']['value']."%' ";    
		$where .=" (title LIKE '".$params['search']['value']."%' ";

		$where .=" OR auc_year LIKE '".$params['search']['value']."%' )";
		$where .=" status_item=0 and id_schedule = '".$id."'
		";
	}else {
		$where .=" WHERE ";
		$where .=" status_item=0 and id_schedule = '".$id."'
		";
	}
		$sql = "select id,auc_seq,id_schedule,idauction_item,title,subtitle,auc_location,minimum_bid as minimum_price,auc_year,
					(select image_path from webid_kenza_image where id_auctionitem=webid_auctions.idauction_item and image_no=1 limit 1) as photo,
					(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=1 limit 1) as merk,
					(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=2 limit 1) as seri,
					(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=3 limit 1) as cc,
					(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=4 limit 1) as grade,
					(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=5 limit 1) as subgrade,
					(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=6 limit 1) as model,
					(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=8 limit 1) as transmisi,
					(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=9 limit 1) as bahanbakar,
					(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=10 limit 1) as tahun,
					(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=24 limit 1) as km,
					(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=32 limit 1) as warna,
					(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as score	
					from webid_auctions";
		
		$sql2 = "select id_schedule
					from webid_auctions  
				";
	
	//$sql = "SELECT * FROM `employee` ";
	$sqlTot .= $sql2;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {
		$sqlTot .= $where;
		$sqlRec .= $where;
	}


 	$sqlRec .=  " order by auc_seq LIMIT ".$params['start']." ,".$params['length']."";
	
	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));

	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die(mysqli_error($conn));

	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_assoc($queryRecords) ) { 
		$merk1	=$row['merk']; //merk
		$seri1	=$row['seri']; //seri
		$cc1	=$row['cc']; //cilinder
		$gr1	=$row['grade']; //grade
		$gr2	=$row['subgrade']; //subgrade	
		$sc		=$row['score'];		
		$item	=$row['idauction_item'];
		
		$query_cekitem = "SELECT idauction_item FROM map_items_favorite WHERE id_schedule = '$id' and idauction_item = '$item' and sts_deleted = 0 ";
		$run_cekitem = mysql_query($query_cekitem);
		$countcekitem = mysql_num_rows($run_cekitem);
		
		if ($row['photo'] != "") {
			$alfas = '<image width="50%" src="'.$row['photo'].'">';
		}else {
			$alfas = '<image width="50%" src="http://www.ibid.co.id/map/side/error.png">';
		}

		if ($json_sc['score']==' '){ 
			$scs = '-';
			$linkmap = '<label class="btn btn-xs btn-danger">Market Price<br>Not Available</label>';
		}else{
			$scs = $json_sc['score'];
			$linkmap = '<a href="map_marketprice.php?merk='.$merk1.'&tahun1=0&tahun2=0&seri='.$seri1.'&km1=0&km2=0&cc='.$cc1.'&trans='.$json_sc['transmisi'].'&gr='.$gr1.'&sgr='.$gr2.'&warna='.$json_sc['warna'].'&model=0&sc='.$sc.'&sch=0&bln=0&week=0&loc=0"  target="_blank"><label class="btn btn-xs btn-primary">Check <br>Market Price</label></a>';
		}
		if ($json_sc['minimum_price']==0){ $mnm = '-';}else{ $mnm = number_format($json_sc['minimum_price']);}
		if ($countcekitem > 0) {
			$linkfv = '<label class="btn btn-xs btn-success">Item <br>Favorite List </label>';
		}else {
			$linkfv = '<button class="btn btn-xs btn-success" onclick="my_favorite(<?php echo $id;?>,<?php echo $item;?>)">Add to<br>Favorite List</button>';
		}
		
		$data[] = array($row['auc_seq'],
						'<a href="map_lot_list_detail.php?id='.$row['id_schedule'].'
							&item='.$row['idauction_item'].'">
							  '.$alfas.'</a>',
						$row['subtitle'],
						$row['auc_year'],
						$row['title'],
						date('d-m-Y',strtotime($row['tanggal_lelang'])).'<br>'.number_format($row['km']),
						$row['warna'],
						$row['fuel'],
						$scs,
						$mnm,
						$linkmap.' '.$linkfv
					);
		
	}	

	$json_data = array(
			"draw"            => intval( $params['draw'] ),   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format
?>
	