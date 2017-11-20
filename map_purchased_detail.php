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
include('include/connection.php');
include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');

$id=$_GET['id'];
$item=$_GET['item'];




$url="http://www.ibid.co.id/api/map/get_detail.php?id=$item";
$content=file_get_contents($url);  // add your url which contains json file
$json 	= json_decode($content, true);

$merk1	=$json[0]['value']; //merk
$seri1	=$json[1]['value']; //seri
$cc1	=$json[2]['value']; //cilinder
$gr1	=$json[3]['value']; //grade
$model	=$json[5]['value']; //model
$comment=$json[6]['comment']; 
$trans	=$json[7]['value']; //trans
$fuel	=$json[8]['value']; //bahanbakar
$year	=$json[9]['value']; //tahun
$nopol	=$json[10]['value']; //nopol
$clr	=$json[23]['value']; //warna
if ($json[18]['value']){
$km		=$json[18]['value'];
}else{
		$km	='-';
}

//lot schedule
$url_lot="http://www.ibid.co.id/api/map/get_lot_detail.php?a=$id&b=$item";
$content_lot=file_get_contents($url_lot);  // add your url which contains json file
$json_lot = json_decode($content_lot, true);	

//score
$urls="http://www.ibid.co.id/api/map/get_score.php?id=$item";
$contents=file_get_contents($urls);  // add your url which contains json file
$jsons = json_decode($contents, true);	


//merk
$url="http://www.ibid.co.id/api/map/merk.php?id=$merk1";
$content=file_get_contents($url);  // add your url which contains json file
$json = json_decode($content, true);	
$make=$json[0]['merk'];	

//seri
$url="http://www.ibid.co.id/api/map/seri.php?id=$seri1";
$content=file_get_contents($url);  // add your url which contains json file
$json = json_decode($content, true);	
$seri=$json[0]['seri'];	

//cc
$url="http://www.ibid.co.id/api/map/cc.php?id=$cc1";
$content=file_get_contents($url);  // add your url which contains json file
$json = json_decode($content, true);	
$cl=$json[0]['cc'];	

//grade
$url="http://www.ibid.co.id/api/map/grade.php?id=$gr1";
$content=file_get_contents($url);  // add your url which contains json file
$json = json_decode($content, true);	
$gr=$json[0]['grade'];	

//image
$url_image="http://www.ibid.co.id/api/map/get_image.php?id=$item";
$content_image=file_get_contents($url_image);  // add your url which contains json file
$json_image= json_decode($content_image, true);

//location
$url_location="http://www.ibid.co.id/api/map/get_jadwal_detail.php?id=$id";
$content_location=file_get_contents($url_location);  // add your url which contains json file
$json_location= json_decode($content_location, true);

					
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
    <link rel="stylesheet" type="text/css" href="jquery.simpleLens.css">
    <link rel="stylesheet" type="text/css" href="jquery.simpleGallery.css">
	    <link href="css/plugins/slick/slick.css" rel="stylesheet">
    <link href="css/plugins/slick/slick-theme.css" rel="stylesheet">
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
												<a href="map_lot_list.php">Lot List</a>
											</li>
											<li class="active">
												<strong>Detail</strong>
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
										<div class="form-group col-md-2">
											<label>Police No :</label>
											<label><?php echo $nopol;?></label>
										</div>
										<div class="form-group col-md-2">
											<label>Lot No :</label>
											<label><?php echo $json_lot[0]['auc_seq'];?></label>
										</div>
										<div class="form-group col-md-2">
											<label>Location :</label>
											<label><?php echo $json_location[0]['schedule_kota'];?></label>
										</div>
										<div class="form-group col-md-3">
											<label>Auction Day :</label>
											<label><?php echo $json_location[0]['schedule_date'];?></label>
										</div>
										
										<div class="form-group col-md-3">
											<label>Last Update :</label>
											<label><?php echo $json_location[0]['date_edit'];?></label>
										</div>
								
								</form>
								<?php }?>
							</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
					<article class="col-md-12">
					<div class="simpleLens-gallery-container" id="demo-1">
						<div class="simpleLens-container">
							<div class="simpleLens-big-image-container">
								<a class="simpleLens-lens-image" data-lens-image="<?php echo $json_image[0]['image_path'];?>">
									<img src="<?php echo $json_image[0]['image_path'];?>" class="simpleLens-big-image"  onerror="this.src='error.png'">
								</a>
							</div>
						</div>
					
						<div class="simpleLens-thumbnails-container">
							<a href="#" class="simpleLens-thumbnail-wrapper"
							   data-lens-image="<?php echo $json_image[0]['image_path'];?>"
							   data-big-image="<?php echo $json_image[0]['image_path'];?>">
								<img src="<?php echo $json_image[0]['image_path'];?>"  height="150px" width="160px" onerror="this.src='error.png'">
							</a>

							<a href="#" class="simpleLens-thumbnail-wrapper"
							   data-lens-image="<?php echo $json_image[1]['image_path'];?>"
							   data-big-image="<?php echo $json_image[1]['image_path'];?>">
								<img src="<?php echo $json_image[1]['image_path'];?>" height="150px" width="160px" onerror="this.src='error.png'">
							</a>

							<a href="#" class="simpleLens-thumbnail-wrapper"
							   data-lens-image="<?php echo $json_image[2]['image_path'];?>"
							   data-big-image="<?php echo $json_image[2]['image_path'];?>">
								<img src="<?php echo $json_image[2]['image_path'];?>" height="150px" width="160px" onerror="this.src='error.png'">
							</a>
							<a href="#" class="simpleLens-thumbnail-wrapper"
							   data-lens-image="<?php echo $json_image[3]['image_path'];?>"
							   data-big-image="<?php echo $json_image[3]['image_path'];?>">
								<img src="<?php echo $json_image[3]['image_path'];?>" height="150px" width="160px" onerror="this.src='error.png'">
							</a>
									<a href="#" class="simpleLens-thumbnail-wrapper"
							   data-lens-image="<?php echo $json_image[4]['image_path'];?>"
							   data-big-image="<?php echo $json_image[4]['image_path'];?>">
								<img src="<?php echo $json_image[4]['image_path'];?>" height="150px" width="160px" onerror="this.src='error.png'">
							</a>

							<a href="#" class="simpleLens-thumbnail-wrapper"
							   data-lens-image="<?php echo $json_image[5]['image_path'];?>"
							   data-big-image="<?php echo $json_image[5]['image_path'];?>">
								<img src="<?php echo $json_image[5]['image_path'];?>" height="150px" width="160px" onerror="this.src='error.png'">
							</a>

							<a href="#" class="simpleLens-thumbnail-wrapper"
							   data-lens-image="<?php echo $json_image[6]['image_path'];?>"
							   data-big-image="<?php echo $json_image[6]['image_path'];?>">
								<img src="<?php echo $json_image[6]['image_path'];?>" height="150px" width="160px" onerror="this.src='error.png'">
							</a>
							<a href="#" class="simpleLens-thumbnail-wrapper"
							   data-lens-image="<?php echo $json_image[7]['image_path'];?>"
							   data-big-image="<?php echo $json_image[7]['image_path'];?>">
								<img src="<?php echo $json_image[7]['image_path'];?>" height="150px" width="160px" onerror="this.src='error.png'">
							</a>
					
							
						</div>
						
					</div>
					</article>
					</div>
					
					 <div class="col-sm-5">
                      <table class="table">
							<tr>
								<td><strong>Make</strong></td>
								<td>
								<?php 
								echo $make;
								?></td>
								<td><strong>Year</strong></td>
								<td><?php echo $year;?></td>
							</tr>
							<tr>
								<td><strong>Series</strong></td>
								<td><?php echo $seri;?></td>
								<td><strong>Km</strong></td>
								<td><?php echo $km;?></td>
								
							
							</tr>
							<tr>
								<td><strong>Cylinder</strong></td>
								<td><?php echo $cl;?></td>
								<td><strong>Model</strong></td>
								<td><?php echo $model;?></td>
							</tr>
							<tr>
								<td><strong>Grade</strong></td>
								<td><?php echo $gr;?></td>
								<td><strong>Colour</strong></td>
								<td><?php echo $clr;?></td>
							</tr>
							<tr>
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
					
					<div class="col-md-3">
					 <button class="btn btn-dark btn-sm hidden" onclick="location.href = 'map_schedule_list.php?id=<?php echo $id;?>';">Back To List</button>
							<div class="ibox float-e-margins">
							<div class="ibox-title">
									<h5>Score Total</h5>
									<h5 class="pull-right"><?php if (!empty($jsons[0]['score'])){$score=$jsons[0]['score'];echo $jsons[0]['score'];}else{ echo '-';}?></h5>
							</div>
							<div class="ibox-content">
							<div class="col-md-10">
								<h4>Interior</h4>
								<h4>Exterior</h4>
								<h4>Frame</h4>
								<h4>Engine</h4>
							</div>
							<div class="col-md-2">
								<h4><?php  if (!empty($jsons[0]['interior'])){echo $jsons[0]['interior'];}else{ echo '-';}?></h4>
								<h4><?php  if (!empty($jsons[0]['exterior'])){echo $jsons[0]['exterior'];}else{ echo '-';}?></h4>
								<h4><?php  if (!empty($jsons[0]['frame'])){echo $jsons[0]['frame'];}else{ echo '-';}?></h4>
								<h4><?php  if (!empty($jsons[0]['engine'])){echo $jsons[0]['engine'];}else{ echo '-';}?></h4>
							</div>
							</div>
						
						
						<table class="table">
						<tr>
						<td>Start Price</td>
						<td><?php echo number_format($json_lot[0]['minimum_bid']);?></td>
						</tr>
						<tr>
						<td>Market Price</td>
						<td><?php 
						echo '~';?></td>
						</tr>
						</table>
					
					</div>
					

					</div>
					<div>
					
					</div>
                <div class="col-md-8">
					<object style="width: 370px; height: 500px" data="http://eauction.ibid.co.id/blue-t/PDFShare/<?php echo $item;?>/inspection.pdf#page=2"
					type="application/pdf"></object>
					<object style="width: 370px; height: 500px" data="http://eauction.ibid.co.id/blue-t/PDFShare/<?php echo $item;?>/inspection.pdf#page=1"
					type="application/pdf"></object>
				</div>
				<div class="row col-md-12 center">
                <div class="col-md-6">
				<a href="map_buyer.php"><label class="btn btn-primary btn-block">Check Marketprice</label>
				</div>
				<div class="col-md-6">
				<label class="btn btn-primary btn-block">Watch List </label>
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
									 $url="http://www.ibid.co.id/api/map/get_relasi.php?title=$make";
									$content=file_get_contents($url);
									$json= json_decode($content, true);
									$count=count($json);
									for($i=0;$i<$count;$i++)
										{
										$id_r=$json[$i]['id_schedule'];
										$item_r=$json[$i]['idauction_item'];
									?>
									<div>
											<div class="ibox-content">
												<img src="<?php echo $json[$i]['photo'];?>" width="150px" height="100px" onerror="this.src='upload/error.png'">
												<p>
													<?php echo '<a href="?id='.$id_r.'&item='.$item_r.'"><center>'.$json[$i]['title'].'</center></a>';?>
												</p>
											</div>
									</div>
									<?php }?>	
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


    <script src="js/plugins/slick/slick.min.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity demo -->
    <script src="js/demo/peity-demo.js"></script>
	<script type="text/javascript" src="jquery.simpleGallery.js"></script>
<script type="text/javascript" src="jquery.simpleLens.js"></script>

<script>
    $(document).ready(function(){
        $('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
            loading_image: 'loading.gif'
        });

        $('#demo-1 .simpleLens-big-image').simpleLens({
            loading_image: 'loading.gif'
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#demo-2 .simpleLens-thumbnails-container img').simpleGallery({
            loading_image: 'loading.gif',
            show_event: 'click'
        });

        $('#demo-2 .simpleLens-big-image').simpleLens({
            loading_image: 'loading.gif',
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
                slidesToShow: 5,
                slidesToScroll: 1,
                centerMode: true,
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
