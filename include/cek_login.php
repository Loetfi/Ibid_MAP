<?php
define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'firewall/firewall.php' ) )
include_once( @dirname(__FILE__).'firewall/firewall.php' );
include ('connection.php');
include ('fungsi.php');
date_default_timezone_set('Asia/Jakarta');
// fungsi untuk menghindari injeksi dari user yang jahil

$username = anti_injection($_POST['username']);
$password = anti_injection(md5($_POST['password']));

// menghindari sql injection
$injeksi_username = mysq_real_escape_string($konek, $username);
$injeksi_password = mysq_real_escape_string($konek, $password);

	
  $query  = "SELECT * FROM map_users WHERE nick='$username' AND password='$password'";
  $login  = mysql_query($konek, $query);
  $ketemu = mysql_num_rows($login);
  $r      = mysql_fetch_array($login);
 
 // Apabila username dan password ditemukan
	if ($ketemu > 0){
		  session_start();
		  //include "timeout.php";
		  $_SESSION['login']='True';
		  $_SESSION['GUID'] = NewGuid();  
		  $_SESSION['tipe']	='0'; 	
		  $tanggalogin=date("Y-m-d h:i:s"); 
  // session timeout
    //timer();
		header('location:dasboard.php');
	}else{
		
	}

?>