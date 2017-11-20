<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>Tambah Seniman</title>

  <!--pickers css-->
  <link rel="stylesheet" type="text/css" href="js/bootstrap-datepicker/css/datepicker-custom.css" />
  <link rel="stylesheet" type="text/css" href="js/bootstrap-timepicker/css/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="js/bootstrap-colorpicker/css/colorpicker.css" />
  <link rel="stylesheet" type="text/css" href="js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
  <link rel="stylesheet" type="text/css" href="js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />
 <!--
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index.html"><img src="images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->


        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="images/photos/user-avatar.png" class="media-object">
                    <div class="media-body">
                        <h4><a href="#">John Doe</a></h4>
                        <span>"Hello There..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">Account Information</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
                </ul>
            </div>

        			<!--sidebar nav start-->
			
            <ul class="nav nav-pills nav-stacked custom-nav">
              <li class="active"><a href="agenda.php"><i class="fa fa-home"></i> <span>Dashboard</span></a>
			 
				
				 <li class="menu-list"><a href=""><i class="fa fa-book"></i> <span>Data Seniman</span></a>
                <ul class="sub-menu-list">
                <li><a href="lihat-seniman.php"> Lihat Seniman</a></li>
				<li><a href="tambah-seniman.php"> Tambah Seniman</a></li>
				<li><a href="organisasi-seniman.php"> Organisasi Seniman</a></li> </ul>
                </li>
				
                <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>Data Rekomendasi</span></a>
				<ul class="sub-menu-list">
                <li><a href="lihat-rekom.php"> Lihat Rekomendasi</a></li>
				<li><a href="tambah-rekom.php"> Tambah Rekomendasi</a></li>					  
                </ul>
                </li>
				
                 <li class="menu-list"><a href=""><i class="fa fa-tasks"></i> <span>Data Advis</span></a>
                 <ul class="sub-menu-list">
				 <li><a href="lihat-advis.php">Lihat Advis</a></li>
				 <li><a href="tambah-advis.php">Tambah Advis</a></li>   
                 </ul>
                </li>
				
				 <li class="menu-list"><a href="#"><i class="fa fa-th-list"></i> <span>Data Admin</span></a>
                    <ul class="sub-menu-list">
					<li><a href="lihat-admin.php">Lihat Admin</a></li>
                    <li><a href="tambah-admin.php"> Tambah Admin</a></li>	
                </ul>
                </li>
				
				 <li><a href="index.php"><i class="fa fa-sign-out"></i> <span>Log Out</span></a></li>
</li>
                      
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

        <!--toggle button start-->
        <a class="toggle-btn"><i class="fa fa-bars"></i></a>
        <!--toggle button end-->

        <!--search start-->
        

        <!--notification menu start -->
        <div class="menu-right">
            <ul class="notification-menu">
                <li>
                  
                    <div class="dropdown-menu dropdown-menu-head pull-right">
                        <h5 class="title">You have 8 pending task</h5>
                        <ul class="dropdown-list user-list">
                            <li class="new">
                                <a href="#">
                                    <div class="task-info">
                                        <div>Database update</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning">
                                            <span class="">40%</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="new">
                                <a href="#">
                                    <div class="task-info">
                                        <div>Dashboard done</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" role="progressbar" class="progress-bar progress-bar-success">
                                            <span class="">90%</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div>Web Development</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 66%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="66" role="progressbar" class="progress-bar progress-bar-info">
                                            <span class="">66% </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div>Mobile App</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="33" role="progressbar" class="progress-bar progress-bar-danger">
                                            <span class="">33% </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div>Issues fixed</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div style="width: 80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar">
                                            <span class="">80% </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="new"><a href="">See All Pending Task</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                   
                    <div class="dropdown-menu dropdown-menu-head pull-right">
                        <h5 class="title">You have 5 Mails </h5>
                        <ul class="dropdown-list normal-list">
                            <li class="new">
                                <a href="">
                                    <span class="thumb"><img src="images/photos/user1.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">John Doe <span class="badge badge-success">new</span></span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb"><img src="images/photos/user2.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jonathan Smith</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb"><img src="images/photos/user3.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jane Doe</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb"><img src="images/photos/user4.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Mark Henry</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="thumb"><img src="images/photos/user5.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jim Doe</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                                </a>
                            </li>
                            <li class="new"><a href="">Read All Mails</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                   
                    <div class="dropdown-menu dropdown-menu-head pull-right">
                        <h5 class="title">Notifications</h5>
                        <ul class="dropdown-list normal-list">
                            <li class="new">
                                <a href="">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <span class="name">Server #1 overloaded.  </span>
                                    <em class="small">34 mins</em>
                                </a>
                            </li>
                            <li class="new">
                                <a href="">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <span class="name">Server #3 overloaded.  </span>
                                    <em class="small">1 hrs</em>
                                </a>
                            </li>
                            <li class="new">
                                <a href="">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <span class="name">Server #5 overloaded.  </span>
                                    <em class="small">4 hrs</em>
                                </a>
                            </li>
                            <li class="new">
                                <a href="">
                                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                    <span class="name">Server #31 overloaded.  </span>
                                    <em class="small">4 hrs</em>
                                </a>
                            </li>
                            <li class="new"><a href="">See All Notifications</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <img src="../../admin2/admin/images/photos/user3.png" alt="" />
                  Saya Admin
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                        <li><a href="profile.php"><i class="fa fa-user"></i>  Profile</a></li>
                        <li><a href="index.php"><i class="fa fa-sign-out"></i> Log Out</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
             <h2><marquee behavior="alternate" title="Form Tambah Seniman">
                Form Untuk Tambah Data Seniman
            </marquee></h2>
            
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading"><center>
                            Form Tambah Data Seniman </center>
                              <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
						
						<?php
include('include/conn.php');
?>
						
                            <form action="proses-tambah-seniman.php" method="post" class="form-horizontal " enctype="multipart/form-data">
							
							  <div class="form-group">
                                    <label class="control-label col-md-3">Foto</label>
                                    <div class="col-md-4 col-xs-11">
									<input type="file"  placeholder="Foto" class="form-control" name="foto">
                                    </div>
                                </div>
								
								  <div class="form-group">
                                    <label class="control-label col-md-3">Nama Pemimpin</label>
                                    <div class="col-md-4 col-xs-11">
									<input type="text"  placeholder="Nama Pemimpin" class="form-control" name="nama">
                                    </div>
                                </div>
								
								  <div class="form-group">
                                    <label class="control-label col-md-3">Telepon</label>
                                    <div class="col-md-4 col-xs-11">
									<input type="text"  placeholder="Telepon" class="form-control" name="telepon">
                                    </div>
                                </div>
								
								  <div class="form-group">
                                    <label class="control-label col-md-3">Alamat</label>
                                    <div class="col-md-4 col-xs-11">
									<input type="text"  placeholder="Alamat" class="form-control" name="alamat">
                                    </div>
                                </div>
								
								  <div class="form-group">
                                    <label class="control-label col-md-3">Nama Organisasi</label>
                                    <div class="col-md-4 col-xs-11">
									<input type="text"  placeholder="Nama Organisasi" class="form-control" name="namaorganisasi">
                                    </div>
                                </div>
								
								  <div class="form-group">
                                    <label class="control-label col-md-3">Jumlah Anggota</label>
                                    <div class="col-md-4 col-xs-11">
									<input type="text"  placeholder="Jumlah Anggota" class="form-control" name="jmlanggota">
                                    </div>
                                </div>
								
								  <div class="form-group">
                                    <label class="control-label col-md-3">Nomor Induk Kesenian</label>
                                    <div class="col-md-4 col-xs-11">
									<input type="text"  placeholder="Nomor Induk Kesenian" class="form-control" name="nik">
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-3">Masa Berlaku</label>
                                    <div class="col-md-4 col-xs-11">
                                        <input class="form-control form-control-inline input-medium default-date-picker" name="berlakuawal" placeholder="Berlaku Dari" type="text" value="" /> Masa Awal
										 <input class="form-control form-control-inline input-medium default-date-picker" name="berlakuakhir" placeholder="Berlaku Sampai" type="text" value="" />
                                        <span class="help-block">Masa Akhir</span>
                                    </div>
                                </div>
								
                              <div class="radios">
                <label for="radio-01" class="label_radio col-lg-6 col-sm-6">
                    <input type="radio" checked="" value="Lama" id="radio-01" name="status"> Kartu Lama
                </label>
                <label for="radio-02" class="label_radio col-lg-6 col-sm-6">
                    <input type="radio" value="Baru" id="radio-02" name="status"> Kartu Baru
                </label>
            </div>
								
								<tr>
    	<td colspan="2">
		<center><button type="submit" class="btn btn-info"></i><strong> TAMBAH </strong></button> 
		 <button type="reset" class="btn btn-danger fa fa-refresh" style="width:100px; height:30px"> Reset</button></td></center>
  	</tr>
								
                               </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer>
            2014 &copy; AdminEx by ThemeBucket
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>

<!--pickers plugins-->
<script type="text/javascript" src="js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<!--pickers initialization-->
<script src="js/pickers-init.js"></script>


<!--common scripts for all pages-->
<script src="js/scripts.js"></script>

</body>
</html>
