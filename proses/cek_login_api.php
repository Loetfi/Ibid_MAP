<?php
define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'firewall/firewall.php' ) )
include_once( @dirname(__FILE__).'firewall/firewall.php' );
include ('../include/connection.php');
include ('../include/fungsi.php');

date_default_timezone_set('Asia/Jakarta');

// fungsi untuk menghindari injeksi dari user yang jahil
$username = $_POST['username'];
$password = md5($_POST['password']);

//echo $username;
//echo $password;
//exit();
	
  $query  = "select *,(select name from webid_biodata where id=map_users.id_biodata limit 1) as name from map_users where username='$username' and password='$password'";
  $login  = mysqli_query($konek, $query);
  $ketemu = mysqli_num_rows($login);
  $r      = mysqli_fetch_array($login);
 
 // Apabila username dan password ditemukan
	if ($ketemu > 0){
		  session_start();
		  $_SESSION['login']='True';
		  $_SESSION['username']=$r['username'];
		  $_SESSION['name']=$r['name'];
		  $_SESSION['status_peserta']=$r['status'];
		  //$_SESSION['userid']=$r['no_identitas'];
		  $_SESSION['uid']=$r['id_biodata'];
		  $tanggalogin=date("Y-m-d h:i:s"); 		
		  header('index.php');

	}else{
		  header('location:../login.php?message=401');
	}

?>