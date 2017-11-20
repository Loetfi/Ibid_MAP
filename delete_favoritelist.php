<?php
session_start();
$id_biodata=$_SESSION['uid'];
//include"include/connection.php";
mysql_connect("localhost:45633", "web", "IndiaDelta12345%$#@!") or die(mysql_error());
mysql_select_db("ims_eauction") or die(mysql_error());
$id = $_POST['id'];
$item=$_POST['item'];

			
$query_update = "UPDATE map_items_favorite SET sts_deleted = 1 WHERE id_biodata = '$id_biodata' and id_schedule = '$id' and idauction_item = '$item' ";
$run_update = mysql_query($query_update);
echo "yes";
?>



