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
include('class/general.php');
include('include/connection.php');
include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');
$id=$_GET['id'];
$location=$_GET['location'];
$tgl=$_GET['tgl'];
$total=$_GET['lot'];
$update=$_GET['update'];
$loc=$_GET['loc'];
$b=$_GET['mulai'];
$c=$_GET['sampai'];
$halaman=($total%20);
$jml_halaman=$halaman;

//paging


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
		<a href="index.php"><label> Home </label></a> > <a href="auction_schedule.php">Auction Schedule </a>> Lot List 
        <!-- /top tiles -->
        <br />

  <div class="clearfix"></div>
  <div class="row">
  <div class="x_panel" style="">
                <div class="x_title">
                 <h2>Lot List</h2>
                <div class="clearfix"></div>
				<div class="col-md-10">
				<p class="text-muted well well-sm no-shadow" style="margin-top: 5px;">
                <label class="col-md-3">LOCATION : <strong><?php echo $location;?> </strong> </label>
				<label class="col-md-3">AUCTION DAY: <strong><?php echo konversi_tanggal('d-m-Y',$tgl);?></strong></label>
				<label class="col-md-3">TOTAL CARS : <strong><?php echo $total;?> </strong></label>
				<label class="col-md-3">LAST UPDATES : <strong><?php echo konversi_tanggal("d-m-Y",$update);?></strong></label>
				<br>
                </p>
				<label class="col-md-12"><strong><?php echo $loc;?> </strong> </label>
				
				</div>
				<div class="col-md-2">
				<a href="auction_schedule.php"><p class="text-muted well well-sm no-shadow btn btn-default" style="margin-top: 5px;">
				Back To Schedule
				</p></a>
				</div>
				<div class="clearfix"></div>
                </div>
                <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th width="15%"><center>PHOTO</center></th>
                              <th width="10%"><center>LOT NO<BR>NO POLISI</center></th>
                              <th width="5%"><center>YEAR</center></th>
                              <th width="15%"><center>MAKE SERIES<BR>CYLINDER GRADE</center></th>
                              <th width="10%"><center>AUCTION DAY KM</center></th>
                              <th width="10%"><center>COLOR</center></th>
							  <th width="5%"><center>MISSION<BR>FUEL</center></th>
                              <th width="5%"><center>GRADE</center></th>
                              <th width="10%"><center>START<BR>PRICE</center></th>
                              <th width="20%"><center>Action</center></th>
							  
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							//Item auction
							$url="http://www.ibid.co.id/api/map/get_lot.php?a=$id&b=$b&c=$c";
							$content=file_get_contents($url);  // add your url which contains json file
							$json= json_decode($content, true);
							$count=count($json);
							
							for($i=0;$i<$count;$i++)
							{	
								
											//$string = explode(' ',$json[$i]['title']);
											//$gr=preg_replace("/[^a-zA-Z]+/"," ",$string);
											//$gr = array_pop($gr);	
											//$make = $string[0];
											//$year=$json[$i]['auc_year'];
											//$seri=$string[1];
											//$model=$string[1];
											
											//$km='-';
											$item=$json[$i]['idauction_item'];
											$score=$json[$i]['score'];	
											$fuel=$json[$i]['fuel'];		
											$trans=$json[$i]['trans'];	
											//image
											$url_image="http://www.ibid.co.id/api/map/get_image.php?id=$item";
											$content_image=file_get_contents($url_image);  // add your url which contains json file
											$json_image= json_decode($content_image, true);
											//info detail
											$url_detail="http://www.ibid.co.id/api/map/get_detail.php?id=$item";
											$content_detail=file_get_contents($url_detail);  // add your url which contains json file
											$json_detail 	= json_decode($content_detail, true);

											$merk1	=$json_detail[0]['value']; //merk
											$seri1	=$json_detail[1]['value']; //seri
											$cc1	=$json_detail[2]['value']; //cilinder
											$gr1	=$json_detail[3]['value']; //grade
											$model	=$json_detail[5]['value']; //model
											$comment=$json_detail[6]['comment']; 
											$trans	=$json_detail[7]['value']; //trans
											$fuel	=$json_detail[8]['value']; //bahanbakar
											$year	=$json_detail[9]['value']; //tahun
											$nopol	=$json_detail[10]['value']; //nopol
											$clr	=$json_detail[23]['value']; //warna
											$km		=$json_detail[18]['value'];
											
							?>
							<tr>
                              <td><center><img class="mySlides" src="<?php echo $json_image[0]['image_path'];?>" style="width:50%" onerror="this.src='upload/error.png'"></center></td>
                              <td align="center" vertical-align="middle"><?php echo $json[$i]['auc_seq'];?><br><?php echo $json[$i]['subtitle'];?></td>
                              <td align="center" valign="middle"><?php echo $year;?></td>
                              <td align="center" valign="middle"><?php echo $json[$i]['title'];?></td>
                              <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$tgl);?><br><?php echo $km;?></td>
                              <td align="center" valign="middle"><?php echo $clr;?></td>
							  <td align="center" valign="middle"><?php echo $trans;?><br><?php echo $fuel;?></td>
                              <td align="center" valign="middle"><?php echo $score;?></td>
                              <td align="center" valign="middle"><?php echo number_format($json[$i]['minimum_bid']);?></td>
                              <td align="center" valign="middle">
							  <div class="btn-group">
							  <a href="auction_schedule_item_detail.php?lot=<?php echo $json[$i]['auc_seq'];?>&bid=<?php echo number_format($json[$i]['minimum_bid']);?>&loc=<?php echo $location?>&tgl=<?php echo $tgl?>&nopol=<?php echo $json[$i]['auc_nopol']; ?>&id=<?php echo $id;?>&item=<?php echo $json[$i]['idauction_item'];?>" target="_blank" class="btn btn-sm btn-success btn-xs">Check  <br> MPD </a>
							  <a href=""><label class="btn btn-sm btn-success btn-xs">Add Watch<br>0</label></td>
							  </div>	
							 </tr>
                            <?php }?>
                            
                          </tbody>
                        </table>
					<center>
					<div class="btn-group hidden">
                      <button class="btn btn-default" type="button"><< Previous</button>
                      <button class="btn btn-default" type="button"><?php echo $halaman;?></button>
                      <button class="btn btn-default" type="button">Next >></button>
                    </div>
					</center>
			</div>
          <div class="row">
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

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
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
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
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
