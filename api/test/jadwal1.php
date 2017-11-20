<!DOCTYPE html>
<html>
<head>
<title></title>
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<script type="text/javascript">
$("document").ready(function(){
	/* untuk letak url silahkan di sesuaikan dengan letak script di folder htdocs Anda */               
  
	$.getJSON('http://localhost/ibid_corporate/map/api/test/data.php', { get_param: 'value' }, function(data) {
	    $.each(data, function(index, element) {		
			/* mengisikan table dari hasil json */
			// alert(element.id);
			$('#tabledata').find('tbody')
				.append($('<tr>')
						.append(
							'<td>'+element.schedule_id+'</td>'+
							'<td>'+element.schedule_kota+'</td>'+
							'<td>'+element.schedule_location+'</td>'+
							'<td>'+element.schedule_date+'</td>'+
							'<td>'+element.schedule_officer+'</td>'+
							'<td>'+element.schedule_code+'</td>'
						
						)
				);
	    });    
   
	});		
});
</script>
</head>
<body>

	<table border="1" width="60%" id="tabledata">
		<thead>
			<tr><th>Schedule ID</th>
			<th>Kota</th>
			<th>Lokasi</th>
			<th>Tanggal</th>
			<th>Officer</th>
			<th>Kode</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<br />
   <select id="pilih"> 
   <option value="0">Silakan Pilih Jadwal</option>
   </select>
</body>
</html>