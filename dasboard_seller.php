<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['name'])){
		header('location:login.php');
}

//include('include/connection.php');
//include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');
$uid=$_SESSION['uid'];

include 'include/connection';
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IBID | Balai Lelang Serasi</title>

    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 
</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="white-bg">
       
        <div class="wrapper wrapper-content">
            <div class="container">
				<?php include('header_seller.php');?>
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
					<div class="col-md-6">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<h5>Dashboard (For Seller)</h5><br>
								Welcome Back <?php echo $_SESSION['name'];?>
							</div>
							<div class="ibox-content">
									<?php  
										$query_register = "select count(*) as jumlah from webid_auction_subdetail a JOIN webid_auction_item b ON b.idauction_item = a.idauction_item
										where a.id_biodata='$uid' and a.remove=0 and b.deleted = 0";
										$rquery_register = mysql_query($query_register);
										$row_register = mysql_fetch_assoc($rquery_register);
										$jml_register = $row_register['jumlah'];
										
										$query_initial = "SELECT count(*) as jumlah FROM webid_auction_subdetail p INNER JOIN webid_pemeriksaan_item pk
										ON p.idauction_item = pk.id_auctionitem where p.id_biodata='$uid'";
										$rquery_initial = mysql_query($query_initial);
										$row_initial = mysql_fetch_assoc($rquery_initial);
										$jml_ini = $row_initial['jumlah'];
										
										$query_inspeksi = "SELECT COUNT(b.id_biodata) AS jumlah FROM webid_nilai_kenza a JOIN webid_auction_subdetail b ON b.idauction_item = a.id_auctionitem
										WHERE a.sts_deleted = 0 and b.id_biodata ='$uid'";
										$rquery_inspeksi = mysql_query($query_inspeksi);
										$row_inspeksi = mysql_fetch_assoc($rquery_inspeksi);
										$jml_in = $row_inspeksi['jumlah'];
										
										$timenow = date('Y-m-d',time());
										
										$query_coming = "SELECT count(a.num_bids) as jumlah
										from webid_auctions a JOIN webid_schedule c On c.schedule_id = a.id_schedule
										JOIN webid_auction_subdetail b ON b.idauction_item = a.idauction_item 
										where a.id_schedule != 0 and b.id_biodata='$uid' and a.status_item = 0 and c.schedule_date >= '$timenow'
										order by a.id DESC, a.auc_location ASC ";
										$rquery_coming = mysql_query($query_coming);
										$row_coming = mysql_fetch_assoc($rquery_coming);
										$jml_inaucup = $row_coming['jumlah'];
										
										$query_auctioned = "select count(*) as jumlah from webid_auction_subdetail a JOIN webid_auctions b ON b.idauction_item = a.idauction_item 
										where a.id_biodata='$uid' and a.remove=0 group by a.idauction_item ";
										$rquery_auctioned = mysql_query($query_auctioned);
										$jml_inauc = mysql_num_rows($rquery_auctioned);

										$timeA = date('Y-m-d',strtotime('-30 days'));
										$timenowA = date('Y-m-d',time());

										$query_pastsold = "select count(a.num_bids) as jumlah from webid_auctions a JOIN webid_auction_subdetail b ON b.idauction_item = a.idauction_item 
										where b.id_biodata='$uid' and a.id_schedule != 0 and a.num_bids > 0 and a.status_item = 0 and a.idauction_item != 0 and 
										(b.tgl_lelang >= '".$timeA."' and b.tgl_lelang <= '".$timenowA."') order by a.id DESC";
										$rquery_pastsold = mysql_query($query_pastsold);
										$row_pastsold = mysql_fetch_assoc($rquery_pastsold);
										$jml_insold = $row_pastsold['jumlah'];
										
									?>
								     <div class="row">
											<div class="col-sm-12 b-r"><h3 class="m-t-none m-b"></h3>
											Your  Car Status <br>
											<table class="table">
											<tr>
											<td>Vehicle Registered</td>
											<td><?php echo $jml_register;?></td>
											<td><a href="map_register.php" >View All</a></td>
											</tr>
											<tr>
											<td>Initial Inspection</td>
											<td><?php echo $jml_ini;?></td>
											<td><a href="map_initial.php" >View All</a></td>
											</tr>
											<tr>
											<td>Final Inspections</td>
											<td><?php echo $jml_in;?></td>
											<td><a href="map_inspeksi.php" >View All</a></td>
											</tr>
											<tr>
											<td>Vehicle For Upcoming Auction</td>
											<td><?php echo $jml_inaucup; ?></td>
											<td><a href="map_comingauction.php" >View All</a></td>
											</tr>
											<tr>
											<td>Auctioned</td>
											<td><?php echo $jml_inauc;?></td>
											<td><a href="map_auction.php" >View All</a></td>
											</tr>
											<tr>
											<td>Past Sold Vehicles within 30 Days</td>
											<td><?php echo $jml_insold; ?></td>
											<td><a href="map_sold.php" >View All</a></td>
											</tr>
											</table>	
												
											</div>
										
										</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<h5>Menu For Seller</h5>
								
							</div>
							<div class="ibox-content">
							<a href="map_marketprice.php"><label class="btn btn-default btn-block" >Check Market Price DB</label>
							<div class="col-md-6">
							<a href="map_register.php"><label class="btn btn-default btn-block" >Vehicles Registered</label>
							<a href="map_inspeksi.php"><label class="btn btn-default btn-block" >Vehicles Inspected</label>
							<a href="map_auction.php"><label class="btn btn-default btn-block">Auctioned</label>
							</div>
							<div class="col-md-6">
							<a href="map_initial.php"><label class="btn btn-default btn-block">Vehicle Initialy Inspected</label>
							<a href="map_comingauction.php"><label class="btn btn-default btn-block">Vehicle Waiting Auctions</label>
							<a href="map_sold.php"><label class="btn btn-default btn-block">Past Sold Vehicles</label>
							</div>
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



    <!-- Mainly scripts -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

</body>

</html>
