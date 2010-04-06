<?

// SELECT key_id,bind_map_id, title, action, color FROM key_binds_to_maps WHERE key_id = ('SELECT id FROM keys')
// SELECT lang_id, bind_map_name FROM bind_maps WHERE bind_map_id = $bind_map_id

$kbml_name = (isset($_GET['name'])) ? $_GET['name'] : "ninja_pack_v1";  // Default Binds to Load
if (isset($_GET['a'])) { // is an ajax call
	// The site root is different on an ajax call, we handle it here
	$site_root="../";
	include($site_root."functions/func_session.php");
}
include($site_root."functions/keyboard.php");
include($site_root."functions/parsing.php");


$cfg_file = "/var/www/nn/web/toolz/keyboard/newcfg.cfg";
//$cfg_file = "/home/tyler/Games/Nexuiz/trunk/data/defaultNexuiz.cfg";

$translation = translate($cfg_file,"Nexuiz","KBML");
?><h2>CFG to KBML</h2><?
// if string = error
if (is_string($translation)) {
	echo $translation;
} else {
	echo "Translation successful, generating KBML<br />";
	generateKBML($translation);
}


/*
 * sed -r 's/:([0-9])/: \1/' default_small.css | awk -F"[ ]" '{ for(i=1;i<=NF;i++) if(match($i,"^([0-9])+",m)) sub("^[0-9]+",int(m[0]*1.2),$i); print $0 }' | cat > default_small_2.css

// Get array of CSS files for Style dropdown
$arrStyles = array();
if ($handle = opendir(dirname(__FILE__) . '/styles')) {
    while (false !== ($file = readdir($handle))) {
	   if ($file != '.' && $file != '..' && substr($file,1) != '.') {
			$arrStyles[] = $file;
		}
    }
    closedir($handle);
}


 * 
/*
 * 
 * 
$cfg_file = "/home/tyler/dccrecv/config.cfg";

$css_file = "/opt/lampp/htdocs/nn/web/toolz/keyboard/css/default.css";

generateSmallKeyboard($css_file);
*/



?>
