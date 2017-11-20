<style type="text/css">
<!--
.head_tbl {
	font-size: 14px;
	font-weight: bold;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	text-transform: uppercase;
	color: #FFFFFF;
	background-color: #FF0000;
}

.style9 {	color: #000000;
	font-size: 9pt;
	font-weight: normal;
	font-family: Arial;
}
-->
</style>
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
  <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/switchery/switchery.min.css" /> 
  <script src="js/icheck/icheck.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/nprogress.js"></script>
<script type="text/javascript">
function ambil(a){
	window.opener.document.form.nama.value = document.getElementById("nama"+a+"").innerHTML;
	window.opener.document.form.alamat.value = document.getElementById("alamat"+a+"").innerHTML; 	
	window.opener.document.form.tlp.value = document.getElementById("no_identitas"+a+"").innerHTML;
	window.close();
	
}

</script>
 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <tr>
    <td><form id="form" name="form1" method="post" action="">
      <label>
        Nama
        <input type="text" name="cari" id="cari" />
        </label>
      <label>
        <input type="submit" name="button" id="button" value="cari" onClick="pencarian()" />
        </label>
    </form></td>
  </tr>
</table>
 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<tr class="head_tbl">
    <td width="122" bgcolor="#FF0000"><div align="center">Nama</div></td>
    <td width="224" bgcolor="#FF0000"><div align="center">Alamat</div></td>
     <td width="90" bgcolor="#FF0000"><div align="center"><span class="style1">No Identitas</span></div></td>
  </tr>
<?php
error_reporting(0);
	include"include/connection.php";
	$hal = $_GET[hal];
if(!isset($_GET['hal'])){ 
    $page = 1; 
} else { 
    $page = $_GET['hal']; 
}
$jmlperhalaman = 20;  // jumlah record per halaman
$offset = (($page * $jmlperhalaman) - $jmlperhalaman);  


if($_GET['flag']==1)
{
	$cari=$_GET['cari'];
	$sql=mysqli_query($konek,"select * from webid_biodata where name LIKE '%".$cari."%' limit $offset, $jmlperhalaman") or die (mysqli_error());

}
else
{

	$sql=mysqli_query($konek,"select * from webid_biodata limit $offset, $jmlperhalaman") or die (mysqli_error());
}
$i=1;
while($rs=mysqli_fetch_array($sql))
{
if($i%2==0)
	{
		echo("<tr onclick=\"ambil('$rs[0]')\" bgcolor=\"#FFEEEE\">");
	}
	else
	{
		echo("<tr onclick=\"ambil('$rs[0]')\">");
	}?>
<td width="122" id="nama<?=$rs[0];?>"><?=$rs[name];?></td>
<td width="224" id="alamat<?=$rs[0];?>"><?=$rs[alamat];?></td>
<td width="150" id="tlp<?=$rs[0];?>"><?=$rs[no_identitas];?></td>
<?php  $i++;
}
?>
</table>
<?php

if($_GET['flag']==1)
{
	$cari=$_GET['cari'];
	$total_record = mysqli_result(mysqli_query($konek,"SELECT COUNT(*) as Num FROM webid_biodata where  nama LIKE '%".$cari."%'"),0);
}
else
{
	$total_record = mysqli_result(mysqli_query($konek,"SELECT COUNT(*) as Num FROM webid_biodata"),0);
}
$total_halaman = ceil($total_record / $jmlperhalaman);
echo "<center>"; 
$perhal=4;
if($hal > 1){ 
    $prev = ($page - 1); 
    if($_GET['flag']==1)
	{
		echo "<a href=$_SERVER[PHP_SELF]?hal=$prev&cari=$_GET[cari]&flag=1> << </a> "; 
	}
	else
	{
		echo "<a href=$_SERVER[PHP_SELF]?hal=$prev> << </a> "; 
	}
}
if($total_halaman<=10){
$hal1=1;
$hal2=$total_halaman;
}else{
$hal1=$hal-$perhal;
$hal2=$hal+$perhal;
}
if($hal<=5){
$hal1=1;
}
if($hal<$total_halaman){
$hal2=$hal+$perhal;
}else{
$hal2=$hal;
}
for($i = $hal1; $i <= $hal2; $i++){ 
    if(($hal) == $i){ 
        echo "[<b>$i</b>] "; 
        } else { 
    if($i<=$total_halaman){
            if($_GET['flag']==1)
		{
			echo "<a href=$_SERVER[PHP_SELF]?hal=$i&cari=$_GET[cari]&flag=1>$i</a> "; 
		}
		else
		{
			echo "<a href=$_SERVER[PHP_SELF]?hal=$i>$i</a> "; 
		}  
    }
    } 
}
if($hal < $total_halaman){ 
    $next = ($page + 1); 
    if($_GET['flag']==1)
	{
		echo "<a href=$_SERVER[PHP_SELF]?hal=$next&cari=$_GET[cari]&flag=1> >> </a>"; 
	}
	else
	{
		echo "<a href=$_SERVER[PHP_SELF]?hal=$next> >> </a>"; 
	} 
} 
echo "</center>"; 
?>
<script type="text/javascript">
function pencarian()
{
	var cari=document.getElementById('cari').value;
	document.form1.action="popupsearch.php?flag=1&cari="+cari;
	document.form1.submit();
}	
</script>
