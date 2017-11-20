<?php 
$item=$_GET['id'];
$file="http://eauction.ibid.co.id/blue-t/PDFShare/".$item."/inspection.pdf";
header('Content-type: application/pdf');
header("Cache-Control: no-cache");
header("Pragma: no-cache");
header("Content-Disposition: inline;filename=$file");
echo $file;
?>
