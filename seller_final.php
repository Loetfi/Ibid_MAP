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
include('class/general.php');
include('include/connection.php');
include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');
$uid=$_SESSION['uid'];
if (isset($_GET['make'])){
	$week1=$_GET['week'];
	$make=$_GET['make'];
	$model=$_GET['model'];
	$tahun1=$_GET['tahun1'];
	$tahun2=$_GET['tahun2'];
	$km1=$_GET['km1'];
	$km2=$_GET['km2'];
	$cc=$_GET['cc'];
	$warna=$_GET['warna'];	
	$gr=$_GET['gr'];
	$sc=$_GET['sc'];
	$loc=$_GET['loc'];
}else{
	$week1=0;
	$make='';
	$model='';
	$tahun1='';
	$tahun2='';
	$km1='';
	$km2='';
	$cc='';
	$warna='';	
	$gr='';
	$sc='';
	$loc='';	
}


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
		<a href="index.php"><label> Home </label></a> > <a href="dasboard_seller.php">Dasboard</a>> Viehicle Final Inspection
        <!-- /top tiles -->
        <br />

  <div class="clearfix"></div>
  <div class="row">
  <div class="x_panel" style="">
                <div class="x_title">
                
				<div class="clearfix"></div>
				<div class="col-md-2 hidden">
				<a href="dasboard_seller.php"><p class="text-muted well well-sm no-shadow btn btn-default pull-right" style="margin-top: 5px;">
				Back To Dasboard
				</p></a>
				</div>
				<div class="clearfix"></div>
                </div>
                <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
							  <th width="10%"><center>MARKET<BR>PRICE</center></th>
							 
							  
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							//Item auction
							if (isset($_GET['make'])){
								$qitem="select * from map_seller_register where merk='$make' and seri='$model' and cylinder='$cc' and grade='$gr' and auc_location='$loc' and (year between '$tahun1' and '$tahun2') and (km between '$km1' and '$km2')  and color='$warna' and score='$sc' order by id limit 100";
								
								$q1="select min(final_price) as price1 from map_seller_register where merk='$make' and seri='$model' and cylinder='$cc' and grade='$gr' and auc_location='$loc' and (year between '$tahun1' and '$tahun2') and (km between '$km1' and '$km2')  and color='$warna' and score='$sc' order by id limit 100";
								$r1=mysql_query($q1);
								$rs1=mysql_fetch_array($r1);
								
								$q2="select max(final_price) as price2 from map_seller_register where merk='$make' and seri='$model' and cylinder='$cc' and grade='$gr' and auc_location='$loc' and (year between '$tahun1' and '$tahun2') and (km between '$km1' and '$km2')  and color='$warna' and score='$sc' order by id limit 100";
								$r2=mysql_query($q2);
								$rs2=mysql_fetch_array($r2);
								$harga1=$rs1['price1'];
								$harga2=$rs2['price2'];
							}else{
								$qitem="select * from map_seller_register order by id limit 100";
								$harga1=0;
								$harga2=0;
							}
							$ritem=mysql_query($qitem);
							while ($result=mysql_fetch_array($ritem)){
							$id_item=$result['idauction_item'];
						
							
							
							?>
							<tr>
                              <td><center><img class="mySlides" src="http://eauction.ibid.co.id/blue-t/ImageShare/<?php echo $id_item; ?>/img/photo/1.jpg" style="width:50%" onerror="this.src='upload/error.png'"></center></td>
                              <td align="center" vertical-align="middle"><?php echo $result['auc_location'];?></td>
                              <td align="center" valign="middle"><?php echo $result['year'];?></td>
                              <td align="center" valign="middle"><?php echo $result['merk'];?><br><?php echo $result['seri'];?><br><?php echo $result['cylinder'];?><br><?php echo $result['grade'];?></td>
                              <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$result['auc_date']);?><br><?php echo number_format($result['km']);?></td>
                              <td align="center" valign="middle"><?php echo $result['color'];?></td>
							  <td align="center" valign="middle"><?php echo $result['mission'];?><br><?php echo $result['fuel'];?></td>
                              <td align="center" valign="middle"><?php echo $result['score'];?></td>
						      <td align="center" valign="middle"><?php echo number_format($result['price']);?></td>
							  <td align="center" valign="middle"><a href="auction_item_detail_seller.php?id=<?php echo $id_item;?>&item=<?php echo $id_item;?>"><?php echo number_format($harga1);?> ~ <?php echo number_format($harga2);?></a></td>
                         	
							 </tr>
                            <?php }?>
                            
                          </tbody>
                        </table>
			
                </div>
              </div>
			  
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
