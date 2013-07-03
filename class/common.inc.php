<?php
/*
// Relative path
$conf['dir'] = str_replace('\\', '/', dirname(__FILE__));
// Absolute path
$conf['path'] = "http://".$_SERVER['SERVER_NAME'].str_replace($_SERVER['DOCUMENT_ROOT'], '', $conf['dir']);
// uri แบบที่ตัด root folder ออก
$conf['uri'] = str_replace($conf['dir'].'/', '', $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']);
// explode เพื่อตัดข้อมูลหลังจาก ? ออกไป
list($xuri) = explode('?', $conf['uri'], 2);
// explode เพื่อสร้าง array โดยการ แยก ที่ตำแหน่ง /
$uri = explode("/", $xuri);

$fixuri= explode("?", $_SERVER['REQUEST_URI']);
$furi=explode("/",$fixuri['1']);
*/
 
//ตั้งค่า url ที่จะให้วิ่งหา ท่าจะแก้ต้องแก้ .htaccess ด้วย
$page_index = "index.php"; 

//หาค่า root folder ที่รันโปรแกรมออกมา
DEFINE('BASE', preg_replace('#'.getenv('DOCUMENT_ROOT').'#', '', str_replace(array('\\', $page_index), array('/', ''), __FILE__))); 

//เอาค่า root folder ไป replace กับ uri ทั้งหมดที่ get ได้
DEFINE('TAILER', preg_replace('#'.BASE.'#', '', getenv('REQUEST_URI')));

//แยก path กับ query string ออกมาใช้งาน
$parse_url = parse_url(TAILER);

//explode url ที่ตำแหน่ง / เพื่อกำหนด segment
$uri = explode("/", $parse_url['path']);

//parse ค่าของ query string เพื่อให้กลับมาใช้งานได้ตามปกติ
parse_str($parse_url['query']);

//ทดสอบ print segment แต่ละตำแหน่งออกมา
/*echo "<pre>";
print_r($uri);
echo "<pre>";

//ทดสอบว่า query string ใช้งานได้ตามปกติ
echo "<hr />";
echo "<strong>Author:</strong> ".$_GET['author'];*/
?>

 