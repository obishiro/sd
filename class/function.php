<?php
class Db_Process  {

	
	public function Query($sql) {
		//var_dump($sql);
		$str=mysql_query($sql) or die(mysql_error());
		return $str;
	}
	public function FetchData($sql){
		$str=mysql_fetch_array($sql);
		return $str;
	}
	public function GetData($tb,$condition){
		$sql = "select * from $tb $condition";
		//var_dump($sql);
		$rs=$this->FetchData($this->Query($sql));
		return $rs;
	}
	public function NumRows($sql) {
		 
		$str=@mysql_query($sql);
		$num=mysql_num_rows($str);

		return $num;
	}
	public function GetKey($tb,$field){
		$sql="select $field from $tb order by $field desc limit 0,1";
		$rs=$this->FetchData($this->Query($sql));
		$gkey=$rs[$field]+1;
		return $gkey;

	}

	public function DelData($tb,$condition) {
		$sql ="delete from $tb   $condition";
		 $re=$this->Query($sql) or die(mysql_error());
				return $re;
	}
	public function InsertData($tb,$con){
		$sql="insert into $tb values ($con)";
 		//var_dump($sql);
                                    //echo "<br>";
 		$re=$this->Query($sql) or die(mysql_error());
		return $re;
 
	}
	public function UpdateData($tb,$command,$condition){
		$sql = "update $tb set $command $condition";
		//var_dump($sql);
		$re=$this->Query($sql);
		return $re;
	}
	public function ListBoxData($tb,$field,$condition,$v1,$v2,$type=null,$id=null) {
		$sql="select $field from $tb $condition";
                                
		$re=$this->Query($sql);
		while($rs=$this->FetchData($re)){
			if($type="edit"){
				if($rs[$v1]==$id){
				echo "<option value=\"$rs[$v1]\" SELECTED>$rs[$v2]</option>";
			}else{
				echo "<option value=\"$rs[$v1]\" >$rs[$v2]</option>";
			}
		 
			}
		}

	}
	public function ConName($tb,$f1,$f2,$val){
	 $sql="select $f2 from $tb where $f1='".$val."'";

	 	 	$rs=$this->FetchData($this->Query($sql));
	 	 	return $rs[$f2];

		}

	public function Logout() {
		session_destroy();
	}
	public function login($User,$Pass) {
		$sql="select * from tb_user where Email='".mysql_escape_string($User)."' and Password='".md5($Pass)."'  ";

		$str=@mysql_query($sql) ;

		$rs=mysql_fetch_array($str);
                                

		if($this->NumRows($sql)>"0"){
			$_SESSION['Usr']=$rs['Name'];
			$_SESSION['UsrId']=$rs['Id'];
			$_SESSION['Province_id']=$rs['Province_id'];
			 
			echo "<center>";
			echo "<div class=\"alert alert-success\" style=\"width:250px\">";
			echo "<span class=\"label label-success\">".Process."</span> ".CompleteLogin;
			echo "</div></center>";
			switch ($rs['UsrType']){
				case '1':
				break;
				case '2':
				echo "<meta Http-equiv=\"refresh\"  Content=\"3; Url=".WebUrl."admin/index.php\">";
				break;
			}
		}else{
			echo "<center>";
			echo "<div class=\"alert alert-error\" style=\"width:250px\">";
			echo "<h4>".LoginFail."</h4>".NoAccount;
			echo "</div></center>";
			echo "<meta Http-equiv=\"refresh\"  Content=\"3; Url=".WebUrl."admin/index.php\">";

		}
	}
		public function user_login($User,$Pass) {
		$sql="select * from customer where Cus_usr='".$User."' and Cus_pwd='".addslashes($Pass)."' ";

		$str=@mysql_query($sql) ;

		$rs=mysql_fetch_array($str);
		if($this->NumRows($sql)>"0"){
			$_SESSION['Usr_Customer']=$rs['Cus_usr'];
			$_SESSION['UsrId']=$rs['Cus_id'];
			$_SESSION['UsrName']=$rs[Cus_name]." ".$rs[Cus_surname];
			$_SESSION['UsrType']="user";
			 
			echo "<center>";
			echo "<div class=\"alert alert-success\" style=\"width:250px\">";
			echo "<span class=\"label label-success\">".Process."</span> ".CompleteLogin;
			echo "</div></center>";
			echo "<meta Http-equiv=\"refresh\"  Content=\"3; Url=".WebUrl."index.php\">";
		}else{
			echo "<center>";
			echo "<div class=\"alert alert-error\" style=\"width:250px\">";
			echo "<h4>".LoginFail."</h4> ".NoAccount;
			echo "</div></center>";
			echo "<meta Http-equiv=\"refresh\"  Content=\"3; Url=".WebUrl."index.php\">";

		}
		
		 
		
	}
public	function randName($len)
	{
srand((double)microtime()*10000000);
$chars = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
$ret_str = "";
$num = strlen($chars);
for($i = 0; $i < $len; $i++)
{
$ret_str.= $chars[rand()%$num];
$ret_str.="";
}
return $ret_str;
}

public function UploadFile($path)
	{
		$file=$_FILES['file']['tmp_name'];
		$file_name=$_FILES['file']['name'];
		$file_size=$_FILES['file']['size'];
		$file_type=$_FILES['file']['type'];
		$array_last=explode(".",$file_name);
		$c=count($array_last)-1;
		$lst=strtolower($array_last[$c]) ;
		$rname=$this->randName(6);
		$newname=$rname.".".$lst;

		copy($file,"$path/".$newname);
		return $newname;
	}

 
	public function GetTheme($name) {
		 

	$rs_config=$this->GetData("tb_config_office","where MMWebName='".mysql_real_escape_string($name)."' ");
	$sql=$this->Query("select tb_config_theme.ThemePath,tb_theme.ThemeId from tb_config_theme inner join tb_theme
		on tb_config_theme.Id=tb_theme.ThemeId where tb_theme.User='".$rs_config['User']."'
	");
	$rs=$this->FetchData($sql);
 
	$theme=$rs_config['MMTheme'];
	$_SESSION['WebUsrId']=$rs_config['User'];

 
    if($rs['ThemePath']==""){
    include 'main_template/default/index.php'; 
    }else{           
	include 'template/'.$rs['ThemePath'].'/index.php';
	}
} 



 


	 

}
	



?>
