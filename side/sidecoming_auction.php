
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
	
	$timenow = date('Y-m-d',time());
	
	//$id = 7427;
	$id = $_POST['id'];
	
	//$timenow = date('Y-m-d',strtotime('-50 days'));
	
	date_default_timezone_set('Asia/Jakarta');
	 
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		0 =>'id',
		1 =>'a.auc_location'
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=16 limit 1) LIKE '".$params['search']['value']."%' ";    
		$where .=" OR a.title LIKE '".$params['search']['value']."%' ";

		$where .=" OR a.auc_year LIKE '".$params['search']['value']."%' )";
		$where .="AND a.id_schedule != 0 and b.id_biodata=$id and a.status_item = 0 and (select schedule_date from webid_schedule where schedule_id = a.id_schedule limit 1) >= '$timenow'";
	}else {
		$where .=" WHERE ";
		$where .="a.id_schedule != 0 and b.id_biodata=$id and a.status_item = 0 and (select schedule_date from webid_schedule where schedule_id = a.id_schedule limit 1) >= '$timenow'";
	}

	// getting total number records without any search
	$sql = "select a.auc_seq,
			(select image_path from webid_kenza_image where id_auctionitem = a.idauction_item limit 1) as photo, a.auc_location,
			a.auc_year,a.title,
			(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=16 limit 1) as subtitle,
			(select schedule_date from webid_schedule where schedule_id = a.id_schedule limit 1) as tanggal_lelang,
			(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=32 limit 1) as warna,
			(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=9 limit 1) as fuel,
			(select total_evaluation_result from webid_nilai_kenza where id_auctionitem = a.idauction_item limit 1) as score,
			a.minimum_bid , a.num_bids
			,a.current_bid,a.increment,a.id_schedule,a.idauction_item,
			(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=8 limit 1) as transmisi,
			(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=24 limit 1) as km
			from webid_auctions a
			JOIN webid_auction_subdetail b ON b.idauction_item = a.idauction_item
			";
	
	$sql2 = "select a.idauction_item
			from webid_auctions a
			JOIN webid_auction_subdetail b ON b.idauction_item = a.idauction_item
			";
	
	//$sql = "SELECT * FROM `employee` ";
	$sqlTot .= $sql2;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}


 	$sqlRec .=  " ORDER BY a.id DESC, a.auc_location ASC LIMIT ".$params['start']." ,".$params['length']."";
	
	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));

	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die(mysqli_error($conn));

	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_assoc($queryRecords) ) { 
		if ($row['photo'] != "") {
			$alfas = '<image width="60%" src="'.$row['photo'].'">';
		}else {
			$alfas = '<image width="60%" src="http://www.ibid.co.id/map/side/error.png">';
		}
	
		$data[] = array($row['auc_seq'],
						'<a href="map_lot_list_detail.php?id='.$row['id_schedule'].'&item='.$row['idauction_item'].'">
						'.$alfas.'</a>',
						$row['auc_location'],
						$row['subtitle'],
						$row['auc_year'],
						$row['title'],
						date('d-m-Y',strtotime($row['tanggal_lelang'])).'<br>'.number_format($row['km']),
						$row['warna'],
						$row['fuel'],
						$row['score'],
						number_format($row['minimum_bid'])
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
	