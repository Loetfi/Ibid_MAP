<?php
/*
Project		: Market Auction Price
Author		: Budi Rasuli Setiawan
Date		: 05/08/2016
Commpany	: PT. SERASI AUTO RAYA 
Sub			: Ibid
Modul Name	: Acution Schedule
File Name	: auction_schedul

*/
session_start();
//error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['name'])){
	header('location:login.php');
}

//include('class/general.php');
include('include/connection.php');
//include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');

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
	<script src="jquery-1.12.js"></script>

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

						<div class="col-md-12">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<ol class="breadcrumb">
										<li>
											<a href="index.php">Home</a>
										</li>
										<li class="active">
											<strong>Purchased</strong>
										</li>
									</ol>
								</div>


							</div>
						</div>

					</div>
					<div class="row">
						<div class="x_panel" style="">
							<div class="x_content">


								<input type="text" class="form-control input-sm m-b-xs" id="filter"
								placeholder="Search in table">
								<table class="footable table table-stripped" data-page-size="20" data-filter=#filter>
									<thead>
										<tr>
											<th data-sort-ignore="true" width="15%"><center>Photo</center></th>
											<th data-sort-ignore="true" width="10%"><center>No Pol</center></th>
											<th data-sort-ignore="true" style="text-align:center" width="10%"><center>Location</center></th>
											<th data-sort-ignore="true" style="text-align:center" width="10%"><center>Year</center></th>
											<th data-sort-ignore="true" style="text-align:center" width="20%"><center>Make,Model<BR>Cylinder, Grade</center></th>
											<th data-sort-ignore="true" width="10%"><center>Auction Day, Km</center></th>
											<th data-sort-ignore="true" style="text-align:center" width="10%"><center>Colour</center></th>
											<th data-sort-ignore="true" style="text-align:center" width="10%"><center>Transmision<BR>Fuel</center></th>
											<th data-sort-ignore="true" style="text-align:center" width="10%"><center>Total Evaluation</center></th>
											<th data-sort-ignore="true" style="text-align:center" width="15%"><center>Price</center></th>
											<th data-sort-ignore="true" width="10%"><center>Doc BPKB</center></th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$id=$_SESSION['uid'];

										mysql_connect("localhost", "root", "sera123") or die(mysql_error());
										mysql_select_db("dev_ims_ibid") or die(mysql_error());

										$timeA = date('Y-m-d',strtotime('-1 month'));
										$timenow = date('Y-m-d',time());

										$query = "SELECT a.id_schedule, a.idauction_item, d.schedule_date, a.subtitle,
										a.auc_seq , a.auc_year, a.title, a.auc_location, a.minimum_bid, a.current_bid,
										a.increment ,
										(select image_path from webid_kenza_image where id_auctionitem = a.idauction_item limit 1) as photo,
										(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=8 limit 1) as transmisi,
										(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=24 limit 1) as km,
										(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=32 limit 1) as warna,
										(select total_evaluation_result from webid_nilai_kenza where id_auctionitem = a.idauction_item limit 1) as score,
										(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=9 limit 1) as bahanbakar
										FROM `webid_auctions` a
										JOIN webid_bids b ON b.auction = a.id
										JOIN webid_npl c ON c.type_npl = a.id_schedule
										JOIN webid_peserta d ON d.id = c.user_id
										WHERE d.id_biodata ='".$id."' AND b.npl_id = c.npl_id AND a.num_bids >0 AND a.status_item =0 AND d.id_transaksi IS NOT NULL 
										AND d.deposit IS NOT NULL AND d.schedule_date >= '".$timeA."' and d.schedule_date <= '".$timenow."'
										ORDER BY d.schedule_date DESC";
										$rquery = mysql_query($query);
										$no = 1;
										while ($row_history = mysql_fetch_assoc($rquery)) {

											$hrgterbentuk = $row_history['current_bid'] - $row_history['increment'];
											$idauc = $row_history['idauction_item'];

											$query_aa = mysql_query("SELECT b.tampil_asli as tampil FROM webid_bukti_dokumen a JOIN webid_bukti_dokumen_detail b ON b.id_buktidokumen = a.id_buktidokumen 
												WHERE a.id_auctionitem = a.idauction_item and b.id_komponendokumen = 8 LIMIT 1");
											$run_aa = mysql_fetch_assoc($query_aa);

											?>
											<tr>
												<td><a href="map_lot_list_detail.php?id=<?php echo $row_history['id_schedule'];?>&item=<?php echo $row_history['idauction_item'];?>" target="_blank">
													<center><img class="mySlides" src="<?php echo $row_history['photo'];?>" style="width:50%" onerror="this.src='upload/error.png'"></center></a></td>
													<td align="center" valign="middle"><?php echo $row_history['subtitle'];?></td>
													<td align="center" vertical-align="middle"><?php echo $row_history['auc_location'];?></td>
													<td align="center" valign="middle"><?php echo $row_history['auc_year'];?></td>
													<td align="center" valign="middle"><?php echo $row_history['title'];?></td>
													<td align="center" valign="middle"><?php echo date("d-m-Y",strtotime($row_history['schedule_date']));?><br><?php echo number_format($row_history['km']);?></td>
													<td align="center" valign="middle"><?php echo $row_history['warna'];?></td>
													<td align="center" valign="middle"><?php echo $row_history['transmisi'];?><br><?php echo $json[$i]['bahanbakar'];?></td>
													<td align="center" valign="middle"><?php echo $row_history['score'];?></td>
													<td align="center" valign="middle"><?php echo number_format($hrgterbentuk);?></td>
													<?php if ($run_aa['tampil'] == 'true'){?>
													<td align="center" valign="middle"><label class="btn btn-xs btn-success">Ready</label></td>
													<?php }else{?>
													<td align="center" valign="middle"><label class="btn btn-xs btn-danger">Not Ready</label></td>
													<?php }?>
												</tr>
												<?php 

												$no++;
											}
											?>

										</tbody>
										<tfoot>
											<tr>
												<td colspan="12">
													<ul class="pagination pagination-centered"></ul>
												</td>
											</tr>
										</tfoot>
									</table>

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



		<!-- Mainly scripts -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="js/plugins/footable/footable.all.min.js"></script>

		<script>
			$(document).ready(function() {

				$('.footable').footable();
				$('.footable2').footable();

			});

		</script>

	</body>

	</html>
