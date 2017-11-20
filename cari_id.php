<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'usbw';
$dbName = 'ibid_ims';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM webid_biodata WHERE no_identitas LIKE '%".$searchTerm."%' ORDER BY name ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['no_identitas'].','.$row['name'];
}
//return json data
echo json_encode($data);
?>