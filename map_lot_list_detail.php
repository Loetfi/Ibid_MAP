<?php

session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['name'])){
		header('location:login.php');
}
include('include/konek_ims.php');
//include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');

$id=$_GET['id'];
$item=$_GET['item'];
 

$query_item = "select *,
	(select total_evaluation_comment from webid_nilai_kenza where id_auctionitem=webid_auction_detail.idauction_item) as comment 
	from webid_auction_detail where idauction_item='".$item."' order by id_attribute";

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
	$nama_merk = $row_merk['attributedetail'];
	
	$query_seri = "select attributedetail from webid_msattrdetail where id_attrdetail='".$seri1."'";
	$rquery_seri = mysql_query($query_seri);
	$row_seri = mysql_fetch_assoc($rquery_seri);
	$nama_seri = $row_seri['attributedetail'];
	
	$query_silinder = "select attributedetail from webid_msattrdetail where id_attrdetail='".$cc1."'";
	$rquery_silinder = mysql_query($query_silinder);
	$row_silinder = mysql_fetch_assoc($rquery_silinder);
	$nama_silinder = $row_silinder['attributedetail'];
	
	$query_grade = "select attributedetail from webid_msattrdetail where id_attrdetail='".$gr1."'";
	$rquery_grade = mysql_query($query_grade);
	$row_grade = mysql_fetch_assoc($rquery_grade);
	$nama_grade = $row_grade['attributedetail'];
	
	$query_subgrade = "select attributedetail from webid_msattrdetail where id_attrdetail='".$gr2."'";
	$rquery_subgrade = mysql_query($query_subgrade);
	$row_subgrade = mysql_fetch_assoc($rquery_subgrade);
	$nama_subgrade = $row_subgrade['attributedetail'];
	
	$query_kenza = "select image_path from webid_kenza_image where id_auctionitem= '".$item."' and image_no = 1";
	$rquery_kenza = mysql_query($query_kenza);
	$row_depan = mysql_fetch_assoc($rquery_kenza);
	
	if ($id > 0) { 
		$query_schd = "SELECT schedule_kota , schedule_date , (select subtitle from webid_auctions where id_schedule = '".$id."' and idauction_item = '".$item."' ) as nopol , 
					 (select auc_seq from webid_auctions where id_schedule = '".$id."' and idauction_item = '".$item."' ) as nolot,
 					 (select num_bids from webid_auctions where id_schedule = '".$id."' and idauction_item = '".$item."' ) as numbids,
 					 (select status_item from webid_auctions where id_schedule = '".$id."' and idauction_item = '".$item."' ) as stsitem,					 
 					 (select current_bid from webid_auctions where id_schedule = '".$id."' and idauction_item = '".$item."' ) as currentbid,
  					 (select increment from webid_auctions where id_schedule = '".$id."' and idauction_item = '".$item."' ) as increments,
					 (select minimum_bid from webid_auctions where id_schedule = '".$id."' and idauction_item = '".$item."' ) as minimum,
					 (select date_edit from webid_history_manajemenlot where id_schedule=webid_schedule.schedule_id limit 1) as edit
					FROM webid_schedule WHERE schedule_id = '".$id."' ";
										
		$run_schd = mysql_query($query_schd);								
		$row_schd = mysql_fetch_assoc($run_schd);
	}
								
	$query_score = "select id_auctionitem,total_evaluation_result as score,
					(select evaluation from webid_nilai_kenza_detail where damage_code=4 and id_nilaikenza=webid_nilai_kenza.id_nilaikenza limit 1) as frame,
					(select evaluation from webid_nilai_kenza_detail where damage_code=3 and id_nilaikenza=webid_nilai_kenza.id_nilaikenza limit 1) as engine,
					(select evaluation from webid_nilai_kenza_detail where damage_code=2 and id_nilaikenza=webid_nilai_kenza.id_nilaikenza limit 1) as interior,
					(select evaluation from webid_nilai_kenza_detail where damage_code=1 and id_nilaikenza=webid_nilai_kenza.id_nilaikenza limit 1) as exterior
					from webid_nilai_kenza where id_auctionitem='".$item."'";
	$rquery_score = mysql_query($query_score);
	$count_score = mysql_num_rows($rquery_score);
	$row_score = mysql_fetch_assoc($rquery_score);
	$score_ttl = $row_score['score'];
	
	/*$timeA = date('Y-m-d',strtotime('-3 month'));
	$timenow = date('Y-m-d',time());
	if ($count_score > 0) {
	
	$query_map = "select MIN(a.current_bid - a.increment) as hrg_rendah,MAX(a.current_bid - a.increment) as hrg_tinggi,
		(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=1 limit 1) as merk,
		(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=2 limit 1) as seri,
		(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=3 limit 1) as cc,
		(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=4 limit 1) as grade,
		(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=6 limit 1) as model,
		(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) as tahun,
		(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=8 limit 1) as transmisi
		from webid_auctions a JOIN webid_schedule b ON b.schedule_id = a.id_schedule 
		JOIN webid_nilai_kenza c ON c.id_auctionitem = a.idauction_item
		where a.status_item = 0 and a.num_bids > 0 and b.schedule_date >= '".$timeA."' and  b.schedule_date <= '".$timenow."' and a.id_schedule != 0
		AND c.total_evaluation_result = '".$score_ttl."' AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=1 limit 1) = '".$merk1."'
		AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=2 limit 1) = '".$seri1."'
		AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=3 limit 1) = '".$cc1."'
		AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=4 limit 1) = '".$gr1."'
		AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) = '".$year."'
		AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=6 limit 1) = '".$model."'
		AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=8 limit 1) = '".$trans."'		
		order by b.schedule_date DESC ";
	$run_map = mysql_query($query_map);
	$row_map = mysql_fetch_assoc($run_map);
		//while ($row_map = mysql_fetch_assoc($run_map)) {
			$harga1 = number_format($row_map['hrg_rendah']);
			$harga2 = number_format($row_map['hrg_tinggi']);
		//}
	
	}else {
		$harga1 = 0;
		$harga2 = 0;
	}*/
								//$sgr2=$gr2;

								/*$url_sc="http://www.ibid.co.id/api/map/get_allunit_map.php";
								$content_sc=file_get_contents($url_sc);
								$json_sc= json_decode($content_sc, true);
								$count_sc=count($json_sc);
								if ($jsons[0]['score'] != '') {
									for($i=0;$i<$count_sc;$i++)
									{
										if ($merk2 == $json_sc[$i]['merk'] and $seri2 == $json_sc[$i]['seri'] 
											and $cc2 == $json_sc[$i]['cc'] and $gr2 == $json_sc[$i]['grade'] 
											and $trans2 == $json_sc[$i]['transmisi'] and $tahun2 == $json_sc[$i]['tahun'] and $model2 == $json_sc[$i]['model']
											and $jsons[0]['score'] == $json_sc[$i]['score'] ) {
											$hrgterbentuk[] = $json_sc[$i]['current_bid'] - $json_sc[$i]['increment'];
										}
									}
									$harga1 = number_format(min($hrgterbentuk));
									$harga2 = number_format(max($hrgterbentuk));
								}else {
									$harga1 = 0;
									$harga2 = 0;
								}*/
														
?>	

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IBID | Balai Lelang Serasi</title>
    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="jquery.simpleLens.css">
    <link rel="stylesheet" type="text/css" href="jquery.simpleGallery.css">
	    <link href="css/plugins/slick/slick.css" rel="stylesheet">
    <link href="css/plugins/slick/slick-theme.css" rel="stylesheet"> 
	   <script src="jquery-1.12.js"></script>
	  <style>
		  @media (min-width: 992px) {
		  .container-fluid.my-own-class {
			overflow-x: scroll;
			white-space: nowrap;
		  }
		  .container-fluid.my-own-class .col-md-3 {
			display: inline-block;
			vertical-align: top;
			float: none;
		  }
		}
		#imagewithcaption {
		float:left;
		width: 178px;
		text-align:center;
		}
		#imagelightbox
		{
			position: fixed;
			z-index: 9999;

			-ms-touch-action: none;
			touch-action: none;
		}
		  </style> 
		  <script>
		  var slideIndex = 1;
			showDivs(slideIndex);

			function plusDivs(n) {
				showDivs(slideIndex += n);
			}

			function showDivs(n) {
				var i;
				var x = document.getElementsByClassName("mySlides");
				if (n > x.length) {slideIndex = 1} 
				if (n < 1) {slideIndex = x.length} ;
				for (i = 0; i < x.length; i++) {
					x[i].style.display = "none"; 
				}
				x[slideIndex-1].style.display = "block"; 
			};
			
		  </script>
</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="white-bg">
       
        <div class="wrapper wrapper-content">
            <div class="container">
			<?php include('header.php');?>
				<div class="navbar-collapse collapse" id="navbar">
					<ul class="nav navbar-top-links navbar-right">
						<li>
							<i class="fa fa-user"></i> <?php echo $_SESSION['name']; ?>
							
						</li>
						<li>
							<a href="logout.php">
								<i class="fa fa-sign-out"></i> Log out
							</a>
						</li>
					</ul>
				</div>
				<div class="row">
					<div class="ibox float-e-margins">
							<div class="ibox-title">
										<ol class="breadcrumb">
											<li>
												<a href="index.php">Home</a>
											</li>
										   
											<li>
												<a href="map_schedule.php">Auction Catalog</a>
											</li>
											<li>
												<a href="map_lot_list.php?id=<?php echo $id;?>">Lot List</a>
											</li>
											<li class="active">
												<strong>Detail</strong>
											</li>
											
										</ol>
							</div>
							<div class="ibox-content">	
							<?php 
									$idbiodata=$_SESSION['uid'];
									$timea = date('Y-m-d',time());
									
									mysql_connect("localhost", "lutfi", "lutfi") or die(mysql_error());
									mysql_select_db("dev_map_ibid") or die(mysql_error());
																		
									$query_cekwatch = "SELECT idauction_item , id_schedule , date_edit FROM map_items_watch 
									WHERE id_schedule = '".$id."' and idauction_item = '".$item."' and sts_deleted = 0 ";
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
										
										if ($id == 0) {
											$nopols = $nopol;
											$aucdate = '0000-00-00';
											$aucseq = 0;
										}else {
											$nopols = $nopol;
											$aucdate = $row_schd['schedule_date'];
											if ($row_schd['nolot'] == 0) {
												$aucseq = 0;
											}else {
												$aucseq = $row_schd['nolot'];
											}
										}
										
										if ($row_schd['minimum'] == "") {
											$minimumprice = 0;
										}else {
											$minimumprice = $row_schd['minimum'];
										}
																				
										$query_insert = "INSERT INTO map_items_watch (id_schedule,auc_location,idauction_item,id_biodata,auc_date,auc_seq,no_pol,merk,seri,
										model,cylinder,grade,subgrade,score,score_in,score_ex,score_fr,score_en,year,km,color,mission,description,image_url,minimum_price,
										final_price,sold,date_edit) VALUES ('$id','".$row_schd['schedule_kota']."','$item','$idbiodata',
										'".$aucdate."','$aucseq','$nopol','$nama_merk','$nama_seri','$model','$nama_silinder','$nama_grade','$nama_subgrade','".$row_score['score']."',
										'".$row_score['interior']."','".$row_score['exterior']."','".$row_score['frame']."','".$row_score['engine']."','$year',
										'$km','$clr','$trans','$comment','".$row_depan['image_path']."','".$minimumprice."','$finalprice','$sold',
										'".date('Y-m-d H:i:s',time())."') ";
										//var_dump($query_insert);
										//exit();
										$run_insert = mysql_query($query_insert);
									}else {
										$row_cekwatch = mysql_fetch_assoc($run_cekwatch);
										
										if ($timea != date('Y-m-d',strtotime($row_cekwatch['date_edit']))) {
											$query_update = "UPDATE map_items_watch SET auc_seq = '$aucseq', minimum_price = '".$row_schd['minimum']."', final_price = '$finalprice' , sold = '$sold' , date_edit = '".date('Y-m-d H:i:s',time())."'
											WHERE id_schedule = '".$id."' and idauction_item = '".$item."' and sts_deleted = 0 ";
											$run_update = mysql_query($query_update);
										}
									}
									
									if ($id > 0) {										
										mysql_connect("localhost", "lutfi", "lutfi") or die(mysql_error());
										mysql_select_db("dev_ims_ibid") or die(mysql_error());
										
							?>
								<form role="form" method="get" class="form-inline">	
										<div class="form-group col-md-2">
											<label>Police No :</label>
											<label><?php echo $nopol; ?></label>
										</div>
										<div class="form-group col-md-2">
											<label>Lot No :</label>
											<label><?php echo $row_schd['nolot'];?></label>
										</div>
										<div class="form-group col-md-2">
											<label>Location :</label>
											<label><?php echo $row_schd['schedule_kota'];?></label>
										</div>
										<div class="form-group col-md-3">
											<label>Auction Day :</label>
											<label><?php echo $row_schd['schedule_date'];?></label>
										</div>
										
										<div class="form-group col-md-3">
											<label>Last Update :</label>
											<label><?php echo $row_schd['edit'];?></label>
										</div>
								
								</form>
								<?php 
									}else {
								?>
								<form role="form" method="get" class="form-inline">	
										<div class="form-group col-md-2">
											<label>Police No :</label>
											<label><?php echo $nopol; ?></label>
										</div>
										<div class="form-group col-md-2">
											<label>Lot No :</label>
											<label> - </label>
										</div>
										<div class="form-group col-md-2">
											<label>Location :</label>
											<label> - </label>
										</div>
										<div class="form-group col-md-3">
											<label>Auction Day :</label>
											<label> - </label>
										</div>
										
										<div class="form-group col-md-3">
											<label>Last Update :</label>
											<label> - </label>
										</div>
								
								</form>
								<?php
									}
								?>
							</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
					<article class="col-md-12">
					<div class="simpleLens-gallery-container" id="demo-1">
						<div class="simpleLens-container">
							<div class="simpleLens-big-image-container">
								<a class="simpleLens-lens-image" data-lens-image="<?php echo $row_depan['image_path'];?>">
									<img src="<?php echo $row_depan['image_path'];?>"class="simpleLens-big-image"  onerror="this.src='error.png'">
								</a>
							</div>
						</div>
					
						<div class="simpleLens-thumbnails-container">
							<center>
							<?php
								$query_kenzall = "select image_path from webid_kenza_image where id_auctionitem= '".$item."' and image_no <= 8 ";
								$rquery_kenzall = mysql_query($query_kenzall);
								while ($row_kenza = mysql_fetch_assoc($rquery_kenzall)) {
							
							?>
								<a href="#" class="simpleLens-thumbnail-wrapper"
								   data-lens-image="<?php echo $row_kenza['image_path'];?>"
								   data-big-image="<?php echo $row_kenza['image_path'];?>">
									<img src="<?php echo $row_kenza['image_path'];?>"  height="150px" width="163px" onerror="this.src='error.png'">
								</a>
							<?php
								}
							?>
					
							</center>
						</div>
						
					</div>
					</article>
					</div>
					
					 <div class="col-sm-6">
                      <table class="footable table table-stripped">
							<tr>
								<td><strong>Merk</strong></td>
								<td>
								<?php 
								echo $nama_merk;
								?></td>
								<td><strong>Year</strong></td>
								<td><?php echo $year;?></td>
							</tr>
							<tr>
								<td><strong>Seri</strong></td>
								<td><?php echo $nama_seri;?></td>
								<td><strong>Km</strong></td>
								<td><?php 
								if ($km != '-') {
									echo number_format($km);
								}else {
									echo $km;
								}
								?>
							</td>
							</tr>
							<tr>
								<td><strong>Cylinder</strong></td>
								<td><?php echo $nama_silinder;?></td>
								<td><strong>Model</strong></td>
								<td><?php echo $model;?></td>
							</tr>
							<tr>
								<td><strong>Grade</strong></td>
								<td><?php echo $nama_grade;?></td>
								<td><strong>Colour</strong></td>
								<td><?php echo $clr;?></td>
								
							</tr>
							<tr>
								<td><strong>Sub Grade</strong></td>
								<td><?php echo $nama_subgrade;?></td>
								<td><strong>Transmision</strong></td>
								<td><?php echo $trans;?></td>
							</tr>
							<tr>
								<td><strong>Notes</strong></td>
								<td colspan="3"><?php echo $comment;?></td>
								
							</tr>
							</table>
							<br>
							<br>
							
                    </div>
					
					<div class="col-md-6">
					 <button class="btn btn-dark btn-sm hidden" onclick="location.href = 'map_schedule_list.php?id=<?php echo $id;?>';">Back To List</button>
							<div class="ibox float-e-margins">
								<div class="ibox-content">
								<table class="footable table table-stripped">
								<tr>
								<td><h1 class="text-navy">Score Total</h1></td>
								<td><h1 class="text-navy"><?php if (!empty($row_score['score'])){$score=$row_score['score'];echo $row_score['score'];}else{ echo '-';}?></h1></td>
								<?php if (!empty($row_score['score'])){
								?>
								<td><button class="btn btn-sm btn-primary pull-right btn-block" data-toggle="modal" data-target="#myModal_pdf">Show Inspection</button></td>
								<?php
								}
								?>
								</tr>
								<tr>
									<td><strong>Exterior</strong></td>
									<td><?php  if (!empty($row_score['exterior'])){echo $row_score['exterior'];}else{ echo '-';}?></td>
									<td><button class="btn btn-sm btn-primary pull-right btn-block" data-toggle="modal" data-target="#myModal_exterior">Show Detail</button></td>
								</tr>
									<tr>
									<td><strong>Interior</strong></td>
									<td><?php  if (!empty($row_score['interior'])){echo $row_score['interior'];}else{ echo '-';}?></td>
									<td><button class="btn btn-sm btn-primary pull-right btn-block" data-toggle="modal" data-target="#myModal_interior">Show Detail</button></td>
								</tr>
									<tr>
									<td><strong>Engine</strong></td>
									<td><?php  if (!empty($row_score['engine'])){echo $row_score['engine'];}else{ echo '-';}?></td>
									<td></td>
								</tr>
									<tr>
									<td><strong>Frame</strong></td>
									<td><?php  if (!empty($row_score['frame'])){echo $row_score['frame'];}else{ echo '-';}?></td>
									<td></td>
								</tr>
								</table>
							</div>
						
						<table class="table">
						<tr>
						<td><h2 class="text-navy">Start Price</h2></td>
						<td><h2 class="text-navy"><?php echo number_format($row_schd['minimum']);?></h2></td>
						</tr>
						<tr>
						<?php 
							if ($row_schd['stsitem'] == '0' AND $row_schd['numbids'] > '0') {
						?>
							<td><h2 class="text-navy">Final Price</h2></td>
							<td><h2 class="text-navy">
							<?php
							$hargaasa = $row_schd['currentbid'] - $row_schd['increments'];
							//$qharga1="select minimum()";
							echo number_format($hargaasa);?>
							</h2>
							</td>
						<?php
							}else {
						?>
							<td><h2 class="text-navy">Final Price</h2></td>
							<td><h2 class="text-navy">
							<?php
							//$qharga1="select minimum()";
							//echo $harga1.' ~ '.$harga2;?>
							0 </h2>
							</td>
						<?php
							} 
						?>
						
						</tr>
						</table>
					
					</div>
					

					</div>
					<div>
					
					</div>
				<div class="row col-md-12 center">
                <div class="col-md-6">
				<?php
					if ($count_score > 0) {
				?>
					<a href="map_marketprice.php?merk=<?php echo $merk1; ?>&tahun1=<?php echo $year; ?>&tahun2=0&seri=<?php echo $seri1; ?>&km1=0&km2=0&cc=<?php echo $cc1; ?>&trans=<?php echo $trans; ?>&gr=<?php echo $gr1; ?>&warna=0&model=<?php echo $model; ?>&sc=<?php echo $score_ttl; ?>"><label class="btn btn-primary btn-block">Check Marketprice</label>
				<?php
					}else {
				?>
					<a href="map_marketprice.php"><label class="btn btn-primary btn-block">Check Marketprice</label>
				<?php
					}
				?>
				</div>
				<div class="col-md-6">
				<a href="map_buyer_watchlist.php"><label class="btn btn-primary btn-block">Watch List </label></a>
				</div>
				</div>
            </div>
		   <div class="row">
				<div class="ibox float-e-margins">
							<div class="ibox-title">
									<h5>Retaled Vehicles</h5>
							</div>
							<div class="ibox-content">
									<div class="col-lg-12">
									<div class="slick_demo_2">
									
									<?php 
									
									$query_relasi = "select id_schedule,idauction_item,title,
									(select image_path from webid_kenza_image where id_auctionitem=webid_auctions.idauction_item and image_no=1 limit 1) as photo 
									from webid_auctions where title like '%".$nama_merk.' '.$nama_seri.' '.$nama_silinder."%' and status_item = 0 order by id desc limit 12";
									$rquery_relasi = mysql_query($query_relasi);
									
									while ($row_relasi = mysql_fetch_assoc($rquery_relasi)) {
									
										$id_r=$row_relasi['id_schedule'];
										$item_r=$row_relasi['idauction_item'];
									?>
								
												<div>
												<img src="<?php echo $row_relasi['photo'];?>" width="150px" height="100px" onerror="this.src='upload/error.png'">
												<p>
													<?php echo '<a href="?id='.$id_r.'&item='.$item_r.'"><center>'.$row_relasi['title'].'</center></a>';?>
												</p>
												</div>
								
									<?php 
										}
									?>	
								
									</div>
									</div>
							</div>
				</div>				
			</div>
        </div>
       <div class="footer">
					<div class="pull-right">
						Market <strong>Auction</strong> Price.
					</div>
					<div>
						<strong>Copyright</strong> IBID | Balai Lelang Serasi | PT. Serasi Auto Raya &copy; 2016-2017
					</div>
			</div>
        </div>
        </div>
	<!-- modal -->
			<div class="modal inmodal" id="myModal_pdf" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Inspected</h4>
                                        </div>
                                        
										<div class="modal-main" style="text-align:center">		
											<embed src="http://eauction.ibid.co.id/blue-t/PDFShare/<?php echo $item;?>/inspection.pdf" width="870" height="550" type='application/pdf'>
										</div>
										<div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
            </div>	
			<div class="modal inmodal" id="myModal_exterior" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Exterior Part</h4>
                                        </div>
                                        
										<div class="col-md-4">
												<?php if (!empty($row_score['score'])){
												?>
														<img src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item;?>/img/damage/exterior.jpg" width="100%"  onerror="this.src='error.png'">									
												<?php
												}else{ 
												?>
														<img src="http://eauction.ibid.co.id/map/ImageShare/error.png" width="100%" ">
												<?php
													}
												?>
										</div>
										<div class="col-md-8">		
										<table class="footable table table-stripped">
												  <tbody>
													<tr>
													  <th>A</th>
													  <td>Goresan, CatTerkelupas, GapRetak, Terpotong</td>
													</tr>
													<tr>
													  <th>AU</th>
													  <td>Goresan, Penyok</td>
													</tr>
													<tr>
													  <th>B</th>
													  <td>Modifikasi</td>
													</tr>
													<tr>
													  <th>C</th>
													  <td>Retak, Goresan, KaratBerat, KaratBerat</td>
													</tr>
													<tr>
													  <th>G</th>
													  <td>Goresan Lemparan Batu</td>
													</tr>
													<tr>
													  <th>P</th>
													  <td>Warnapudar</td>
													</tr>
													<tr>
													  <th>S</th>
													  <td>Karat Ringan</td>
													</tr>
													<tr>
													  <th>SC</th>
													  <td>Karat ringan, karatberat</td>
													</tr>
													<tr>
													  <th>U</th>
													  <td>Penyok, Bengkok</td>
													</tr>
													<tr>
													  <th>W</th>
													  <td>Tanda Perbaikan</td>
													</tr>
													<tr>
													  <th>X</th>
													  <td>Hilang Sebagian, Tidak Bergerak, Cap Hilang</td>
													</tr>
													<tr>
													  <th>Y</th>
													  <td>Retak, Gap, Retak, Capretak, Rusak</td>
													</tr>
													<tr>
													  <th>下A</th>
													  <td>Goresan di Bawah Permukaan</td>
													</tr>
												  </tbody>
												</table>
									
										</div>
										
                                      <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                           
                                        </div>
                                    </div>
                                </div>
            </div>
			<div class="modal inmodal" id="myModal_interior" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Interior Part</h4>
                                        </div>
                                        
												<div class="col-md-4">
													<?php if (!empty($row_score['score'])){
													?>
															<img src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item;?>/img/damage/interior.jpg" width="100%" onerror="this.src='error.png'">									
													<?php
													}else{ 
													?>
															<img src="http://eauction.ibid.co.id/map/ImageShare/error.png" width="100%" ">
													<?php
														}
													?>
												</div>
												<div class="col-md-8">
												<table class="footable table table-stripped">
												  <tbody>
													<tr>
													  <th>a</th>
													  <td>Beset, Goresan, Usang, Lecet, Terpotong, Sobek(besar), Terburai</td>
													</tr>
													<tr>
													  <th>d</th>
													  <td>Modifikasi, Terkelupas, Diganti, Kendur, Mengembang, Terkelupas, Diganti, Bekas Selotip, Terbakar Matahari, Usang, Berkerut Beset, Terbakar Minimal, Bekas Perbaikan</td>
													</tr>
													<tr>
													  <th>k</th>
													  <td>Bulu Hewan</td>
													</tr>
													<tr>
													  <th>s</th>
													  <td>Dipergunakan Sesuai Umur, Bau</td>
													</tr>
													<tr>
													  <th>t</th>
													  <td>Bekas Rokok</td>
													</tr>
													<tr>
													  <th>y</th>
													  <td>Kotor</td>
													</tr>
													<tr>
													  <th>x</th>
													  <td>Hilang, Hilang Sebagian</td>
													</tr>
												  </tbody>
												</table>
												</div>
										
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                           
                                        </div>
                                    </div>
                                </div>
            </div>

    <!-- Mainly scripts -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/footable/footable.all.min.js"></script>


    <script src="js/plugins/slick/slick.min.js"></script>

	<script type="text/javascript" src="jquery.simpleGallery.js"></script>
<script type="text/javascript" src="jquery.simpleLens.js"></script>

<script>
    $(document).ready(function(){
        $('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
            loading_image: 'error1.gif'
        });

        $('#demo-1 .simpleLens-big-image').simpleLens({
            loading_image: 'error1.gif'
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#demo-2 .simpleLens-thumbnails-container img').simpleGallery({
            loading_image: 'error1.gif',
            show_event: 'click'
        });

        $('#demo-2 .simpleLens-big-image').simpleLens({
            loading_image: 'error1.gif',
            open_lens_event: 'click'
        });
    });
</script>

    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>
<style>
        .slick_demo_2 .ibox-content {
            margin: 0 5px;
        }
    </style>

    <script>
        $(document).ready(function(){


            $('.slick_demo_1').slick({
                dots: true
            });

            $('.slick_demo_2').slick({
                infinite: true,
                slidesToShow: 7,
                slidesToScroll: 5,
                centerMode: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            $('.slick_demo_3').slick({
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                adaptiveHeight: true
            });
        });

    </script>
</body>

</html>
