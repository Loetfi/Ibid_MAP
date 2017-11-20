<?php
session_start();
$id_biodata=$_SESSION['uid'];
include"include/connection.php";
$id = $_GET['sch'];



//echo $id;
//echo $id_biodata;
//exit();

//filter
$merk1=$_GET['merk'];
$seri1=$_GET['seri'];
$cc1=$_GET['cc'];
$gr1=$_GET['gr'];
$sgr=$_GET['sgr'];
$model1=$_GET['model'];

$tahun11=$_GET['tahun1'];
$tahun21=$_GET['tahun2'];
$km11=$_GET['km1'];
$km21=$_GET['km2'];

$warna1=$_GET['warna'];
$trans1=$_GET['trans'];
$sc1=$_GET['sc'];
$sch1=$_GET['sch'];
$bln1=$_GET['bln'];
$week1=$_GET['week'];
$loc1=$_GET['loc'];

$qmap="select min(final_price) as harga1 from map_items_history where merk='$merk1' and seri='$seri1' and cylinder='$cc1'";
$rmap=mysql_query($qmap);
$row1=mysql_fetch_array($rmap);

echo $row1['harga1'];

		
?>



