<?php
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
//if(count(get_included_files())==1)
//{
	//echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	//exit("Direct access not permitted.");
//}
// definisikan koneksi ke database
//$server = "localhost";
//$username = "root";
//$password = "usbw";
//$database = "ibid_ims";

//$konek = mysqli_connect($server,$username,$password,$database);

/* 
mysql_connect("localhost:45633", "web", "IndiaDelta12345%$#@!") or die(mysql_error()); mysql_select_db("ims_eauction") or die(mysql_error());
*/

$server = "ibidmysqlserver.mysql.database.azure.com";
$username = "ibidadminmysql@ibidmysqlserver";
$password = "Serasi123";
$database = "dev_map_ibid";

// $server = "localhost:45633";
// $username = "web";
// $password = "IndiaDelta12345%$#@!";
// $database = "ims_map";

mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

?>