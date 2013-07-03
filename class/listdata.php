<?php
include("config.php");
include("function.php");
switch($_GET['type']):
case 'district':
$sql=mysql_query("select * from amphur where PROVINCE_ID='".$_GET[Id]."'");
echo "<option value=\"\">เลือกข้อมูล</option>";
while($r=  mysql_fetch_array($sql)):
  echo "<option value=\"$r[AMPHUR_ID]\">$r[AMPHUR_NAME]</option>";
endwhile;
break;
case 'tumbon':
$sql=mysql_query("select * from district where AMPHUR_ID='".$_GET[Id]."'");
    
echo "<option value=\"\">เลือกข้อมูล</option>";
while($r=  mysql_fetch_array($sql)):
echo "<option value=\"$r[DISTRICT_ID]\">$r[DISTRICT_NAME]</option>";
endwhile;
break;
endswitch;
?>