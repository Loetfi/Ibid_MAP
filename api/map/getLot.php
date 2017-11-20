<?php
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$id=$_GET['a'];
	$query = "select *,(select schedule_openhouse_location from webid_schedule where schedule_id=webid_auctions.id_schedule limit 1) as auc_location from webid_auctions where id_schedule='$id'";
	$rquery = mysql_query($query);
	$i=0;
	while($result = mysql_fetch_array($rquery)){
		$merk=explode(' ',$result['title']); 
		$arrayjson[$i]['0'] = $result['auc_seq']; //0
		$arrayjson[$i]['no_lot'] = $result['auc_seq']; //0
		$arrayjson[$i]['1'] = $result['minimum_bid']; //1
		$arrayjson[$i]['harga_dasar'] = $result['minimum_bid']; //1
		$arrayjson[$i]['2'] = $result['subtitle'];//2
		$arrayjson[$i]['no_polisi'] = $result['subtitle'];//2
		$arrayjson[$i]['3'] = $result['title'];//3
		$arrayjson[$i]['nama_tipe_kendaraan'] = $result['title'];//3
		$arrayjson[$i]['4'] = $result['auc_year'];//4
		$arrayjson[$i]['tahun'] = $result['auc_year'];//4
		$arrayjson[$i]['5'] = $result['auc_color'];//5
		$arrayjson[$i]['nama_warna_fisik'] = $result['auc_color'];//5
		$arrayjson[$i]['6']=$merk[0];//6
		$arrayjson[$i]['nama_merk_kendaraan']=$merk[0];//6
		$arrayjson[$i]['7'] = $result['auc_location'];//7
		$arrayjson[$i]['lokasi_barang_lelang'] = $result['auc_location'];//7
		$arrayjson[$i]['8'] = $result['auc_nopol'];//8	
		$arrayjson[$i]['no_polisi_for_user'] = $result['auc_nopol'];//8	
	$i++;
	}
	
	/* 	bagian ini digunakan untuk meng-encode ke dalam JSON 
		agar bisa digunakan oleh getjson maupun ajax JQUERY */
	echo json_encode($arrayjson);
?>