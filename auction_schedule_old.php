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
date_default_timezone_set('Asia/Jakarta');
include('class/general.php');
include('include/connection.php');
include('include/fungsi.php');
//search form
if (isset($_POST['kota'])){
	$kota=$_POST['kota'];
	$tanggal=$_POST['tanggal'];	
	$bulan=konversi_tanggal("M",$tanggal);
	$tahun=konversi_tanggal("Y",$tanggal);
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
	<script type="text/javascript">
	$("document").ready(function(){
		/* untuk letak url silahkan di sesuaikan dengan letak script di folder htdocs Anda */
		$.getJSON('http://localhost/ibid_corporate/api/getSchedule.php', { get_param: 'value' }, function(data) {
			$.each(data, function(index, element) {		
				/* mengisikan table dari hasil json */
				// alert(element.id);
				$('#tabledata').find('tbody')
					.append($('<tr>')
							.append(
								'<td>'+element.+'</td>'+
								'<td>'+element.kode+'</td>'+
								'<td>'+element.schedule_+'</td>'+
								'<td>'+element.schedule_date+'</td>'+
								'<td>'+element.schedule_officer+'</td>'+
								'<td>'+element.schedule_code+'</td>'+
								'<td>'+element.schedule_openhouse_start+'</td>'+
								'<td>'+element.schedule_openhouse_end+'</td>'
							)
					);
			});
		});		
	});
	</script>
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
		<a href="index.php"><label> Home </label></a> > Auction Schedule 
        <!-- /top tiles -->
        <br />

  <div class="clearfix"></div>
  <div class="row">
  <div class="x_panel" style="">
                <div class="x_title">
                 
                 <form action="auction_schedule.php" method="POST">
                  <div class="clearfix"></div>
					<div class="form-group">
                      <label class="control-label col-md-1 col-sm-2 col-xs-12">Location</label>
                      <div class="col-md-2 col-sm-3 col-xs-12">
                        <select id="kota" name="kota" class="form-control">
						<?php 
						if (isset($_POST['kota'])){
							echo '<option>'.$kota.'</option>';
						}
						?>
                          <?php 
						    // Kota
							$sql_kota ="SELECT distinct(schedule_kota) as kota FROM webid_schedule where sts_deleted='0'";
							$qry_kota=mysqli_query($konek,$sql_kota);
							while($row =mysqli_fetch_array($qry_kota)){
							
						  ?>
							<option value="<?php echo $row['kota'];?>"><?php echo $row['kota'];?></option>
                   
						  <?php }?>
                        </select>
		
						</div>
                        <label class="control-label col-md-1 col-sm-2 col-xs-12">Month</label>
                      <div class="col-md-2 col-sm-3 col-xs-12">
                        <select id="bulan" name="tanggal" class="form-control">
						<?php 
						if (isset($_POST['kota'])){
						  echo '<option value='.$tanggal.'>'.$bulan.' '.$tahun.'</option>';
						}						   
						   // Kota
							$sql_kota ="SELECT distinct(month(schedule_date)) as bulan,schedule_date FROM webid_schedule where sts_deleted='0' order by schedule_date";
							$qry_kota=mysqli_query($konek,$sql_kota);
							while($row =mysqli_fetch_array($qry_kota)){
						  ?>
							<option value="<?php echo $row['schedule_date'];?>"><?php echo konversi_tanggal("M",$row['schedule_date']);?> <?php echo konversi_tanggal("Y",$row['schedule_date']);?></option>
                   
						  <?php }?>
                        </select>
                      </div>
					<div>
					<button type="submit" class="btn btn-warning btn-default"><i class="fa fa-search"></i> Filter</button>
					<label class="btn btn-success btn-default"  onclick="location.href = 'auction_schedule.php';">All</label>
					</div>
					</div>
					</form>
				  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                          
                              <th width="10%"><center>Auction Day</center></th>
                              <th width="20%"><center>Location</center></th>
                              <th width="15%"><center>Open House</center></th>
                              <th width="10%"><center>Number Of Vehicles</center></th>
                              <th width="15%"><center>Last Update</center></th>
							</tr>
                          </thead>
                          <tbody>
						  <?php 
						  if (isset($_POST['kota'])){
								$kota=$_POST['kota'];
								$bulan=konversi_tanggal("m",$tanggal);
								$tahun=konversi_tanggal("Y",$tanggal);
								$qschedule="select * from webid_schedule where schedule_kota='$kota' and month(schedule_date)='$bulan' and year(schedule_date)='$tahun' and sts_deleted='0' order by schedule_date desc";
						  }else{
								$qschedule="select * from webid_schedule where sts_deleted='0' order by schedule_date desc";
						  }
						  $rschedule=mysqli_query($konek,$qschedule);
						  while ($result=mysqli_fetch_array($rschedule)){
						  ?>
                            <tr>
                              <td><img src="upload/ibid1.jpg" width="100%" height="50%"></td>
                              <td align="center" vertical-align="middle"><?php echo konversi_tanggal("d-m-Y",$result['schedule_date']);?></td>
                              <td align="center" valign="middle"><?php echo $result['schedule_kota'];?><br><?php echo $result['schedule_location'];?></td>
                              <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$result['schedule_openhouse_start']);?></td>
                              <td align="center" valign="middle"><a href="auction_schedule_list.php?id=<?php echo $result['schedule_id'];?>"><strong><?php echo $result['jenis_barang'];?></strong></a><br><button onclick="location.href='auction_schedule_list.php?id=<?php echo $result['schedule_id'];?>';">View</button></td>
                              <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$result['date_edit']);?><br><?php echo konversi_tanggal("H:i:s",$result['date_edit']);?></td>
                             </tr>
                            
						  <?php } ?>	
                            
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
