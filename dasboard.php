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
//error_reporting(0);
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['name'])){
		header('location:login.php');
}

//include('include/connection.php');
//include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IBID | Balai Lelang Serasi</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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
					<div class="col-md-7">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<?php
									mysql_connect("localhost:45633", "web", "IndiaDelta12345%$#@!") or die(mysql_error());
									mysql_select_db("ims_eauction") or die(mysql_error());
									
									$bulan=date('m');
									$tahun=date('Y');
									//$uid=$_GET['uid'];
									
									$timeA = date('Y-m-d',strtotime('-1 month'));
									$timenow = date('Y-m-d',time());
									
									$id=$_SESSION['uid'];
									
									$query = "SELECT a.id_schedule, a.idauction_item, d.schedule_date, a.subtitle, c.npl_id,
												a.auc_seq , a.auc_year, a.title, a.minimum_bid, a.current_bid,
												a.increment
												FROM `webid_auctions` a
												JOIN webid_bids b ON b.auction = a.id
												JOIN webid_npl c ON c.type_npl = a.id_schedule
												JOIN webid_peserta d ON d.id = c.user_id
												WHERE d.id_biodata ='".$id."' AND b.npl_id = c.npl_id AND a.num_bids >0 AND a.status_item =0 AND d.id_transaksi IS NOT NULL 
												AND d.deposit IS NOT NULL AND d.schedule_date >= '".$timeA."' and d.schedule_date <= '".$timenow."'
												ORDER BY d.schedule_date DESC";
									$rquery = mysql_query($query);
									$count_history = mysql_num_rows($rquery);
									
								?>
								<h5>Dashboard (For Buyer)</h5><br>
								You have purchase : <?php echo $count_history;?>  unit last 30 days.
							</div>
							<div class="ibox-content">
								     <div class="row">
											<div class="col-sm-12 b-r"><h3 class="m-t-none m-b"></h3>
											Your Recent Purchase : <label class="pull-right"> <a href="map_buyer_purchase.php">View All</a></label><br><br>
											<table>
											<tr>
											<th width="5%">No</th>
											<th width="15%">Nopol</th>
											<th width="40%">Title</th>
											<th width="15%">Auc Date</th>
											<th width="15%">Price</th>
											</tr>
											<?php 
											
											$no = 1;
											while ($row_history = mysql_fetch_assoc($rquery)) {
												if ($no <= 10) {
													$hrgterbentuk = $row_history['current_bid'] - $row_history['increment'];
												
											?>
											<tr height="30px">
											<td><?php echo $no;?>. </td>
											<td><?php echo $row_history['subtitle'];?> </td>
											<td><a href="map_lot_list_detail.php?id=<?php echo $row_history['id_schedule'];?>&item=<?php echo $row_history['idauction_item'];?>" target="_blank"><?php echo $row_history['title'];?></a></td>
											<td><?php echo date("d-m-Y",strtotime($row_history['schedule_date']));?> </td>
											<td><?php echo number_format($hrgterbentuk);?></td>
											</tr>
											<?php 
												} 
												$no++;
											}
											?>
											</table>	
												
											</div>
										
										</div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="ibox float-e-margins">
							<div class="ibox-title">
								<h5>Menu For Buyer</h5>
								
							</div>
							<div class="ibox-content">
							<div class="col-md-6">
							<a href="map_schedule.php"><label class="btn btn-default btn-block">Auction Catalog</label>
							<a href="map_marketprice.php"><label class="btn btn-default btn-block">Market Price</label>
							<a href="map_buyer_watchlist.php"><label class="btn btn-default btn-block">Watch List</label>
							</div>
							<div class="col-md-6">
							<a href="map_buyer_purchase.php"><label class="btn btn-default btn-block">Purchased</label>
							<a href="map_buyer_favorite.php"><label class="btn btn-default btn-block">My Favorite</label>
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
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
