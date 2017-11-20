<!DOCTYPE html>
<?php

//error_reporting(0);
session_start(); 
date_default_timezone_set('Asia/Jakarta');

include('include/connection.php');
//include('include/fungsi.php');
//search form

if (isset($_GET['id']))
{
		$id=$_GET['id'];
		$bln=$_GET['bln'];
		$thn=$_GET['thn'];
}else{
		$id=$_GET['1'];
		$bln=date('m');
		$thn=date('Y');
}

?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IBID | Balai Lelang Serasi</title>
    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	   <script src="jquery-1.12.js"></script>

</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="white-bg">
       
        <div class="wrapper wrapper-content">
            <div class="container">
			<?php include('header.php');?>
				<div class="navbar-collapse collapse" id="navbar">
					<ul class="nav navbar-top-links navbar-right">
						<li>
							<i class="fa fa-user"></i> <?php echo $_SESSION['name']; ?>
							
						</li>
						<li>
							<a href="logout.php">
								<i class="fa fa-sign-out"></i> Log out
							</a>
						</li>
					</ul>
				</div>
				
				<div class="row">
				<div class="col-md-12">
					<div class="ibox float-e-margins">
						<div class="ibox-title">
							
								<ol class="breadcrumb">
								<li>
									<a href="index.php">Home</a>
								</li>
							   
								<li class="active">
									<strong>Auction Catalog</strong>
								</li>
							</ol>
						</div>
						<div class="ibox-content">
								<form role="form" method="get" class="form-inline">
									<div class="form-group">
											<label>Location :</label>
									         <select id="id" name="id" class="form-control">	
												<?php 
													mysql_connect("localhost", "lutfi", "lutfi") or die(mysql_error());
													mysql_select_db("dev_ims_ibid") or die(mysql_error());
								
													$query_cabang = "select * from webid_mscompany where deleted = 0 order by id_company";
													$rquery_cbng = mysql_query($query_cabang);
													while ($row_cabang = mysql_fetch_assoc($rquery_cbng)) {
												?>
													<option value="<?php echo $row_cabang['id_company'];?>" 
													<?php if ($row_cabang['id_company']==$_GET['id']){ echo 'selected';}?>>
													<?php echo $row_cabang['name_company'];?></option>	
												<?php 
													}
												?>
												</select>
									</div>
										<div class="form-group">
											<label>Month :</label>
									          <select id="bln" name="bln" class="form-control">
												<option value="1"  <?php if ($_GET['bln']==1 OR $bln==1){ echo 'selected';}?>>Januari </option>
												<option value="2"  <?php if ($_GET['bln']==2 OR $bln==2){ echo 'selected';}?>>Februari </option>
												<option value="3"  <?php if ($_GET['bln']==3 OR $bln==3){ echo 'selected';}?>>Maret </option>
												<option value="4"  <?php if ($_GET['bln']==4 OR $bln==4){ echo 'selected';}?>>April </option>
												<option value="5"  <?php if ($_GET['bln']==5 OR $bln==5){ echo 'selected';}?>>Mei </option>
												<option value="6"  <?php if ($_GET['bln']==6 OR $bln==6){ echo 'selected';}?>>Juni </option>
												<option value="7"  <?php if ($_GET['bln']==7 OR $bln==7){ echo 'selected';}?>>Juli </option>
												<option value="8"  <?php if ($_GET['bln']==8 OR $bln==8){ echo 'selected';}?>>Agustus </option>
												<option value="9"  <?php if ($_GET['bln']==9 OR $bln==9){ echo 'selected';}?>>September </option>
												<option value="10" <?php if ($_GET['bln']==10 OR $bln==10){ echo 'selected';}?>>Oktober </option>
												<option value="11" <?php if ($_GET['bln']==11 OR $bln==11){ echo 'selected';}?>>November </option>
												<option value="12" <?php if ($_GET['bln']==12 OR $bln==12){ echo 'selected';}?>>Desember </option>
												</select>
									</div>
									<div class="form-group">
											<label>Year :</label>
									          <select id="thn" name="thn" class="form-control">
												<?php
													for ($j = 2016;$j <=2020;$j++) {
												?>
														<option value="<?php echo $j; ?>" <?php if ($_GET['thn']==$j OR $thn==$j){ echo 'selected';}?>><?php echo $j; ?></option>
												<?php	
													}
												?>
												</select>
									</div>
									<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Search</button>
									<a href="map_schedule.php" class="btn btn-white" ><i class="fa fa-filter"></i> All</a>
								</form>
						</div>
					</div>
				</div>
					<div class="col-md-12">
						<div class="ibox float-e-margins">
						
						<div class="ibox-content">
                            <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="20" data-filter=#filter>
                                <thead>
                                <tr>
									<th style="text-align:center" data-sort-ignore="true" data-type="numeric" width="5%"><center>No</center></th>
                                    <th style="text-align:center" data-sort-ignore="true" width="10%"><center>Auction Day</center></th>
                                    <th style="text-align:center" data-sort-ignore="true" width="25%"><center>Location</center></th>
                                    <th style="text-align:center" data-sort-ignore="true" data-hide="phone,tablet" width="50%"><center>Open House</center></th>
                                    <th style="text-align:center" data-sort-ignore="true" data-type="numeric" width="15%"><center>Number Of Vehicle</center></th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php
							
							

								if (isset($_GET['id'])){
									$bulan=$_GET['bln'];
									$tahun=$_GET['thn'];
									$kota=$_GET['id'];
									$query = "select schedule_id,schedule_date,schedule_kota,
									schedule_location,schedule_openhouse_start,schedule_openhouse_location,
									(select count(*) from webid_auctions where id_schedule = webid_schedule.schedule_id 
									and status_item = 0) as jml_lot from webid_schedule where 
									cabang='".$kota."' and month(schedule_date)='".$bulan."' and year(schedule_date)='".$tahun."' and 
									sts_deleted='0' order by schedule_date desc";
								}else{
									$bulan=date('m');
									$tahun=date('Y');
									$tahun=date('d');
									$timenow = date('Y-m-d',time());
									$query = "select schedule_id,schedule_date,schedule_kota,
									schedule_location,schedule_openhouse_start,schedule_openhouse_location,(select count(*) from webid_auctions where id_schedule=webid_schedule.schedule_id and status_item=0 limit 1) as jml_lot 
									from webid_schedule where schedule_date >= '".$timenow."' and sts_deleted= 0 order by schedule_date ASC LIMIT 10";
								}
								
								$rquery = mysql_query($query);
								$i = 0;
								while($result = mysql_fetch_assoc($rquery)){
								?>
                                <tr class="gradeX">
									<td><?php echo $i+1;?>
                                    <td><?php echo $result['schedule_date'];?></td>
									<td><?php echo $result['schedule_kota'].'<br>'.$result['schedule_location'];?></td>
									<td><?php echo $result['schedule_openhouse_start'].'<br>'.$result['schedule_openhouse_location'];?></td>
									<td><a href="map_lot_list.php?id=<?php echo $result['schedule_id'];?>" class="label label-primary">
									<?php echo $result['jml_lot'];?></a></td>
									
                                </tr>
									<?php 
											$i++;
										} 
									?>	
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-left"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
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
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

</body>

</html>
