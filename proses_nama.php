<?php
include"include/connection.php";
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = mysqli_query($konek,"select * from webid_biodata where name LIKE '%$q%'");
while($r = mysqli_fetch_array($sql)) {
$nama = $r['name'];
	echo "$nama \n";
}
?>
