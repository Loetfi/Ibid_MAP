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

$id=$_SESSION['uid'];

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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	   <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
				 <div class="x_panel" style="">
                <div class="x_content">
			
				 <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">
                 <table class="footable table table-stripped" data-page-size="20" data-filter=#filter>
                          <thead>
                            <tr>
                              <th data-sort-ignore="true" width="15%"><center>Photo</center></th>
                              <th data-sort-ignore="true" width="10%"><center>Location</center></th>
                              <th data-sort-ignore="true" width="5%"><center>Year</center></th>
                              <th data-sort-ignore="true" width="15%"><center>Make,Model<BR>Cylinder, Grade</center></th>
                              <th data-sort-ignore="true" width="10%"><center>Auction Day, Km</center></th>
                              <th data-sort-ignore="true" width="10%"><center>Colour</center></th>
							  <th data-sort-ignore="true" width="5%"><center>Transmision<BR>Fuel</center></th>
                              <th data-sort-ignore="true" width="5%"><center>Grade</center></th>
                              <th data-sort-ignore="true" width="10%"><center>Start<BR>Price</center></th>
							  <th data-sort-ignore="true" width="10%"><center>Action</center></th>
							</tr>
                          </thead>
                          <tbody>
                            <?php 
							$qsearch="select * from map_items_watch where id_biodata='$id' and sts_deleted = 0 
							order by merk,seri,cylinder,grade,model LIMIT 50 ";
							$rsearch=mysql_query($qsearch);
							while ($row=mysql_fetch_array($rsearch)){
								
							?>
							<tr>
                              <td><center><img class="mySlides" src="<?php echo $row['image_url'];?>" style="width:50%" onerror="this.src='upload/error.png'"></center></td>
                              <td align="center" vertical-align="middle"><?php echo $row['auc_location'];?></td>
                              <td align="center" valign="middle"><?php echo $row['year'];?></td>
                              <td align="center" valign="middle"><?php echo $row['title'];?></td>
                              <td align="center" valign="middle"><?php echo date("d-m-Y",strtotime($row['auc_date']));?><br><?php echo $row['km'];?></td>
                              <td align="center" valign="middle"><?php echo $row['color'];?></td>
							  <td align="center" valign="middle"><?php echo $row['mission'];?><br><?php echo $row['fuel'];?></td>
                              <td align="center" valign="middle"><?php echo $row['score'];?></td>
						      <td align="center" valign="middle"><?php if ($row['minimum_price']==0){ echo '-';}else{ echo number_format($row['minimum_price']);}?></td>
							  <td align="center" valign="middle"><label class="btn btn-sm btn-danger">Delete</label></td>
                             	
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
