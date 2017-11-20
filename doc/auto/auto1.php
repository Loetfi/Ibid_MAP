<?php
//include ('include/conn.php');

//CREDENTIALS FOR DB
define ('DBSERVER', 'localhost');
define ('DBUSER', 'root');
define ('DBPASS','usbw');
define ('DBNAME','registerkesenian');

//LET'S INITIATE CONNECT TO DB
$connection = mysql_connect(DBSERVER, DBUSER, DBPASS) or die("Can't connect to server. Please check credentials and try again");
$result = mysql_select_db(DBNAME) or die("Can't select database. Please check DB name and try again");
//$q = trim(strip_tags($_GET['term'])); // variabel $q untuk mengambil inputan user

$q = $_GET['term'];
$sql = mysql_query("SELECT * FROM seniman WHERE nik LIKE '%".$q."%'"); // menampilkan data yg ada didatabase yg sesuai dengan inputan user
while ($data = mysql_fetch_array($sql)){
	//$result[] = htmlentities(stripslashes($data['nm_jabatan_eks'])); // manempilkan nama jabatan
		
		//$row['value']	=$data['kode_barang'];
		$row['value']	=$data['nik'];
		$row['namaorga']	=$data['namaorga'];
		$row['nama']	=$data['nama'];
		$row['alamat']	=$data['alamat'];
		$row_set[]		=$row;
}
//echo json_encode($result);
echo json_encode($row_set);
?>