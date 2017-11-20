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

$uid=$_SESSION['uid'];

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
	<script src="jquery-1.12.js"></script>
		
		<script type="text/javascript">
        $(document).ready(function() {
			$("#idp").click(function() {
				var id_attr = $('#idno').val();
				var x = confirm('Are you sure want to delete this data?');
				if (x) {
					$.ajax({
						type:'POST',
						data: {
						   id: $('#idschedule').val(),
						   item: $('#idauctionitem').val()
						},
						url:'http://11111/map/delete_favoritelist.php',
							success:function(msg) {
								//alert(msg.replace(/\s/g, ''));
								//return false;
								if(msg.replace(/\s/g, '') == 'yes') {
									alert('DELETE BERHASIL');
									$('#tr-'+id_attr).remove();
									return false;
								} else {
									alert('DELETE GAGAL');
									return false;
								}
							}
					});
				} else {
					return false;
				}
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
							<i class="fa fa-user"></i>  <?php echo $_SESSION['name']; ?>
						</li>
						<li>
							<a href="logout.php">
								<i class="fa fa-sign-out"></i> Log out
							</a>
						</li>
					</ul>
				</div>
		        <div class="row"><div class="ibox-title">
							<ol class="breadcrumb">
								<li>
									<a href="index.php">Home</a>
								</li>
							   <li class="active">
									<strong>Favorite</strong>
								</li>
							</ol>
						</div>
				 <div class="x_panel" style="">
				 <div class="ibox-title">
						<h2>Favorite List</h2>
						</div>		
                <div class="x_content">
			
				 <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">
                 <table class="footable table table-stripped" data-page-size="20" data-filter=#filter>
                          <thead>
                            <tr>
                              <th data-sort-ignore="true" width="15%"><center>Photo</center></th>
                              <th data-sort-ignore="true" style="text-align:center" width="10%"><center>Location</center></th>
                              <th data-sort-ignore="true" style="text-align:center" width="5%"><center>Nopol</center></th>
							  <th data-sort-ignore="true" style="text-align:center" width="5%"><center>Year</center></th>
                              <th data-sort-ignore="true" style="text-align:center" width="15%"><center>Make,Model<BR>Cylinder, Grade</center></th>
                              <th data-sort-ignore="true" style="text-align:center" width="10%"><center>Auction Day <br> Km</center></th>
                              <th data-sort-ignore="true" style="text-align:center" width="10%"><center>Colour</center></th>
							  <th data-sort-ignore="true" style="text-align:center" width="5%"><center>Transmision<BR>Fuel</center></th>
                              <th data-sort-ignore="true" style="text-align:center" width="5%"><center>Total Evaluation</center></th>
                              <th data-sort-ignore="true" style="text-align:center" width="10%"><center>Start<BR>Price</center></th>
							  <th data-sort-ignore="true" style="text-align:center" width="10%"><center>Action</center></th>
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							$qsearch="select * from map_items_favorite where id_biodata='$uid' and sts_deleted = 0 
							order by merk,seri,cylinder,grade,model LIMIT 100 ";
							$rsearch=mysql_query($qsearch);
							$no = 1;
							while ($row=mysql_fetch_assoc($rsearch)){
								
							?>
							<tr id="tr-<?php echo $no; ?>">
                              <td>
							  <a href="map_lot_list_detail.php?id=<?php echo $row['id_schedule']; ?>&item=<?php echo $row['idauction_item']; ?>">
							  <center><img class="mySlides" src="<?php echo $row['image_url'];?>" style="width:50%" onerror="this.src='upload/error.png'">
							  </a>
							  </center></td>
							  <td align="center" vertical-align="middle"><?php echo $row['auc_location'];?></td>
                              <td align="center" valign="middle"><?php echo $row['no_pol'];?></td>
							  <td align="center" valign="middle"><?php echo $row['year'];?></td>
                              <td align="center" valign="middle"><?php echo $row['merk'].' '.$row['seri'].' '.$row['cylinder'].' '.$row['grade'].' '.$row['model'];?></td>
                              <td align="center" valign="middle"><?php echo date("d-m-Y",strtotime($row['auc_date']));?><br><?php echo $row['km'];?></td>
                              <td align="center" valign="middle"><?php echo $row['color'];?></td>
							  <td align="center" valign="middle"><?php echo $row['mission'];?><br><?php echo $row['fuel'];?></td>
                              <td align="center" valign="middle"><?php echo $row['score'];?></td>
						      <td align="center" valign="middle"><?php if ($row['minimum_price']==0){ echo '-';}else{ echo number_format($row['minimum_price']);}?></td>
							  <td align="center" valign="middle">
							  <input type="hidden" id="idschedule" value="<?php echo $row['id_schedule']; ?>">
							   <input type="hidden" id="idno" value="<?php echo $no; ?>">
							  <input type="hidden" id="idauctionitem" value="<?php echo $row['idauction_item']; ?>">
							  <a href="#" id="idp">
							  <label class="btn btn-sm btn-danger">Delete</label></a></td>
                             	
							 </tr>
                            <?php $no++; } ?>
                            
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

    </script>

</body>

</html>
