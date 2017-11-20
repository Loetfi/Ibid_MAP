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
<a href="index.php"><label> Home </label></a> > Market Place 
        <!-- /top tiles -->


          <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Vehicle Registed List</h2>
       
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Registered</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Initally Inspected</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Final Inspection</a>
                      </li>
					   <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Vehicles for Upcoming Auction</a>
                      </li>
					   <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Auctioned</a>
                      </li>
					   <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Past Sold Vehicles</a>
                      </li>
                    </ul>
					
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
					  	<div class="col-md-12">
							<p class="text-muted well well-sm no-shadow" style="margin-top: 5px;">
							<label class="col-md-2">Keyword : <strong> </strong> </label>
							<input class="col-md-2"></input>
							<label class="col-md-2">Registered Date : <strong> </strong></label>
							<input type="date" class="col-md-2"></input> <span> </span>
							<input type="date" class="col-md-2"></input>
							<button class="btn btn-success btn-xs pull-right"><i class="fa fa-search"></i><span> </span>Search Conditions</button>
							<br>
							
							</p>
							
						</div>
						
						 <table id="datatable-responsive" class="table table-striped dt-responsive " cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th width="15%"><center>Photo</center></th>
                              <th width="10%"><center>Reg Day<BR>Location</center></th>
                              <th width="5%"><center>No Polisi<br>Year</center></th>
                              <th width="15%"><center>Make<BR>Model CC Grade</center></th>
                              <th width="10%"><center>First Auction Day<br>Last Auction Day</center></th>
                              <th width="10%"><center>Color<br>MT/AT KM</center></th>
							  <th width="5%"><center>Inspection Grade</center></th>
                              <th width="5%"><center>Status</center></th>
                              <th width="10%"><center>Sold<BR>Price</center></th>
                              <th width="20%"><center>Lot No</center></th>
							  
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							//Item auction
							$qitem="select *,(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as grade,(select value from webid_auction_detail where id_attribute='24' and idauction_item=webid_auctions.idauction_item limit 1) as km,(select value from webid_auction_detail where id_attribute='8' and idauction_item=webid_auctions.idauction_item limit 1) as trans,(select value from webid_auction_detail where id_attribute='9' and idauction_item=webid_auctions.idauction_item limit 1) as fuel from webid_auctions order by id limit 20";
							$ritem=mysqli_query($konek,$qitem);
							while ($result=mysqli_fetch_array($ritem)){
							?>
							<tr>
                              <td><img src="upload/2.jpg" width="100%" height="50%"></td>
                              <td align="center" vertical-align="middle"><br><?php echo $result['auc_nopol'];?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_year'];?></td>
                              <td align="center" valign="middle"><?php echo $result['title'];?></td>
                              <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$row['schedule_date']);?><br><?php echo number_format($result['km']);?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_color'];?></td>
							  <td align="center" valign="middle"><?php echo $result['trans'];?><br><?php echo $result['fuel'];?></td>
                              <td align="center" valign="middle"><?php echo $result['grade'];?></td>
                              <td align="center" valign="middle"><?php echo number_format($result['minimum_bid']);?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_seq'];?></td>
							
							 </tr>
                            <?php }?>
                            
                          </tbody>
                        </table>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
						<div class="col-md-12">
							<p class="text-muted well well-sm no-shadow" style="margin-top: 5px;">
							<label class="col-md-2">Keyword : <strong> </strong> </label>
							<input class="col-md-2"></input>
							<label class="col-md-2">Registered Date : <strong> </strong></label>
							<input type="date" class="form-control col-md-2"></input> <span> </span>
							<input type="date" class="form-control col-md-2"></input>
							<button class="btn btn-success btn-xs pull-right"><i class="fa fa-search"></i><span> </span>Search Conditions</button>
							<br>
							
							</p>
							
						</div>
						 <table id="datatable-responsive1" class="table table-striped  dt-responsive" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th width="10%"><center>Photo</center></th>
                              <th width="10%"><center>Reg Day<BR>Location</center></th>
                              <th width="5%"><center>No Polisi<br>Year</center></th>
                              <th width="15%"><center>Make<BR>Model CC Grade</center></th>
                              <th width="10%"><center>First Auction Day<br>Last Auction Day</center></th>
                              <th width="10%"><center>Color<br>MT/AT KM</center></th>
							  <th width="5%"><center>Inspection Grade</center></th>
                              <th width="5%"><center>Status</center></th>
                              <th width="10%"><center>Sold<BR>Price</center></th>
                              <th width="20%"><center>Lot No</center></th>
							  
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							//Item auction
							$qitem="select *,(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as grade,(select value from webid_auction_detail where id_attribute='24' and idauction_item=webid_auctions.idauction_item limit 1) as km,(select value from webid_auction_detail where id_attribute='8' and idauction_item=webid_auctions.idauction_item limit 1) as trans,(select value from webid_auction_detail where id_attribute='9' and idauction_item=webid_auctions.idauction_item limit 1) as fuel from webid_auctions order by id limit 20";
							$ritem=mysqli_query($konek,$qitem);
							while ($result=mysqli_fetch_array($ritem)){
							?>
							<tr>
                              <td><img src="upload/1.jpg" width="150px" height="50%"></td>
                              <td align="center" vertical-align="middle"><br><?php echo $result['auc_nopol'];?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_year'];?></td>
                              <td align="center" valign="middle"><?php echo $result['title'];?></td>
                              <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$row['schedule_date']);?><br><?php echo number_format($result['km']);?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_color'];?></td>
							  <td align="center" valign="middle"><?php echo $result['trans'];?><br><?php echo $result['fuel'];?></td>
                              <td align="center" valign="middle"><?php echo $result['grade'];?></td>
                              <td align="center" valign="middle"><?php echo number_format($result['minimum_bid']);?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_seq'];?></td>
							
							 </tr>
                            <?php }?>
                            
                          </tbody>
                        </table>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
<div class="col-md-12">
							<p class="text-muted well well-sm no-shadow" style="margin-top: 5px;">
							<label class="col-md-2">Keyword : <strong> </strong> </label>
							<input class="col-md-2"></input>
							<label class="col-md-2">Registered Date : <strong> </strong></label>
							<input type="date" class="col-md-2"></input> <span> </span>
							<input type="date" class="col-md-2"></input>
							<button class="btn btn-success btn-xs pull-right"><i class="fa fa-search"></i><span> </span>Search Conditions</button>
							<br>
							
							</p>
							
						</div>
						
						 <table id="datatable-responsive" class="table table-striped dt-responsive " cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th width="15%"><center>Photo</center></th>
                              <th width="10%"><center>Reg Day<BR>Location</center></th>
                              <th width="5%"><center>No Polisi<br>Year</center></th>
                              <th width="15%"><center>Make<BR>Model CC Grade</center></th>
                              <th width="10%"><center>First Auction Day<br>Last Auction Day</center></th>
                              <th width="10%"><center>Color<br>MT/AT KM</center></th>
							  <th width="5%"><center>Inspection Grade</center></th>
                              <th width="5%"><center>Status</center></th>
                              <th width="10%"><center>Sold<BR>Price</center></th>
                              <th width="20%"><center>Lot No</center></th>
							  
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							//Item auction
							$qitem="select *,(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as grade,(select value from webid_auction_detail where id_attribute='24' and idauction_item=webid_auctions.idauction_item limit 1) as km,(select value from webid_auction_detail where id_attribute='8' and idauction_item=webid_auctions.idauction_item limit 1) as trans,(select value from webid_auction_detail where id_attribute='9' and idauction_item=webid_auctions.idauction_item limit 1) as fuel from webid_auctions order by id limit 20";
							$ritem=mysqli_query($konek,$qitem);
							while ($result=mysqli_fetch_array($ritem)){
							?>
							<tr>
                              <td><img src="upload/7.jpg" width="100%" height="50%"></td>
                              <td align="center" vertical-align="middle"><br><?php echo $result['auc_nopol'];?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_year'];?></td>
                              <td align="center" valign="middle"><?php echo $result['title'];?></td>
                              <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$row['schedule_date']);?><br><?php echo number_format($result['km']);?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_color'];?></td>
							  <td align="center" valign="middle"><?php echo $result['trans'];?><br><?php echo $result['fuel'];?></td>
                              <td align="center" valign="middle"><?php echo $result['grade'];?></td>
                              <td align="center" valign="middle"><?php echo number_format($result['minimum_bid']);?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_seq'];?></td>
							
							 </tr>
                            <?php }?>
                            
                          </tbody>
                        </table>
                      </div>
					    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
						<div class="col-md-12">
							<p class="text-muted well well-sm no-shadow" style="margin-top: 5px;">
							<label class="col-md-2">Keyword : <strong> </strong> </label>
							<input class="col-md-2"></input>
							<label class="col-md-2">Registered Date : <strong> </strong></label>
							<input type="date" class="form-control col-md-2"></input> <span> </span>
							<input type="date" class="form-control col-md-2"></input>
							<button class="btn btn-success btn-xs pull-right"><i class="fa fa-search"></i><span> </span>Search Conditions</button>
							<br>
							
							</p>
							
						</div>
						
						 <table id="datatable-responsive" class="table table-striped dt-responsive " cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th width="15%"><center>Photo</center></th>
                              <th width="10%"><center>Reg Day<BR>Location</center></th>
                              <th width="5%"><center>No Polisi<br>Year</center></th>
                              <th width="15%"><center>Make<BR>Model CC Grade</center></th>
                              <th width="10%"><center>First Auction Day<br>Last Auction Day</center></th>
                              <th width="10%"><center>Color<br>MT/AT KM</center></th>
							  <th width="5%"><center>Inspection Grade</center></th>
                              <th width="5%"><center>Status</center></th>
                              <th width="10%"><center>Sold<BR>Price</center></th>
                              <th width="20%"><center>Lot No</center></th>
							  
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							//Item auction
							$qitem="select *,(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as grade,(select value from webid_auction_detail where id_attribute='24' and idauction_item=webid_auctions.idauction_item limit 1) as km,(select value from webid_auction_detail where id_attribute='8' and idauction_item=webid_auctions.idauction_item limit 1) as trans,(select value from webid_auction_detail where id_attribute='9' and idauction_item=webid_auctions.idauction_item limit 1) as fuel from webid_auctions order by id limit 20";
							$ritem=mysqli_query($konek,$qitem);
							while ($result=mysqli_fetch_array($ritem)){
							?>
							<tr>
                              <td><img src="upload/4.jpg" width="100%" height="50%"></td>
                              <td align="center" vertical-align="middle"><br><?php echo $result['auc_nopol'];?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_year'];?></td>
                              <td align="center" valign="middle"><?php echo $result['title'];?></td>
                              <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$row['schedule_date']);?><br><?php echo number_format($result['km']);?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_color'];?></td>
							  <td align="center" valign="middle"><?php echo $result['trans'];?><br><?php echo $result['fuel'];?></td>
                              <td align="center" valign="middle"><?php echo $result['grade'];?></td>
                              <td align="center" valign="middle"><?php echo number_format($result['minimum_bid']);?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_seq'];?></td>
							
							 </tr>
                            <?php }?>
                            
                          </tbody>
                        </table>
                      </div>
					    <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
						<div class="col-md-12">
							<p class="text-muted well well-sm no-shadow" style="margin-top: 5px;">
							<label class="col-md-2">Keyword : <strong> </strong> </label>
							<input class="col-md-2"></input>
							<label class="col-md-2">Registered Date : <strong> </strong></label>
							<input type="date" class="col-md-2"></input> <span> </span>
							<input type="date" class="col-md-2"></input>
							<button class="btn btn-success btn-xs pull-right"><i class="fa fa-search"></i><span> </span>Search Conditions</button>
							<br>
							
							</p>
							
						</div>
						
						 <table id="datatable-responsive" class="table table-striped dt-responsive " cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th width="15%"><center>Photo</center></th>
                              <th width="10%"><center>Reg Day<BR>Location</center></th>
                              <th width="5%"><center>No Polisi<br>Year</center></th>
                              <th width="15%"><center>Make<BR>Model CC Grade</center></th>
                              <th width="10%"><center>First Auction Day<br>Last Auction Day</center></th>
                              <th width="10%"><center>Color<br>MT/AT KM</center></th>
							  <th width="5%"><center>Inspection Grade</center></th>
                              <th width="5%"><center>Status</center></th>
                              <th width="10%"><center>Sold<BR>Price</center></th>
                              <th width="20%"><center>Lot No</center></th>
							  
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							//Item auction
							$qitem="select *,(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as grade,(select value from webid_auction_detail where id_attribute='24' and idauction_item=webid_auctions.idauction_item limit 1) as km,(select value from webid_auction_detail where id_attribute='8' and idauction_item=webid_auctions.idauction_item limit 1) as trans,(select value from webid_auction_detail where id_attribute='9' and idauction_item=webid_auctions.idauction_item limit 1) as fuel from webid_auctions order by id limit 20";
							$ritem=mysqli_query($konek,$qitem);
							while ($result=mysqli_fetch_array($ritem)){
							?>
							<tr>
                              <td><img src="upload/5.jpg" width="100%" height="50%"></td>
                              <td align="center" vertical-align="middle"><br><?php echo $result['auc_nopol'];?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_year'];?></td>
                              <td align="center" valign="middle"><?php echo $result['title'];?></td>
                              <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$row['schedule_date']);?><br><?php echo number_format($result['km']);?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_color'];?></td>
							  <td align="center" valign="middle"><?php echo $result['trans'];?><br><?php echo $result['fuel'];?></td>
                              <td align="center" valign="middle"><?php echo $result['grade'];?></td>
                              <td align="center" valign="middle"><?php echo number_format($result['minimum_bid']);?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_seq'];?></td>
							
							 </tr>
                            <?php }?>
                            
                          </tbody>
                        </table>
                      </div>
					    <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
						<div class="col-md-12">
							<p class="text-muted well well-sm no-shadow" style="margin-top: 5px;">
							<label class="col-md-2">Keyword : <strong> </strong> </label>
							<input class="col-md-2"></input>
							<label class="col-md-2">Registered Date : <strong> </strong></label>
							<input type="date" class="col-md-2"></input> <span> </span>
							<input type="date" class="col-md-2"></input>
							<button class="btn btn-success btn-xs pull-right"><i class="fa fa-search"></i><span> </span>Search Conditions</button>
							<br>
							
							</p>
							
						</div>
						
						 <table id="datatable-responsive" class="table table-striped dt-responsive " cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th width="15%"><center>Photo</center></th>
                              <th width="10%"><center>Reg Day<BR>Location</center></th>
                              <th width="5%"><center>No Polisi<br>Year</center></th>
                              <th width="15%"><center>Make<BR>Model CC Grade</center></th>
                              <th width="10%"><center>First Auction Day<br>Last Auction Day</center></th>
                              <th width="10%"><center>Color<br>MT/AT KM</center></th>
							  <th width="5%"><center>Inspection Grade</center></th>
                              <th width="5%"><center>Status</center></th>
                              <th width="10%"><center>Sold<BR>Price</center></th>
                              <th width="20%"><center>Lot No</center></th>
							  
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							//Item auction
							$qitem="select *,(select total_evaluation_result from webid_nilai_kenza where id_auctionitem=webid_auctions.idauction_item limit 1) as grade,(select value from webid_auction_detail where id_attribute='24' and idauction_item=webid_auctions.idauction_item limit 1) as km,(select value from webid_auction_detail where id_attribute='8' and idauction_item=webid_auctions.idauction_item limit 1) as trans,(select value from webid_auction_detail where id_attribute='9' and idauction_item=webid_auctions.idauction_item limit 1) as fuel from webid_auctions order by id limit 20";
							$ritem=mysqli_query($konek,$qitem);
							while ($result=mysqli_fetch_array($ritem)){
							?>
							<tr>
                              <td><img src="upload/6.jpg" width="100%" height="50%"></td>
                              <td align="center" vertical-align="middle"><br><?php echo $result['auc_nopol'];?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_year'];?></td>
                              <td align="center" valign="middle"><?php echo $result['title'];?></td>
                              <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$row['schedule_date']);?><br><?php echo number_format($result['km']);?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_color'];?></td>
							  <td align="center" valign="middle"><?php echo $result['trans'];?><br><?php echo $result['fuel'];?></td>
                              <td align="center" valign="middle"><?php echo $result['grade'];?></td>
                              <td align="center" valign="middle"><?php echo number_format($result['minimum_bid']);?></td>
                              <td align="center" valign="middle"><?php echo $result['auc_seq'];?></td>
							
							 </tr>
                            <?php }?>
                            
                          </tbody>
                        </table>
                      </div>
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