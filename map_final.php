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
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['name'])){
		header('location:login.php');
}

include('class/general.php');
include('include/connection.php');
include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');

if (isset($_GET['merk'])){
	$make=$_GET['merk'];
	$seri=$_GET['seri'];
	$cc=$_GET['cc'];
	$gr=$_GET['gr'];
	$model=$_GET['model'];
	$tahun1=$_GET['tahun1'];
	$tahun2=$_GET['tahun2'];
	$km1=$_GET['km1'];
	$km2=$_GET['km2'];
	$trans=$_GET['trans'];
	$warna=$_GET['warna'];	
	$week1=$_GET['week'];
	$sc=$_GET['sc'];
	$loc=$_GET['loc'];
	$bln=$_GET['bln'];
	$id=$_GET['sch'];
	$sch=$_GET['sch'];
	//import data to log
	
	
	
	
	
}else{
	$week1='0';
	$make='0';
	$seri='0';
	$cc='0';
	$gr='0';
	$model='-';
	$tahun1='0';
	$tahun2='0';
	$km1='0';
	$km2='0';
	$warna='-';	
	
	$sc='0';
	$loc='0';
	$bln='0';
	$id='0';
	$sch='0';
}


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
	    <script src="js/jquery-2.1.1.js"></script>
	<script type="text/javascript">
		var htmlobjek;
		$(document).ready(function(){
		  //apabila terjadi event onchange terhadap object <select id=propinsi>
			  $("#merk").change(function(){
				var merk = $("#merk").val();
				$.ajax({
					url: "ambilseri.php",
					data: "merk="+merk,
					cache: false,
					success: function(msg){
						$("#seri").html(msg);
					}
				});
			  });

			
			$("#seri").change(function(){
				var seri = $("#seri").val();
				$.ajax({
					url: "ambilcc.php",
					data: "seri="+seri,
					cache: false,
					success: function(msg){
						$("#cc").html(msg);
						
					}
				});
			  });
			  
			 $("#cc").change(function(){
					var cc = $("#cc").val();
					$.ajax({
						url: "ambilgrade.php",
						data: "seri="+cc,
						cache: false,
						success: function(msg){
							$("#gr").html(msg);
						}
					});
				  });  
		
		  
		});

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
				 <div class="x_panel" style="">
                <div class="x_content">
				
				<p class="text-muted well well-sm no-shadow" style="margin-top: 5px;">
                <label class="col-md-3">LOCATION : <strong><?php echo $json_sch[0]['schedule_kota'];?> </strong> </label>
				<label class="col-md-3">AUCTION DAY: <strong><?php echo $json_sch[0]['schedule_date'];?></strong></label>
				<label class="col-md-3">TOTAL CARS : <strong><?php echo $json_sch[0]['jml_lot'];?> </strong></label>
				<label class="col-md-3">LAST UPDATES : <strong><?php echo $json_sch[0]['usertimelog'];?></strong></label>
				<br>
                </p>
				 <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">
                 <table class="footable table table-stripped" data-page-size="20" data-filter=#filter>
                          <thead>
                            <tr>
                              <th width="15%"><center>PHOTO</center></th>
                              <th width="10%"><center>LOCATION</center></th>
                              <th width="5%"><center>YEAR</center></th>
                              <th width="15%"><center>MAKE MODEL<BR>CYLINDER GRADE</center></th>
                              <th width="10%"><center>AUCTION DAY KM</center></th>
                              <th width="10%"><center>COLOR</center></th>
							  <th width="5%"><center>MISSION<BR>FUEL</center></th>
                              <th width="5%"><center>GRADE</center></th>
                              <th width="10%"><center>START<BR>PRICE</center></th>
							  <th width="10%"><center>FINAL<BR>PRICE</center></th>
							  <th width="20%"><center>STATUS</center></th>
							  
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							$qsearch="select * from map_items_history limit 132";
							$rsearch=mysql_query($qsearch);
							while ($row=mysql_fetch_array($rsearch)){
							?>
							<tr>
                              <td><center><img class="mySlides" src="<?php echo $row['image_url'];?>" style="width:50%" onerror="this.src='upload/error.png'"></center></td>
                              <td align="center" vertical-align="middle"><?php echo $row['auc_location'];?></td>
                              <td align="center" valign="middle"><?php echo $row['year'];?></td>
                              <td align="center" valign="middle"><?php echo $row['title'];?></td>
                              <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$row['auc_date']);?><br><?php echo $row['km'];?></td>
                              <td align="center" valign="middle"><?php echo $row['color'];?></td>
							  <td align="center" valign="middle"><?php echo $row['mission'];?><br><?php echo $row['fuel'];?></td>
                              <td align="center" valign="middle"><?php echo $row['score']?></td>
						      <td align="center" valign="middle"><?php echo number_format($row['minimum_price']);?></td>
							  <td align="center" valign="middle"><a href="map_lot_list_detail.php?id=<?php echo $row['id_schedule']; ?>&item=<?php echo $row['idauction_item'];?>" target="_blank"><label class="btn btn-primary btn-sm block"><?php echo number_format($row['final_price']);?><label></a></td>
                              <td align="center" valign="middle"> 
							  <?php if ($row['final_price']>0){ echo 'SOLD';}else{ echo 'UNSOLD';} ?>
							  </td>	
							 </tr>
                            <?php }?>
                            
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
