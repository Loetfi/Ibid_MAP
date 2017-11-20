<?php
session_start();
$id_biodata=$_SESSION['uid'];
include"include/connection.php";
$id = $_POST['id'];
$item=$_POST['item'];

			
$query_update = "UPDATE map_items_watch SET sts_deleted = 1 WHERE id_biodata = '$id_biodata' and id_schedule = '$id' and idauction_item = '$item' ";
$run_update = mysql_query($query_update);
echo "yes";
?>



