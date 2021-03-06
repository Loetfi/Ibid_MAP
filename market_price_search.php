<?php
/*
Project		: Market Auction Price
Author		: Budi Rasuli Setiawan
Date		: 05/08/2016
Commpany	: PT. SERASI AUTO RAYA 
Sub			: Ibid
Modul Name	: Market Price
File Name	: market_price

*/
session_start();
include('class/general.php');
include('include/connection.php');
include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');

$qlot="select * from webid_schedule order by schedule_id desc";
$rlot=mysqli_query($konek,$qlot);
$row=mysqli_fetch_array($rlot);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PT. Sera | IBID Balang Lelang Serasi</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/progressbar/bootstrap-progressbar-3.3.0.css">
  <script src="js/jquery.min.js"></script>

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
<a href="index.php"><label> Home </label></a> > Market Price Information
        <!-- /top tiles -->


          <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Market Price Information</h2>
       
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
		
				<div class="col-md-5">
				<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">BOOKMARK : </label>
				<div class="col-md-9 col-sm-6 col-xs-12">
				<select name="tipe" class="form-control col-md-8">
				<option>MITSUBISHI COLT-D FE 74 6B    MT D CHASIS / JAKARTA /4 WEEKS</option>
				<option>DAIHATSU XENIA  / JAKARTA /4 WEEKS</option>
				<option>TOYOTA DYNA 130 HT 6B 4.1 4X2 MT D BAK KAYU  / JAKARTA /4 WEEKS</option>
				<option>MITSUBISHI COLT-D FE 74 6B    MT D CHASIS  / MEDAN /4 WEEKS</option>
				</select>
				</div>
				</div>
				
				<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">MAKE</label>
                      <div class="col-md-3 col-sm-6 col-xs-12">
					   <select name="tipe" class="form-control col-md-12">
						<option value="0">TOYOTA</option>
						<option value="1">MITSUBISHI</option>
						<option value="2">HONDA</option>
						<option value="3">SUZUKI</option>
						<option value="4">NISSAN</option>
						<option value="5">MERCY</option>
						<option value="6">DAIHATSU</option>
						</select>
                      </div>
                </div>
				
				<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">YEAR</label>
                      <div class="col-md-1 col-sm-6 col-xs-12">
					   <select name="tipe" class="form-control col-md-1">
						<option value="0"></option>
						<option value="1">2016</option>
						<option value="2">2015</option>
						<option value="3">2014</option>
						<option value="4">2013</option>
						<option value="5">2012</option>
						<option value="6">2011</option>
						</select>
                      </div>
					  <div class="col-md-1 col-sm-6 col-xs-12">
					   <select name="tipe" class="form-control col-md-1">
						<option value="0"></option>
						<option value="1">2016</option>
						<option value="2">2015</option>
						<option value="3">2014</option>
						<option value="4">2013</option>
						<option value="5">2012</option>
						<option value="6">2011</option>
						</select>
                      </div>
                </div>
					<div class="form-group">
						  <label class="control-label col-md-3 col-sm-3 col-xs-12">MODEL</label>
						  <div class="col-md-3 col-sm-6 col-xs-12">
						   <select name="tipe" class="form-control col-md-12">
							<option value="0">AVANZA</option>
							<option value="1">XENIA</option>
							<option value="2">AGYA</option>
							<option value="3">AYLA</option>
							<option value="4">ERTIGA</option>
							<option value="5">CAPTIVA</option>
							<option value="6">RUSH</option>
							</select>
						  </div>
					</div>
		
					<div class="form-group">
						  <label class="control-label col-md-3 col-sm-3 col-xs-12">KM</label>
						  <div class="col-md-1 col-sm-6 col-xs-12">
						   <select name="tipe" class="form-control col-md-12">
							<option value="0">50000</option>
							<option value="1">10000</option>
							<option value="2">15000</option>
							<option value="3">20000</option>
							<option value="4">25000</option>

							</select>
						  </div>
							  <div class="col-md-1 col-sm-6 col-xs-12">
						   <select name="tipe" class="form-control col-md-12">
							<option value="0">50000</option>
							<option value="1">10000</option>
							<option value="2">15000</option>
							<option value="3">20000</option>
							<option value="4">25000</option>

							</select>
						  </div>
					</div>
					<div class="form-group">
						  <label class="control-label col-md-3 col-sm-3 col-xs-12">CYLINDER</label>
						  <div class="col-md-3 col-sm-6 col-xs-12">
						   <select name="tipe" class="form-control col-md-12">
							<option value="0">1.0</option>
							<option value="1">1.3</option>
							<option value="2">1.5</option>
							<option value="3">2.0</option>
							<option value="4">2.5</option>
							<option value="5">3.0</option>
							<option value="6">3.5</option>
							</select>
						  </div>
					</div>
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">COLOR</label>
                      <div class="col-md-3 col-sm-6 col-xs-12">
					   <select name="tipe" class="form-control col-md-12">
						<option value="0">MERAH</option>
						<option value="1">PUTIH</option>
						<option value="2">HITAM</option>
						<option value="3">ABU-ABU</option>
						<option value="4">HIJAU</option>
						<option value="4">KUNING</option>
						<option value="4">COKLAT</option>
						</select>
                      </div>
					</div>
		
				</div>
				<div class="col-md-6">
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">LOCATION</label>
                      <div class="col-md-3 col-sm-6 col-xs-12">
					   <input type="checkbox">JAKARTA</input>
					  </div>
					  <div class="col-md-3 col-sm-6 col-xs-12">
					   <input type="checkbox">SEMARANG</input>
					  </div>
					  <div class="col-md-3 col-sm-6 col-xs-12">
					   <input type="checkbox">SURABAYA</input>
					  </div>
					  <div class="col-md-3 col-sm-6 col-xs-12">
					   <input type="checkbox">JAKARTA</input>
					  </div>
					  <div class="col-md-3 col-sm-6 col-xs-12">
					   <input type="checkbox">SEMARANG</input>
					  </div>
					  <div class="col-md-3 col-sm-6 col-xs-12">
					   <input type="checkbox">SURABAYA</input>
					  </div>
					</div>
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">SHOW</label>
                      <div class="col-md-3 col-sm-6 col-xs-12">
					   <select name="tipe" class="form-control col-md-12">
						<option value="0">1 WEEKS</option>
						<option value="1">2 WEEKS</option>
						<option value="2">3 WEEKS</option>
						<option value="3">4 WEEKS</option>
						</select>
                      </div>
					  </div>
					
                </div>
				</div>
				<div class="row">
				
				<div class="col-md-12">
				<label class="btn btn-success btn-block col-md-8">
				SEARCH
				<label>
				</div>
				</div>
                </div>
              </div>
            </div>
		</div>
          <!-- Start to do list -->
          

          

        <div class="clearfix"></div>

        <!-- footer content -->
        <footer>
          <div class="copyright-info">
            <p class="pull-right">PT. SERASI AUTO RAYA 2016  
            </p>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->

     
      <!-- /page content -->
    </div>

  

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>

  <script src="js/custom.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <!-- PNotify -->
  <script type="text/javascript" src="js/notify/pnotify.core.js"></script>
  <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
  <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>
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
			 $('#datatable-responsive1').DataTable();
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
  <script>
    $(function() {
      var cnt = 10; //$("#custom_notifications ul.notifications li").length + 1;
      TabbedNotification = function(options) {
        var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title +
          "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

        if (document.getElementById('custom_notifications') == null) {
          alert('doesnt exists');
        } else {
          $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
          $('#custom_notifications #notif-group').append(message);
          cnt++;
          CustomTabs(options);
        }
      }

      CustomTabs = function(options) {
        $('.tabbed_notifications > div').hide();
        $('.tabbed_notifications > div:first-of-type').show();
        $('#custom_notifications').removeClass('dsp_none');
        $('.notifications a').click(function(e) {
          e.preventDefault();
          var $this = $(this),
            tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
          others.removeClass('active');
          $this.addClass('active');
          $(tabbed_notifications).children('div').hide();
          $(target).show();
        });
      }

      CustomTabs();

      var tabid = idname = '';
      $(document).on('click', '.notification_close', function(e) {
        idname = $(this).parent().parent().attr("id");
        tabid = idname.substr(-2);
        $('#ntf' + tabid).remove();
        $('#ntlink' + tabid).parent().remove();
        $('.notifications a').first().addClass('active');
        $('#notif-group div').first().css('display', 'block');
      });
    })
  </script>
  
  <script>
    $(document).ready(function() {
      $('.progress .bar').progressbar(); // bootstrap 2
      $('.progress .progress-bar').progressbar(); // bootstrap 3
    });
  </script>

</body>

</html>
