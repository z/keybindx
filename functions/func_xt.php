<?php
class xt {

	function pageName() {
		$page=$_SERVER['PHP_SELF'];
		$pos=strpos($page,"/");
		while($pos!==false) {
			$page=substr($page,($pos+1));
			$pos=strpos($page,"/");
		}
		$pos=strpos($page,"?");
		if($pos!==false) {
			$page=substr($page,0,$pos);
		}
		return $page;
	}
	
	// $num = 4; $zerofill= 3; returns "004"
	function zerofill ($num,$zerofill) {
	   while (strlen($num)<$zerofill) {
	       $num = "0".$num;
	   }
	   return $num;
	}
}
?>