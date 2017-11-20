<?php 
require 'vendor/autoload.php';
require 'libs/NotORM.php'; 
//membuat dan mengkonfigurasi slim app
$app = new \Slim\app;

// konfigurasi database
$dbhost = '192.168.0.100:3306';
$dbuser = 'root';
$dbpass = 'Serasi123';
$dbname = 'new_eauction';
$dbmethod = 'mysql:dbname=';

$dsn = $dbmethod.$dbname;
$pdo = new PDO($dsn, $dbuser, $dbpass);
$db  = new NotORM($pdo);

//mendefinisikan route app dihome
$app-> get('/', function(){
	echo "API Server is ON :)";
});

// Mendapatkan semua data user 
$app ->get('/user_all', function() use($app, $db){
	foreach($db->map_users() as $data){
		$user_all['user_list'][] = array(
			'username' => $data['username'],
			'nama' => $data['name'],
			'status' => $data['status']
			);
	}
    echo json_encode($user_all);
});

// Mendapatkan Jadwal Lelang 
$app ->get('/schedule_all', function() use($app, $db){
	foreach($db->webid_schedule() as $data){
		$user_all['schedule_all'][] = array(
			'schedule_kota' => $data['schedule_kota'],
			'schedule_date' => $data['schedule_date'],
			'schedule_openhouse_start' => $data['schedule_openhouse_start'],
			'schedule_openhouse_end' => $data['schedule_openhouse_end'],
			'schedule_location' => $data['schedule_location']
			);
	}
    echo json_encode($user_all);
});
// Mendapatkan Jadwal Lelang 
$app ->get('/schedule_all/{kota}', function() use($app, $db){
	foreach($db->webid_schedule() as $data){
		$user_all['schedule_all'][] = array(
			'schedule_kota' => $data['schedule_kota'],
			'schedule_date' => $data['schedule_date'],
			'schedule_openhouse_start' => $data['schedule_openhouse_start'],
			'schedule_openhouse_end' => $data['schedule_openhouse_end'],
			'schedule_location' => $data['schedule_location']
			);
	}
    echo json_encode($user_all);
});

// Mendapatkan salah satu user
$app ->get('/login/{nick}', function($request, $response, $args) use($app, $db){
	$login = $db->webid_users()->where('nick',$args['nick']);
	if($data = $login->fetch()){
		echo json_encode(array(
			'username' => $data['nick'],
			'nama' => $data['name'],
			'phone' => $data['phone'],
			'status_peserta' => $data['status_peserta']
			));
	}
	else{
		echo json_encode(array(
			'status' => false,
			'message' => "Wrong User/Password "
			));
	}
});

//tambah produk baru
$app->post('/produk', function($request, $response, $args) use($app, $db){
	$produk = $request->getParams();
	$result = $db->produk->insert($produk);
	echo json_encode(array(
		"status" => (bool)$result,
		));

});
//update produk
$app->put('/produk/{id}', function($request, $response, $args) use($app, $db){
	$produk = $db->produk()->where("id_produk", $args);
	if($produk->fetch()){
		$post=$request->getParams();
		$result= $produk->update($post);
		echo json_encode(array(
			"status" => (bool) $result,
			"message" => "Produk sudah sukses diupdate "));
	}
	else{
		echo json_encode(array(
			"status" => false,
			"message" => "Produk id tersebut tidak ada"));
	}
});
//menghapus produk
$app->delete('/produk/{id}', function($request, $response, $args) use($app, $db){
	$produk = $db->produk()->where('id_produk', $args);
	if($produk->fetch()){
		$result = $produk->delete();
		echo json_encode(array(
			"status" => true,
			"message" => "Produk berhasil dihapus"));
	}
	else{
		echo json_encode(array(
			"status" => false,
			"message" => "Produk id tersebut tidak ada"));
	}
});

//run App
$app->run();
