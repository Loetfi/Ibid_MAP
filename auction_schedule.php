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
date_default_timezone_set('Asia/Jakarta');
include('class/general.php');
include('include/connection.php');
include('include/fungsi.php');
//search form
if (isset($_GET['id']))
{
		$id=$_GET['id'];
		$bln=$_GET['bln'];
}else{
		$id=$_GET['1'];
		$bln=date('m');
}
$bln1=date('m');
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
		<a href="index.php"><label> Home </label></a> > Auction Schedule 
        <!-- /top tiles -->
        <br />

  <div class="clearfix"></div>
  <div class="row">
  <div class="x_panel" style="">
                <div class="x_title">
                 
                 <form action="#" method="GET">
                  <div class="clearfix"></div>
					<div class="form-group">
                      <label class="control-label col-md-1 col-sm-2 col-xs-12">Location</label>
                      <div class="col-md-2 col-sm-3 col-xs-12">
                        <select id="id" name="id" class="form-control">	
						<?php 
						    // Kota
							//$url="http://www.ibid.co.id/api/map/get_jadwal.php?kota=$kota&bln=$bln";
							$url_kota="http://www.ibid.co.id/api/map/get_cabang.php";
							
							$content_kota=file_get_contents($url_kota);  // add your url which contains json file
							$json_kota = json_decode($content_kota, true);
							$count=count($json_kota);
							for($i=0;$i<$count;$i++)
								{	?>
									<option value="<?php echo $json_kota[$i]['id_company'];?>" <?php if ($json_kota[$i]['id_company']==$_GET['id']){ echo 'selected';}?>><?php echo $json_kota[$i]['name_company'];?></option>	
								<?php }
						  ?>
						
						
                        </select>
		
						</div>
                        <label class="control-label col-md-1 col-sm-2 col-xs-12">Month</label>
                      <div class="col-md-2 col-sm-3 col-xs-12">
                        <select id="bln" name="bln" class="form-control">
						<option value="1"  <?php if ($_GET['bln']==1 OR $bln1==1){ echo 'selected';}?>>Januari <?php echo date('Y');?></option>
						<option value="2"  <?php if ($_GET['bln']==2 OR $bln1==2){ echo 'selected';}?>>Februari <?php echo date('Y');?></option>
						<option value="3"  <?php if ($_GET['bln']==3 OR $bln1==3){ echo 'selected';}?>>Maret <?php echo date('Y');?></option>
						<option value="4"  <?php if ($_GET['bln']==4 OR $bln1==4){ echo 'selected';}?>>April <?php echo date('Y');?></option>
						<option value="5"  <?php if ($_GET['bln']==5 OR $bln1==5){ echo 'selected';}?>>Mei <?php echo date('Y');?></option>
						<option value="6"  <?php if ($_GET['bln']==6 OR $bln1==6){ echo 'selected';}?>>Juni <?php echo date('Y');?></option>
						<option value="7"  <?php if ($_GET['bln']==7 OR $bln1==7){ echo 'selected';}?>>Juli <?php echo date('Y');?></option>
						<option value="8"  <?php if ($_GET['bln']==8 OR $bln1==8){ echo 'selected';}?>>Agustus <?php echo date('Y');?></option>
						<option value="9"  <?php if ($_GET['bln']==9 OR $bln1==9){ echo 'selected';}?>>September <?php echo date('Y');?></option>
						<option value="10" <?php if ($_GET['bln']==10 OR $bln1==10){ echo 'selected';}?>>Oktober <?php echo date('Y');?></option>
						<option value="11" <?php if ($_GET['bln']==11 OR $bln1==11){ echo 'selected';}?>>November <?php echo date('Y');?></option>
						<option value="12" <?php if ($_GET['bln']==12 OR $bln1==12){ echo 'selected';}?>>Desember <?php echo date('Y');?></option>
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
                             </tr>
                          </thead>
                          <tbody>
						  <?php 
							//Akses API Auction Schedule
							if (isset($_GET['id'])){
						    $url="http://www.ibid.co.id/api/map/get_jadwal.php?kota=$id&bulan=$bln";
							}else{
							 $url="http://www.ibid.co.id/api/map/get_jadwal.php";
							}
							$content=file_get_contents($url);  // add your url which contains json file
							$json = json_decode($content, true);
							$count=count($json);
							if ($count){
										for($i=0;$i<$count;$i++)
										{
											//$string = $json[$i]['kode_jadwal'];
											//$pieces = explode(' ', $string);
											//$kt=preg_replace("/[^a-zA-Z]+/", "", $pieces);
											//$kota = array_pop($kt);	
										?>
											<tr>
											  <td align="center" vertical-align="middle"><?php echo konversi_tanggal("d-m-Y",$json[$i]['schedule_date']);?></td>
											  <td align="center" valign="middle"><?php echo $json[$i]['schedule_kota'];?><br><?php echo $json[$i]['schedule_location'];?></td>
											  <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$json[$i]['schedule_openhouse_start']);?><br><?php echo $json[$i]['schedule_openhouse_location'];?></td>
											  <td align="center" valign="middle"><strong><?php echo $json[$i]['jml_lot'];?></strong><br><a href="auction_schedule_list.php?id=<?php echo $json[$i]['schedule_id'];?>&location=<?php echo $json[$i]['schedule_kota'];?>&tgl=<?php echo $json[$i]['schedule_date'];?>&lot=<?php echo $json[$i]['jml_lot'];?>&update=<?php echo $json[$i]['date_edit'];?>&loc=<?php echo $json[$i]['schedule_location'];?>&mulai=0&sampai=20" class="btn btn-success" target="_blank">Detail</a></td>
											 </tr>
                            
										<?php }
										} ?>	
                            
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
