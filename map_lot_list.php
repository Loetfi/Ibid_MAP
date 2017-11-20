<?php
//error_reporting(0);
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['name'])){
		header('location:login.php');
}

include('include/connection.php');
//include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');
$id=$_GET['id'];
$uid=$_SESSION['uid'];
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
									<input type="hidden" id="error" value="">
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
								mysql_connect("localhost", "lutfi", "lutfi") or die(mysql_error());
								mysql_select_db("dev_ims_ibid") or die(mysql_error());
								
								$query_sch = "select schedule_kota,schedule_date,schedule_location,(select date_edit from webid_history_manajemenlot where id_schedule=webid_schedule.schedule_id limit 1) as edit,
								(select count(*) from webid_auctions where id_schedule=webid_schedule.schedule_id 
								and status_item=0 limit 1) as jml_lot from webid_schedule where schedule_id='".$id."' LIMIT 1";
								$run_sch = mysql_query($query_sch);
								$row_sch = mysql_fetch_assoc($run_sch);
						?>
							<form role="form" method="get" class="form-inline">	
									<div class="form-group col-md-3">
										<label>Location :</label>
										<label><?php echo $row_sch['schedule_kota'];?></label>
									</div>
									<div class="form-group col-md-3">
										<label>Auction Day :</label>
										<label><?php echo $row_sch['schedule_date'];?></label>
									</div>
									<div class="form-group col-md-2">
										<label>Total Car :</label>
										<label><?php echo $row_sch['jml_lot'];?></label>
									</div>
									<div class="form-group col-md-3">
										<label>Last Update :</label>
										<label><?php echo $row_sch['edit'];?></label>
									</div>
									
									<div class="form-group col-md-12">
									<label><?php echo $row_sch['schedule_location'];?></label>
									<a href="map_schedule.php" class="btn btn-white pull-right" > <i class="fa fa-filter"></i>
									Back To Schedule</a>
									</div>
							</form>
						</div>
					</div>
					<div class="ibox float-e-margins">
                        <div class="ibox-title">
							<input type="hidden" id="sts" value="<?php echo $_GET['ket']; ?>">
                        </div>
                        <div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

                            <table class="footable table" data-page-size="15" data-filter=#filter>
                                <thead>
                                <tr>
									<th data-sort-ignore="true" data-type="numeric" style="text-align:center" width="8%"><center>Lot</center></th>
                                    <th data-sort-ignore="true" width="10%"><center>Photo</center></th>
                                    <th data-sort-ignore="true" style="text-align:center" width="10%"><center>No Pol</center></th>
                                    <th data-sort-ignore="true" style="text-align:center" width="10%"data-hide="phone,tablet"><center>Year</center></th>
                                    <th data-sort-ignore="true" style="text-align:center" width="20%"><center>Make, Series<br>Cylinder,Grade</center></th>
                                    <th data-sort-ignore="true" width="15%" data-hide="phone,tablet"><center>Auction Day <br> KM</center></th>
									<th data-sort-ignore="true" style="text-align:center" width="10%" data-hide="phone,tablet"><center>Colour</center></th>
									<th data-sort-ignore="true" style="text-align:center" width="10%" data-hide="phone,tablet">Fuel</center></th>
									<th data-sort-ignore="true" style="text-align:center" width="5%" data-hide="phone,tablet"><center>Total Evaluation</center></th>
									<th data-sort-ignore="true" width="10%" data-hide="phone,tablet" data-type="numeric"><center>Start Price</center></th>
									<th data-sort-ignore="true" width="10%" data-hide="phone,tablet"><center>Action</center></th>
									
                                </tr>
                                </thead>
                                <tbody>
								<?php
								
								$querya = "select id,auc_seq,id_schedule,idauction_item,title,subtitle,auc_location,minimum_bid as minimum_price,
								(select image_path from webid_kenza_image where id_auctionitem=webid_auctions.idauction_item and image_no=1 limit 1) as photo,
								(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=1 limit 1) as merk,
								(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=2 limit 1) as seri,
								(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=3 limit 1) as cc,
								(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=4 limit 1) as grade,
								(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=5 limit 1) as subgrade,
								(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=6 limit 1) as model,
								(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=8 limit 1) as transmisi,
								(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=9 limit 1) as bahanbakar,
								(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=10 limit 1) as tahun,
								(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=24 limit 1) as km,
								(select value from webid_auction_detail where idauction_item=webid_auctions.idauction_item and id_attribute=32 limit 1) as warna,
								(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as score	
								from webid_auctions where status_item=0 and id_schedule = '".$id."' order by auc_seq";
								$run_query = mysql_query($querya);
								while ($json_sc = mysql_fetch_assoc($run_query)) {
										$merk1	=$json_sc['merk']; //merk
										$seri1	=$json_sc['seri']; //seri
										$cc1	=$json_sc['cc']; //cilinder
										$gr1	=$json_sc['grade']; //grade
										$gr2	=$json_sc['subgrade']; //subgrade	
										$sc		=$json_sc['score'];		
										$item	=$json_sc['idauction_item'];
										
										$query_cekitem = "SELECT idauction_item FROM map_items_favorite WHERE id_schedule = '$id' and idauction_item = '$item' and sts_deleted = 0 ";
										$run_cekitem = mysql_query($query_cekitem);
										$countcekitem = mysql_num_rows($run_cekitem);
										
								?>
                                <tr class="gradeX">
									<td><?php echo $json_sc['auc_seq'];?>
                                    <td><a href="map_lot_list_detail.php?id=<?php echo $id; ?>&item=<?php echo $item;?>" target="_blank">
									<img src="<?php echo $json_sc['photo'];?>" width="80px" height="50px" onerror="this.src='error.png'"></a></td>
                                    <td><?php echo $json_sc['subtitle'];?>
                                    </td>
                                    <td style="text-align:center"><?php echo $json_sc['tahun'];?></td>
                                    <td><?php echo $json_sc['title'];?></td>
                                    <td style="text-align:center"><?php echo date('d-m-Y',strtotime($row_sch['schedule_date']));?><br><?php echo number_format($json_sc['km']);?></td>
									<td style="text-align:center"><?php echo $json_sc['warna'];?></td>
									<td style="text-align:center"><?php echo $json_sc['bahanbakar'];?></td>
									<td style="text-align:center"><?php if ($json_sc['score']==' '){ echo '-';}else{ echo $json_sc['score'];}?></td>
									<td style="text-align:center"><?php if ($json_sc['minimum_price']==0){ echo '-';}else{ echo number_format($json_sc['minimum_price']);};?></td>
									<td style="text-align:center">   
									<?php
										if ($json_sc['score'] != '') {
											echo '<a href="map_marketprice.php?merk='.$merk1.'&tahun1=0&tahun2=0&seri='.$seri1.'&km1=0&km2=0&cc='.$cc1.'&trans='.$json_sc['transmisi'].'&gr='.$gr1.'&sgr='.$gr2.'&warna='.$json_sc['warna'].'&model=0&sc='.$sc.'&sch=0&bln=0&week=0&loc=0"  target="_blank"><label class="btn btn-xs btn-primary">Inspected</label></a>';										
										}else {
											echo '<label class="btn btn-xs btn-danger">Not Yet <br>Inspected</label>';										
										}
									?>
									<?php 
										if ($countcekitem > 0) {
									?>
										<label class="btn btn-xs btn-success">Item <br>Favorite </label>
									<?php
										}else {
									?>
										<button class="btn btn-xs btn-success" onclick="my_favorite(<?php echo $id;?>,<?php echo $item;?>)">Add <br>to Favorite</button>
									<?php
										}
									?>
									
									</td>
									
                                </tr>
									<?php } ?>	
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
	<script type="text/javascript">
		$(document).ready(function(){
			if ($('#sts').val() == 'yes') {
				alert('Add Favorite Berhasil');
			}
			if ($('#sts').val() == 'no') {
				alert('Add Favorite Gagal');
			}
		});
	</script>
	<script type="text/javascript">
		function my_favorite(idsch,idauc) {
				$.ajax({
					type: 'POST', 
					data: {
						idschedule: idsch,
						idauction: idauc,
					},
					url: 'http://www.ibid.co.id/map/simpan_favorite.php',
					success: function(data) {
						//alert(data);
						//$('#error').val(data);
						//return false;
						if (data.trim() == 'yes') {
							alert('Add to Favorite Success');
							//return false;
						}else {
							alert('Add to Favorite Failed');
							//return false;
						}
					}
				});
			}
	</script>
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
