<?php
	$link = mysql_connect('192.168.0.100','root','Serasi123') or die('Cannot connect to the DB');
	mysql_select_db('new_eauction');
	
	$query_company = "SELECT vehicle_id FROM webid_view_auction";
	$run_company = mysql_query($query_company);
	$count_taksasi = mysql_num_rows($run_company);

	date_default_timezone_set("Asia/Jakarta"); 
	
	echo "Count Table View Auction : ".$count_taksasi;
	
?>

