<?php
$cc=$_GET['cc']; 


include 'include/konek_ims.php';


$query_all = "select id_attrdetail,attributedetail from webid_msattrdetail where id_parent = '".$cc."' and sts_deleted = 0 ";
$rquery_all = mysql_query($query_all);
											
echo "<option value='0'>-- Pilih Grade --</option>";								
while($row_all = mysql_fetch_assoc($rquery_all)) {
		echo '<option value="'.$row_all['id_attrdetail'].'">'.$row_all['attributedetail'].'</option>';
	}

?>