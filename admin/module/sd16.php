<?php
        
if($_POST['btsd16']){
    $_SESSION['Aumphur']=$_POST['Aumphur'];
    $_SESSION['Tumbon']=$_POST['Tumbon'];
    $StrDisplay->GoUrl('0',"index.php?action=".$action);
}
if(!$_SESSION['Aumphur'] && !$_SESSION['Tumbon']) {
    $StrDisplay->listhome_form("sd16",'',$_SESSION['Province_id']);
}else if(isset($_SESSION['Aumphur']) && !$_SESSION['Tumbon']){
   
       $StrDisplay->listhome_form("sd16",$_SESSION['Aumphur'],$_SESSION['Province_id']);
    }else{
        $GetAID=$StrDB->GetData("amphur", "where AMPHUR_ID='".$_SESSION['Aumphur']."'  ");
    $KeyAID=substr($GetAID['AMPHUR_CODE'], 2); 
    $_SESSION['KeyAID']=$KeyAID;
    $GetTID=$StrDB->GetData("district","where DISTRICT_ID='".$_SESSION['Tumbon']."' ");
    $KeyTID=substr($GetTID['DISTRICT_CODE'], 4); 
    $_SESSION['KeyTID']=$KeyTID;
    $sql="select * from tb_data0 where AA='".$KeyAID."' and TT='".$KeyTID."'   ";
    $re=$StrDB->Query($sql); 
        if($_GET['section']){
             switch ($_GET['section']):
        case 'destroy_tumbon':
            unset($_SESSION['Tumbon']);
            $StrDisplay->_AlertMsg();
            $StrDisplay->GoUrl('1',"index.php?action=".$action);
        
            break;
        case 'destroy_all':
            unset($_SESSION['Tumbon']);
            unset($_SESSION['Aumphur']);
             $StrDisplay->_AlertMsg();
             $StrDisplay->GoUrl('1',"index.php?action=".$action);
            break;
        case 'addform':
             if($_POST['adddata']):
                  $Mfile=$StrDB->UploadFile('data16'); 
        
$URL = "data16/".$Mfile."";
$file=@fopen($URL,"r") or die("Can Not Open File. Please contact admin!");
  $lines = count(file($URL)); 
$i=1;
 while (!feof($file)){
   $buffer = fgets($file, 4096);

$patterns = array("/\s+/", "/\s([?.!])/");
$replacer = array(" ","$1");
$str = preg_replace( $patterns, $replacer, $buffer);
//echo $str."<br>";
$text=explode(" ",$str);
        
//$mainline=$line-1;
        
  for($i=0;$i<count($lines);$i++)    {  
   $sql=$StrDB->InsertData("tb_sd16"," '".NULL."','".$text[0]."','".$text[1]."','".$text[2]."','".$text[3]."','".$text[4]."','".$text[5]."' 
       ,'".$text[6]."','".$text[7]."','".$text[8]."','".$text[9]."','".$text[10]."','".$text[11]."' 
           ,'".$text[12]."','".$text[13]."','".$text[14]."','".$text[15]."','".$text[16]."','".$text[17]."' 
               ,'".$text[18]."','".$text[19]."','".$text[20]."','".$text[21]."','".$text[22]."','".$text[23]."' 
                     ,'".$text[24]."','".$text[25]."','".$text[26]."','".$text[27]."','".$text[28]."','".$text[29]."' 
               ,'".$text[30]."','".$text[31]."' 

        ");
  }
        
}
@fclose($file);
              $StrDisplay->_AlertMsg();
            $StrDisplay->GoUrl('1',"index.php?action=".$action);
             endif;
                 if($_POST['addform']):
                  $Mfile=$StrDB->UploadFile('data16'); 
        
$URL = "data16/".$Mfile."";
$file=@fopen($URL,"r") or die("Can Not Open File. Please contact admin!");
  $lines = count(file($URL)); 
$i=1;
 while (!feof($file)){
   $buffer = fgets($file, 4096);

$patterns = array("/\s+/", "/\s([?.!])/");
$replacer = array(" ","$1");
$str = preg_replace( $patterns, $replacer, $buffer);
//echo $str."<br>";
$text=explode(" ",$str);
        
   $datastr=preg_replace('~[^ก-๙]~iu','',$text[0]);
        
  $datanum=preg_replace('~[^0-9]~iu','',$text[0]);
        
        
        
  for($i=0;$i<count($lines);$i++)    {  
   $sql=$StrDB->InsertData("tb_datasd16"," '".NULL."','".$datanum."','".$datastr."','".$text[1]."'    ");
  } 
        
} 
@fclose($file);
              $StrDisplay->_AlertMsg();
           $StrDisplay->GoUrl('1',"index.php?action=".$action);
             endif;
                 $StrDisplay->Title_Form("",'1');
	$StrDisplay->Open_Form("admin/index.php?action=".$action."&section=".$section);
                    $StrDisplay->TxtInputFile("นำไฟล์เข้าระบบ","file");
                 $StrDisplay->Button_Form('1');
              
	$StrDisplay->Close_Form();
        
         $StrDisplay->Title_Form("",'');
	$StrDisplay->Open_Form("admin/index.php?action=".$action."&section=".$section);
                    $StrDisplay->TxtInputFile("ไฟล์แก้ชื่อสกุล เข้าระบบ","file");
                 $StrDisplay->Button_Form('3');
              
	$StrDisplay->Close_Form();
            break;
    endswitch;
        }else{
            
  echo "<h4> ข้อมูล อำเภอ ".$GetAID['AMPHUR_NAME']." ตำบล ".$GetTID['DISTRICT_NAME']."   </h4><br>";

               /* $sql="select tb_data0.*,tb_sd27.PID,tb_sd27.NoId,tb_sd27.Status,tb_sd27.Scar_id 
                                ,tb_sd27.FALName,tb_sd27.MALName
                                from tb_data0 inner join tb_sd27 
                                on tb_data0.PID=tb_sd27.PID
                                where tb_data0.AA='".$KeyAID."' and tb_data0.TT='".$KeyTID."'  order by tb_sd27.NoId asc ";*/
                                    $sql="select tb_sd16.*,tb_datasd16.FALName,tb_datasd16.MALName from tb_sd16 inner join tb_datasd16
                                        on tb_sd16.PID=tb_datasd16.PID where tb_sd16.AumId='".$GetTID['DISTRICT_CODE']."'  order by tb_sd16.Sd27_Id asc
                                        ";
                          //echo var_dump($sql);
                                $re=$StrDB->Query($sql);
   echo "<span style=\"float:right;margin-right:10px;\">
       <a href=\"exportsd16.php?KeyAID=".$KeyAID."&KeyTID=".$KeyTID."&AumId=".$GetTID['DISTRICT_CODE']."\" 
           target=\"_blank\" class=\"btn btn-warning\">
           <i class=\"icon-arrow-right icon-white\"></i> ส่งออกไฟล์ Excel</a></span><br/> ";
echo "<table id=\"TableData\" cellpadding=\"1\" cellspacing=\"1\"  border=\"1\" bordercolor=\"#E9E9E9\" >";
echo "<thead>";
echo "<th width=\"6%\">No.</th>";
echo "<th width=\"6%\">Year</th>";
echo "<th width=\"6%\">No.27</th>";
echo "<th>Id Card</th>";
echo "<th>Name</th>";
echo "<th>Last Name</th>";
echo "<th>Year</th>";
 echo "<th>Age</th>";       

//echo "<th>Scar</th>";
//echo "<th>CC</th>"; 
//echo "<th>AA</th>";
//echo "<th>TT</th>";
echo "<th>ADDR</th>";
echo "<th>MM</th>";
echo "<th>FName</th>";
echo "<th>FLName</th>";
echo "<th>MName</th>";
echo "<th>MLName</th>";
//echo "<th>Check</th>"; 
echo "</thead>";
echo "<tbody>";
while($rs=$StrDB->FetchData($re)){
        
                      if($rs['Status']==1){
                            $style="class=\"select\"";
                        }else{ $style="";}   
                       $strlen=  substr($rs[DOR],4);
                        $Age= $strlen-$rs[6];
                            
echo "<tr   >";
echo "<td $style align=\"center\">$i</td>";
echo "<td $style align=\"center\">$rs[Class0]</td>";
echo "<td $style align=\"center\">$rs[Sd27_Id]</td>";
echo "<td $style>$rs[PID]</td>";
echo "<td  $style>$rs[2]</td>";
echo "<td  $style>$rs[3]</td>";
echo "<td $style >$rs[6]</td>";
echo "<td $style >$Age</td>";        

/*echo "<td $style >";
echo $StrDB->ConName("tb_scar","Id","Scar_name",$rs[Scar_id]);
echo "</td>";*/
//echo "<td $style >$rs[CC]</td>";
//echo "<td $style >$rs[AA]</td>";
//echo "<td $style >$rs[TT]</td>";
echo "<td $style >$rs[ADDR]</td>";
echo "<td $style >$rs[ADDR_M]</td>";

echo "<td $style >$rs[FAName]</td>";
echo "<td $style >$rs[FALName]</td>";
echo "<td $style >$rs[MAName]</td>";
echo "<td $style >$rs[MALName]</td>";
//echo "<td $style  align=\"center\">";
//if($rs['Status']==1 || $rs['Scar_id']==""){
//echo "<a href=\"".WebUrl."admin/index.php?action=".$action."&section=edit&Id=".$rs[1]."\" class=\"btn   btn-warning\"><i class=\"icon-ok icon-white\"></i>ปรับ</a> &nbsp; ";
//
//} 
        
 
echo "</tr>";
 $i++;
}
echo "</tbody>";

echo "</table><br><br>";
        }
        
    }
    ?>