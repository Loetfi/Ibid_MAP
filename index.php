<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['name'])){
		header('location:login.php');
}else{
		$sts=$_SESSION['status'];
		 if ($sts==2){
			header('location:dasboard.php');
		  }else if ($sts==1){
			header('location:dasboard_seller.php');
		  }
			
}	

?>