<?php // This file is for retrieving the call to build the binds

$xml_name = (isset($_GET['name'])) ? $_GET['name'] : "ninja_pack_v1";  // Default Binds to Load
$lang = (isset($_GET['lang'])) ? $_GET['lang'] : "lang_en";
if (isset($_GET['a'])) { // is an ajax call
	// The site root is different on an ajax call, we handle it here
	$site_root="../";
	include($site_root."functions/func_session.php");
}
include($site_root."functions/keyboard.php");

$xml = openKeyboardXML($site_root."xml/".$xml_name.".xml");
$lang = openKeyboardXML($site_root."lang/".$lang.".xml");
if ($xml!=false && $lang!=false) {
	printKeyboard($xml,$lang);
} else {
	echo "xml file does not exist";
}
?>
