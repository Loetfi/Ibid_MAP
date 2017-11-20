<?php
session_start();
$id_biodata=$_SESSION['uid'];
include"include/connection.php";
$id = $_GET['sch'];
$url_sc="http://www.ibid.co.id/api/map/get_item.php?id=$id";
//echo $id;
//echo $id_biodata;
//exit();


//hapus jika sudah ada
$qdel="select * from map_items_history where id_schedule='$id'";
$rdel=mysql_query($qdel);
while ($row=mysql_fetch_array($rdel)){
	echo $row['title'].'<br>';
	
}
?>



