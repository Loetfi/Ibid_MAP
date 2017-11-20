<?php 
session_start();
//$_SESSION['login']='';
//$_SESSION['tipe']='';
//$_SESSION['username']='';
//$_SESSION['name']='';
session_unset();
session_destroy();

header('location:login.php');
exit();
?>