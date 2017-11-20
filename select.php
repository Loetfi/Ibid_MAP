<?php 
$mysql_link = mysql_connect('localhost','root','usbw') or die ("can't connect to mysql"); 
$mysql_select = mysql_select_db('ibid_ims',$mysql_link) or die ("can't select db"); 
?> 

<html> 
<head> 
<title>Dynamic Dropdown</title> 
<script language="javascript"> 
function setOptions(chosen) { 
  var selbox = document.myform.selectmodel; 
    
  selbox.options.length = 0; 
  if (chosen == "0") { 
    selbox.options[selbox.options.length] = new Option('First select a car','0'); 
    
  } 
  <?php 
  $car_result = mysql_query("SELECT * FROM map_make") or die(mysql_error()); 
  while(@($c=mysql_fetch_array($car_result))) 
  { 
  ?> 
    if (chosen == "<?php=$c['id'];?>") { 
     
    <?php 
    $c_id = $c['id']; 
    $mod_result = mysql_query("SELECT * FROM map_seri WHERE id_make='$c_id'") or die(mysql_error()); 
    while(@($m=mysql_fetch_array($mod_result))) 
    { 
    ?> 
      selbox.options[selbox.options.length] = new 
      Option('<?php=$m['name'];?>','<?php=$m['id'];?>'); 
    <?php 
    } 
    ?> 
    } 
  <?php 
  } 
  ?> 
} 
</script> 
</head> 
<body> 
<form name="myform"><div align="center"> 
<select name="selectcar" size="1" 
onchange="setOptions(document.myform.selectcar.options 
[document.myform.selectcar.selectedIndex].value);"> 
<option value="0" selected>Select a car</option> 
<?php 
$result = mysql_query("SELECT * FROM map_make") or die(mysql_error()); 
while(@($r=mysql_fetch_array($result))) 
{ 
?> 
  <option value="<?php=$r['id'];?>"><?php=$r['make'];?></option> 
<?php 
} 
?> 
</select><br><br> 
<select name="selectmodel" size="1"> 
<option value=" " selected>First select a car</option> 
</select><br><br> 
<input type="button" name="go" value="Value Selected" 
onclick="alert(document.myform.selectmodel.options 
[document.myform.selectmodel.selectedIndex].value);"> 
</div></form> 
</body> 
</html>