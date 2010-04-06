<?php // This file is for retrieving the call to build the binds

$kbml_name = (isset($_GET['name'])) ? $_GET['name'] : "ninja_pack_v1";  // Default Binds to Load
if (isset($_GET['a'])) { // is an ajax call
	// The site root is different on an ajax call, we handle it here
	$site_root="../";
	include($site_root."functions/func_session.php");
}
include($site_root."functions/keyboard.php");
include($site_root."functions/parsing.php");

//$kbml = openKeyboardXML($site_root."xml/".$kbml_name.".xml");
$kbml = $site_root."xml/".$kbml_name.".xml";
?><h2>KBML to MySQL</h2><?
parseKBMLToMySQL($kbml);
?>
