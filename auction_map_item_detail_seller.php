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
if (empty($_SESSION['username']) AND empty($_SESSION['name'])){
		header('location:login.php');
}
include('class/general.php');
include('include/connection.php');
include('include/fungsi.php');

$id_page=$_GET['id'];
$id_item=$_GET['item'];
$id_item_left=($id_item)-1;
$id_item_right=($id_item)+1;

date_default_timezone_set('Asia/Jakarta');
$id=$_GET['id'];
$item=$_GET['item'];
$location=$_GET['loc'];
$tgl=$_GET['tgl'];
$nopol=$_GET['nopol'];

							$url="http://www.ibid.co.id/api/map/get_lot_detail.php?a=$id&b=$item";
							$content=file_get_contents($url);  // add your url which contains json file
							$json = json_decode($content, true);
							$count=count($json);
							
										for($i=0;$i<$count;$i++)
										{
											$string = explode(' ',$json[$i]['title']);
											$gr=preg_replace("/[^a-zA-Z]+/"," ",$string);
											$gr = array_pop($gr);	
											$make = $string[0];
											$year=$json[$i]['auc_year'];
											$seri=$string[1];
											$model=$string[1];
											$trans='MT/AT';
											$km='-';
											$cl=$string[2];
												
						
					?>				

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PT. SERA | Market Auction Price System</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
  <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />
 
  <script src="js/jquery.min.js"></script>
  <script src="js/nprogress.js"></script>
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
  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body class="nav-md">
  <div class="container body">
  <div class="header center">
	<div>
	<img src="images/ibid.png"><img src="images/satu.png" class="pull-right">
	</div>
	</div>
	<?php include('include/header.php');?>
	 <!-- top navigation -->
      <?php include('include/top_nav.php');?>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">
		<a href="index.php"><label> Home </label></a> > Detail
        <!-- /top tiles -->
        <br />

  <div class="clearfix"></div>
  <div class="row">
  <div class="x_panel" style="">
                <div class="x_title">
					<h2>Detail</h2>
				  <div class="clearfix"></div>
                </div>
                <div class="x_content">
				
                <div class="col-md-9">
				
				<p class="text-muted well well-sm no-shadow" style="margin-top: 5px;">
                <label class="col-md-3">LOCATION : <strong><?php echo $location;?> </strong> </label>
				<label class="col-md-3">AUCTION DAY : <strong><?php echo $tgl;?> </strong> </label>
				<label class="col-md-3">NO POLISI : <strong><?php echo $nopol;?> </strong></label>
				<br>
                </p>
				
	
					<div class="col-md-5">
					
				
					<img class="mySlides" src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/1.jpg" style="width:100%" onerror="this.src='upload/error.png'">
					<img class="mySlides" src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/2.jpg" style="width:100%" onerror="this.src='upload/error.png'">
					<img class="mySlides" src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/3.jpg" style="width:100%" onerror="this.src='upload/error.png'">
					<img class="mySlides" src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/4.jpg" style="width:100%" onerror="this.src='upload/error.png'">
					<img class="mySlides" src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/5.jpg" style="width:100%" onerror="this.src='upload/error.png'">
					<img class="mySlides" src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/6.jpg" style="width:100%" onerror="this.src='upload/error.png'">
					<img class="mySlides" src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/7.jpg" style="width:100%" onerror="this.src='upload/error.png'">
					<img class="mySlides" src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/8.jpg" style="width:100%" onerror="this.src='upload/error.png'">
					<img class="mySlides" src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/9.jpg" style="width:100%" onerror="this.src='upload/error.png'">
					<img class="mySlides" src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/10.jpg" style="width:100%" onerror="this.src='upload/error.png'">
					<img class="mySlides" src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/11.jpg" style="width:100%" onerror="this.src='upload/error.png'">

					<a class="w3-btn-floating" style="position:absolute;top:50%;left:0" onclick="plusDivs(-1)"><i class="fa fa-arrow-circle-left"></i></a>
					<a class="w3-btn-floating" style="position:absolute;top:50%;right:0" onclick="plusDivs(1)"><i class="fa fa-arrow-circle-right"></i></a>

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
					  if (n < 1) {slideIndex = x.length}
					  for (i = 0; i < x.length; i++) {
						 x[i].style.display = "none";
					  }
					  x[slideIndex-1].style.display = "block";
					}
					</script>
																																												
					</div>
					<div class="col-md-6">
					<table class="table">
					<tr>
						<td><strong>MAKE</strong></td>
						<td><?php echo $make;?></td>
						<td><strong>YEAR</strong></td>
						<td><?php echo $year;?></td>
					</tr>
					<tr>
						<td><strong>SERIES</strong></td>
						<td><?php echo $seri;?></td>
						<td><strong>MODEL</strong></td>
						<td><?php echo $model;?></td>
					
					</tr>
					<tr>
						<td><strong>CYLINDER</strong></td>
						<td><?php echo $cl;?></td>
						<td><strong>KM</strong></td>
						<td><?php echo $km;?></td>
					</tr>
					<tr>
						<td><strong>GRADE</strong></td>
						<td><?php echo $gr;?></td>
						<td><strong>COLOR</strong></td>
						<td><?php echo $json[$i]['auc_color'];?></td>
					</tr>
					<tr>
						<td><strong>MISSION</strong></td>
						<td><?php echo $trans;?></td>
						<td><strong>NOTES</strong></td>
						<td><?php echo $json[$i]['description'];?></td>
					</tr>
					
					</table>
					</div>
				
				</div>
				<div class="col-md-3">
					  <button class="btn btn-dark btn-sm" onclick="location.href = 'map_seller.php';">Back To Market Price</button>
				     <div class="x_panel">
					 <?php 
							$url_score="http://www.ibid.co.id/api/map/get_score.php?id=$id";
							$content_score=file_get_contents($url_score);  // add your url which contains json file
							$json_score = json_decode($content_score, true);
							$count_score=count($json_score);
										for($i=0;$i<$count_score;$i++)
										{ ?>
											<div class="x_title">
											  <h2>SCORE TOTAL</h2>
											  <h2 class="pull-right"><?php if (!empty($json_score[$i]['score'])){echo $json_score[$i]['score'];}else{ echo '-';}?></h2>
											  <div class="clearfix"></div>
											</div>
											<div class="x_content">
											<div class="col-md-10">
											<h4>INTERIOR</h4>
											<h4>EXTERIOR</h4>
											<h4>FRAME</h4>
											<h4>ENGINE</h4>
											</div>
											<div class="col-md-2">
												<h4><?php  if (!empty($json_score[$i]['interior'])){echo $row['interior'];}else{ echo '-';}?></h4>
												<h4><?php  if (!empty($row['exterior'])){echo $row['exterior'];}else{ echo '-';}?></h4>
												<h4><?php  if (!empty($row['frame'])){echo $row['frame'];}else{ echo '-';}?></h4>
												<h4><?php  if (!empty($row['engine'])){echo $row['engine'];}else{ echo '-';}?></h4>
												
											</div>
											</div>
										<?php }?>	
					</div>
					
					
					<table class="table">
					<tr>
					<td>START PRICE</td>
					<td><?php echo number_format($json[$i]['minimum_bid']);?></td>
					</tr>
					<tr>
					<td>MARKET PRICE</td>
					<td><?php 
					echo number_format($json[$i]['minimum_bid']);?> ~ <?php echo number_format($json[$i]['current_bid']);?></td>
					</tr>
					</table>
                </div>
		
				<div class="row">
					<div class="col-md-4">
				
						<a href="#" id="pop" class="hidden">
							<img id="imageresource" src="http://patyshibuya.com.br/wp-content/uploads/2014/04/04.jpg" style="width: 400px; height: 264px;">
						</a>
						<p>
							<button type="button" class="btn btn-default" id="myBtn"><img   src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/1.jpg" height="100px" width="145px" onerror="this.src='upload/error.png'"></button>
						 	<button type="button" class="btn btn-default" id="myBtn1"><img  src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/2.jpg" height="100px" width="145px" id="mydetail" onerror="this.src='upload/error.png'"></button>
							</p>
							<p>
							<button type="button" class="btn btn-default" id="myBtn2"><img  src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/3.jpg" height="100px" width="145px" id="mydetail" onerror="this.src='upload/error.png'"></button>
						 	<button type="button" class="btn btn-default" id="myBtn3"><img  src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/4.jpg" height="100px" width="145px" id="mydetail" onerror="this.src='upload/error.png'"></button>
							</p>
							<p>
							<button type="button" class="btn btn-default" id="myBtn4"><img  src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/5.jpg" height="100px" width="145px" id="mydetail" onerror="this.src='upload/error.png'"></button>
						 	<button type="button" class="btn btn-default" id="myBtn5"><img  src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/6.jpg" height="100px" width="145px" id="mydetail" onerror="this.src='upload/error.png'"></button>
						 	</p>
							<p>
							<button type="button" class="btn btn-default" id="myBtn6"><img  src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/7.jpg" height="100px" width="145px" id="mydetail" onerror="this.src='upload/error.png'"></button>
						 	<button type="button" class="btn btn-default" id="myBtn7"><img  src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $item; ?>/img/photo/8.jpg" height="100px" width="145px" id="mydetail" onerror="this.src='upload/error.png'"></button>
							</p>
						
					</div>
					<div class="col-md-8">
					<object style="width: 370px; height: 500px" data="http://eauction.ibid.co.id/blue-t/PDFShare/<?php echo $item;?>/inspection.pdf#page=2"
					type="application/pdf"></object>
					<object style="width: 370px; height: 500px" data="http://eauction.ibid.co.id/blue-t/PDFShare/<?php echo $item;?>/inspection.pdf#page=1"
					type="application/pdf"></object>
					
					</div>
              </div>
			  
			</div>
          <div class="row">
		  <div class="col-md-6">
			<button class="btn btn-success btn-block" type="button" onclick="location.href = 'map_buyer.php';">Check Market Database</button>
			</div>
		  <div class="col-md-6">
			<button class="btn btn-success btn-block" type="button" onclick="location.href = '#';">Watch List</button>	
          </div>
		  </center>
		  </div>
			<?php 
									}
							
					?>	  
		<div class="row hidden">
		<div class="x_panel">
			 <div class="x_title">
					<h2>Related Vehicle List</h2>
				  <div class="clearfix"></div>
                </div>
                <div class="x_content">
			
			<div class="container-fluid my-own-class">
			<div class="row">
			<div class="col-md-1">
			<img src="upload/1.jpg" width="140px" height="100px"><br>
			<label><center>TOYOTA AVANZA 1.5 G<br>2015 WHITE 15,000</center></label>
			</div>
		
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			
			</div>
			
			</div>
		</div>	
        </div>
        <!-- footer content -->

        <footer>
          <div class="copyright-info">
            <p class="pull-right">PT. Serasi Auto Raya  <a href="https://ibid.co.id">2016</a>  
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <!-- /page content -->

    </div>

  </div>

   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Preview</h4>
        </div>
        <div class="modal-body">
          <img src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $id_item; ?>/img/photo/1.jpg" width="100%" width="100%">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
    <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Preview</h4>
        </div>
        <div class="modal-body">
          <img src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $id_item; ?>/img/photo/2.jpg" width="100%" width="100%" onerror="this.src='upload/error.png'">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Preview</h4>
        </div>
        <div class="modal-body">
          <img src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $id_item; ?>/img/photo/3.jpg" width="100%" width="100%" onerror="this.src='upload/error.png'">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Preview</h4>
        </div>
        <div class="modal-body">
          <img src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $id_item; ?>/img/photo/4.jpg" width="100%" width="100%" onerror="this.src='upload/error.png'">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Preview</h4>
        </div>
        <div class="modal-body">
          <img src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $id_item; ?>/img/photo/5.jpg" width="100%" width="100%" onerror="this.src='upload/error.png'">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Preview</h4>
        </div>
        <div class="modal-body">
          <img src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $id_item; ?>/img/photo/6.jpg" width="100%" width="100%" onerror="this.src='upload/error.png'">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <div class="modal fade" id="myModal6" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Preview</h4>
        </div>
        <div class="modal-body">
          <img src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $id_item; ?>/img/photo/7.jpg" width="100%" width="100%" onerror="this.src='upload/error.png'">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <div class="modal fade" id="myModal7" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Preview</h4>
        </div>
        <div class="modal-body">
          <img src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $id_item; ?>/img/photo/8.jpg" width="100%" width="100%" onerror="this.src='upload/error.png'">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
      </div>
      <div class="modal-body">
        <img src="" id="imagepreview" style="width: 400px; height: 264px;" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  
  <script src="js/bootstrap.min.js"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="js/gauge/gauge.min.js"></script>
  <script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="js/chartjs/chart.min.js"></script>

  <script src="js/custom.js"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="js/flot/date.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>

  <script>
	$(document).ready(function(){
		$("#myBtn").click(function(){
			$("#myModal").modal();
		});
		$("#myBtn1").click(function(){
			$("#myModal1").modal();
		});
		$("#myBtn2").click(function(){
			$("#myModal2").modal();
		});
		$("#myBtn3").click(function(){
			$("#myModal3").modal();
		});
		$("#myBtn4").click(function(){
			$("#myModal4").modal();
		});
		$("#myBtn5").click(function(){
			$("#myModal5").modal();
		});
		$("#myBtn6").click(function(){
			$("#myModal6").modal();
		});
		$("#myBtn7").click(function(){
			$("#myModal7").modal();
		});
			$("#pop").on("click", function() {
   $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
	});
</script>

  <!-- worldmap -->
  <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
 <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });

          });
          TableManageButtons.init();
		  
    });

        </script>
  <!-- skycons -->



  <!-- dashbord linegraph -->
  
  <!-- /dashbord linegraph -->
  <!-- datepicker -->

  <script>
    NProgress.done();
  </script>
  <!-- /datepicker -->
  <!-- /footer content -->
</body>

</html>
