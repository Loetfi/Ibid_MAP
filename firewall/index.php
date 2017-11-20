<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['leveluser'])){
    header('location:../login.php');
	//exit();
}
define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'../firewall/firewall.php' ) )
include_once( @dirname(__FILE__).'../firewall/firewall.php' );

?>