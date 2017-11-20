<?php 
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1)
{
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}
//status informasi pada saat eksekusi database

function alert($type,$text = null){
	if($type=='info'){
		echo "<font color='white'><div class='infofly go-front' id='status'>$text</div></font>";
	}
	else if($type=='error')	{
		echo "<font color='white'><div class='errorfly go-front' id='status'>$text</div></font>";
	}
	else if($type=='download')	{
		echo "<font color='black'><center>$text</center></font>";
	}
	else if($type=='loading')		
		echo "<div id='loading'><center>$text</center></div>";
	
}
function login_alert($type,$text = null){
	if($type=='info'){
		echo "<font color='black'><div class='infofly info_login' id='status'>$text</div></font>";
	}
	else if($type=='error')	{
		echo "<font color='black'><div class='errorfly error_login' id='status'>$text</div></font>";
	}
	else if($type=='loading')		
		echo "<div id='loading'><center>$text</center></div>";
}
function save_alert($type,$text = null){
	if($type=='save'){
	echo"<div class='box-body'><div class='alert alert-success alert-dismissable'>$text</div></div>";
	}
	else if($type=='error')	{
	echo"<div class='box-body'><div class='alert alert-danger alert-dismissable'>$text</div></div>";
	}
	else if($type=='delete')	{
	echo"<div class='box-body'><div class='alert alert-danger alert-dismissable'>$text</div></div>";
	}
	else if($type=='update')
	echo"<div class='box-body'><div class='alert alert-success alert-dismissable'>$text</div></div>";
}
//fungsi redirect menggunakan php
function redirect1($url) {
	header("location:".$url);
}

//fungsi redirect menggunakan html
function htmlRedirect($link,$time = null) {
	if($time) $time = $time; else $time = 1;
	echo "<meta http-equiv='REFRESH' content='$time; url=$link'>";
}
//fungsi redirect menggunakan html
function LongRedirect($link,$time = null) {
	if($time) $time = $time; else $time = 5;
	echo "<meta http-equiv='REFRESH' content='$time; url=$link'>";
}
//fungsi redirect menggunakan html
function Redirect_Login($link,$time = null) {
	if($time) $time = $time; else $time = 2;
	echo "<meta http-equiv='REFRESH' content='$time; url=$link'>";
}
//fungsi redirect menggunakan html
function dlRedirect($link,$time = null) {
	if($time) $time = $time; else $time = 5;
	echo "<meta http-equiv='REFRESH' content='$time; url=$link'>";
}


function filter($data) {
    $data = trim(htmlentities(strip_tags($data)));
 
    if (get_magic_quotes_gpc())
        $data = stripslashes($data);
 
    $data = mysql_real_escape_string($data);
 
    return $data;
}
function url_origin($s, $use_forwarded_host=false)
{
    $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
    $sp = strtolower($s['SERVER_PROTOCOL']);
    $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
    $port = $s['SERVER_PORT'];
    $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
    $host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
    $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}
function full_url($s, $use_forwarded_host=false)
{
    return url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}
$absolute_url = full_url($_SERVER);

function anti_injection($data){
  $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  return $filter;
}
function punya_sub($id) {
   $sql1="SELECT * FROM master_instansi WHERE parent='$id'";
   $hs1=mysql_query($sql1);
   $jum=mysql_num_rows($hs1); // mendapatkan jumlah sub menu
   return $jum;
 }
function NewGuid() { 
    $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = 
        substr($s,0,8) . '-' . 
        substr($s,8,4) . '-' . 
        substr($s,12,4). '-' . 
        substr($s,16,4). '-' . 
        substr($s,20); 
    return $guidText;
}
function jin_date_str($date){
	$exp = explode('-',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'/'.$exp[1].'/'.$exp[0];
	}
	return $date;
}

function Struktur($parent = 0, $spacing = '', $user_tree_array = '') {

  if (!is_array($user_tree_array))
    $user_tree_array = array();

  $sql = "SELECT `KODE`, `INSTANSI`, `PARENT` FROM `category` WHERE 1 AND `parent` = $parent ORDER BY cid ASC";
  $query = mysql_query($sql);
  if (mysql_num_rows($query) > 0) {
    while ($row = mysql_fetch_object($query)) {
      $user_tree_array[] = array("id" => $row->cid, "name" => $spacing . $row->name);
      $user_tree_array = fetchCategoryTree($row->cid, $spacing . '&nbsp;&nbsp;', $user_tree_array);
    }
  }
  return $user_tree_array;
}
 
function get_menu($data, $parent = 0) {
 static $i = 1;
 $tab = str_repeat(" ", $i);
 if ($data[$parent]) {
 $html = "$tab<ul id='menu-tree' class='filetree'>";
 $i++;
 foreach ($data[$parent] as $v) {
 $child = get_menu($data, $v->id_menu);
 $html .= "$tab<li>";
 $html .= '<a href="'.$v->url.'">'.$v->title.'</a>';
 if ($child) {
 $i--;
 $html .= $child;
 $html .= "$tab";
 }
 $html .= '</li>';
 }
 $html .= "$tab</ul>";
 return $html;
 }
 else {
 return false;
 }
 }

// Define a 32-byte (64 character) hexadecimal encryption key
// Note: The same encryption key used to encrypt the data must be used to decrypt the data

define("ENCRYPTION_KEY", "!@#$%^&*");
//$string = "This is the original data string!";

//echo $encrypted = encrypt($string, ENCRYPTION_KEY);
//echo "<br />";
//echo $decrypted = decrypt($encrypted, ENCRYPTION_KEY);

/**
 * Returns an encrypted & utf8-encoded
 */
function encrypt($pure_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}

/**
 * Returns decrypted original string
 */
function decrypt($encrypted_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
}

//$data = 'Super secret confidential string data.';
//$encrypted_data = mc_encrypt($data, ENCRYPTION_KEY);
//echo '<h2>Example #1: String Data</h2>';
//echo 'Data to be Encrypted: ' . $data . '<br/>';
//echo 'Encrypted Data: ' . $encrypted_data . '<br/>';
//echo 'Decrypted Data: ' . mc_decrypt($encrypted_data, ENCRYPTION_KEY) . '</br>';

//$data = array(1, 5, 8, 9, 22, 10, 61);
//$encrypted_data = mc_encrypt($data, ENCRYPTION_KEY);
//echo '<h2>Example #2: Non-String Data</h2>';
//echo 'Data to be Encrypted: <pre>';
//print_r($data);
//echo '</pre><br/>';
//echo 'Encrypted Data: ' . $encrypted_data . '<br/>';
//echo 'Decrypted Data: <pre>';
//print_r(mc_decrypt($encrypted_data, ENCRYPTION_KEY));
//echo '</pre>';
function konversi_tanggal($format, $tanggal="now", $bahasa="id"){
 $en=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat","Jan","Feb",
 "Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
 
 $id=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu",
 "Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September",
 "Oktober","Nopember","Desember");
 
 // tambahan untuk bahasa prancis
 // sumber http://w.blankon.in/6V
 $fr = array("dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi",
 "janvier","février","mars","avril","Mei","mai","juillet","aoùt","septembre",
 "octobre","novembre","décembre");
 
 // mengganti kata yang berada pada array en dengan array id, fr (default id)
 return str_replace($en,$$bahasa,date($format,strtotime($tanggal)));
};

function time_ago( $date )
{
    if( empty( $date ) )
    {
        return "No date provided";
    }

    $periods = array("detik", "menit", "jam", "hari", "minggu", "bulan", "tahun", "dekade");

    $lengths = array("60","60","24","7","4.35","12","10");

    $now = time();

    $unix_date = strtotime( $date );

    // check validity of date

    if( empty( $unix_date ) )
    {
        return "Bad date";
    }

    // is it future date or past date

    if( $now > $unix_date )
    {
        $difference = $now - $unix_date;
        $tense = "yang lalu";
    }
    else
    {
        $difference = $unix_date - $now;
        $tense = "dari sekarang";
    }

    for( $j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++ )
    {
        $difference /= $lengths[$j];
    }

    $difference = round( $difference );

    if( $difference != 1 )
    {
        $periods[$j].= "";
    }

    return "$difference $periods[$j] {$tense}";

}

function smile(&$subject)
{
    $smilies = array(
        ':|'  => 'mellow',
        ':-|' => 'mellow',
        ':-o' => 'ohmy',
        ':-O' => 'ohmy',
        ':o'  => 'ohmy',
        ':O'  => 'ohmy',
        ';)'  => 'wink',
        ';-)' => 'wink',
        ':p'  => 'tongue',
        ':-p' => 'tongue',
        ':P'  => 'tongue',
        ':-P' => 'tongue',
        ':D'  => 'biggrin',
        ':-D' => 'biggrin',
        '8)'  => 'cool',
        '8-)' => 'cool',
        ':)'  => 'smile',
        ':-)' => 'smile',
        ':('  => 'sad',
        ':-(' => 'sad',
    );

    $sizes = array(
        'biggrin' => 18,
        'cool' => 20,
        'haha' => 20,
        'mellow' => 20,
        'ohmy' => 20,
        'sad' => 20,
        'smile' => 18,
        'tongue' => 20,
        'wink' => 20,
    );

    $replace = array();
    foreach ($smilies as $smiley => $imgName)
    {
        $size = $sizes[$imgName];
        array_push($replace, '<img src="imgs/'.$imgName.'.gif" alt="'.$smiley.'" width="'.$size.'" height="'.$size.'" />');
    }
    $subject = str_replace(array_keys($smilies), $replace, $subject);
}

//konversi tanggal hijri
function makeInt($angka)

{

if ($angka < -0.0000001)

{

return ceil($angka-0.0000001);

}

else

{

return floor($angka+0.0000001);

}

}



function konvhijriah($tanggal)

{

$array_bulan = array("Muharram", "Safar", "Rabiul Awwal", "Rabiul Akhir",

"Jumadil Awwal","Jumadil Akhir", "Rajab", "Sya’ban",

"Ramadhan","Syawwal", "Zulqaidah", "Zulhijjah");

$date = makeInt(substr($tanggal,8,2));

$month = makeInt(substr($tanggal,5,2));

$year = makeInt(substr($tanggal,0,4));

if (($year>1582)||(($year == "1582") && ($month > 10))||(($year == "1582") && ($month=="10")&&($date >14)))

{

$jd = makeInt((1461*($year+4800+makeInt(($month-14)/12)))/4)+

makeInt((367*($month-2-12*(makeInt(($month-14)/12))))/12)-

makeInt( (3*(makeInt(($year+4900+makeInt(($month-14)/12))/100))) /4)+

$date-32075;

}

else

{

$jd = 367*$year-makeInt((7*($year+5001+makeInt(($month-9)/7)))/4)+

makeInt((275*$month)/9)+$date+1729777;

}

$wd = $jd%7;

$l = $jd-1948440+10632;

$n=makeInt(($l-1)/10631);

$l=$l-10631*$n+354;

$z=(makeInt((10985-$l)/5316))*(makeInt((50*$l)/17719))+(makeInt($l/5670))*(makeInt((43*$l)/15238));

$l=$l-(makeInt((30-$z)/15))*(makeInt((17719*$z)/50))-(makeInt($z/16))*(makeInt((15238*$z)/43))+29;

$m=makeInt((24*$l)/709);

$d=$l-makeInt((709*$m)/24);

$y=30*$n+$z-30;

$g = $m-1;

$final = "$d $array_bulan[$g] $y H";

return $final;

}

//Contoh Menggunakannya

//$date="2014-11-12";

//$datehijriah=konvhijriah($date);

//echo "Tanggal Hari Ini : ".$date."<br/>";

//echo "Tanggal Hijriah : ".$datehijriah;

function SelisihWaktu($awal,$akhir)
{
$seconds = 0;
$detik =0;
$selisih = 0;
if(strtotime($awal)>strtotime($akhir)){
$mulai = $akhir;
$selesai = $awal;
}else{
$mulai = $awal;
$selesai = $akhir;
}
list( $g, $i, $s ) = explode( ':', $mulai );
$seconds += $g * 3600;
$seconds += $i * 60;
$seconds += $s;
$newSeconds = $seconds;

list( $g, $i, $s ) = explode( ':', $selesai );
$detik += $g * 3600;
$detik += $i * 60;
$detik += $s;
$detikbaru = $detik;

$selisih = $detikbaru-$newSeconds;

$jam = floor( $selisih / 3600 );
$selisih -= $jam * 3600;
$menit = floor( $selisih / 60 );
$selisih -= $menit * 60;

if($jam<10){ $jam='0'.$jam;}
if($menit<10){ $menit='0'.$menit;}
if($selisih<10){ $selisih='0'.$selisih;}

return "{$jam}:{$menit}:{$selisih}";

}

function datediff($tgl1, $tgl2){
$tgl1 = strtotime($tgl1);
$tgl2 = strtotime($tgl2);
$diff_secs = abs($tgl1 - $tgl2);
$base_year = min(date("Y", $tgl1), date("Y", $tgl2));
$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
}

function resize_image($lebar,$panjang,$file){
          
	
}

function build_childxx($oldID)               // Recursive function to get all of the children...unlimited depth
				{
					 	
						$tempTree=[];
						$tujuan[]="";
					 GLOBAL $exclude, $depth,$konek,$user;               // Refer to the global array defined at the top of this script
						$child_query = mysqli_query($konek,"SELECT * FROM master_organisasi WHERE kode_induk='$oldID'");
					 WHILE ( $child = mysqli_fetch_array($child_query) )
					 {
						 $kode_jb=$child['kode_organisasi'];
						 $key=$child['id_key'];
						 
						  IF ( $child['kode_organisasi'] != $child['kode_induk'] )
						  {
							   FOR ( $c=0;$c<$depth;$c++ )               // Indent over so that there is distinction between levels
							   { $tempTree .= "&nbsp;"; }
							   if ($child['jabatan']=='N'){
									$tempTree .= " -<b>" . $child['nama_organisasi'] . "</b><br>";
							   }else{
								    //username pejabat
									$qpejabat="select nama_lengkap from users where username<>'$user' and kode_jabatan='$kode_jb' and id_key='$key'";
									$rpejabat=mysqli_query($konek,$qpejabat);
									
									while ($rowpejabat=mysqli_fetch_array($rpejabat)){
										$tempTree .= "<input type='checkbox' name='tujuan[]'/>".$rowpejabat['nama_lengkap'].','.$child['nama_organisasi'] . "<br>"; 
									}
							   }
							   $depth++;          // Incriment depth b/c we're building this child's child tree  (complicated yet???)
							   $tempTree .= build_childxx($child['kode_organisasi']);          // Add to the temporary local tree
							   $depth--;          // Decrement depth b/c we're done building the child's child tree.
							   ARRAY_PUSH($exclude, $child['kode_organisasi']);               // Add the item to the exclusion list
						  }
					 }
					
					 RETURN $tempTree;          // Return the entire child tree
				}
				
function kirimemail($tujuan,$aliaspengirim,$emailpengirim,$judul,$isi) {
$cek=cekmail($tujuan);
if($cek){
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To: ' . "\r\n";
$headers .= 'From: '.$aliaspengirim.' ' . "\r\n";
@mail($tujuan, $judul, $isi, $headers);
}
}

/* pembuatan password */
//$password = 'passwordAnda';
//$passwordb_bCryptHash = bCrypt($password,12) ; 
/* 12 adalah cost bukan key, semakin tinggi nilainya maka
 semakin lama CPU menggenerate hash password yang lebih aman */
 
 
/* pengecekan password dari form login */
//$password_dari_form_login = 'passwordAnda' ; /* diambil dari password yang dikirim lewat form login */
//$password_dari_database = $passwordb_bCryptHash; 
 
//if ($password_dari_database == crypt($password_dari_form_login ,$password_dari_database)){
// echo 'selamat datang, terima kasih sudah login! jangan sungkan-sungkan';
//}
//else{
// echo 'password ANDA SALAHHH!!!'
//} 
 
function bCrypt($pass,$cost){
      $chars='./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
 
      // Build the beginning of the salt
      $salt=sprintf('$2a$%02d$',$cost);
 
      // Seed the random generator
      mt_srand();
 
      // Generate a random salt
      for($i=0;$i<22;$i++) $salt.=$chars[mt_rand(0,63)];
 
     // return the hash
    return crypt($pass,$salt);
}	

function createToken()

{

 $token= base64_encode(openssl_random_pseudo_bytes(32));

 $_SESSION['csrfvalue']=$token;

 return $token; }

function unsetToken()

{

 unset($_SESSION['csrfvalue']);

}

function validation()

{  $csrfvalue = isset($_SESSION['csrfvalue']) ? mysql_real_escape_string($_SESSION['csrfvalue']) : '';  if(isset($_POST['csrf_name']))

 {  $value_input=$_POST['csrf_name'];

  if($value_input==$csrfvalue)

 {

 unsetToken();

 return true;  }else{

 unsetToken();

 return false;

 }

 }else{

 unsetToken();

 return false;

 }

}
		
function get($url, $params=array()) 
{	

    $url = $url.'?'.http_build_query($params, '', '&');
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
    $response = curl_exec($ch);
    
    curl_close($ch);
    
    return $response;
}		
//get('http://localhost/ibid_corporate/map/api/login', array('param1'=>'value1', 'param2'=>'value2'));
function post($url, $fields)
{
    $post_field_string = http_build_query($fields, '', '&');
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field_string);
    
    curl_setopt($ch, CURLOPT_POST, true);
    
    $response = curl_exec($ch);
    
    curl_close ($ch);
    
    return $response;
}

// Sample call

//post('http://www.example.com', array('field1'=>'value1', 'field2'=>'value2'));	

function put($url, $fields)
{
    $post_field_string = http_build_query($fields, '', '&');
    
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field_string);
    
    $response = curl_exec($ch);
    
    curl_close ($ch);
    
    return $response;
}

// Sample call

//put('http://www.example.com', array('field1'=>'value1', 'field2'=>'value2'));

?>
