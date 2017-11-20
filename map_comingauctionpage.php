<?php
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
				 <div class="x_panel" style="">
					 	<div class="ibox-title">
							
								<ol class="breadcrumb">
								<li>
									<a href="index.php">Home</a>
								</li>
							   
								<li class="active">
									<strong>Vehicle For Upcoming Auction</strong>
								</li>
							</ol>
						</div>
                <div class="x_content">
						 <table>
                          <thead>
                            <tr>
							  <th style="text-align:center" width="2%"><center>No Lot</center></th>	
                              <th style="text-align:center" width="12%"><center>PHOTO</center></th>
                              <th style="text-align:center" width="6%"><center>LOCATION</center></th>
                              <th style="text-align:center" width="9%"><center>NOPOL</center></th>
							  <th style="text-align:center" width="3%"><center>YEAR</center></th>
                              <th style="text-align:center" width="15%"><center>MAKE MODEL<BR>CYLINDER GRADE</center></th>
                              <th style="text-align:center" width="10%"><center>AUCTION DAY KM</center></th>
                              <th style="text-align:center" width="7%"><center>COLOR</center></th>
							  <th style="text-align:center" width="5%"><center>FUEL</center></th>
                              <th style="text-align:center" width="5%"><center>TOTAL EVALUATION</center></th>
                              <th style="text-align:center" width="10%"><center>START<BR>PRICE</center></th>
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							$uid=$_SESSION['uid'];
							
							//$timenow = date('Y-m-d',time());
							//$timenow = date('Y-m-d',strtotime('-2 days'));
							
							mysql_connect("localhost:45633", "web", "IndiaDelta12345%$#@!") or die(mysql_error());
							mysql_select_db("ims_eauction") or die(mysql_error());
							
							$timenows = date('Y-m-d',time());
							//$timenow = date('Y-m-d',strtotime('-2 days'));
							$limit = 10;
							if(isset($_GET['page'])) {
								$jumlah = $_GET['page'] * $limit;
								$page = $_GET['page'] ;
							}else {
								$page = 0;
							}
							
							$queryd = "select a.num_bids,a.auc_seq,
							a.title, a.subtitle, a.auc_location,a.minimum_bid,a.current_bid,a.increment,a.auc_year,a.id_schedule,a.idauction_item,
							(select image_path from webid_kenza_image where id_auctionitem = a.idauction_item limit 1) as photo,
							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=8 limit 1) as transmisi,
							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=32 limit 1) as warna,
							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=9 limit 1) as fuel,
							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=24 limit 1) as km,
							(select schedule_date from webid_schedule where schedule_id = a.id_schedule limit 1) as tanggal_lelang,
							(select total_evaluation_result from webid_nilai_kenza where id_auctionitem = a.idauction_item limit 1) as score
							from webid_auctions a
							JOIN webid_auction_subdetail b ON b.idauction_item = a.idauction_item 
							where a.id_schedule != 0 and b.id_biodata='$uid' and a.status_item = 0 and (select schedule_date from webid_schedule where schedule_id = a.id_schedule limit 1) >= '$timenows'
							order by a.id DESC, a.auc_location ASC LIMIT $jumlah , $limit ";
							
							$querye = mysql_query("select a.idauction_item
							from webid_auctions a
							JOIN webid_auction_subdetail b ON b.idauction_item = a.idauction_item 
							where a.id_schedule != 0 and b.id_biodata='$uid' and a.status_item = 0 and (select schedule_date from webid_schedule where schedule_id = a.id_schedule limit 1) >= '$timenows'
							order by a.id DESC, a.auc_location ASC ");
							
							$counts = mysql_num_rows($querye);
							$math = ceil($counts / $limit);
							
							$rqueryd = mysql_query($queryd);
							
							while($json_scs = mysql_fetch_assoc($rqueryd)){
							
										if ($json_scs['current_bid'] > 0) {
											$hrgterbentuks = $json_scs['current_bid'] - $json_scs['increment'];
										}else {
											$hrgterbentuks = 0;
										}
							?>
							<tr>
							  <td><?php echo $json_scs['auc_seq'];?></td>	
                              <td><center><img class="mySlides" src="<?php echo $json_scs['photo'];?>" style="width:50%" onerror="this.src='upload/error.png'"></center></td>
                              <td align="center" vertical-align="middle"><?php echo $json_scs['auc_location'];?></td>
                              <td align="center" valign="middle"><?php echo $json_scs['subtitle'];?></td>
							  <td align="center" valign="middle"><?php echo $json_scs['auc_year'];?></td>
                              <td align="center" valign="middle"><?php echo $json_scs['title'];?></td>
                              <td align="center" valign="middle"><?php echo date("d-m-Y",strtotime($json_scs['tanggal_lelang']));?><br>
							  <?php echo number_format($json_scs['km']);?></td>
                              <td align="center" valign="middle"><?php echo $json_scs['warna'];?></td>
							  <td align="center" valign="middle"><?php echo $json_scs['fuel'];?></td>
                              <td align="center" valign="middle"><?php echo $json_scs['score']?></td>
						      
							  <td align="center" valign="middle">
							  <a href="map_lot_list_detail.php?id=<?php echo $json_scs['id_schedule']; ?>&item=<?php echo $json_scs['idauction_item'];?>">
							  <label class="btn btn-primary btn-sm block"><?php echo number_format($json_scs['minimum_bid']);?><label></a></td>	
							 </tr>
                            <?php $no++;}?>
                            
                          </tbody>
							<br>
							<ul class="pagination">
							<?php
								for ($i = 1;$i<=$math;$i++) {
									if ($i == 1) {
										if ($page == 0) {
							?>
											<li class="active"><a href="#"><?php echo $i; ?></a></li>
							<?php
										}else {
							?>
											<li><a href="map_comingauction.php?page=0"><?php echo $i; ?></a></li>
							<?php		
										}
									}else {
										if ($page == $i) {
							?>
											<li class="active"><a href="#"><?php echo $i; ?></a></li>
							<?php
										}else {
							?>
											<li><a href="map_comingauction.php?page=<?php echo $i ; ?>"><?php echo $i ; ?></a></li>
										
							<?php
										}
									}
								}
							?>
							</ul>
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
		$(document).ready(function() {
		$('#example').DataTable( {
				"processing": true,
				"serverSide": true,
				"ajax": "server_processing.php"
			} );
		} );

    </script>

</body>

</html>
