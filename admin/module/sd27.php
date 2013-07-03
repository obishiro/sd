<?php
        
if($_POST['btsd27']){
    $_SESSION['Aumphur']=$_POST['Aumphur'];
    $_SESSION['Tumbon']=$_POST['Tumbon'];
    $StrDisplay->GoUrl('0',"index.php?action=".$action);
}
if(!$_SESSION['Aumphur'] && !$_SESSION['Tumbon']) {
    $StrDisplay->listhome_form("sd27",'',$_SESSION['Province_id']);
}else if(isset($_SESSION['Aumphur']) && !$_SESSION['Tumbon']){
   
       $StrDisplay->listhome_form("sd27",$_SESSION['Aumphur'],$_SESSION['Province_id']);
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
        case 'add':
               if($_GET['Id']):        
                   $sql="select Id,NoId from tb_sd27 where TT='".$KeyTID."' and AA='".$KeyAID."' order by Id desc limit 0,1 ";
                   $re=$StrDB->Query($sql);
                   $num=$StrDB->NumRows($sql);
                   $rs=$StrDB->FetchData($re);
                   if($num==0){$number="1"; }else{  $number=$rs['NoId']+1;  }
                       $StrDB->InsertData("tb_sd27"," '".NULL."'
                                ,'".$number."' 
                                    ,'".$_GET['Id']."' 
                                           ,'".$KeyAID."' 
                                                 ,'".$KeyTID."','','','','".$_GET['false']."'   ");
        
                              $StrDisplay->GoUrl('0',"index.php?action=".$action);        
                         endif;        
         break;
        case 'addform':
            if($_POST['adddata']):
                $sql=$StrDB->InsertData("tb_data0"," '".NULL."',
                    '".$_POST['txt-pid']."',
                        '001',
                        '".$_POST['txt-name']."',
                            '".$_POST['txt-lname']."',
                                '1',
                                '".$_POST['txt-dbirth']."',
                                    '".$_POST['txt-mbirth']."',
                        '".$_POST['txt-ybirth']."'
                            ,'099'
                            ,'".NULL."','".NULL."',
                            '".$_POST['txt-fname']."',
                                '".$_POST['txt-mname']."'
                                    ,'".NULL."','".NULL."','".NULL."','".NULL."',
                                    '39',
                                    '".$_SESSION['KeyAID']."',
                                        '".$_SESSION['KeyTID']."',   
                   
                            '".$_POST['txt-moo']."','".NULL."','".NULL."','".NULL."',
                                '".$_POST['txt-addr']."'  ,'".NULL."','".NULL."'  "  
                    ) ;
     
            
                      $sql="select Id,NoId from tb_sd27 where TT='".$_SESSION['KeyTID']."' and AA='".$_SESSION['KeyAID']."' order by Id desc limit 0,1 ";
                   $re=$StrDB->Query($sql);
                   $num=$StrDB->NumRows($sql);
                   $rs=$StrDB->FetchData($re);
                   if($num==0){$number="1"; }else{  $number=$rs['NoId']+1;  }
                    $StrDB->InsertData("tb_sd27"," '".NULL."'
                                ,'".$number."' 
                                    ,'".$_POST['txt-pid']."' 
                                           ,'".$_SESSION['KeyAID']."' 
                                                 ,'".$_SESSION['KeyTID']."' ,'','','','".$_GET['false']."'   ");
                     $StrDisplay->_AlertMsg();
        $StrDisplay->GoUrl('3',"index.php?action=".$action);        
            endif;
            $StrDisplay->Title_Form("",'1');
	$StrDisplay->Open_Form("admin/index.php?action=".$action."&section=".$section);
                  echo "<div class=\"span6\" >" ; 
	$StrDisplay->TxtInputNumber('เลขประจำตัวประชาชน','txt-pid','','1','13');
                 $StrDisplay->TxtInput('ชื่อ','txt-name');
 	$StrDisplay->TxtInput('ชื่อสกุล','txt-lname');
                  $StrDisplay-> ListDay('วันที่เกิด','txt-dbirth');
                  $StrDisplay->CloseSelectInput();
 	$StrDisplay->ListMonth('เดือนเกิด','txt-mbirth');   
                 $StrDisplay->CloseSelectInput();
                 
                   echo "</div>" ;
                    echo "<div class=\"span6\" >" ; 
                $StrDisplay->TxtInput('ปีเกิด','txt-ybirth',$year);
 	$StrDisplay->TxtInput('บ้านเลขที่','txt-addr');
                  $StrDisplay->TxtInput('หมู่ที่','txt-moo');
                 $StrDisplay->TxtInput('ชื่อบิดา','txt-fname');
 	//$StrDisplay->TxtInput('ชื่อสกุลบิดา','txt-flname');
                  $StrDisplay->TxtInput('ชื่อมารดา','txt-mname');
 	//$StrDisplay->TxtInput('ชื่อสกุลมารดา','txt-mlname');
                      echo "</div>" ;
	$StrDisplay->Button_Form('1');
	$StrDisplay->Close_Form();
            break;
        case 'edit':
            if($_POST['editdata']):
                $StrDB->UpdateData("tb_data0","
                    PID='".$_POST['txt-pid']."' ,
                        FNAME='".$_POST['txt-name']."' ,
                             LNAME='".$_POST['txt-lname']."' ,
                            DOB_D='".$_POST['txt-dbirth']."' ,
                                DOB_M='".$_POST['txt-mbirth']."' ,
                                    DOB_Y='".$_POST['txt-ybirth']."' ,
                                        ADDR='".$_POST['txt-addr']."' ,
                                            MM='".$_POST['txt-moo']."' ,
                                                FANAME='".$_POST['txt-fname']."' ,
                                                    MANAME='".$_POST['txt-mname']."' ","where PID='".$_POST['editdata']."' ");
            $StrDB->UpdateData(
                    "tb_sd27","
                                        PID='".$_POST['txt-pid']."' ,
                                            Scar_id='".$_POST['txt-scar']."' ,
                                                FALName='".$_POST['txt-flname']."' ,
                                                    MALName='".$_POST['txt-mlname']."',Status='0' ","where PID='".$_POST['editdata']."' "
                    ); 
                        $StrDisplay->_AlertMsg();
                $StrDisplay->GoUrl('0',"index.php?action=".$action."&section=show");       
            endif;
                       $sql="select tb_data0.*,tb_sd27.PID,tb_sd27.NoId,tb_sd27.Status,tb_sd27.Scar_id from tb_data0 inner join tb_sd27 
                                on tb_data0.PID=tb_sd27.PID
                                where tb_data0.PID='".$_GET['Id']."'  order by tb_sd27.NoId asc ";
                               $re=$StrDB->Query($sql); 
                               $rs=$StrDB->FetchData($re);
            $StrDisplay->Title_Form("",'2');
	$StrDisplay->Open_Form("admin/index.php?action=".$action."&section=".$section);
                  echo "<div class=\"span6\" >" ; 
                  $StrDisplay->TxtInputDisable("ลำดับ ๒๗",'NoId',$rs['NoId']);
	$StrDisplay->TxtInputNumber('เลขประจำตัวประชาชน','txt-pid',$rs['PID'],'1','13');
                 $StrDisplay->TxtInput('ชื่อ','txt-name',$rs['FNAME']);
 	$StrDisplay->TxtInput('ชื่อสกุล','txt-lname',$rs['LNAME']);
                  $StrDisplay-> ListDay('วันที่เกิด','txt-dbirth','edit',$rs['DOB_D']);
                  $StrDisplay->CloseSelectInput();
 	$StrDisplay->ListMonth('เดือนเกิด','txt-mbirth','edit',$rs['DOB_M']);   
                 $StrDisplay->CloseSelectInput();
                 $StrDisplay->TxtInput('ปีเกิด','txt-ybirth',$year);
      
                      
                   echo "</div>" ;
                    echo "<div class=\"span6\" >" ; 
                      $StrDisplay->OpenSelectInput("แผลเป็น","txt-scar");
                 $StrDB->ListboxData("tb_scar",'*',"order by Id asc","Id","Scar_name","edit",$rs['Scar_id']);
                  $StrDisplay->CloseSelectInput();
 	$StrDisplay->TxtInput('บ้านเลขที่','txt-addr',$rs['ADDR']);
                  $StrDisplay->TxtInput('หมู่ที่','txt-moo',$rs['MM']);
                 $StrDisplay->TxtInput('ชื่อบิดา','txt-fname',$rs['FANAME']);
 	$StrDisplay->TxtInput('ชื่อสกุลบิดา','txt-flname',$rs['LNAME']);
                  $StrDisplay->TxtInput('ชื่อมารดา','txt-mname',$rs['MANAME']);
 	$StrDisplay->TxtInput('ชื่อสกุลมารดา','txt-mlname',$rs['LNAME']);
        
                      echo "</div>" ;
        
	$StrDisplay->Button_Form('2',$rs['PID']);
        
        
	$StrDisplay->Close_Form();
            break;
            
        case 'show':
             echo "<h4> ข้อมูล อำเภอ ".$GetAID['AMPHUR_NAME']." ตำบล ".$GetTID['DISTRICT_NAME']." / ที่เรียงหมายเลข สด.๒๗ </h4>";

                $sql="select tb_data0.*,tb_sd27.PID,tb_sd27.NoId,tb_sd27.Status,tb_sd27.Scar_id 
                                ,tb_sd27.FALName,tb_sd27.MALName
                                from tb_data0 inner join tb_sd27 
                                on tb_data0.PID=tb_sd27.PID
                                where tb_data0.AA='".$KeyAID."' and tb_data0.TT='".$KeyTID."'  order by tb_sd27.NoId asc ";
                            
                                $re=$StrDB->Query($sql);
   echo "<span style=\"float:right;margin-right:15px;\"><a href=\"exportsd27.php?KeyAID=".$KeyAID."&KeyTID=".$KeyTID."&AumId=".$GetTID['DISTRICT_CODE']."\" target=\"_blank\" class=\"btn btn-warning\"><i class=\"icon-arrow-right icon-white\"></i> ส่งออกไฟล์ Excel</a></span><br/> ";
echo "<table id=\"TableData\" cellpadding=\"1\" cellspacing=\"1\"  border=\"1\" bordercolor=\"#E9E9E9\" >";
echo "<thead>";
echo "<th width=\"6%\">No.27</th>";
echo "<th>Id Card</th>";
echo "<th>Name</th>";
echo "<th>Last Name</th>";
echo "<th>Day</th>";
echo "<th>Month</th>";
echo "<th>Year</th>";
echo "<th>Scar</th>";
//echo "<th>CC</th>"; 
//echo "<th>AA</th>";
//echo "<th>TT</th>";
echo "<th>ADDR</th>";
echo "<th>MM</th>";
echo "<th>FName</th>";
echo "<th>FLName</th>";
echo "<th>MName</th>";
echo "<th>MLName</th>";
echo "<th>Check</th>"; 
echo "</thead>";
echo "<tbody>";
while($rs=$StrDB->FetchData($re)){
        
                      if($rs['Status']==1){
                            $style="class=\"select\"";
                        }else{ $style="";}   
    
echo "<tr   >";
echo "<td $style align=\"center\">$rs[NoId]</td>";
echo "<td $style>$rs[PID]</td>";
echo "<td  $style>$rs[3]</td>";
echo "<td  $style>$rs[4]</td>";
echo "<td $style >$rs[6]</td>";
echo "<td $style >$rs[7]</td>";
echo "<td $style >$rs[8]</td>";
echo "<td $style >";
echo $StrDB->ConName("tb_scar","Id","Scar_name",$rs[Scar_id]);
echo "</td>";
//echo "<td $style >$rs[CC]</td>";
//echo "<td $style >$rs[AA]</td>";
//echo "<td $style >$rs[TT]</td>";
echo "<td $style >$rs[ADDR]</td>";
echo "<td $style >$rs[MM]</td>";

echo "<td $style >$rs[FANAME]</td>";
echo "<td $style >$rs[FALName]</td>";
echo "<td $style >$rs[MANAME]</td>";
echo "<td $style >$rs[MALName]</td>";
echo "<td $style  align=\"center\">";
if($rs['Status']==1 || $rs['Scar_id']==""){
echo "<a href=\"".WebUrl."admin/index.php?action=".$action."&section=edit&Id=".$rs[1]."\" class=\"btn   btn-warning\"><i class=\"icon-ok icon-white\"></i>ปรับ</a> &nbsp; ";

} 
        
 
echo "</tr>";
 $i++;
}
echo "</tbody>";

echo "</table><br><br>";
            
            break;
         
    endswitch;
}else{
  $sql_num="select Id,NoId from tb_sd27 where TT='".$KeyTID."' and AA='".$KeyAID."' order by Id desc limit 0,1 ";
        
                   $re_num=$StrDB->Query($sql_num);        
                   $rs_num=$StrDB->FetchData($re_num);
                  $sh_num=$rs_num['NoId']+1;     
        
$i=1;
 echo "<h4> ข้อมูล อำเภอ ".$GetAID['AMPHUR_NAME']." ตำบล ".$GetTID['DISTRICT_NAME']." / เลขที่ สด.๒๗ ลำดับต่อไป : <font style=\"color:red\">".$sh_num."</font></h4>";
        
//echo "<div style=\"float:right;margin-right:-100px\">";
//echo "<a href=\"".WebUrl."admin/index.php?action=".$action."&section=add-frmsd27\" class=\"btn btn-primary\"><i class=\"icon-plus icon-white\"></i> เพิ่มชื่อใหม่ </a>";
//echo  "</div>";          
	
        
echo "<table id=\"TableData\" cellpadding=\"1\" cellspacing=\"1\"  border=\"1\" bordercolor=\"#E9E9E9\" >";
echo "<thead>";
echo "<th  >#</th>";
echo "<th>Id Card</th>";
echo "<th>Name</th>";
echo "<th>Last Name</th>";
echo "<th>Day</th>";
echo "<th>Month</th>";
echo "<th>Year</th>";
echo "<th>CC</th>"; 
echo "<th>AA</th>";
echo "<th>TT</th>";
echo "<th>ADDR</th>";
echo "<th>MM</th>";

echo "<th>FName</th>";
echo "<th>MName</th>";
echo "<th>Check</th>"; 
echo "</thead>";
echo "<tbody>";
while($rs=$StrDB->FetchData($re)){
      $sql1="select NoId,PID from tb_sd27 where TT='".$KeyTID."' and AA='".$KeyAID."' and PID='".$rs['PID']."'  ";
                   $re1=$StrDB->Query($sql1);
                   $rs1=$StrDB->FetchData($re1);
                    $num=$StrDB->NumRows($sql1);
                        if($num>0){
                            $style="class=\"select\"";
                        }else{ $style="";}   
    
echo "<tr   >";
echo "<td $style align=\"center\">$i</td>";
echo "<td $style>$rs[PID]</td>";
echo "<td  $style>$rs[3]</td>";
echo "<td  $style>$rs[4]</td>";
echo "<td $style >$rs[6]</td>";
echo "<td $style >$rs[7]</td>";
echo "<td $style >$rs[8]</td>";
echo "<td $style >$rs[CC]</td>";
echo "<td $style >$rs[AA]</td>";
echo "<td $style >$rs[TT]</td>";
echo "<td $style >$rs[ADDR]</td>";
echo "<td $style >$rs[MM]</td>";

echo "<td $style >$rs[FANAME]</td>";
echo "<td $style >$rs[MANAME]</td>";
echo "<td $style  align=\"center\" >";
if($num<1){
echo "<a href=\"".WebUrl."admin/index.php?action=".$action."&section=add&Id=".$rs[1]."&false=0\" class=\"btn btn-small btn-success\"><i class=\"icon-ok icon-white\"></i> ตรง</a>&nbsp;";
echo "<a href=\"".WebUrl."admin/index.php?action=".$action."&section=add&Id=".$rs[1]."&false=1\" class=\"btn btn-small btn-danger\"><i class=\"icon-info-sign icon-white\"></i> ไม่ตรง</a> &nbsp; ";

}else{
    echo $rs1['NoId'];
}
        
 
echo "</tr>";
 $i++;
}
echo "</tbody>";

echo "</table><br><br>";
 

}      
}
?>
