<?php
//define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
//define('PHP_FIREWALL_ACTIVATION', true );
//if ( is_file( @dirname(__FILE__).'firewall/firewall.php' ) )
//include_once( @dirname(__FILE__).'firewall/firewall.php' );
include ('../include/connection.php');
include ('../include/fungsi.php');
date_default_timezone_set('Asia/Jakarta');
// fungsi untuk menghindari injeksi dari user yang jahil


$MD5_PREFIX = "830afea5006de36e41eddb4b33182483";
$usernamea = $_POST['username'];
//$password = md5($_POST['password']);
$passworda = md5($MD5_PREFIX . $_POST['password']);
//var_dump($password);
//exit();
// menghindari sql injection
//$injeksi_username = mysq_escape_string($konek, $username);
//$injeksi_password = mysq_real_escape_string($konek, $password);

$username = mysql_real_escape_string($usernamea);
$password = mysql_real_escape_string($passworda);
	
  $query  = "SELECT id , username , name , status , id_biodata FROM map_users WHERE username='$username' AND password='$password'";
  $login  = mysql_query($query);
  $ketemu = mysql_num_rows($login);
  $r      = mysql_fetch_assoc($login);
 
 // Apabila username dan password ditemukan
	if ($ketemu > 0){
		  session_start();
		  //include "timeout.php";
		  $_SESSION['username']=$r['username'];
		  $_SESSION['name'] = $r['name'];  
		  $_SESSION['status']	=$r['status']; 
		  $_SESSION['status_peserta']	=$r['status']; 
		  $_SESSION['uid']	=$r['id_biodata']; 
		  
		  $tanggalogin=date("Y-m-d h:i:s"); 
		  $queryupdt = "UPDATE map_users SET login_date = '$tanggalogin' WHERE id = '".$r['id']."' ";
		  $runupdt = mysql_query($queryupdt);
  // session timeout
    //timer();
	if ($_SESSION['status']==2){
		header('location:../dasboard.php');
	}else{
		header('location:../dasboard_seller.php');
	}
	}else{
		header("location:../login.php?message=401");
	}
?>