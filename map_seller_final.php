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
error_reporting(0);
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['name'])){
		header('location:login.php');
}

include('include/connection.php');
include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');
$id=$_GET['id'];
//paging
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
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
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
							<i class="fa fa-user"></i><?php echo $_SESSION['name']; ?>
							
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
							   
								<li>
									<a href="map_schedule.php">Auction Catalog</a>
								</li>
								<li class="active">
									<strong>Lot List</strong>
								</li>
							</ol>
						</div>
						<div class="ibox-content">
						<?php 
							   $url="http://www.ibid.co.id/api/map/get_jadwal_detail.php?id=$id";
								$content=file_get_contents($url);
								$json= json_decode($content, true);
								$count=count($json);
								for($i=0;$i<$count;$i++)
									{
						?>
							<form role="form" method="get" class="form-inline">	
									<div class="form-group col-md-3">
										<label>Location :</label>
										<label><?php echo $json[$i]['schedule_kota'];?></label>
									</div>
									<div class="form-group col-md-3">
										<label>Auction Day :</label>
										<label><?php echo $json[$i]['schedule_date'];?></label>
									</div>
									<div class="form-group col-md-2">
										<label>Total Car :</label>
										<label><?php echo $json[$i]['jml_lot'];?></label>
									</div>
									<div class="form-group col-md-3">
										<label>Last Update :</label>
										<label><?php echo $json[$i]['date_edit'];?></label>
									</div>
									
									<div class="form-group col-md-12">
									<label><?php echo $json[$i]['schedule_location'];?></label><a href="map_schedule.php" class="btn btn-white pull-right" ><i class="fa fa-filter"></i>Back To Schedule</a>
									</div>
							</form>
							<?php }?>
						</div>
					</div>
					<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            

                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="20" data-filter=#filter>
                                <thead>
                                <tr>
									<th>No</th>
                                    <th>Photo</th>
                                    <th>Lot No<br>No Polisi</th>
                                    <th data-hide="phone,tablet">Year</th>
                                    <th width="100px">Make, Series<br>Cylinder,Grade</th>
                                    <th data-hide="phone,tablet">Auction Day <br> KM</th>
									<th data-hide="phone,tablet">Colour</th>
									<th data-hide="phone,tablet">Mission <br> Fuel</th>
									<th data-hide="phone,tablet">Grade</th>
									<th data-hide="phone,tablet">Start Price</th>
									<th data-hide="phone,tablet">Action</th>
									
                                </tr>
                                </thead>
                                <tbody>
								<?php
								$url_sc="http://www.ibid.co.id/api/map/get_item.php?id=$id";
								$content_sc=file_get_contents($url_sc);
								$json_sc= json_decode($content_sc, true);
								$count_sc=count($json_sc);
								for($i=0;$i<$count_sc;$i++)
									{
								?>
                                <tr class="gradeX">
									<td><?php echo $i+1;?>
                                    <td><img src="<?php echo $json_sc[$i]['photo'];?>" width="80px" height="50px" onerror="this.src='upload/error.png'"></td>
                                    <td><?php echo $json_sc[$i]['auc_seq'];?><br><?php echo $json_sc[$i]['subtitle'];?>
                                    </td>
                                    <td><?php echo $json_sc[$i]['tahun'];?></td>
                                    <td><?php echo $json_sc[$i]['title'];?></td>
                                    <td><?php echo $json_sc[$i]['auc_date'];?><br><?php echo number_format($json_sc[$i]['km']);?></td>
									<td><?php echo $json_sc[$i]['warna'];?></td>
									<td><?php echo $json_sc[$i]['transmisi'];?><br><?php echo $json_sc[$i]['bahanbakar'];?></td>
									<td><?php echo $json_sc[$i]['score'];?></td>
									<td><?php echo number_format($json_sc[$i]['minimum_price']);?></td>
									<td>   
									
									<a href="map_lot_list_detail.php?id=<?php echo $id;?>&item=<?php echo $json_sc[$i]['idauction_item'];?>"  target="_blank"><label class="btn btn-white">Check <br>Market Price</label></a>
									<a href="map_lot_watch.php?id=<?php echo $id;?>item=<?php echo $json_sc[$i]['idauction_item'];?>" target="_blank"><label class="btn btn-white">Add <br>Watch List 0</label></a>
									
									</td>
									
                                </tr>
									<?php } ?>	
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
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
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/footable/footable.all.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity demo -->
    <script src="js/demo/peity-demo.js"></script>
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

</body>

</html>
