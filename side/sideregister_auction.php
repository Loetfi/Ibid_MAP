
<?php
	//include connection file 
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "sera123";
$dbname = "dev_ims_ibid";

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
		1 =>'a.idauction_item'
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=16 limit 1) LIKE '".$params['search']['value']."%' ";    
		//$where .=" OR a.title LIKE '".$params['search']['value']."%' ";

		$where .=" OR (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) LIKE '".$params['search']['value']."%' )";
		$where .="AND id_biodata='$id' and deleted = 0
		";
	}else {
		$where .=" WHERE ";
		$where .=" id_biodata='$id' and deleted = 0
		";
	}

							
		/*$sql = "select a.num_bids,a.auc_seq,
					a.title, b.tgl_lelang, a.auc_location,a.minimum_bid,a.current_bid,a.increment,a.auc_year,a.id_schedule,a.idauction_item,
					(select image_path from webid_kenza_image where id_auctionitem = a.idauction_item limit 1) as photo,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=16 limit 1) as subtitle,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=8 limit 1) as transmisi,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=32 limit 1) as warna,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=9 limit 1) as fuel,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=24 limit 1) as km,
					(select schedule_date from webid_schedule where schedule_id = a.id_schedule limit 1) as tanggal_lelang,
					(select total_evaluation_result from webid_nilai_kenza where id_auctionitem = a.idauction_item limit 1) as score
					from webid_auctions a JOIN webid_auction_subdetail b ON b.idauction_item = a.idauction_item  
					 ";
		*/



/*GROUP_CONCAT(DISTINCT image_path ORDER BY image_path DESC SEPARATOR ',') coba2,
		POSITION(\",\" IN GROUP_CONCAT(DISTINCT image_path ORDER BY image_path DESC SEPARATOR ',')) coba1,*/
$sql =  "
SELECT 
	b.*,
	nilai.total_evaluation_result as score,
	
	(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = merk limit 1) as merka,
	(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = seri limit 1) as seria,
	(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = cc limit 1) as cca,
	(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = grade limit 1) as gradea,
	(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = subgrade limit 1) as subgradea,
	
	untukPoto.photo
FROM (
	SELECT  
		p.idauction_item, 
		b.cbng_lelang,
		b.tgl_register,
		p.id_schedule,
		b.id_biodata,
		p.deleted,
		MAX(IF(pa.id_attribute = 1, pa.value, NULL)) as merk,
		MAX(IF(pa.id_attribute = 2, pa.value, NULL)) as seri,
		MAX(IF(pa.id_attribute = 3, pa.value, NULL)) as cc,
		MAX(IF(pa.id_attribute = 4, pa.value, NULL)) as grade,
		MAX(IF(pa.id_attribute = 5, pa.value, NULL)) as subgrade,
		MAX(IF(pa.id_attribute = 6, pa.value, NULL)) as model,
		MAX(IF(pa.id_attribute = 8, pa.value, NULL)) as transmisi,
		MAX(IF(pa.id_attribute = 9, pa.value, NULL)) as bahanbakar,
		MAX(IF(pa.id_attribute = 10, pa.value, NULL)) as tahun,
		MAX(IF(pa.id_attribute = 16, pa.value, NULL)) as nopol,
		MAX(IF(pa.id_attribute = 24, pa.value, NULL)) as km,
		MAX(IF(pa.id_attribute = 32, pa.value, NULL)) as warna
	FROM webid_auction_item p
	JOIN webid_auction_subdetail b ON b.idauction_item = p.idauction_item
	LEFT JOIN webid_auction_detail AS pa ON p.idauction_item = pa.idauction_item
	GROUP BY p.idauction_item
) b
LEFT JOIN (
	select 
		id_auctionitem, 
		
		SUBSTRING(GROUP_CONCAT(DISTINCT image_path ORDER BY image_path DESC SEPARATOR ','),1,POSITION(\",\" IN GROUP_CONCAT(DISTINCT image_path ORDER BY image_path DESC SEPARATOR ','))-1) photo
	from webid_kenza_image
	WHERE 
	image_path is not null
	AND image_path <> ''
	GROUP BY id_auctionitem
) untukPoto ON b.idauction_item = untukPoto.id_auctionitem
LEFT JOIN webid_nilai_kenza nilai ON nilai.id_auctionitem = b.idauction_item
";
		$sql1111= "select a.idauction_item,b.cbng_lelang,b.tgl_register,a.id_schedule,
					 as photo,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=1 limit 1) as merk,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=2 limit 1) as seri,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=3 limit 1) as cc,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=4 limit 1) as grade,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=5 limit 1) as subgrade,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=6 limit 1) as model,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=8 limit 1) as transmisi,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=9 limit 1) as bahanbakar,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) as tahun,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=16 limit 1) as nopol,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=24 limit 1) as km,
					(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=32 limit 1) as warna,
					(select total_evaluation_result from webid_nilai_kenza where id_auctionitem = a.idauction_item limit 1) as score,
					(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = merk limit 1) as merka,
					(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = seri limit 1) as seria,
					(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = cc limit 1) as cca,
					(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = grade limit 1) as gradea,
					(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = subgrade limit 1) as subgradea
					from webid_auction_item a JOIN webid_auction_subdetail b ON b.idauction_item = a.idauction_item 
				";
				
	$sql2 = "select a.idauction_item
			from webid_auction_item a JOIN webid_auction_subdetail b ON b.idauction_item = a.idauction_item 
			";
	
	//$sql = "SELECT * FROM `employee` ";
	$sqlTot .= $sql2;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {

		$sqlTot .= $where;
		$sqlRec .= $where;
	}


 	$sqlRec .=  " order by b.tgl_register desc LIMIT ".$params['start']." ,".$params['length']."";
	// echo $sqlRec;
	$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));

	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($conn, $sqlRec) or die(mysqli_error($conn));

	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_assoc($queryRecords) ) { 
		$title = $row['merka'].' '.$row['seria'].' '.$row['cca'].' '.$row['gradea'].' '.$row['subgradea'].' '.$row['model'];
		$titleA= str_replace('-','',$title);
		$nopolisi = $row['nopol'];
		
		if ($row['photo'] != "") {
			$alfas = '<image width="50%" src="'.$row['photo'].'">';
		}else {
			$alfas = '<image width="50%" src="http://www.ibid.co.id/map/side/error.png">';
		}
									  		
		$data[] = array('<a href="map_lot_list_detail.php?id='.$row['id_schedule'].'&item='.$row['idauction_item'].'">
						'.$alfas.'</a>',
						$row['cbng_lelang'].'<br>'.date('d-m-Y',strtotime($row['tgl_register'])),
						$nopolisi,
						$row['tahun'],
						$titleA,
						number_format($row['km']),
						$row['warna'].'<br>'.$row['transmisi']
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
	