<?php
session_start();
//error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['name'])){
	header('location:login.php');
}

//include('class/general.php');
include('include/connection.php');
//include('include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');
$bulan2=date('m');
$bulan1=$bulan2-2;
$uid=$_SESSION['uid'];
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
	$periode=$_GET['prd'];
	$kotallng=$_GET['kota'];	
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
	$periode='0';
	$kotallng='0';
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
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<!--<link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">-->
	<script src="jquery-1.12.js"></script>
	<!--<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>-->
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
		  		data: "cc="+cc,
		  		cache: false,
		  		success: function(msg){
		  			$("#gr").html(msg);
		  		}
		  	});
		  });  
		  
		  
		});

	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#idsearch").click(function() {
				if ($('#merk option:selected').val() == 0) {
					alert('MERK Belum di Pilih');
					return false;
				}
				if ($('#seri option:selected').val() == 0) {
					alert('SERI Belum di Pilih');
					return false;
				}
				if ($('#cc option:selected').val() == 0) {
					alert('Cylinder Belum di Pilih');
					return false;
				}				
				if ($('#gr option:selected').val() == 0) {
					alert('Grade Belum di Pilih');
					return false;
				}
				if ($('#prd option:selected').val() == 0) {
					alert('Periode Belum di Pilih');
					return false;
				}
				/*if ($('#model option:selected').val() == 0) {
					alert('MODEL Belum di Pilih');
					return false;
				}
				if ($('#trans option:selected').val() == 0) {
					alert('Transmisi GRADE Belum di Pilih');
					return false;
				}	*/			
				//if ($('#sc option:selected').val() == 0) {
					//alert('INSPECTION GRADE Belum di Pilih');
					//return false;
				//}
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
						<?php
				//ambil_item.php
						?>
						<form action="map_marketprice.php" method="get" class="form-inline">		
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
										<h1>Market Price </h1>
									</div>
									<div class="ibox-content">	
										<div class="col-md-9">
											<table class="table">
												<thead>
													
													<tr>
														<td width="10%">Merk <span style="color:red">*</span></td>
														<td width="20%">
															<select name="merk" id="merk" class="form-control">
																<option value="">-</option>
																<?php 
																mysql_connect("localhost", "lutfi", "lutfi") or die(mysql_error());
																mysql_select_db("dev_ims_ibid") or die(mysql_error());

																$query_merk = "select id_attrdetail,attributedetail from webid_msattrdetail where master_attribute = 1 and sts_deleted = 0";
																$rquery_merk = mysql_query($query_merk);
																
																while($row_merk = mysql_fetch_assoc($rquery_merk)) {
																	
																	?>
																	<option value="<?php echo $row_merk['id_attrdetail']; ?>"<?php if ($row_merk['id_attrdetail']==$make){ echo "selected";}?>>
																		<?php echo $row_merk['attributedetail'];?></option>
																		<?php }
																		?>
																	</select>
																	<td width="5%">Year</td>
																	<td width="10%">
																		<select name="tahun1" class="form-control">
																			<option value="0"    <?php if ($tahun1=='0'){ echo "selected";}?>>-</option>
																			<option value="2000" <?php if ($tahun1=='2000'){ echo "selected";}?>>2000</option>											
																			<option value="2001" <?php if ($tahun1=='2001'){ echo "selected";}?>>2001</option>
																			<option value="2002" <?php if ($tahun1=='2002'){ echo "selected";}?>>2002</option>
																			<option value="2003" <?php if ($tahun1=='2003'){ echo "selected";}?>>2003</option>											
																			<option value="2004" <?php if ($tahun1=='2004'){ echo "selected";}?>>2004</option>											
																			<option value="2005" <?php if ($tahun1=='2005'){ echo "selected";}?>>2005</option>
																			<option value="2006" <?php if ($tahun1=='2006'){ echo "selected";}?>>2006</option>											
																			<option value="2007" <?php if ($tahun1=='2007'){ echo "selected";}?>>2007</option>											
																			<option value="2008" <?php if ($tahun1=='2008'){ echo "selected";}?>>2008</option>
																			<option value="2009" <?php if ($tahun1=='2009'){ echo "selected";}?>>2009</option>											
																			<option value="2010" <?php if ($tahun1=='2010'){ echo "selected";}?>>2010</option>
																			<option value="2011" <?php if ($tahun1=='2011'){ echo "selected";}?>>2011</option>
																			<option value="2012" <?php if ($tahun1=='2012'){ echo "selected";}?>>2012</option>
																			<option value="2013" <?php if ($tahun1=='2013'){ echo "selected";}?>>2013</option>
																			<option value="2014" <?php if ($tahun1=='2014'){ echo "selected";}?>>2014</option>
																			<option value="2015" <?php if ($tahun1=='2015'){ echo "selected";}?>>2015</option>
																			<option value="2016" <?php if ($tahun1=='2016'){ echo "selected";}?>>2016</option>
																			<option value="2017" <?php if ($tahun1=='2017'){ echo "selected";}?>>2017</option>
																			<option value="2018" <?php if ($tahun1=='2018'){ echo "selected";}?>>2018</option>
																		</select>
																		<select name="tahun2" class="form-control">
																			<option value="0"    <?php if ($tahun2=='0'){ echo "selected";}?>>-</option>
																			<option value="2000" <?php if ($tahun2=='2000'){ echo "selected";}?>>2000</option>											
																			<option value="2001" <?php if ($tahun2=='2001'){ echo "selected";}?>>2001</option>
																			<option value="2002" <?php if ($tahun2=='2002'){ echo "selected";}?>>2002</option>
																			<option value="2003" <?php if ($tahun2=='2003'){ echo "selected";}?>>2003</option>											
																			<option value="2004" <?php if ($tahun2=='2004'){ echo "selected";}?>>2004</option>											
																			<option value="2005" <?php if ($tahun2=='2005'){ echo "selected";}?>>2005</option>
																			<option value="2006" <?php if ($tahun2=='2006'){ echo "selected";}?>>2006</option>											
																			<option value="2007" <?php if ($tahun2=='2007'){ echo "selected";}?>>2007</option>											
																			<option value="2008" <?php if ($tahun2=='2008'){ echo "selected";}?>>2008</option>
																			<option value="2009" <?php if ($tahun2=='2009'){ echo "selected";}?>>2009</option>																						
																			<option value="2010" <?php if ($tahun2=='2010'){ echo "selected";}?>>2010</option>
																			<option value="2011" <?php if ($tahun2=='2011'){ echo "selected";}?>>2011</option>
																			<option value="2012" <?php if ($tahun2=='2012'){ echo "selected";}?>>2012</option>
																			<option value="2013" <?php if ($tahun2=='2013'){ echo "selected";}?>>2013</option>
																			<option value="2014" <?php if ($tahun2=='2014'){ echo "selected";}?>>2014</option>
																			<option value="2015" <?php if ($tahun2=='2015'){ echo "selected";}?>>2015</option>
																			<option value="2016" <?php if ($tahun2=='2016'){ echo "selected";}?>>2016</option>
																			<option value="2017" <?php if ($tahun2=='2017'){ echo "selected";}?>>2017</option>
																			<option value="2018" <?php if ($tahun2=='2018'){ echo "selected";}?>>2018</option>
																		</select>
																	</td>
																	
																</tr>
																<tr>	
																	
																	<td width="10%">Seri <span style="color:red">*</span></td>
																	<td width="20%">
																		<select name="seri" id="seri" class="form-control"class="form-control .col-md-3">
																			<option value="0">-</option>
																			<?php
											//Item auction
																			if ($make != 0) {
																				$query_seri = "select id_attrdetail,attributedetail from webid_msattrdetail where id_parent = '".$make."' and sts_deleted = 0 ";
																				$rquery_seri = mysql_query($query_seri);
																				
																				while($row_seri = mysql_fetch_assoc($rquery_seri)) {
																					?>
																					<option value="<?php echo $row_seri['id_attrdetail'];?>" <?php if ($row_seri['id_attrdetail']==$seri){ echo "selected";}?>>
																						<?php echo $row_seri['attributedetail'];?></option>
																						<?php }
																					}
																					?>
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
																					<option value="80000" <?php if ($km1=='80000'){ echo "selected";}?>>80000</option>
																					<option value="90000" <?php if ($km1=='90000'){ echo "selected";}?>>90000</option>
																					<option value="100000" <?php if ($km1=='100000'){ echo "selected";}?>>100000</option>
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
																					<option value="80000" <?php if ($km2=='80000'){ echo "selected";}?>>80000</option>
																					<option value="90000" <?php if ($km2=='90000'){ echo "selected";}?>>90000</option>
																					<option value="100000" <?php if ($km2=='100000'){ echo "selected";}?>>100000</option>
																					
																				</select>
																			</td>
																			
																		</tr>
																		<tr>
																			<td width="10%">Cylinder <span style="color:red">*</span></td>
																			<td width="20%">
																				<select name="cc" id="cc" class="form-control .col-md-1">
																					<option value="0">-</option>
																					<?php
																					if ($seri != 0) {
											//Item auction
																						$query_cc = "select id_attrdetail,attributedetail from webid_msattrdetail where id_parent = '".$seri."' and sts_deleted = 0 ";
																						$rquery_cc = mysql_query($query_cc);
																						
																						while($row_cc = mysql_fetch_assoc($rquery_cc)) {
																							
																							?>
																							<option value="<?php echo $row_cc['id_attrdetail'];?>" <?php if ($row_cc['id_attrdetail']==$cc){ echo "selected";}?>><?php echo $row_cc['attributedetail'];?></option>
																							<?php }
																						}
																						?>
																					</select>
																				</td>
																				
																				<td width="5%">Transmision </td>
																				<td width="10%">
																					<select name="trans" class="form-control .col-md-3">
																						<option value="0" <?php if ($trans=='0'){ echo "selected";}?>>-</option>
																						<option value="AT" <?php if ($trans=='AT'){ echo "selected";}?>>AT</option>
																						<option value="MT" <?php if ($trans=='MT'){ echo "selected";}?>>MT</option>
																					</select>
																				</td>
																			</tr>
																			<tr>
																				<td width="10%">Grade <span style="color:red">*</span></td>
																				<td width="20%">
																					<select name="gr" id="gr" class="form-control .col-md-3">
																						<option value="0">-</option>
																						<?php
											//Item auction
																						if ($cc != 0) {
																							$query_gr = "select id_attrdetail,attributedetail from webid_msattrdetail where id_parent = '".$cc."' and sts_deleted = 0 ";
																							$rquery_gr = mysql_query($query_gr);
																							
																							while($row_gr = mysql_fetch_assoc($rquery_gr)) {
																								
																								?>
																								<option value="<?php echo $row_gr['id_attrdetail'];?>" <?php if ($row_gr['id_attrdetail']==$gr){ echo "selected";}?>>
																									<?php echo $row_gr['attributedetail'];?></option>
																									<?php }
																								}
																								?>
																							</select>
																						</td>
																						
																						<td width="5%">Colour</td>
																						<td width="10%">
																							<select name="warna" class="form-control .col-md-3">
																								<option value="0">-</option>
																								<?php
																								
																								$query_wrn = "select nama_warna  from webid_warna where sts_deleted = 0 and id_warnaresmi = 1 order by id_warna";
																								$rquery_wrn = mysql_query($query_wrn);
																								
																								while($row_wrn = mysql_fetch_assoc($rquery_wrn)) {
																									
																									?>
																									<option value="<?php echo $row_wrn['nama_warna'];?>" <?php if ($row_wrn['nama_warna']==$warna){ echo "selected";}?>>
																										<?php echo $row_wrn['nama_warna'];?></option>
																										<?php }
																										?>
																									</select>
																								</td>
																							</tr>
																							<tr>
																								<td width="10%">Model </td>
																								<td width="20%">
																									<select name="model" id="model" class="form-control .col-md-1">
																										<option value="0">-</option>
																										<?php		
																										$query_model = "select nama from webid_msmodel where sts_deleted = 0 order by id_model";
																										$rquery_model = mysql_query($query_model);
																										
																										while($row_model = mysql_fetch_assoc($rquery_model)) {

																											?>
																											<option value="<?php echo $row_model['nama'];?>" <?php if ($row_model['nama']==$model){ echo "selected";}?>>
																												<?php echo $row_model['nama'];?></option>';
																												<?php }
																												?>
																											</select>
																										</td>
																										<td width="10%">Inspection Grade </td>
																										<td>
																											<select id="sc" name="sc" class="form-control">
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
																										<td width="5%">Periode <span style="color:red">*</span></td>
																										<td width="10%">
																											<select name="prd" class="form-control .col-md-3">
																												<option value="0" <?php if ($periode=='0'){ echo "selected";}?>>-</option>
																												<option value="1" <?php if ($periode=='1'){ echo "selected";}?>>1 bulan</option>
																												<option value="3" <?php if ($periode=='3'){ echo "selected";}?>>3 bulan</option>
																												<option value="6" <?php if ($periode=='6'){ echo "selected";}?>>6 bulan</option>
																											</select>
																										</td>
																										<td width="5%">Kota Lelang </td>
																										<td width="10%">
																											<select name="kota" class="form-control .col-md-3">
																												<option value="0" <?php if ($kotallng=='0'){ echo "selected";}?>>-</option>
																												<?php
																												$query_companys = "SELECT id_company,name_company FROM webid_mscompany WHERE deleted = 0 order by name_company ASC";
																												$run_companys = mysql_query($query_companys);
																												
																												while ($row_companys = mysql_fetch_assoc($run_companys)) {
																													$alcomp = str_replace('IBID','',$row_companys['name_company']);
																													$namacomp = trim($alcomp);
																													?>
																													<option value="<?php echo $namacomp; ?>" <?php if ($kotallng==$namacomp){ echo "selected";}?>><?php echo str_replace('IBID','',$row_companys['name_company']); ?></option>
																													<?php
																												}
																												?>
																											</select>
																										</td>
																									</tr>
																								</thead>
																							</table>
																						</div>
																						<div class="col-md-3">
																							
																							<table class="table">
																								<tr height="240px">
																									
																								</tr>
																							</table> 
																							
																							
																							<button id="idsearch" class="btn btn-primary btn-block pull-right" type="submit">Search</button>	
																						</div>
																						
																						
																					</div>	
																				</div>
																			</div>
																			
																			
																		</form>
																	</div>
																	<!-- COPY -->
																	
																	<div class="row">
																		<div class="x_panel" style="">
																			<div class="x_content">
																				<br><br>
																				<input type="text" class="form-control input-sm m-b-xs" id="filter"
																				placeholder="Search in table">
																				<table class="footable table table-stripped" data-page-size="20" data-filter=#filter>
																					<thead>
																						<tr>
																							<!--<th data-sort-ignore="true" width="15%"><center>Photo</center></th>-->
																							<!--<th data-sort-ignore="true" style="text-align:center"width="10%"><center>No Pol</center></th>-->
																							<!--<th data-sort-ignore="true" style="text-align:center"width="10%"><center>Location</center></th>-->
																							<th data-sort-ignore="true" style="text-align:center"width="5%"><center>Year</center></th>
																							<th data-sort-ignore="true" style="text-align:center"width="15%"><center>Make,Model<BR>Cylinder, Grade</center></th>
																							<th data-sort-ignore="true" style="text-align:center"width="7%"><center>Km</center></th>
																							<th data-sort-ignore="true" style="text-align:center" width="10%"><center>Colour</center></th>
																							<th data-sort-ignore="true" style="text-align:center" width="5%"><center>Fuel</center></th>
																							<th data-sort-ignore="true" style="text-align:center" width="10%"><center>Kota Lelang</center></th>
																							<th data-sort-ignore="true" style="text-align:center" width="5%"><center>Total Evaluation</center></th>
																							<th data-sort-ignore="true" style="text-align:center" width="10%"><center>Start Price</center></th>
																							<th data-sort-ignore="true" style="text-align:center" width="10%"><center>Final Price</center></th>
																						</tr>
																					</thead>
																					<tbody>
																						<?php 
																						$id=$_SESSION['uid'];
								//$timeA = date('Y-m-d',strtotime('-3 month'));
																						$timenow = date('Y-m-d',time());
								// Warna , transmisi , model , tahun , km boleh kosong
																						if ($make != 0) {
																							
																							$query_a = "select a.auc_seq,
																							a.title, a.subtitle, a.auc_location,a.minimum_bid,a.current_bid,a.increment,a.id_schedule,a.idauction_item,b.schedule_date,
																							b.schedule_kota,c.total_evaluation_result as score,
																							(select image_path from webid_kenza_image where id_auctionitem = a.idauction_item limit 1) as photo,
																							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=1 limit 1) as merk,
																							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=2 limit 1) as seri,
																							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=3 limit 1) as cc,
																							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=4 limit 1) as grade,
																							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=5 limit 1) as subgrade,
																							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=6 limit 1) as model,
																							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) as tahun,
																							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=8 limit 1) as transmisi,
																							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=32 limit 1) as warna,
																							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=9 limit 1) as fuel,
																							(select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=24 limit 1) as km
																							from webid_auctions a JOIN webid_schedule b ON b.schedule_id = a.id_schedule 
																							JOIN webid_nilai_kenza c ON c.id_auctionitem = a.idauction_item
																							where a.status_item = 0 and a.num_bids > 0 and a.id_schedule != 0
																							";
							//AND c.total_evaluation_result = '".$sc."' 
																							if ($periode != '0') {
																								$tma = '-'.$periode.' month';
																								$timeA = date('Y-m-d',strtotime($tma));
																								$query_a .= "AND b.schedule_date >= '".$timeA."' AND b.schedule_date <= '".$timenow."' ";
																							}
																							$query_a .= "AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=1 limit 1) = '".$make."'
																							AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=2 limit 1) = '".$seri."'
																							AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=3 limit 1) = '".$cc."'
																							AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=4 limit 1) = '".$gr."'									
																							";
																							if ($sc != '0') {
																								$query_a .= "AND c.total_evaluation_result = '".$sc."'";
																							}
																							if ($model != '0') {
																								$query_a .= "AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=6 limit 1) = '".$model."'";
																							}
																							if ($trans != '0') {
																								$query_a .= "AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=8 limit 1) = '".$trans."'";
																							}
																							if ($warna != '0') {
																								$query_a .= "AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=32 limit 1) = '".$warna."'";
																							}
																							if ($kotallng != '0') {
																								$query_a .= "AND b.schedule_kota = '".$kotallng."'";
																							}
																							if ($tahun1 != '0' and $tahun2 != '0') {
																								$query_a .= "AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) >= '".$tahun1."'
																								AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) <= '".$tahun2."'";
																							}
																							if ($tahun1 != '0' and $tahun2 == '0') {
																								$query_a .= "AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) = '".$tahun1."'";
																							}
																							if ($tahun1 == '0' and $tahun2 != '0') {
																								$query_a .= "AND (select value from webid_auction_detail where idauction_item = a.idauction_item and id_attribute=10 limit 1) = '".$tahun2."'";
																							}
																							$query_a .= "order by a.current_bid ASC ";
																							
																							$run_querymap = mysql_query($query_a);
																							
																							$count_map = mysql_num_rows($run_querymap);
																						}	
																						if ($count_map == 0 and $make != 0) {
																							?>
																							<script type="text/javascript">
																								$(document).ready(function() {
																									alert('Data Tidak tersedia....');
																								});
																							</script>
																							<?php
																						}else {
																							while ($json_sc = mysql_fetch_assoc($run_querymap)) {
																								$hrgterbentuk = $json_sc['current_bid'] - $json_sc['increment'];
																								?>
																								<tr>
								  <!--<td>
								  <a href="map_lot_list_detail.php?id=<?php //echo $json_sc['id_schedule'];?>&item=<?php //echo $json_sc['idauction_item'];?>" target="_blank"><center>
								  	<img class="mySlides" src="<?php //echo $json_sc['photo'];?>" style="width:50%" onerror="this.src='upload/error.png'"></center></a></td>-->
								  	<!--<td align="center" valign="middle"><?php //echo $json_sc['subtitle'];?></td>-->
								  	<!--<td align="center" vertical-align="middle"><?php //echo $json_sc['auc_location'];?></td>-->
								  	<td align="center" valign="middle"><?php echo $json_sc['tahun'];?></td>
								  	<td align="left" valign="middle"><?php echo $json_sc['title'];?></td>
								  	<td align="center" valign="middle"><?php //echo date("d-m-Y",strtotime($json_sc['schedule_date']));?>
								  		<?php echo number_format($json_sc['km']);?></td>
								  		<td align="center" valign="middle"><?php echo $json_sc['warna'];?></td>
								  		<td align="center" valign="middle"><?php echo $json_sc['fuel'];?></td>
								  		<td align="center" valign="middle"><?php echo $json_sc['schedule_kota'];?></td>
								  		<td align="center" valign="middle"><?php echo $json_sc['score'];?></td>
								  		<td align="right" valign="middle"><?php echo number_format($json_sc['minimum_bid']);?></td>
								  		<td align="right" valign="middle">
								  			<a href="map_lot_list_detail.php?id=<?php echo $json_sc['id_schedule'];?>&item=<?php echo $json_sc['idauction_item'];?>" target="_blank"><center>
								  				<?php echo number_format($hrgterbentuk);?></a></td>	
								  			</tr>
								  			<?php
								  		}
								  	}
								  	?>
								  	
								  </tbody>
								  <tfoot>
								  	<tr>
								  		<td colspan="12">
								  			<ul class="pagination pagination-centered"></ul>
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
	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="js/plugins/footable/footable.all.min.js"></script>
	<script>
		$(document).ready(function() {

			$('.footable').footable();
			$('.footable2').footable();

		});
		$(document).ready(function() {
			$('#example').DataTable( {
				"processing": true,
				"serverSide": true,
				"ajax": "server_processing.php"
			} );
		} );

	</script>

</body>

</html>
