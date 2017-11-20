<?php
	date_default_timezone_set('Asia/Jakarta');
	require_once "config.php";
	$id=$_GET['a'];
	$item=$_GET['b'];
	$query = "select *,(select schedule_openhouse_location from webid_schedule where schedule_id=webid_auctions.id_schedule limit 1) as auc_location from webid_auctions where id_schedule='$id' and idauction_item='$item'";
	$rquery = mysql_query($query);
	$i=0;
	while($result = mysql_fetch_array($rquery)){
		$merk=explode(' ',$result['title']);
		
		$arrayjson[$i]['no_lot'] = $result['auc_seq']; //1
		$arrayjson[$i]['harga_dasar'] = $result['minimum_bid'];//2
		$arrayjson[$i]['nomor_polisi'] = $result['subtitle'];//3
		$arrayjson[$i]['nama_tipe_kendaraan'] = $result['title'];//4
		$arrayjson[$i]['tahun'] = $result['auc_year'];//5
		$arrayjson[$i]['nama_warna_fisik'] = $result['auc_color'];//6
		$arrayjson[$i]['nama_merk_kendaraan']=$merk[0];//7
		$arrayjson[$i]['lokasi_display'] = $result['auc_location'];//8
		$arrayjson[$i]['no_polisi_for_user'] = $result['auc_nopol'];//9
		$arrayjson[$i]['id_jadwal_lelang'] = $result['id_schedule'];//10
		$arrayjson[$i]['no_rangka'] = $result['nomor_rangka'];//11
		$arrayjson[$i]['no_mesin'] = $result['nomor_mesin'];//12
		$arrayjson[$i]['kilometer'] = $result['title'];//13
		$arrayjson[$i]['batas_berlaku_stnk'] = $result['tanggal_stnk'];//14
		$arrayjson[$i]['tanggal_keur'] = $result['tanggal_keur'];//15
		$arrayjson[$i]['alamat_display'] = $result['auc_location'];//16
		$arrayjson[$i]['id_pendaftaran_kendaraan'] = $result['id'];//17
		$arrayjson[$i]['catatan'] = $result['description'];//18
		
		
		
	$i++;
	}
	
	/* 	bagian ini digunakan untuk meng-encode ke dalam JSON 
		agar bisa digunakan oleh getjson maupun ajax JQUERY */
	echo json_encode($arrayjson);
?>