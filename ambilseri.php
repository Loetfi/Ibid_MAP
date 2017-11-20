<?php
include 'include/konek_ims.php';
$merk = $_GET['merk'];

/*mysql_connect("localhost:45633", "web", "IndiaDelta12345%$#@!") or die(mysql_error());
mysql_select_db("ims_eauction") or die(mysql_error());*/

$query_seri = "select id_attrdetail,attributedetail from webid_msattrdetail where id_parent = '".$merk."' and sts_deleted = 0 ";
$rquery_seri = mysql_query($query_seri);
											
echo "<option value='0'>-- Pilih Seri --</option>";								
while($row_seri = mysql_fetch_assoc($rquery_seri)) {
		echo '<option value="'.$row_seri['id_attrdetail'].'">'.$row_seri['attributedetail'].'</option>';
	}

?>