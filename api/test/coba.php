<!DOCTYPE html>
<html>
<head>
<title>BELAJAR JSON</title>
</head>
<body>
<?php
 // membuat koneksi ke database
 $host = 'localhost';
 $user = 'root';
 $pass = 'usbw';
 $db = 'ibid_ims';

 $conn = mysql_connect($host, $user, $pass);
 mysql_select_db($db, $conn);

 // menampilkan data dari database
 $sql = 'SELECT * FROM webid_schedule';
 $rs = mysql_query($sql);

 $i = 0;
 while($row = mysql_fetch_array($rs)){
  $datas[$i]['schedule_id'] = $row['schedule_id'];
  $datas[$i]['schedule_kota'] = $row['schedule_kota'];
  $datas[$i]['schedule_location'] = $row['schedule_location'];
	$i++;
 }

 // jika anda cetak dengan print_r($datas) makan akan menghasilkan array seperti ini

 // Array ( [0] => Array ( [id] => 1 [nama] => Rohmat [alamat] => Jln. Pantura ciasem tengah ) [1] => Array ( [id] => 2 [nama] => Mimin [alamat] => Jlan. Krajan timur ) [2] => Array ( [id] => 3 [nama] => Maman [alamat] => Jlan. Krajan barat ) [3] => Array ( [id] => 4 [nama] => Roni [alamat] => Jlan. Mekar sari indah ) ) 

 // jika datas di rubah menjadi format JSON dengan menggunakan json_decode makan akah menghasilkan JSON Array seperti ini
 $json = json_encode($datas);
 // [{"id":"1","nama":"Rohmat","alamat":"Jln. Pantura ciasem tengah"},{"id":"2","nama":"Mimin","alamat":"Jlan. Krajan timur"},{"id":"3","nama":"Maman","alamat":"Jlan. Krajan barat"},{"id":"4","nama":"Roni","alamat":"Jlan. Mekar sari indah "}] 

 // seperti yang sudah saya contohkan di atas untuk membaca format JSON di PHP anda harus merubahnya kembali ke Array dengan menggunakan json_decode
 $json = json_decode($json);
 
 // meloop data Array Object
 echo '<table>';
 foreach($json as $data){
  echo '<tr><td>ID : '.$data->schedule_id.'</td>';
  echo '<td>NAMA : '.$data->schedule_kota.'</td>';
  echo '<td>ALAMAT : '.$data->schedule_location.'</td>';
  echo '<tr/>';
 }
 echo '</table>';
 
 // jika anda buka di browser maka akan menghasilkan
 // ID : 1
 // NAMA : Rohmat
 // ALAMAT : Jln. Pantura ciasem tengah
 // ...... dan seterusnya
?>
</body>
</html>
