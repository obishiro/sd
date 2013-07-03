<?php
class LibCart extends Db_Process
{
	public function ShowHomeProduct($condition=null)
	{
		$sql="select product.*,tb_config_office.MMWebName from product inner join 
			tb_config_office on product.User=tb_config_office.User 
			$condition 
		 ";
		$re=$this->Query($sql);
	 
	 	return $re;
	}
	public function ShowNewShop()
	{
		$sql="select tb_user.*,tb_config_office.* from tb_user inner join 
			tb_config_office on tb_user.Id=tb_config_office.User
			where tb_user.UsrType='2'
			  order by tb_user.Id desc";
			 // var_dump($sql);
		$re=$this->Query($sql);
	 
	 	return $re;
	}
	public function ShowMainProductType()
	{
		 $sql="select * from tb_mainshop_type order by MMName asc";
		 $re=$this->Query($sql);
		 $num_m=$this->NumRows($sql) ;
		 if($num_m>0){
		 echo "<ul>";
		
		 while ($rs=$this->FetchData($re)) {
		 
		 echo "<li> <a href=\"".WebUrl."main/category/".$rs['Id']."/".$this->rewrite_url($rs['MMName'])."\">".$rs['MMName']."</a>";
		  	$sql_sub="select * from tb_submainshop_type where MId='".$rs['Id']."' ";
		  	$re_sub=$this->Query($sql_sub);
		  	$num=$this->NumRows($sql_sub);
		  	if($num>0) {
				echo "<ul>";
				while($rs_sub=$this->FetchData($re_sub)) {
				echo "<li><a href=\"".WebUrl."main/category/".$rs['Id']."/".$rs['MMName']."/".$rs_sub['Id']."/".$this->rewrite_url($rs_sub['SMName'])."\">".$rs_sub['SMName']."</a></li>";
					 }
				echo "</ul>";
			}
			echo "</li>";
		}
		echo "</ul>";
	}
	}
	public function ShowCategory($Usr,$usershop)
	{
		      	$StrSql_cat=$this->Query("select * from product_type 
		      		where User='".mysql_real_escape_string($Usr)."' 
		      		order by Pro_type_name asc");
              		while($rs_type=$this->FetchData($StrSql_cat)) {
                echo "<li><a href=\"".WebUrl."".$usershop."/category/$rs_type[1]/$rs_type[0]\">$rs_type[1]</a></li>";
   				} 
	}
	public function ShowProduct($Usr,$category=null)
	{
		if($category==null){
		$sql="select * from product where User='".$Usr."' order by Id desc";
		}else{
		$sql="select * from product where User='".$Usr."' and Pro_type_id='".$category."' order by Id desc";
		}
		$re=$this->Query($sql);
	 
	 	return $re;

	}
function rewrite_url($url="url"){
  $url=strtolower(str_replace(" ","_",$url));
 // $url=strtolower(preg_replace('~[^a-z0-9ก-๙\.\-\_]~iu','',$url));
   $url=urlencode($url);
  return $url;
}

function decode_url($url="url"){
$url=strtolower(str_replace("_"," ",$url));
$url=urldecode($url);
return $url;
}
public function GetBreadCrumb($url1=null,$url2=null,$url3=null,$url4=null,$url5=null) {
    echo "<ul class=\"breadcrumb\">";
      echo "<li><a href=\"".WebUrl."\">".home."</a>";
      if(!empty($url1)) {
        echo "<span class=\"divider\">/</span></li>";
        echo " <li><a href=\"".WebUrl."".$url1."/".$url2."/".$url3."/".$this->decode_url($url4)."\">".$this->decode_url($url4)."</a> ";
            echo "<span class=\"divider\">/</span></li>";
            echo "<li class=\"active\">".$this->decode_url($url5)."</li>";
      }
 echo "</ul>";
}
}

?>