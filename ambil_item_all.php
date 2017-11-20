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
		//ambil next jadwal
		$qdel="delete from map_items_history";
		$rdel=mysql_query($qdel);
		
		$url="http://www.ibid.co.id/api/map/get_jadwal_all.php";
		$content=file_get_contents($url);
		$json= json_decode($content, true);
		$count=count($json);		
		for($i1=0;$i1<$count;$i1++)
			{
				$id=$json[$i1]['schedule_id'];
				//ambil content
				$url_sc="http://www.ibid.co.id/api/map/get_item.php?id=$id";
				$content_sc=file_get_contents($url_sc);
				$json_sc= json_decode($content_sc, true);
				$count_sc=count($json_sc);
				for($i=0;$i<$count_sc;$i++)
					{	
						$id_schedule	=$json_sc[$i]['id_schedule'];
						$auc_location1	=$json_sc[$i]['auc_location'];
						$id_auctionitem	=$json_sc[$i]['idauction_item'];
						$auc_date		=$json_sc[$i]['auc_date'];
						$title			=$json_sc[$i]['title'];
						$nopol			=$json_sc[$i]['subtitle'];
						$no_lot			=(int)$json_sc[$i]['auc_seq'];
						$minim			=(double)$json_sc[$i]['minimum_price'];
						$final			=(double)$json_sc[$i]['final_price'];
						$bid			=$json_sc[$i]['num_bids'];
						$score			=$json_sc[$i]['score'];
						$merk			=$json_sc[$i]['merk'];
						$seri			=$json_sc[$i]['seri'];
						$cylinder		=$json_sc[$i]['cc'];
						$grade			=$json_sc[$i]['grade'];
						$subgrade		=$json_sc[$i]['subgrade'];
						$model			=$json_sc[$i]['model'];
						$mission		=$json_sc[$i]['transmisi'];
						$fuel			=$json_sc[$i]['bahanbakar'];
						$year			=$json_sc[$i]['tahun'];
						$color			=$json_sc[$i]['warna'];
						$km				=$json_sc[$i]['km'];
						$img			=$json_sc[$i]['photo'];
						
						$score_ex		='MAP';
						$score_fr		='-';
						$score_en		='-';
						
						$qisi="insert into map_items_history(
						id_schedule,
						idauction_item,
						title,
						auc_location,
						minimum_price,
						final_price,
						id_biodata,
						score,
						score_in,
						score_ex,
						score_fr,
						score_en,
						no_pol,
						merk,
						seri,
						cylinder,
						grade,
						model,
						mission,
						fuel,
						year,
						color,
						km,
						no_lot,
						image_url,
						auc_date
						)values(
						'$id_schedule',
						'$id_auctionitem',
						'$title',
						'$auc_location1',
						'$minim',
						'$final',
						'$id_biodata',
						'$score',
						'$subgrade',
						'$score_ex',
						'$score_fr',
						'$score_en',
						'$nopol',
						'$merk',
						'$seri',
						'$cylinder',
						'$grade',
						'$model',
						'$mission',
						'$fuel',
						'$year',
						'$color',
						'$km',
						'$no_lot',
						'$img',
						'$auc_date'
						)";
						$risi=mysql_query($qisi);
					}
			}	
header("location:map_seller_all.php?merk=$merk1&tahun1=$tahun11&tahun2=$tahun21&seri=$seri1&km1=$km11&km2=$km21&cc=$cc1&trans=$trans1&gr=$gr1&sgr=$sgr&warna=$warna1&model=$model1&sc=$sc1&sch=$sch1&bln=$bln1&week=$week1&loc=$loc1");
?>



