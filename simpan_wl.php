<?php
session_start();
$id_biodata=$_SESSION['uid'];
include"include/connection.php";
$id = $_GET['id'];
$item=$_GET['item'];

			
header("location:map_lot_list.php?id=".$id);
?>



