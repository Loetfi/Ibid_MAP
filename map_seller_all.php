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
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['name'])){
		header('location:login.php');
}

include('class/general.php');
include('include/connection.php');
include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');
$bulan2=date('m');
$bulan1=$bulan2-2;

if (isset($_GET['merk'])){
	$make=$_GET['merk'];
	$seri=$_GET['seri'];
	$cc=$_GET['cc'];
	$gr=$_GET['gr'];
	$sgr=$_GET['sgr'];
	$model=$_GET['model'];
	$tahun1=$_GET['tahun1'];
	$tahun2=$_GET['tahun2'];
	$km1=$_GET['km1'];
	$km2=$_GET['km2'];
	$trans=$_GET['trans'];
	$warna=$_GET['warna'];	
	$week1=$_GET['week'];
	$sc=$_GET['sc'];
	$loc=$_GET['loc'];
	$bln=$_GET['bln'];
	$id=$_GET['sch'];
	$sch=$_GET['sch'];
	//import data to log
	
	
	
	
	
}else{
	$week1='0';
	$make='0';
	$seri='0';
	$cc='0';
	$gr='0';
	$sgr='69';
	$model='-';
	$tahun1='0';
	$tahun2='0';
	$km1='0';
	$km2='0';
	$warna='-';	
	
	$sc='0';
	$loc='0';
	$bln='0';
	$id='0';
	$sch='0';
}


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IBID | Balai Lelang Serasi</title>
    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	    <script src="js/jquery-2.1.1.js"></script>
	<script type="text/javascript">
		var htmlobjek;
		$(document).ready(function(){
		  //apabila terjadi event onchange terhadap object <select id=propinsi>
			  $("#merk").change(function(){
				var merk = $("#merk").val();
				$.ajax({
					url: "ambilseri.php",
					data: "merk="+merk,
					cache: false,
					success: function(msg){
						$("#seri").html(msg);
					}
				});
			  });

			
			$("#seri").change(function(){
				var seri = $("#seri").val();
				$.ajax({
					url: "ambilcc.php",
					data: "seri="+seri,
					cache: false,
					success: function(msg){
						$("#cc").html(msg);
						
					}
				});
			  });
			  
			 $("#cc").change(function(){
					var cc = $("#cc").val();
					$.ajax({
						url: "ambilgrade.php",
						data: "seri="+cc,
						cache: false,
						success: function(msg){
							$("#gr").html(msg);
						}
					});
				  });  
		
		  
		});

		</script>
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
				
				<form action="ambil_item_all.php" method="get" class="form-inline">		
				<div class="col-md-12">
					<div class="ibox float-e-margins">
							<div class="ibox-title">
							<ol class="breadcrumb">
								<li>
									<a href="index.php">Home</a>
								</li>
							   <li class="active">
									<strong>Market Price</strong>
								</li>
							</ol>
						</div>
						<div class="ibox-title">
						<h1>Market Price</h1>
						</div>
						<div class="ibox-content">	
							
										<div class="col-md-12">
										<label>Bookmark</label>
										<select class="form-control .col-md-7">
										<option value="0">-</option>
										<?php 
										$qbok="select * from map_bookmark where id_biodata";
										$rbok=mysql_query($qbok);
										while ($row_bok=mysql_fetch_array($rbok)){
											echo '<option value="'.$row_bok['id'].'">'.$row_bok['description'].'</option>';
										}
										?>
										</select>
										</div>
							<div class="col-md-7">
							<table class="table">
							  <thead>
												
										<tr>
											<td width="10%">Make</td>
											<td width="20%">
											<select name="merk" id="merk" class="form-control">
											<option value="">-</option>
											<?php 
											//Item auction
											$url_merk="http://www.ibid.co.id/api/map/get_merk.php";
											$content_merk=file_get_contents($url_merk); 
											$json_merk= json_decode($content_merk, true);
											$count_merk=count($json_merk);
											for($i=0;$i<$count_merk;$i++)
											{ ?>
												<option value="<?php echo $json_merk[$i]['id_attrdetail']; ?>"<?php if ($json_merk[$i]['id_attrdetail']==$make){ echo "selected";}?>><?php echo $json_merk[$i]['attributedetail'];?></option>
											<?php }
											?>
											</select>
											<td width="5%">Year</td>
											<td width="10%">
											<select name="tahun1" class="form-control">
											<option value="0"    <?php if ($tahun1=='0'){ echo "selected";}?>>-</option>
											<option value="2010" <?php if ($tahun1=='2010'){ echo "selected";}?>>2010</option>
											<option value="2011" <?php if ($tahun1=='2011'){ echo "selected";}?>>2011</option>
											<option value="2012" <?php if ($tahun1=='2012'){ echo "selected";}?>>2012</option>
											<option value="2013" <?php if ($tahun1=='2013'){ echo "selected";}?>>2013</option>
											<option value="2014" <?php if ($tahun1=='1014'){ echo "selected";}?>>2014</option>
											<option value="2015" <?php if ($tahun1=='2015'){ echo "selected";}?>>2015</option>
											<option value="2016" <?php if ($tahun1=='2015'){ echo "selected";}?>>2016</option>
											</select>
											<select name="tahun2" class="form-control">
											<option value="0"    <?php if ($tahun2=='0'){ echo "selected";}?>>-</option>
											<option value="2010" <?php if ($tahun2=='2010'){ echo "selected";}?>>2010</option>
											<option value="2011" <?php if ($tahun2=='2011'){ echo "selected";}?>>2011</option>
											<option value="2012" <?php if ($tahun2=='2012'){ echo "selected";}?>>2012</option>
											<option value="2013" <?php if ($tahun2=='2013'){ echo "selected";}?>>2013</option>
											<option value="2014" <?php if ($tahun2=='2014'){ echo "selected";}?>>2014</option>
											<option value="2015" <?php if ($tahun2=='2015'){ echo "selected";}?>>2015</option>
											<option value="2016" <?php if ($tahun2=='2016'){ echo "selected";}?>>2016</option>
											</select>
											</td>
									
										</tr>
										<tr>	
											
											<td width="10%">Series</td>
											<td width="20%">
													<select name="seri" id="seri" class="form-control"class="form-control .col-md-3">
													<option value="0">-</option>
											<?php
											//Item auction
											$url="http://www.ibid.co.id/api/map/get_seri.php?merk=$make";
											$content=file_get_contents($url);  // add your url which contains json file
											$json= json_decode($content, true);
											$count=count($json);
											
											for($i=0;$i<$count;$i++)
											{ ?>
												<option value="<?php echo $json[$i]['id_attrdetail'];?>" <?php if ($json[$i]['id_attrdetail']==$seri){ echo "selected";}?>><?php echo $json[$i]['attributedetail'];?></option>
											<?php }?>
											</select>
											</td>
											<td width="5%">KM</td>
											<td width="10%">
											<select name="km1" class="form-control .col-md-1">
											<option value="0" <?php if ($km1=='0'){ echo "selected";}?>>-</option>
											<option value="10000" <?php if ($km1=='10000'){ echo "selected";}?>>10000</option>
											<option value="20000" <?php if ($km1=='20000'){ echo "selected";}?>>20000</option>
											<option value="30000" <?php if ($km1=='30000'){ echo "selected";}?>>30000</option>
											<option value="40000" <?php if ($km1=='40000'){ echo "selected";}?>>40000</option>
											<option value="50000" <?php if ($km1=='50000'){ echo "selected";}?>>50000</option>
											<option value="60000" <?php if ($km1=='60000'){ echo "selected";}?>>60000</option>
											<option value="70000" <?php if ($km1=='70000'){ echo "selected";}?>>70000</option>
											<option value="70000" <?php if ($km1=='80000'){ echo "selected";}?>>80000</option>
											<option value="70000" <?php if ($km1=='90000'){ echo "selected";}?>>90000</option>
											<option value="70000" <?php if ($km1=='100000'){ echo "selected";}?>>100000</option>
											</select>
											<select name="km2" class="form-control .col-md-1">
											<option value="0" <?php if ($km2=='0'){ echo "selected";}?>>-</option>
											<option value="10000" <?php if ($km2=='10000'){ echo "selected";}?>>10000</option>
											<option value="20000" <?php if ($km2=='20000'){ echo "selected";}?>>20000</option>
											<option value="30000" <?php if ($km2=='30000'){ echo "selected";}?>>30000</option>
											<option value="40000" <?php if ($km2=='40000'){ echo "selected";}?>>40000</option>
											<option value="50000" <?php if ($km2=='50000'){ echo "selected";}?>>50000</option>
											<option value="60000" <?php if ($km2=='60000'){ echo "selected";}?>>60000</option>
											<option value="70000" <?php if ($km2=='70000'){ echo "selected";}?>>70000</option>
											<option value="70000" <?php if ($km2=='80000'){ echo "selected";}?>>80000</option>
											<option value="70000" <?php if ($km2=='90000'){ echo "selected";}?>>90000</option>
											<option value="70000" <?php if ($km2=='100000'){ echo "selected";}?>>100000</option>
											
											</select>
											</td>
											
										</tr>
										<tr>
											<td width="10%">Cylinder</td>
											<td width="20%">
											<select name="cc" id="cc" class="form-control .col-md-1">
											<option value="0">-</option>
											<?php
											//Item auction
											$url="http://www.ibid.co.id/api/map/get_cc.php?seri=$seri";
											$content=file_get_contents($url);  // add your url which contains json file
											$json= json_decode($content, true);
											$count=count($json);
											
											for($i=0;$i<$count;$i++)
											{ ?>
												<option value="<?php echo $json[$i]['id_attrdetail'];?>" <?php if ($json[$i]['id_attrdetail']==$cc){ echo "selected";}?>><?php echo $json[$i]['attributedetail'];?></option>
											<?php }?>
											</select>
											</td>
											
											<td width="5%">Transmision</td>
											<td width="10%">
											<select name="trans" class="form-control .col-md-3">
											<option value="0" <?php if ($trans=='0'){ echo "selected";}?>>-</option>
											<option value="AT" <?php if ($trans=='AT'){ echo "selected";}?>>AT</option>
											<option value="MT" <?php if ($trans=='MT'){ echo "selected";}?>>MT</option>
											</select>
											</td>
										</tr>
										<tr>
											<td width="10%">Grade</td>
											<td width="20%">
											<select name="gr" id="gr" class="form-control .col-md-3">
											<option value="0">-</option>
											<?php
											//Item auction
											$url="http://www.ibid.co.id/api/map/get_grade.php?cc=$cc";
											$content=file_get_contents($url);  // add your url which contains json file
											$json= json_decode($content, true);
											$count=count($json);
											
											for($i=0;$i<$count;$i++)
											{ ?>
												<option value="<?php echo $json[$i]['id_attrdetail'];?>" <?php if ($json[$i]['id_attrdetail']==$gr){ echo "selected";}?>><?php echo $json[$i]['attributedetail'];?></option>
											<?php }?>
											</select>
											</td>
											
											
											<td width="5%">Colour</td>
											<td width="10%">
											<select name="warna" class="form-control .col-md-3">
											<option value="0">-</option>
											<?php
											//warna
											$url_warna="http://www.ibid.co.id/api/map/get_warna.php";
											//$url_model="http://localhost/ibid_corporate/map/api/get_model.php";
											$content_warna=file_get_contents($url_warna);  // add your url which contains json file
											$json_warna= json_decode($content_warna, true);
											$count_warna=count($json_warna);
											for($i=0;$i<$count_warna;$i++)
											{?>
												<option value="<?php echo $json_warna[$i]['nama_warna'];?>" <?php if ($json_warna[$i]['nama_warna']==$warna){ echo "selected";}?>><?php echo $json_warna[$i]['nama_warna'];?></option>
											<?php }
											?>
											</select>
											</td>
										</tr>
										<tr>
											<td width="10%">Sub Grade</td>
											<td width="20%">
												<select name="sgr" class="form-control">
												<option value="69">-</option>
												<?php
												//Item auction
												$url_sub="http://www.ibid.co.id/api/map/get_subgrade.php";
												$content_sub=file_get_contents($url_sub);  // add your url which contains json file
												$json_sub= json_decode($content_sub, true);
												$count_sub=count($json_sub);
												
												for($i=0;$i<$count_sub;$i++)
												{ ?>
													<option value="<?php echo $json_sub[$i]['id_attrdetail'];?>" <?php if ($json_sub[$i]['id_attrdetail']==$sgr){ echo "selected";}?>><?php echo $json_sub[$i]['attributedetail'];?></option>
												<?php }?>
												</select>
											</td>
											<td width="10%">Inspection Grade</td>
											<td>
											<select name="sc" class="form-control">
												<option value="0" <?php if ($sc=='0'){ echo "selected";}?>>-</option>
												<option value="A" <?php if ($sc=='A'){ echo "selected";}?>>A</option>
												<option value="B" <?php if ($sc=='B'){ echo "selected";}?>>B</option>
												<option value="C" <?php if ($sc=='C'){ echo "selected";}?>>C</option>
												<option value="D" <?php if ($sc=='D'){ echo "selected";}?>>D</option>
												<option value="E" <?php if ($sc=='E'){ echo "selected";}?>>E</option>
											</select>
											</td>
										</tr>
										<tr>	
											<td width="10%">Model</td>
											<td width="20%">
											<select name="model" id="model" class="form-control .col-md-1">
											<option value="0">-</option>
											<?php
											
											//Item model
											$url_model="http://www.ibid.co.id/api/map/get_model.php";
											$content_model=file_get_contents($url_model);  // add your url which contains json file
											$json_model= json_decode($content_model, true);
											$count_model=count($json_model);
											
											for($i=0;$i<$count_model;$i++)
											{ ?>
												<option value="<?php echo $json_model[$i]['nama'];?>" <?php if ($json_model[$i]['nama']==$model){ echo "selected";}?>><?php echo $json_model[$i]['nama'];?></option>';
											<?php }
											?>
											</select>
											</td>
										
										
										</tr>
									
									  </thead>
							</table>
							</div>
						<?php
							$ddate = date('Y-m-d');
							$date = new DateTime($ddate);
							$week = $date->format("W");
							
							$minggu=$week-$week1;
							?>
						<div class="col-md-5">
				
                         <table class="table">
							<thead>
								<tr>
									<td>Schedule</td>
									<td><select name="sch" class="form-control">
									<option value="0">-</option>
									<?php 
									$url_sc="http://www.ibid.co.id/api/map/get_jadwal_map.php";
									$content_sc=file_get_contents($url_sc);
									$json_sc= json_decode($content_sc, true);
									$count_sc=count($json_sc);
									for($i=0;$i<$count_sc;$i++)
											{	?>
											<option value="<?php echo $json_sc[$i]['schedule_id'];?>" <?php if ($json_sc[$i]['schedule_id']==$sch){ echo "selected";}?> ><?php echo $json_sc[$i]['schedule_code'];?></option>	
										<?php }
										?>
									
									</select></td>
								</tr>
								<tr>
									<td>Month</td>
									<td>
										  <select id="bln" name="bln" class="form-control">
											<option value="0">-</option>
											<option value="1"  <?php if ($bln=='1'){ echo "selected";}?>>Januari <?php echo date('Y');?></option>
											<option value="2"  <?php if ($bln=='2'){ echo "selected";}?>>Februari <?php echo date('Y');?></option>
											<option value="3"  <?php if ($bln=='3'){ echo "selected";}?>>Maret <?php echo date('Y');?></option>
											<option value="4"  <?php if ($bln=='4'){ echo "selected";}?>>April <?php echo date('Y');?></option>
											<option value="5"  <?php if ($bln=='5'){ echo "selected";}?>>Mei <?php echo date('Y');?></option>
											<option value="6"  <?php if ($bln=='6'){ echo "selected";}?>>Juni <?php echo date('Y');?></option>
											<option value="7"  <?php if ($bln=='7'){ echo "selected";}?>>Juli <?php echo date('Y');?></option>
											<option value="8"  <?php if ($bln=='8'){ echo "selected";}?>>Agustus <?php echo date('Y');?></option>
											<option value="9"  <?php if ($bln=='9'){ echo "selected";}?>>September <?php echo date('Y');?></option>
											<option value="10"  <?php if ($bln=='10'){ echo "selected";}?>>Oktober <?php echo date('Y');?></option>
											<option value="11"  <?php if ($bln=='11'){ echo "selected";}?>>November <?php echo date('Y');?></option>
											<option value="12"  <?php if ($bln=='12'){ echo "selected";}?>>Desember <?php echo date('Y');?></option>
											</select>
									</td>
								</tr>
								<tr>
									<td>Week</td>
									<td><select name="week" class="form-control">
									<option value="0">-</option>
									<option value="1" <?php if ($week1=='1'){ echo "selected";}?>>1 Week</option>
									<option value="2" <?php if ($week1=='2'){ echo "selected";}?>>2 Weeks</option>
									<option value="3" <?php if ($week1=='3'){ echo "selected";}?>>3 Weeks</option>
									<option value="4" <?php if ($week1=='4'){ echo "selected";}?>>4 Weeks</option>
									
									</select></td>
								</tr>
								<tr>
									<td>City</td>
									<td>
										<select name="loc" class="form-control .col-md-3">
										<option value="0">-</option>
											<?php 
										// Kota
										
										$url_kota="http://www.ibid.co.id/api/map/get_cabang.php";
										$content_kota=file_get_contents($url_kota);  // add your url which contains json file
										$json_kota = json_decode($content_kota, true);
										$count=count($json_kota);
										for($i=0;$i<$count;$i++)
											{	?>
											<option value="<?php echo $json_kota[$i]['id_company'];?>" <?php if ($json_kota[$i]['id_company']==$loc){ echo "selected";}?>><?php echo $json_kota[$i]['name_company'];?></option>	
										<?php }
										?>
								
										</select>
									</td>
								</tr>
							</thead>
							</table> 
                           
                      
						 <button class="btn btn-primary button-block pull-right" type="submit">Search</button>	
						
					</div>
					
				
						</div>	
					</div>
				</div>
				
					
				</form>
				</div>
                <div class="row">
				 <div class="x_panel" style="">
                <div class="x_content">
				<?php 
				//schedule info
					$url_sch="http://www.ibid.co.id/api/map/get_jadwal_detail.php?id=$id";
					$content_sch=file_get_contents($url_sch);  // add your url which contains json file
					$json_sch = json_decode($content_sch, true);
					$kota=$json_sch[0]['schedule_kota'];
					
				?>
	
				 <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">
                 <table class="footable table table-stripped" data-page-size="20" data-filter=#filter>
                          <thead>
                            <tr>
                              <th data-sort-ignore="true" width="15%"><center>Photo</center></th>
                              <th width="10%"><center>Location</center></th>
                              <th width="5%"><center>Year</center></th>
                              <th width="15%"><center>Make,Model<BR>Cylinder, Grade</center></th>
                              <th width="10%"><center>Auction Day, Km</center></th>
                              <th width="10%"><center>Colour</center></th>
							  <th width="5%"><center>Transmision<BR>Fuel</center></th>
                              <th width="5%"><center>Grade</center></th>
                              <th width="10%"><center>Start<BR>Price</center></th>
							  <th width="10%"><center>Market<BR>Price</center></th>
							  
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							$qsearch="select *  from map_items_history where score_ex='SEARCH' and  merk='$make' and seri='$seri' and cylinder='$cc' order by merk,seri,cylinder,grade,model limit 50";
							$rsearch=mysql_query($qsearch);
							while ($row=mysql_fetch_array($rsearch)){
								
								$qmarket="select min(final_price) as harga1 from map_items_history where merk='$make' and seri='$seri' and cylinder='$cc' and final_price>0";
								$rmarket=mysql_query($qmarket);
								$row_map=mysql_fetch_array(rmarket);
								$harga1=$row_map['harga1'];
								
								$qmarket1="select min(final_price) as harga2 from map_items_history where merk='$make' and seri='$seri' and cylinder='$cc' and final_price>0";
								$rmarket1=mysql_query($qmarket1);
								$row_map1=mysql_fetch_array(rmarket1);
								$harga2=$row_map1['harga2'];
						
							?>
							<tr>
                              <td><center><img class="mySlides" src="<?php echo $row['image_url'];?>" style="width:50%" onerror="this.src='upload/error.png'"></center></td>
                              <td align="center" vertical-align="middle"><?php echo $row['auc_location'];?></td>
                              <td align="center" valign="middle"><?php echo $row['year'];?></td>
                              <td align="center" valign="middle"><?php echo $row['title'];?></td>
                              <td align="center" valign="middle"><?php echo konversi_tanggal("d-m-Y",$row['auc_date']);?><br><?php echo $row['km'];?></td>
                              <td align="center" valign="middle"><?php echo $row['color'];?></td>
							  <td align="center" valign="middle"><?php echo $row['mission'];?><br><?php echo $row['fuel'];?></td>
                              <td align="center" valign="middle"><?php echo $row['score'];?></td>
						      <td align="center" valign="middle"><?php if ($row['minimum_price']==0){ echo '-';}else{ echo number_format($row['minimum_price']);}?></td>
							  <td align="center" valign="middle"><?php echo number_format($harga1).' ~ '.number_format($harga2);?></td>
                             	
							 </tr>
                            <?php }?>
                            
                          </tbody>
						      <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                        </table>
			
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
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/footable/footable.all.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <!-- Peity demo -->
    <script src="js/demo/peity-demo.js"></script>
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

</body>

</html>
