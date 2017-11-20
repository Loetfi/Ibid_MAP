<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include('class/general.php');
include('include/connection.php');
include('include/fungsi.php');
//history
//$user=$_SESSION['username'];
$uid=$_SESSION['uid'];

$qreg="select * from webid_auctios_ite";

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
		<a href="index.php"><label> Home </label></a> > Dasboard
        <!-- /top tiles -->
        <br />

  <div class="clearfix"></div>
  <div class="row">
  <div class="x_panel" style="">
                <div class="x_title">
                  <h2>Dasboard (for Seller)</h2>
                  <div class="clearfix"></div>
                </div>
				<H2>Welcome back <strong><?php echo $_SESSION['name'];?> </strong></H1>
				<div class="x_content">
                <div class="col-md-5 col-sm-5 col-xs-5">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Your car status</h2>
				  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
			
              

                  <table class="table">
                    <tbody>
                      <tr class="even pointer">
                        <td class=" ">Vehicle Registred</td>
                        <td class=" ">128</td>
                        <td class=" "><a href="seller_register.php?id=<?php echo $uid;?>"><label class="btn btn-xs btn-success pull-right">View All</label></a></td>
                  
                      </tr>
                      <tr class="odd pointer">
                        <td class=" ">Initial Inspection</td>
                        <td class=" ">50</td>
                       <td class=" "><a href="seller_initial.php?id=<?php echo $uid;?>"><label class="btn btn-xs btn-success pull-right">View All</label></a></td>
                      </tr>
                      <tr class="even pointer">
                        <td class=" ">Final Inspection</td>
                        <td class=" ">12</td>
                       <td class=" "><a href="seller_final.php?id=<?php echo $uid;?>"><label class="btn btn-xs btn-success pull-right">View All</label></a></td>
                    
                      </tr>
                             <tr class="even pointer">
                        <td class=" ">Vehicles for Upcoming Auction</td>
                        <td class=" ">128</td>
                       <td class=" "><a href="seller_waiting.php?id=<?php echo $uid;?>"><label class="btn btn-xs btn-success pull-right">View All</label></a></td>
                      </tr>
                      <tr class="odd pointer">
                        <td class=" ">Auctioned</td>
                        <td class=" ">20</td>
                      <td class=" "><a href="seller_auction.php?id=<?php echo $uid;?>"><label class="btn btn-xs btn-success pull-right">View All</label></a></td>
                       
                      </tr>
                      <tr class="even pointer">
                        <td class=" ">Past Sold Vehicles within 30 days</td>
                        <td class=" ">10</td>
                       <td class=" "><a href="seller_sold.php?id=<?php echo $uid;?>"><label class="btn btn-xs btn-success pull-right">View All</label></a></td>
                    
                      </tr>
                    </tbody>

                  </table>
                
             
      
                </div>
              </div>
            </div>
			<div class="col-md-7 col-sm-7 col-xs-7">
			  <div class="x_title">
                  <h2>Menu For Sellers</h2>
                  <div class="clearfix"></div>
				  <button class="btn btn-default btn-block" onclick="location.href = 'map_seller.php';">Check Market Price DB</button>
                </div>
              <div class="x_panel">
              
				  <div class="x_title">
                  <h2>Your Consignment</h2>
                  <div class="clearfix"></div>
				  
                </div>
                <div class="x_content">
                  <br />
                <div class="col-md-6">
				<button class="btn btn-default btn-block" onclick="location.href = 'seller_register.php?id=<?php echo $uid;?>';">Vehicles Registred</button>
				<button class="btn btn-default btn-block" onclick="location.href = 'seller_final.php?id=<?php echo $uid;?>';">Vehicles Inspected</button>
				<button class="btn btn-default btn-block" onclick="location.href = 'seller_auction.php?id=<?php echo $uid;?>';">Auctioned</button>
				</div>
                <div class="col-md-6">
				<button class="btn btn-default btn-block" onclick="location.href = 'seller_initial.php?id=<?php echo $uid;?>';">Vehicles Initiated Inspected</button>
				<button class="btn btn-default btn-block" onclick="location.href = 'seller_waiting.php?id=<?php echo $uid;?>';">Vehicles Waiting Auction</button>
				<button class="btn btn-default btn-block" onclick="location.href = 'seller_sold.php?id=<?php echo $uid;?>';">Past Sold Vehicles</button>
				
				</div>
				
                </div>
              </div>
			  <div class="col-md-6">
			   <button class="btn btn-default btn-block" onclick="location.href = 'seller_seting.php?id=<?php echo $uid;?>';">Account Setting</button>
			  </div>
			  <div class="col-md-6">
			  <button class="btn btn-default btn-block" onclick="location.href = 'seller_fave.php?id=<?php echo $uid;?>';">Favorite Setting</button>
			  </div>		
				
            </div>
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
  <script>
    $(function() {
      $('#world-map-gdp').vectorMap({
        map: 'world_mill_en',
        backgroundColor: 'transparent',
        zoomOnScroll: false,
        series: {
          regions: [{
            values: gdpData,
            scale: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
          }]
        },
        onRegionTipShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
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
