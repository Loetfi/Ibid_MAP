<?php


$query_item = "select *,
	(select total_evaluation_comment from webid_nilai_kenza where id_auctionitem=webid_auction_detail.idauction_item) as comment 
	from webid_auction_detail where idauction_item='".$idauction."' order by id_attribute";

$rquery_item = mysql_query($query_item);
while ($row_item = mysql_fetch_assoc($rquery_item)) {
	
	if ($row_item['id_attribute'] == 1) {
		$merk1	=$row_item['value']; //merk
	}
	if ($row_item['id_attribute'] == 2) {
		$seri1	=$row_item['value']; //seri
	}
	if ($row_item['id_attribute'] == 3) {
		$cc1	=$row_item['value']; //cilinder
	}
	if ($row_item['id_attribute'] == 4) {
		$gr1	=$row_item['value']; //grade
	}
	if ($row_item['id_attribute'] == 5) {
		$gr2	=$row_item['value']; //subgrade
	}
	if ($row_item['id_attribute'] == 6) {
		$model	=$row_item['value']; //model
	}
	if ($row_item['id_attribute'] == 8) {
		$trans	=$row_item['value']; //transmisi
	}
	if ($row_item['id_attribute'] == 9) {
		$fuel	=$row_item['value']; //bhn bakar
	}
	if ($row_item['id_attribute'] == 10) {
		$year	=$row_item['value']; //tahun
	}
	if ($row_item['id_attribute'] == 18) {
		$nopol	=$row_item['value']; //nopol
	}
	if ($row_item['id_attribute'] == 32) {
		$clr	=$row_item['value']; //warna
	}
	if ($row_item['id_attribute'] == 24) {
		$kms = $row_item['value']; //warna
	}
	$comm = $row_item['comment']; 
}
	
$comment=$comm; 
if ($kms){
	$km	= $kms;
}else{
	$km	= '-';
}

	$query_merk = "select attributedetail from webid_msattrdetail where id_attrdetail='".$merk1."'";
	$rquery_merk = mysql_query($query_merk);
	$row_merk = mysql_fetch_assoc($rquery_merk);
	$make = $row_merk['attributedetail'];
	
	$query_seri = "select attributedetail from webid_msattrdetail where id_attrdetail='".$seri1."'";
	$rquery_seri = mysql_query($query_seri);
	$row_seri = mysql_fetch_assoc($rquery_seri);
	$seri = $row_seri['attributedetail'];
	
	$query_silinder = "select attributedetail from webid_msattrdetail where id_attrdetail='".$cc1."'";
	$rquery_silinder = mysql_query($query_silinder);
	$row_silinder = mysql_fetch_assoc($rquery_silinder);
	$cl = $row_silinder['attributedetail'];
	
	$query_grade = "select attributedetail from webid_msattrdetail where id_attrdetail='".$gr1."'";
	$rquery_grade = mysql_query($query_grade);
	$row_grade = mysql_fetch_assoc($rquery_grade);
	$gr = $row_grade['attributedetail'];
	
	$query_subgrade = "select attributedetail from webid_msattrdetail where id_attrdetail='".$gr2."'";
	$rquery_subgrade = mysql_query($query_subgrade);
	$row_subgrade = mysql_fetch_assoc($rquery_subgrade);
	$sgr = $row_subgrade['attributedetail'];

	$query_score = "select id_auctionitem,total_evaluation_result as score,
					(select evaluation from webid_nilai_kenza_detail where damage_code=4 and id_nilaikenza=webid_nilai_kenza.id_nilaikenza limit 1) as frame,
					(select evaluation from webid_nilai_kenza_detail where damage_code=3 and id_nilaikenza=webid_nilai_kenza.id_nilaikenza limit 1) as engine,
					(select evaluation from webid_nilai_kenza_detail where damage_code=2 and id_nilaikenza=webid_nilai_kenza.id_nilaikenza limit 1) as interior,
					(select evaluation from webid_nilai_kenza_detail where damage_code=1 and id_nilaikenza=webid_nilai_kenza.id_nilaikenza limit 1) as exterior
					from webid_nilai_kenza where id_auctionitem='".$idauction."'";
	$rquery_score = mysql_query($query_score);
	$count_score = mysql_num_rows($rquery_score);
	$row_score = mysql_fetch_assoc($rquery_score);
	$score_ttl = $row_score['score'];
	
		$query_schd = "SELECT schedule_kota , schedule_date , (select subtitle from webid_auctions where id_schedule = '".$idschedule."' and idauction_item = '".$idauction."' ) as nopol , 
					 (select auc_seq from webid_auctions where id_schedule = '".$idschedule."' and idauction_item = '".$idauction."' ) as nolot,
 					 (select num_bids from webid_auctions where id_schedule = '".$idschedule."' and idauction_item = '".$idauction."' ) as numbids,
 					 (select current_bid from webid_auctions where id_schedule = '".$idschedule."' and idauction_item = '".$idauction."' ) as currentbid,
  					 (select increment from webid_auctions where id_schedule = '".$idschedule."' and idauction_item = '".$idauction."' ) as increments,
					 (select minimum_bid from webid_auctions where id_schedule = '".$idschedule."' and idauction_item = '".$idauction."' ) as minimum,
					 (select date_edit from webid_history_manajemenlot where id_schedule=webid_schedule.schedule_id limit 1) as edit
					FROM webid_schedule WHERE schedule_id = '".$idschedule."' ";
										
		$run_schd = mysql_query($query_schd);								
		$row_schd = mysql_fetch_assoc($run_schd);
		
		$query_kenza = "select image_path from webid_kenza_image where id_auctionitem= '".$idauction."' and image_no = 1";
		$rquery_kenza = mysql_query($query_kenza);
		$row_depan = mysql_fetch_assoc($rquery_kenza);

		$idbiodata = $_SESSION['uid'];
		
		mysql_connect("localhost:45633", "web", "IndiaDelta12345%$#@!") or die(mysql_error());
		mysql_select_db("ims_map") or die(mysql_error());
		
		$timea = date('Y-m-d',time());
		$query_cekwatch = "SELECT idauction_item , id_schedule , date_edit FROM map_items_favorite 
		WHERE id_schedule = '".$idschedule."' and idauction_item = '".$idauction."' and sts_deleted = 0 ";
		$run_cekwatch = mysql_query($query_cekwatch);
		$count_cekwatch = mysql_num_rows($run_cekwatch);
		if ($count_cekwatch == 0) {
			if ($row_schd['currentbid'] > 0) {
				$finalprice = $row_schd['currentbid'] - $row_schd['increments'];
			}else {
				$finalprice = 0;
			}
			
			if ($row_schd['numbids'] > 0) {
				$sold = 1;
			}else {
				$sold = 0;
			}
			
			$nolot = $row_schd['nolot'];
			
			$query_insert = "INSERT INTO map_items_favorite (id_schedule,auc_location,idauction_item,id_biodata,auc_date,auc_seq,no_pol,merk,seri,
			model,cylinder,grade,subgrade,score,score_in,score_ex,score_fr,score_en,year,km,color,mission,description,image_url,minimum_price,
			final_price,sold,date_edit) VALUES ('$idschedule','".$row_schd['schedule_kota']."','$idauction','$idbiodata',
			'".$row_schd['schedule_date']."','$nolot','$nopol','$make','$seri','$model','$cl','$gr','$sgr','".$row_score['score']."',
			'".$row_score['interior']."','".$row_score['exterior']."','".$row_score['frame']."','".$row_score['engine']."','$year',
			'$km','$clr','$trans','$comment','".$row_depan['image_path']."','".$row_schd['minimum']."','$finalprice','$sold',
			'".date('Y-m-d H:i:s',time())."') ";
			//var_dump($query_insert);
			//exit();
			$run_insert = mysql_query($query_insert);
			$id_insert = mysql_insert_id();
		}else {
			$row_cekwatch = mysql_fetch_assoc($run_cekwatch);
			
			if ($timea != date('Y-m-d',strtotime($row_cekwatch['date_edit']))) {
				$query_update = "UPDATE map_items_favorite SET date_edit = '".date('Y-m-d H:i:s',time())."'
				WHERE id_schedule = '".$idschedule."' and idauction_item = '".$idauction."' and sts_deleted = 0 ";
				//var_dump($query_update);
				//exit();
				$run_update = mysql_query($query_update);
				$id_insert = 1;
			}
		}
		
		if ($id_insert > 0) {
			echo 'yes';
		}else {
			echo 'no';
		}
		
		//header("location:map_lot_list.php?id=".$id."&ket=".$as);

?>

<?php
	date_default_timezone_set("Asia/Jakarta");
	
	/*
	 * Script:    DataTables server-side script for PHP and MySQL
	 * Copyright: 2010 - Allan Jardine
	 * License:   GPL v2 or BSD (3-point)
	 */
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */
	$aColumns = array( 'engine', 'browser', 'platform', 'version', 'grade' );
	
	/* Indexed column (used for fast and accurate table cardinality) */
	$sIndexColumn = "id";
	
	/* DB table to use */
	$sTable = "ajax";
	
	/* Database connection information */
	$gaSql['user']       = "web";
	$gaSql['password']   = "IndiaDelta12345%$#@!";
	$gaSql['db']         = "ims_eauction";
	$gaSql['server']     = "localhost:45633";
	
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
	 * no need to edit below this line
	 */
	
	/* 
	 * MySQL connection
	 */
	$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
		die( 'Could not open connection to server' );
	
	mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
		die( 'Could not select database '. $gaSql['db'] );
	
	
	/* 
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
			mysql_real_escape_string( $_GET['iDisplayLength'] );
	}
	
	
	/*
	 * Ordering
	 */
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
		{
			if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
				 	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( $_GET['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
		}
	}
	
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";
	$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	/* Total data set length */
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultTotal = mysql_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($_GET['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow = mysql_fetch_array( $rResult ) )
	{
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( $aColumns[$i] == "version" )
			{
				/* Special output formatting for 'version' column */
				$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
			}
			else if ( $aColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];
			}
		}
		$output['aaData'][] = $row;
	}
	
	echo json_encode( $output );
?>



