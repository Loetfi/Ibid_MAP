<?php
/*
Project		: Market Auction Price
Author		: Budi Rasuli Setiawan
Date		: 05/08/2016
Commpany	: PT. SERASI AUTO RAYA 
Sub			: Ibid
Modul Name	: Login
File Name	: index.php

*/
session_start();
date_default_timezone_set('Asia/Jakarta');
include('class/general.php');
include('include/fungsi.php');
include('include/mysql.config.php');
$link = mysql_connect($host,$user,$pwd);
mysql_select_db($db);
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

  <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
  <!-- Bootstrap core CSS -->


  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
  <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/switchery/switchery.min.css" /> 
  <script src="js/icheck/icheck.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/nprogress.js"></script>
<script type="text/javascript">
$("document").ready(function(){
	/* untuk letak url silahkan di sesuaikan dengan letak script di folder htdocs Anda */
	$.getJSON('http://localhost/ibid_corporate/api/getJadwal.php', { get_param: 'value' }, function(data) {
	    $.each(data, function(index, element) {		
			/* mengisikan table dari hasil json */
			// alert(element.id);
			$('#tabledata').find('tbody')
				.append($('<tr>')
						.append(
							'<td>'+element.id+'</td>'+
							'<td>'+element.kode_jadwal+'</td>'+
							'<td>'+element.id+'</td>'+
							'<td>'+element.lokasi_lelang+'</td>'+
							'<td>'+element.tanggal+'</td>'+
							'<td>'+element.lokasi_openhouse+'</td>'
						
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
	
      <!-- page content -->
      <div class="right_col" role="main">
		<a href="index.php"><label> Home </label></a> > Login 
        <!-- /top tiles -->
        <br />

  <div class="clearfix"></div>
  <div class="row">
  <div class="x_panel" style="">
                <div class="x_title">
                  <h2>Import IMS Lot</h2>
                
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <div class="col-md-6 col-sm-6 col-xs-6">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Source</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" action="proses/cek_login.php" method="post" data-parsley-validate class="form-horizontal form-label-left">
					<?php 
					if (isset($_GET['message']))
					{
					if ($_GET['message']=='401')
					{
					?>	
					<div class="alert alert-danger alert-dismissible fade in" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					  </button>
					  <strong>Warning !!</strong> Email/Password tidak sesuai, silakan coba lagi.
					</div>
					<?php
					}
					}
					?>
					
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Jadwal Lelang 
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <select class="form-control" onclick="generate();">
						<?php 
						$rjad="select * from webid_schedule";
						$rjadwal=mysql_query($rjad,$link);
						while ($row=mysql_fetch_array($rjadwal)){
						?>
						<option><?php echo $row['schedule_code'];?></option>
						<?php }?>
						</select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Jumlah Lot
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="btn btn-danger">0</label>
                      </div>
                    </div>
                
                  </form>
                </div>
				<div>
				<table>
				<tr>
					<td>No Lot</td>
					<td>No Pol</td>
					<td>Limit</td>
				</tr>
				<tbody>
				</tbody>
				</table>
				</div>
              </div>
            </div>
			<div class="col-md-6 col-sm-6 col-xs-6">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Destination</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" action="proses/register.php" method="post" data-parsley-validate class="form-horizontal form-label-left">
			        	<?php 
					if (isset($_GET['message'])){
						if ($_GET['message']=='404')
						{
						
						?>	
							<div class="alert alert-danger alert-dismissible fade in" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
							  </button>
							  <strong>Warning !!</strong> Pendaftaran Gagal, silakan coba lagi.
							</div>
						<?php
						}else if($_GET['message']=='200')
						{
						?>
									<div class="alert alert-success alert-dismissible fade in" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									  </button>
									  <strong>Selamat !!</strong> Pendaftaran berhasil, periksa detail pendaftaran anda di email...
									</div>
						<?php
						}else if($_GET['message']=='400'){
						?>
								<div class="alert alert-warning alert-dismissible fade in" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
									  </button>
									  <strong>Warning!!</strong> Anda belum terdaftar di counter IBID, silakan mendaftar terlebih dahulu ke Counter IBID..
									</div>
						<?php
						}	
					}					
					
					?>
					<div class="form-group">
                      <label class="control-label col-md-4 col-sm-4 col-xs-4" for="first-name">Jadwal Lelang<span class="required">*</span>
                      </label>
                      <div class="col-md-8 col-sm-8 col-xs-8">
                        <select class="form-control">
						<?php 
						$rjad="select * from webid_schedule";
						$rjadwal=mysql_query($rjad,$link);
						while ($row=mysql_fetch_array($rjadwal)){
						?>
						<option><?php echo $row['schedule_code'];?></option>
						<?php }?>
						</select>
                      </div>
                    </div>
                	<div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-warning">Import</button>
                 
                      </div>
                    </div>

                  </form>
                </div>
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
  <script src="js/icheck/icheck.min.js"></script>
  <!-- worldmap -->
  <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>

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
