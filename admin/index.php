<?php
session_start();
include("../class/config.php");
include("../class/function.php");
include("../class/display.php");
include("../class/lang.php");
include("../class/lib.php");
include('../class/common.inc.php');
$StrDB= new Db_Process();
$StrDisplay= new Web_Display();
include('header.php');

  
 if(isset($action)  ) {
        switch ($action) {
          case 'logout':
              $StrDB->Logout();
              $StrDisplay->GoUrl('0','index.php');
            break;
          
         case 'login':
            
          $StrDB->Login($_POST['UserName'],$_POST['Password']);
          
            break;
        
          case 'register':
              if($_POST['adddata']):
                  $StrDB->InsertData("tb_user", "
                      '".NULL."' ,
                          '".mysql_real_escape_string($_POST['txt-name'])."' ,
                               '".mysql_real_escape_string($_POST['txt-email'])."' ,
                                    '".md5(mysql_real_escape_string($_POST['txt-password']))."' ,
                                         '".  mysql_real_escape_string($_POST['txt-province'])."' ,'2'
                    ");
              $StrDisplay->AddSuccess();
              $StrDisplay->GoUrl("0", "index.php");
              endif;
              $StrDisplay->Open_Form("/admin/index.php?action=".$action);
              $StrDisplay->Title_Form("สมัครสมาชิก");
              $StrDisplay->TxtInput("ชื่อ-นามสกุล", "txt-name");
              $StrDisplay->TxtInput("อีเมล์", "txt-email",'',2);
              $StrDisplay->TxtInputPassword("รหัสผ่าน","txt-password");
              $StrDisplay->OpenSelectInput("จังหวัด", "txt-province");
              $StrDB->ListBoxData("province", "*", "order by PROVINCE_NAME asc ","PROVINCE_ID", "PROVINCE_NAME");
                                  
              $StrDisplay->CloseSelectInput();
              $StrDisplay->Button_Form(1);
              $StrDisplay->Close_Form();
              break;
          }
        }else if(!isset($_SESSION['Usr']) ){
          $StrDisplay->login_form();

        }
  if(isset($_SESSION['Usr']) && isset($action) && $action !="login" && $action !="logout"){
     if(!isset($section)):
          if(isset($_SESSION['Aumphur'] ) &&  isset($_SESSION['Tumbon'])):
echo "<div style=\"float:right;padding:15px;margin-bottom:15px;\">";
echo "<a href=\"".WebUrl."admin/index.php?action=".$action."&section=destroy_all\" class=\"btn btn-danger\"><i class=\"icon-certificate icon-white\"></i> เลือกข้อมูลใหม่หมด</a>&nbsp;&nbsp;";
echo "<a href=\"".WebUrl."admin/index.php?action=".$action."&section=destroy_tumbon\" class=\"btn btn-info\"><i class=\"icon-remove icon-white\"></i> เลือกตำบลใหม่</a>&nbsp;&nbsp;";
echo "<a href=\"".WebUrl."admin/index.php?action=".$action."&section=show\" class=\"btn btn-success\"><i class=\"icon-search icon-white\"></i> ปรับแก้ข้อมูล</a>&nbsp;&nbsp;";
echo "<a href=\"".WebUrl."admin/index.php?action=".$action."&section=addform\" class=\"btn btn-primary\"><i class=\"icon-plus icon-white\"></i> เพิ่มชื่อใหม่ </a>";
//echo "<a href=\"exportsd27.php?KeyAID=".$KeyAID."&KeyTID=".$KeyTID."&AumId=".$GetTID['DISTRICT_CODE']."\" target=\"_blank\" class=\"btn btn-warning\"><i class=\"icon-arrow-right icon-white\"></i> ส่งออกไฟล์ Excel</a>";
echo "</div><br>";
 endif;
      endif;
      if(!empty($action) ) {
      require_once 'module/'.$action.'.php';
      }else{
        $StrDisplay->GoUrl('0','index.php');
     }
}
          

 
?>

