
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
	0 =>'id',
	1 =>'a.auc_location'
	);

$where = $sqlTot = $sqlRec = "";

	// check search value exist
if( !empty($params['search']['value']) ) {   
	$where .=" WHERE ";
	$where .=" ( (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=16 limit 1) LIKE '".$params['search']['value']."%' ";    
		//$where .=" OR a.title LIKE '".$params['search']['value']."%' ";

	$where .=" OR (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) LIKE '".$params['search']['value']."%' )";
	$where .="AND a.id_biodata='$id' and a.remove=0 
	";
}else {
	$where .=" WHERE ";
	$where .=" a.id_biodata='$id' and a.remove=0 
	";
}

$sql = "SELECT a.tgl_register,
a.tgl_lelang,a.idauction_item,a.cbng_lelang,
(select image_path from webid_kenza_image where id_auctionitem = a.idauction_item limit 1) as photo,
(select id_schedule from webid_auction_item where idauction_item = a.idauction_item limit 1) as idschedule,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=16 limit 1) as nopol,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=1 limit 1) as merk,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=2 limit 1) as seri,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=3 limit 1) as cc,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=4 limit 1) as grade,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=5 limit 1) as subgrade,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=6 limit 1) as model,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=8 limit 1) as transmisi,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) as tahun,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=32 limit 1) as warna,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=9 limit 1) as fuel,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=24 limit 1) as km,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=19 limit 1) as nobpkb,
(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=20 limit 1) as nostnk,
(select total_evaluation_result from webid_nilai_kenza where id_auctionitem = a.idauction_item limit 1) as score,
(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = merk limit 1) as merka,
(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = seri limit 1) as seria,
(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = cc limit 1) as cca,
(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = grade limit 1) as gradea,
(SELECT attributedetail FROM webid_msattrdetail where id_attrdetail = subgrade limit 1) as subgradea
from webid_auction_subdetail a JOIN webid_pemeriksaan_item b ON b.id_auctionitem = a.idauction_item 
";

$sql2 = "select a.idauction_item
from webid_auction_subdetail a JOIN webid_pemeriksaan_item b ON b.id_auctionitem = a.idauction_item   
";

	//$sql = "SELECT * FROM `employee` ";
$sqlTot .= $sql2;
$sqlRec .= $sql;
	//concatenate search sql if value exist
if(isset($where) && $where != '') {

	$sqlTot .= $where;
	$sqlRec .= $where;
}


$sqlRec .=  " order by a.tgl_register LIMIT ".$params['start']." ,".$params['length']."";

$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));

$totalRecords = mysqli_num_rows($queryTot);

$queryRecords = mysqli_query($conn, $sqlRec) or die(mysqli_error($conn));

	//iterate on results row and create new index array of data
while( $row = mysqli_fetch_assoc($queryRecords) ) { 
	$title = $row['merka'].' '.$row['seria'].' '.$row['cca'].' '.$row['gradea'].' '.$row['subgradea'].' '.$row['model'];
	$titleA= str_replace('-','',$title);	
	
	if ($row['photo'] != "") {
		$alfas2 = '<image width="50%" src="'.$row['photo'].'">';
	}else {
		$alfas2 = '<image width="50%" src="http://www.ibid.co.id/map/side/error.png">';
	}	
	
	$data[] = array(
		'<a href="map_lot_list_detail.php?id='.$row['id_schedule'].'&item='.$row['idauction_item'].'">
		'.$alfas2.'</a>',
		$row['cbng_lelang'],
		$row['nopol'],
		$row['tahun'],
		$titleA,
		date('d-m-Y',strtotime($row['tgl_register'])).'<br>'.number_format($row['km']),
		$row['warna'].'<br>'.$row['transmisi'],
		$row['nobpkb'].'<br>'.$row['nostnk']
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
	