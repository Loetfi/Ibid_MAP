<?php
//error_reporting(1);
//session_start();
date_default_timezone_set('Asia/Jakarta');
require "../include/connection.php";
require "../include/fungsi.php";
		$email=$_POST['email'];
		$tgl=date("Y-m-d");
		//$pass=md5($_POST['password']);
		
		$MD5_PREFIX = "830afea5006de36e41eddb4b33182483";
		$pass = md5($MD5_PREFIX . $_POST['password']);
		
		$tipe_id=$_POST['propinsi'];
		$no_id=$_POST['no_id'];
		$phone=$_POST['phone'];

		//API cek biodata
		
		$url="http://ibid.co.id/api/map/get_biodata_detail.php?id='$no_id'";
		$content=file_get_contents($url);  // add your url which contains json file
		$json = json_decode($content, true);

		$count=count($json);
		if ($count){
					for($i=0;$i<$count;$i++)
						{
							$name=$json[$i]['name'];
							$status=$json[$i]['status_peserta'];
							$bio_id=$json[$i]['id'];
							$identitas=$json[$i]['no_identitas'];
							$query_user = "insert into map_users(username,password,name,status,id_biodata,no_identitas)
							VALUES('$email','$pass','$name','$status','$bio_id','$identitas')";
							$hasil_user = mysql_query($query_user);
								//kirim email
							header("location:../login.php?message=200");
							
						}	

		}else{
			header("location:../login.php?message=400");
		}
	

?>