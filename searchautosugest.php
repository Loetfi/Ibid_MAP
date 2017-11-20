 <link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
 <script type="text/javascript" src="jquery-1.4.js"></script>
  <script type='text/javascript' src='jquery.autocomplete.js'></script>
  <script language="javascript">
$().ready(function() {	
		$("#nama").autocomplete("proses_nama.php", {
		width: 158
  });
  $("#nama").result(function(event, data, formatted) {
	var nama = document.getElementById("nama").value;
	$.ajax({
		url : 'ambilDataPlg.php?nama='+nama,
		dataType: 'json',
		data: "nama="+formatted,
		success: function(data) {
		var alamat  = data.alamat;
			$('#alamat').val(alamat);
			var tlp  = data.tlp;
			$('#tlp').val(tlp);
        }
	});	
			
	});
  
  });
  </script>
<?php
	include"koneksi.php";
	error_reporting(0);
	$query=mysql_query("select*from pelanggan where id_plg='".$_GET['id_plg']."'"); 
		$r=mysql_fetch_array($query);
echo"<form id='form' name='form' method='post' action=''>
  <table width='314' border='0' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='80'>Nama</td>
      <td width='228'><label>
        <input type='text' name='nama' id='nama' value='$r[nama]'/>
       <i>search</i>
      </label></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><input type='text' name='alamat' id='alamat' value='$r[alamat]' /></td>
    </tr>
    <tr>
      <td>Tlp</td>
      <td><input type='text' name='tlp' id='tlp' value='$r[tlp]' /></td>
    </tr>
  </table>
</form>";
?>

