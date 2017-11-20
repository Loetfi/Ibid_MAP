<!DOCTYPE html>
<html>
<head>
<title>JSON JQUERY - PHP</title>

<script   src="https://code.jquery.com/jquery-3.1.1.js"   
integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="   
crossorigin="anonymous"></script>

<script type="text/javascript">
$("document").ready(function(){
	/* untuk letak url silahkan di sesuaikan dengan letak script di folder htdocs Anda */
	$.getJSON('http://localhost/ibid_corporate/api/jadwal_all', { get_param: 'value' }, function(data) {
	    $.each(data, function(index, element) {		
			/* mengisikan table dari hasil json */
			// alert(element.id);
			$('#tabledata').find('tbody')
				.append($('<tr>')
						.append(
							'<td>'+element.schedule_id+'</td>'+
							'<td>'+element.schedule_date+'</td>'+
							'<td>'+element.schedule_kota+'</td>'+
							'<td>'+element.schedule_location+'</td>'+
							'<td>'+element.schedule_openhouse_start+'</td>'+
							'<td>'+element.schedule_openhouse_end+'</td>'+
							'<td>'+element.schedule_officer+'</td>'
						)
				);
	    });
	});		
});
</script>
</head>
<body>
	<h1>Baca Jadwal</h1>
	<p>Halaman ini mendemokan bagaimana GetJSON JQUERY mampu mempersing data JSON yang digenerate oleh PHP JSON ENCODE</p>
 
	<table border="1" width="60%" id="tabledata">
		<thead>
			<tr><th>Nama</th><th>ALamat</th><th>Kelurahan</th><th>Kecamatan</th><th>Kota</th><th>Provinsi</th><th>Kodepos</th></tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<br />
	<a href="">Kembali ke tutorial</a>
</body>
</html>