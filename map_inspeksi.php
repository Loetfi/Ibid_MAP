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
		 <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	
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
				 	<div class="ibox-title">
							
								<ol class="breadcrumb">
								<li>
									<a href="index.php">Home</a>
								</li>
							   
								<li class="active">
									<strong>Vehicle Final Inspection List</strong>
								</li>
							</ol>
						</div>
                <div class="x_content">
				<input type="hidden" id="id_biodata" value="<?php echo $id; ?>">
				 <!--<input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">-->
                 <table id="example" class="table table-striped">
                          <thead>
                            <tr>
							  <th width="15%"><center>Photo</center></th>
                              <th width="8%"><center>Reg Date<br> Location</center></th>
                              <th width="8%"><center>No Polisi<br>Year</center></th>
                              <th width="10%"><center>Make,Model<BR>Cylinder,Grade</center></th>
                              <th width="10%"><center>Auction Day</center></th>
                              <th width="8%"><center><center>Colour<br>MT / AT<br>KM</center></th>
							  <th width="5%"><center>Inspection Grade</center></th>
             				  <!--<th width="15%"><center>Market Price<br> Range</center></th>-->
							  
							</tr>
                          </thead>
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
				"columnDefs": [
                {className: "dt-body-center", "targets": [0,1,2,4,5,6]}
					],
				"lengthMenu": [10, 15],
				"pageLength": 10,
				"ajax":{
					url :"http://www.ibid.co.id/map/side/sideinspeksi_auction.php", // json datasource
					type: "post",  // type of method  ,GET/POST/DELETE
					data : {
						id: $('#id_biodata').val()
					},
					error: function(){
					  $("#employee_grid_processing").css("display","none");
					}
				}
			} );
		} );

    </script>

</body>

</html>
