
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
	
	$timeA = date('Y-m-d',strtotime('-3 month'));
	$timenow = date('Y-m-d',time());
	 
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		1 =>'ida'
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( (select value from webid_auction_detail where idauction_item = a.id_auctionitem and id_attribute=16 limit 1) LIKE '".$params['search']['value']."%' ";    
		//$where .=" OR a.title LIKE '".$params['search']['value']."%' ";

		$where .=" OR (select value from webid_auction_detail where idauction_item = a.id_auctionitem and id_attribute=10 limit 1) LIKE '".$params['search']['value']."%' )";
		$where .="AND b.id_biodata='$id' and a.sts_deleted = 0
		";
	}else {
		$where .=" WHERE ";
		$where .=" b.id_biodata='$id' and a.sts_deleted = 0
		";
	}
		//(select value from webid_auction_detail where idauction_item = ida and id_attribute=9 limit 1) as bahanbakar,
		//(select value from webid_auction_detail where idauction_item = ida and id_attribute=19 limit 1) as nobpkb,
		//(select value from webid_auction_detail where idauction_item = ida and id_attribute=20 limit 1) as nostnk,
		$sql = "select b.id_biodata,a.id_auctionitem as ida,b.jadwal_lelang,b.tgl_lelang as auc_date,b.tgl_register,b.lokasi_display_lelang as cbng_lelang,
			a.total_evaluation_result as score,
			(select image_path from webid_kenza_image where id_auctionitem = ida limit 1) as photo,
			(select id_schedule from webid_auction_item where idauction_item = a.id_auctionitem limit 1) as idschedule,
			(select value from webid_auction_detail where idauction_item = ida and id_attribute=1 limit 1) as merk,
			(select value from webid_auction_detail where idauction_item = ida and id_attribute=2 limit 1) as seri,
			(select value from webid_auction_detail where idauction_item = ida and id_attribute=3 limit 1) as cc,
			(select value from webid_auction_detail where idauction_item = ida and id_attribute=4 limit 1) as grade,
			(select value from webid_auction_detail where idauction_item = ida and id_attribute=5 limit 1) as subgrade,
			(select value from webid_auction_detail where idauction_item = ida and id_attribute=6 limit 1) as model,
			(select value from webid_auction_detail where idauction_item = ida and id_attribute=8 limit 1) as transmisi,
			(select value from webid_auction_detail where idauction_item = ida and id_attribute=10 limit 1) as tahun,
			(select value from webid_auction_detail where idauction_item = ida and id_attribute=16 limit 1) as nopol,
			(select value from webid_auction_detail where idauction_item = ida and id_attribute=24 limit 1) as km,
			(select value from webid_auction_detail where idauction_item = ida and id_attribute=32 limit 1) as warna,
			(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = merk limit 1) as merka,
			(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = seri limit 1) as seria,
			(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = cc limit 1) as cca,
			(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = grade limit 1) as gradea,
			(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = subgrade limit 1) as subgradea			
			from webid_nilai_kenza a JOIN webid_auction_subdetail b ON b.idauction_item = a.id_auctionitem 
		";

											
	$sql2 = "select a.id_auctionitem 			
				from webid_nilai_kenza a JOIN webid_auction_subdetail b ON b.idauction_item = a.id_auctionitem   
			";
	
	//$sql = "SELECT * FROM `employee` ";
	$sqlTot .= $sql2;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}

 	$sqlRec .=  "order by b.tgl_register DESC LIMIT ".$params['start']." ,".$params['length']."";
	
	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));

	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die(mysqli_error($conn));

	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_assoc($queryRecords) ) { 
	
		$title = $row['merka'].' '.$row['seria'].' '.$row['cca'].' '.$row['gradea'].' '.$row['subgradea'].' '.$row['model'];
		$titleA= str_replace('-','',$title);
		
		$score_ttl = $row['score'];
		
		/*$query_map = "select MIN(a.current_bid - a.increment) as hrg_rendah,MAX(a.current_bid - a.increment) as hrg_tinggi,
						(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=1 limit 1) as merk,
						(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=2 limit 1) as seri,
						(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=3 limit 1) as cc,
						(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=4 limit 1) as grade,
						(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=6 limit 1) as model,
						(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) as tahun,
						(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=8 limit 1) as transmisi
						from webid_auctions a JOIN webid_schedule b ON b.schedule_id = a.id_schedule 
						JOIN webid_nilai_kenza c ON c.id_auctionitem = a.idauction_item
						where a.status_item = 0 and a.num_bids > 0 and b.schedule_date >= '".$timeA."' and  b.schedule_date <= '".$timenow."' and a.id_schedule != 0
						AND c.total_evaluation_result = '".$score_ttl."' AND (select value from webid_auction_detail where idauction_item = a.idauction_item 
						AND id_attribute=1 limit 1) = '".$row['merk']."'
						AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=2 limit 1) = '".$row['seri']."'
						AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=3 limit 1) = '".$row['cc']."'
						AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=4 limit 1) = '".$row['grade']."'
						AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) = '".$row['tahun']."'
						AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=6 limit 1) = '".$row['model']."'
						AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=8 limit 1) = '".$row['transmisi']."'		
						order by b.schedule_date DESC LIMIT 1";*/
		/*$query_map = "select MIN(current_bid - increment) as hrg_rendah,MAX(current_bid - increment) as hrg_tinggi from
					webid_view_auctionmap WHERE status_item = 0 and schedule_date >= '".$timeA."' and  schedule_date <= '".$timenow."'
						AND score = '".$score_ttl."' AND merk = '".$row['merk']."'
						AND seri = '".$row['seri']."'
						AND cc = '".$row['cc']."'
						AND grade = '".$row['grade']."'
						AND tahun = '".$row['tahun']."'
						AND model = '".$row['model']."'
						AND transmisi = '".$row['transmisi']."'		
						order by schedule_date DESC LIMIT 1";
		$run_map = mysqli_query($conn, $query_map)or die(mysqli_error($conn));
		$alfa = mysqli_num_rows($run_map);
		
		if ($alfa > 0) {
			$row_map = mysqli_fetch_assoc($run_map);
			$harga1 = number_format($row_map['hrg_rendah']);
			$harga2 = number_format($row_map['hrg_tinggi']);
		}else {
			$harga1=0;
			$harga2=0;
		}*/	
		
		if ($row['photo'] != "") {
			$alfas = '<image width="30%" src="'.$row['photo'].'">';
		}else {
			$alfas = '<image width="30%" src="http://www.ibid.co.id/map/side/error.png">';
		}
		
		if (date("d-m-Y",strtotime($row['auc_date']))=='01-01-1970'){ 
				$sa = '-';
		}else{ 
			$sa = date("d-m-Y",strtotime($row['auc_date']));						  
		}
		
		if ($row['score']==''){ $sas = '-';}else{ $sas = $row['score'];}
									  		
		$data[] = array('<a href="map_lot_list_detail.php?id='.$row['idschedule'].'&item='.$row['ida'].'">
						'.$alfas.'</a>',
						date('d-m-Y',strtotime($row['tgl_register'])).'<br>'.$row['cbng_lelang'],
						$row['nopol'].'<br>'.$row['tahun'],
						$titleA,
						$sa,
						$row['warna'].'<br>'.$row['transmisi'].'<br>'.number_format($row['km']),
						$sas
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
	