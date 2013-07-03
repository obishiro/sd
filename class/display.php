<?php

class Web_Display extends Db_Process{
	
	public function GoUrl($num,$url) {
		echo "<meta Http-equiv=\"refresh\"  Content=\"$num; Url=".WebUrl."admin/$url\">";

	}

	public function AddSuccess(){
		echo "<div class=\"btn btn-success\" ><span class=\"label label-success\">".Process."</span> ".AddSuccess."</div>";
	}
	public function EditSuccess(){
		echo "<div class=\"btn btn-success\" ><span class=\"label label-success\">".Process."</span> ".EditSuccess."</div>";
	}
	public function DelSuccess(){
	echo '<center><div class="alert alert-error" >';
	echo '<strong>'.Del.' ! </strong> '.DelSuccess.'';
	echo '</div></center>';
	}
	public function List1Menu($action=null) {

		echo "<a href=\"".WebUrl."admin/index.php?action=$action\" >";
		 switch ($action) {
		 	case 'login': echo login; break;
		 	case 'category': echo category; break;
		 	case 'product': echo Product; break;
		 	case 'preproduct': echo preproduct; break;
		 	case 'agent': echo agent; break;
		 	case 'payment': echo payment; break;
		 	case 'customer': echo customer; break;
		 	case 'employee': echo employees; break;
		 	case 'sell': echo sell; break;
		 	case 'scrape': echo scrape; break;
		 	case 'theme': echo Theme; break;
		 	case 'configshop': echo ConfigOffice; break;
		 	case 'configweb': echo ConfigWeb; break;

		 }
 		echo "</a>";
	}
	public function List2Menu($section=null) {
		
		switch ($section) {
			case 'add':echo Add; break;
			case 'edit': echo Edit;break;
			case 'view':echo View;break;
		}

	}
	
public function Title_Form ($name,$add=null){
	if($add=="1") {
		$txtadd=Add;
	}else if ($add=="2") {
		$txtadd=Edit;
	}else{
		$txtadd=Data;
	}	
	echo '<h4>'.$txtadd.'&nbsp;'. $name.'</h4>';
	echo '<hr>';
	}
public function Open_Form($action) {
	echo "<form action=\"".WebUrl."$action\" method=\"POST\" class=\"form-horizontal well formular\" enctype=\"multipart/form-data\"> ";
}	
public function Close_Form () {
	echo "</form>";
}
  public function Button_Form($type,$id=null)
{
	switch ($type) {
		case '1':
			 $bt="<input type=\"hidden\" name=\"adddata\" value=\"adddata\">"  ;
   			 $bt.="<input type=\"submit\" class=\"btn btn-primary\" value=\"".Add."\">";
			break;
		
		case '2':
		  	$bt="<input type=\"hidden\" name=\"editdata\" value=\"$id\">"  ;
   			 $bt.="<input type=\"submit\" class=\"btn btn-primary\" value=\"".Edit."\">";
			break;
		case '3':
		  	$bt="<input type=\"hidden\" name=\"addform\" value=\"1\">"  ;
   			 $bt.="<input type=\"submit\" class=\"btn btn-primary\" value=\"".Add."\">";
			break;

		 
	}
	echo "<div class=\"control-group\">";
   	echo "<div class=\"controls\">";
    echo $bt; 
   	echo ' </div> </div>';
}
public function TxtHidden($name,$val) {
	echo "<input type=\"hidden\" name=\"$name\" value=\"$val\">"  ;
}
public function TxtInputDisable($txtname,$Name,$value=null) {

	echo '<div class="control-group" style="width:500px;"  >';
    echo '<label class="control-label" for="input'.$Name.'">'.$txtname.' :</label>';
   	echo '<div class="controls">';
    echo '<input  style="width:350px" type="text"  disabled  text-input" id="'.$Name.'" name="'.$Name.'"  value="'.$value.'">';
   	echo '</div>  </div>';
	}
	public function TxtInputColor($txtname,$Name,$value=null) {
	echo '<div class="control-group" style="width:500px;"  >';
    echo '<label class="control-label" for="input'.$Name.'">'.$txtname.' :</label>';
   	echo '<div class="controls">';
    echo '<input  style="width:350px" type="text" class="color {adjust:false,hash:true}" text-input" id="'.$Name.'" name="'.$Name.'" placeholder="'.Input.$txtname.'" value="'.$value.'">';
   	echo '</div>  </div>';
	}
public function TxtInput($txtname,$Name,$value=null,$int=null) {
	switch($int){
		case '1':$req="validate[required,custom[onlyNumber]]"; break;
		case '0': $req=""; break;
                                    case '2' :$req="validate[required,custom[email]]"; break;
		default: $req="validate[required]"; break;
	} 

		
	 
	echo '<div class="control-group" style="width:500px;"  >';
    echo '<label class="control-label" for="input'.$Name.'">'.$txtname.' :</label>';
   	echo '<div class="controls">';
    echo '<input  style="width:350px" type="text" class="'.$req.' text-input" id="'.$Name.'" name="'.$Name.'" placeholder="'.Input.$txtname.'" value="'.$value.'">';
   	echo '</div>  </div>';
	}
	public function TxtInputNumber($txtname,$Name,$value=null,$int=null,$maxlenght=null) {
	switch($int){
		case '1':$req="validate[required,custom[onlyNumber]]"; break;
		case '0': $req=""; break;
		default: $req="validate[required]"; break;
	} 
	if($maxlenght !=null){
	$max="maxlength=\"$maxlenght\" ";
	}else{
	$max="";
	}
		
	 
	echo '<div class="control-group" style="width:500px;"  >';
    echo '<label class="control-label" for="input'.$Name.'">'.$txtname.' :</label>';
   	echo '<div class="controls">';
    echo '<input  style="width:350px" '.$max.'  type="text" class="'.$req.' text-input" id="'.$Name.'" name="'.$Name.'" placeholder="'.Input.$txtname.'" value="'.$value.'">';
   	echo '</div>  </div>';
	}
	public function TxtInputPassword($txtname,$Name,$value=null,$int=null) {
	switch($int){
		case '1':$req="validate[required,custom[onlyNumber]]"; break;
		case '0': $req=""; break;
		default: $req="validate[required]"; break;
	} 

		
	 
	echo '<div class="control-group" style="width:500px;"  >';
    echo '<label class="control-label" for="input'.$Name.'">'.$txtname.' :</label>';
   	echo '<div class="controls">';
    echo '<input  style="width:350px" type="password" class="'.$req.' text-input" id="'.$Name.'" name="'.$Name.'" placeholder="'.Input.$txtname.'" value="'.$value.'">';
   	echo '</div>  </div>';
	}
	public function TxtInputDate($txtname,$Name,$value=null,$int=null) {
	switch($int){
		case '1':$req="validate[required,custom[onlyNumber]]"; break;
		default: $req="validate[required]"; break;
	} 

		
	 
	echo '<div class="control-group" style="width:500px;"  >';
    echo '<label class="control-label" for="input'.$Name.'">'.$txtname.' :</label>';
   	echo '<div class="controls">';
    echo '<input type="text" class="'.$req.' datepicker" id="'.$Name.'" name="'.$Name.'" placeholder="'.Input.$txtname.'" value="'.$value.'">';
   	echo '</div>  </div>';
	}
	public function TxtInputArea($txtname,$Name,$value=null,$width,$height,$type=null) {
	echo '<div class="control-group" style="width:500px;"  >';
    echo '<label class="control-label" for="input'.$Name.'">'.$txtname.' :</label>';
   	echo '<div class="controls">';
    echo '<textarea style="width:450px;height:150px" class="validate[required]" id="'.$Name.'" name="'.$Name.'" placeholder="'.Input.$txtname.'" >';
   	echo $value;
    echo '</textarea>';
    if($type=="1") {
   echo "<script type=\"text/javascript\">
 
            CKEDITOR.replace( \"$Name\",{

            skin            : 'kama',
            language        : 'en',
            extraPlugins    : 'uicolor',
            height            :$height,
            width            : $width,
            toolbar :
                [

                    ['Source','-','Templates'],
                    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                    ['Styles','Format','Font','FontSize'],
                    ['TextColor','BGColor'],
                    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
                    
                    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'], 
                    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
                    ['Link', 'Unlink'],
                ] 

      
            } );
      
    </script>";
}
                                         
   	echo '</div>  </div>';
	}
	public function TxtInputFile($txtname,$Name,$id=null,$arr=null) {
		if($arr=="1"){
			$array="[]";
		}
		if($id==""){
			$txt_id=$Name;
		}else{
			$txt_id=$id;
		}
	echo '<div class="control-group" style="width:500px;"  >';
   	echo '<label class="control-label" for="input'.$Name.'">'.$txtname.' :</label>';
   	echo '<div class="controls">';
   	echo '<input type="file"    id="'.$txt_id.'" name="'.$Name.'"   value="'.$value.'">';
   	echo '</div>  </div>';
	}
	public function TxtInputRadio($txtname,$Name,$Txt,$value=null) {
	echo '<div class="control-group" style="width:500px;"  >';
    	echo '<label class="control-label" for="input'.$Name.'">'.$txtname.' :</label>';
   	echo '<div class="controls">';
     	echo "<input type=\"radio\" name=\"$Name\" id=\"$Name\" value=\"$value\"  > $Txt";
   	echo '</div>  </div>';
	}
public function OpenSelectInput($txtname,$Name,$value=null){
	echo '<div class="control-group" style="width:500px;"  >';
    echo '<label class="control-label" for="input'.$Name.'">'.$txtname.' :</label>';
   	echo '<div class="controls">';
   	echo "<select name=\"$Name\" id=\"$Name\" class=\"validate[required]\">";
   	echo "<option value=\"\">".NoSelect."</option>";
}
public function CloseSelectInput()
{
	echo "</select></div></div>" ;
}
public function ListDay($txtname,$Name,$type=null,$id=null)
{
	echo '<div class="control-group" style="width:500px;"  >';
    echo '<label class="control-label" for="input'.$Name.'">'.$txtname.' :</label>';
   	echo '<div class="controls">';
	echo "<select name=\"$Name\" class=\"validate[required]\">";
   	echo "<option value=\"\">วันที่</option>";
   	for($i=1;$i<=31;$i++):
                        if($i<10){
                            $i="0".$i;
                        }
   		if($type=="edit") {
             if($i==$id):
                 $chk="SELECTED";
              echo "<option value=\"$i\" $chk>".$i."</option>";
             endif; 
            
         } 
            echo "<option value=\"$i\">".$i."</option>";
   		endfor;
}
public function ListMonth($txtname,$Name,$type=null,$id=null)
{
	$month=array('มกราคม','กุมภาพันธ์','มีนาคม','เมษายน',
	'พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน',
	'ตุลาคม','พฤศจิกายน','ธันวาคม'	);
  	$mid=array('01','02','03','04','05','06','07','08','09','10','11','12');
 
	echo '<div class="control-group" style="width:500px;"  >';
            echo '<label class="control-label" for="input'.$Name.'">'.$txtname.' :</label>';
   	echo '<div class="controls">';
   	echo "<select name=\"$Name\" class=\"validate[required]\">";
   	echo "<option value=\"\">เดือน</option>";
    	for($i=0;$i<=11;$i++):
    		if($type=="edit"){
    			if($mid[$i]==$id){
    			echo "<option value=\"$mid[$i]\" SELECTED>$month[$i]</option>";
    		}
    		}else{
   		echo "<option value=\"$mid[$i]\">$month[$i]</option>";
  		 	}
   		endfor;
                
}
public function ConvM($month)
{
	switch($month) {
		case '01':	echo 'มกราคม'; break;
		case '02': echo 'กุมภาพันธ์'; break;
		case '03': echo 'มีนาคม' ; break;
		case '04': echo 'เมษายน' ; break;
		case '05': echo 'พฤษภาคม' ; break;
		case '06': echo 'มิถุนายน' ; break;
		case '07': echo 'กรกฎาคม' ; break;
		case '08': echo 'สิงหาคม' ; break;
		case '09': echo 'กันยายน' ; break;
		case '10': echo 'ตุลาคม' ; break;
		case '11': echo 'พฤศจิกายน' ; break;
		case '12': echo 'ธันวาคม' ; break;
}
}
public function DelFile($file,$path)
{
	@unlink($path."/".$file);
}

public function DateTh($date){
$d=explode("-",$date);
$Yth=$d[0]+543;
 
$date=$d[2]."-".$d[1]."-".$Yth;
return $date;
 
}
                
public function login_form(){
		echo '<div class="form-signin">';
      		 echo "<form class=\"formular\" action=\"".WebUrl."admin/index.php?action=login\" method=\"POST\">";
        		echo "<h2 class=\"form-signin-heading\">".Title_login."</h2>";
        		
      		echo "<input type=\"text\"  name=\"UserName\" class=\"input-block-level\" placeholder=\"".TextEmailLogin."\">";
       		echo "<input type=\"password\" name=\"Password\" class=\"input-block-level\" placeholder=\"".TextPassLogin."\">";
		echo "<input class=\"btn btn-large btn-primary\" type=\"submit\" value=\"".bt_login."\">";
		echo "&nbsp;&nbsp;";
            echo "<input class=\"btn btn-large btn\" type=\"submit\" value=\"".bt_login_cancel."\">";
      		echo "</form> </div>";  

}
public function listhome_form($url,$amphur=null,$province=null){
                
                                    if($amphur!=null){
                                        echo '<div class="form-signin">';
      		 echo "<form class=\"formular\" action=\"".WebUrl."admin/index.php?action=$url\" method=\"POST\">";
        		echo "<h2 class=\"form-signin-heading\">เลือกข้อมูล</h2>";
        		$this->OpenSelectInput("อำเภอ", "Aumphur");
                                     $this->ListBoxData("amphur", "*", "where PROVINCE_ID='".$province."' and AMPHUR_ID='".$amphur."' ","AMPHUR_ID", "AMPHUR_NAME");
                                    $this->CloseSelectInput();
                                    $this->OpenSelectInput("ตำบล", "Tumbon");
                                    $this->CloseSelectInput();
                
                                    $this->TxtHidden("bt$url", $url);
		echo "<input class=\"btn btn-large btn-primary\" type=\"submit\" value=\"ดึงข้อมูล\">";
		echo "&nbsp;&nbsp;";
                                    echo "<input class=\"btn btn-large btn\" type=\"submit\" value=\"".bt_login_cancel."\">";
      		echo "</form> </div>";  
                                        
                                    }else{
		echo '<div class="form-signin">';
      		 echo "<form class=\"formular\" action=\"".WebUrl."admin/index.php?action=$url\" method=\"POST\">";
        		echo "<h2 class=\"form-signin-heading\">เลือกข้อมูล</h2>";
        		$this->OpenSelectInput("อำเภอ", "Aumphur");
                                     $this->ListBoxData("amphur", "*", "where PROVINCE_ID='27'","AMPHUR_ID", "AMPHUR_NAME");
                                    $this->CloseSelectInput();
                                    $this->OpenSelectInput("ตำบล", "Tumbon");
                                    $this->CloseSelectInput();
                
                                    $this->TxtHidden("bt$url", $url);
		echo "<input class=\"btn btn-large btn-primary\" type=\"submit\" value=\"ดึงข้อมูล\">";
		echo "&nbsp;&nbsp;";
                                    echo "<input class=\"btn btn-large btn\" type=\"submit\" value=\"".bt_login_cancel."\">";
      		echo "</form> </div>";  
                                    }

}
                
public function ConVertUrl($url,$type)
{
	switch ($type) {
		case '1':
			echo "".WebUrl."index.php?mod=$url";
			break;
		
		case '2':
			echo "".WebUrl."$url";
			break;
	}
		
	 
}
// สร้างฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
public function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page){   
	global $urlquery_str;
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;		
	$lt_page=$total_p-4;
	if($chk_page>0){  
		echo "<a  href='?s_page=$pPrev&urlquery_str=".$urlquery_str."' class='naviPN'>Prev</a>";
	}
	if($total_p>=11){
		if($chk_page>=4){
			echo "<a $nClass href='?s_page=0&urlquery_str=".$urlquery_str."'>1</a><a class='SpaceC'>. . .</a>";   
		}
		if($chk_page<4){
			for($i=0;$i<$total_p;$i++){  
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				if($i<=4){
				echo "<a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
				}
				if($i==$total_p-1 ){ 
				echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
				}		
			}
		}
		if($chk_page>=4 && $chk_page<$lt_page){
			$st_page=$chk_page-3;
			for($i=1;$i<=5;$i++){
				$nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
				echo "<a $nClass href='?s_page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";   	
			}
			for($i=0;$i<$total_p;$i++){  
				if($i==$total_p-1 ){ 
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				echo "<a class='SpaceC'>. . .</a><a $nClass href='?s_page=$i&urlquery_str=".$urlquery_str."'>".intval($i+1)."</a> ";   
				}		
			}									
		}	
		if($chk_page>=$lt_page){
			for($i=0;$i<=4;$i++){
				$nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
				echo "<a $nClass href='?s_page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";   
			}
		}		 
	}else{
		for($i=0;$i<$total_p;$i++){  
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			echo "<a href='?s_page=$i&urlquery_str=".$urlquery_str."' $nClass  >".intval($i+1)."</a> ";   
		}		
	} 	
	if($chk_page<$total_p-1){
		echo "<a href='?s_page=$pNext&urlquery_str=".$urlquery_str."'  class='naviPN'>Next</a>";
	}
} 

 public function _AlertMsg($msg=null) {
       if($msg==null){
           $title="ดำเนินการเรียบร้อยแล้ว !";
       }else{
           $title=$msg;
       }
       echo "<script language='javascript'>
                showNotification({
                            message: 'ดำเนินการเรียบร้อยแล้ว !',
                            type: 'success', // type of notification is error/success/warning/information,
                             autoClose: true, // auto close to true
                            duration: 2 // message display duration
                        });
        </script>";
   }
    public function _AlertMsgErr($msg=null) {
       if($msg==null){
           $title="กรุณาเลือกข้อมูลที่จะลบด้วย !";
       }else{
           $title=$msg;
       }
       echo "<script language='javascript'>
                showNotification({
                            message: 'กรุณาเลือกข้อมูลที่จะลบด้วย !',
                            type: 'error', // type of notification is error/success/warning/information,
                             autoClose: true, // auto close to true
                            duration: 2 // message display duration
                        });
        </script>";
   }
      function Change_IntThai($int_value){
             if($int_value <=9) {
       $number=  str_replace("0", "", $int_value);
   }else{
       $number=$int_value;
   }
  return  str_replace(array( '0' ,'1' , '2' , '3' ,'4', '5' , '6' ,'7' ,'8' , '9' ),
    array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" ,"๗" , "๘" , "๙" ), $number);
                
} 

}


?>
