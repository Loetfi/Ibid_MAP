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
include('include/connection.php');
include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');

?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>IBID | Balai Lelang Serasi</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

</head>

<body class="top-navigation">

	<div id="wrapper">
		<div id="page-wrapper" class="white-bg">
			
			<div class="wrapper wrapper-content">
				<div class="container">
					<?php include('header.php');?>
					
					<br>
					<br>
					<div class="row">
						<div class="col-md-6">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>Login</h5>
								</div>
								<div class="ibox-content">
									<div class="row">
										<div class="col-sm-12 b-r"><h3 class="m-t-none m-b"></h3>
											
											<form role="form" action="proses/cek_login.php" method="post">
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
												
												<div class="form-group"><label>Email</label> <input name="username" type="email" placeholder="Enter email" class="form-control" required=""></div>
												<div class="form-group"><label>Password</label> <input name="password" type="password" placeholder="Password" class="form-control" required=""></div>
												<div>
													<button class="btn btn-sm btn-warning pull-right m-t-n-xs" type="submit"><strong>Sign in</strong></button>
													<label> <input type="checkbox" class="i-checks"> Remember me </label>
												</div>
											</form>
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>Register</h5>
								</div>
								<div class="ibox-content">
									<div class="row">
										<div class="col-sm-12 b-r"><h3 class="m-t-none m-b"></h3>
											
											<form role="form" action="proses/register.php" method="post">
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
												<div class="form-group"><label>Email</label> <input name="email" type="email" placeholder="Enter email" class="form-control" required=""></div>
												<div class="form-group"><label>Password * (min 6 character)</label> <input name="password" type="password" placeholder="Password" class="form-control" required=""></div>
												<div class="form-group"><label>Tipe Identitas)</label> <select name="propinsi" class="form-control"><option value="KTP">KTP</option><option value="NPWP">NPWP</option></select></div>
												<div class="form-group"><label>Nomor Identitas</label> <input  name="no_id" placeholder="No Identitas" class="form-control" required=""></div>
												<div class="form-group"><label>Nomor Telepon/HP</label> <input name="phone" placeholder="TLP/HP" class="form-control" required=""></div>
												<div>
													<button class="btn btn-sm btn-warning pull-right m-t-n-xs" type="submit"><strong>Register</strong></button>
													
												</div>
											</form>
										</div>
										
									</div>
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
	

</body>

</html>
