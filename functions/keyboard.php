<?
// Read XML file
function openKeyboardXML($xml_file) {
	return (file_exists($xml_file)) ? simplexml_load_file($xml_file) : false;
}

// Print Keyboard layout
function printKeyboard($xml,$lang) {
	//echo "<p id=\"current_bind\"></p>\n";
	$logged_in = ($_SESSION['username']) ? TRUE : FALSE;
	// Function Keys
	foreach ($xml->keyboard->function_keys as $function_keys) {
		echo "<div id=\"keyboard_container\">\n<div id=\"main\">\t<div class=\"row\" id=\"function_keys\">\n";
		$j=3;
		echo "<div class=\"fkey_block\">";
		$curRow = $lang->keyboard->function_keys[0];
		foreach ($function_keys as $key) {
			// This chunks the function keys
			if ($j%4==0) {
				if ($j==12) {
				 echo "<div class=\"last_fkey_block\">";
				} else {
				 echo "<div class=\"fkey_block\">";
				}
			}
			// Print Key stuff
			echo "\t\t<div class=\"key\" id=\"".$key['id']."\" title=\"".$key['action']."\" style=\"background-color:#".$key['color']."\">\n\t\t\t<div class=\"keyboard_layout\">".$curRow->key[$j-3]['title']."</div>\n\t\t\t";
			// If user is logged in
			if ($logged_in) {
				// Print 'edit'
				echo "<a href=\"tpl/edit_bind.php?item=".$key['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>";
			}
			// If title exists, print it
			if (!empty($key['title'])) { echo "<h2>".$key['title']."</h2>"; }
			echo "\n\t\t</div>\n";
			if ($j%4==3) {
				 echo "</div>";
			}
			$j++;
		}
		echo "</div class=\"row\">\n";
	}
	
	// Keyboard
	echo "<div id=\"keyboard\">\n";
	$i=0;
	foreach ($xml->keyboard->row as $row) {
		echo "\t<div class=\"row\">\n";
		$curRow = $lang->keyboard->row[$i];
		$j=0;
		foreach ($row as $key) {
			// Print Key stuff
			echo "\t\t<div class=\"key\" id=\"".$key['id']."\" title=\"".$key['action']."\" style=\"background-color:#".$key['color']."\">\n\t\t\t<div class=\"keyboard_layout\">".$curRow->key[$j]['title']."</div>\n\t\t\t";
			// If user is logged in
			if ($logged_in) {
				// Print 'edit'
				echo "<a href=\"tpl/edit_bind.php?item=".$key['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>";
			}
			// If title exists, print it
			if (!empty($key['title'])) { echo "<h2>".$key['title']."</h2>"; }
			echo "\n\t\t</div>\n";
			$j++;
		}
		echo "\t</div>\n";
		$i++;
	}
	echo "\t</div>\n</div><!--end main-->";
	
	// Center Chunk
	$curRow = $lang->keyboard->center_chunk[0];
	$curBind = $xml->keyboard->center_chunk[0];
	?>
	<div id="center_chunk">
		<div class="row" id="center_fkey_block">
			<div class="key" title="<?=$curBind->key[0]['action']?>" style="background-color:#<?=$curBind->key[0]['color']?>"><div class="keyboard_layout"><?=$curRow->key[0]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[0]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[0]['title']?></h2></div>
				<div class="key" title="<?=$curBind->key[1]['action']?>" style="background-color:#<?=$curBind->key[1]['color']?>"><div class="keyboard_layout"><?=$curRow->key[1]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[1]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[1]['title']?></h2></div>
				<div class="key" title="<?=$curBind->key[2]['action']?>" style="background-color:#<?=$curBind->key[2]['color']?>"><div class="keyboard_layout"><?=$curRow->key[2]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[2]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[2]['title']?></h2></div>
		</div>
		<div style="border:1px solid #000;">
			<div class="row">
				<div class="key" title="<?=$curBind->key[3]['action']?>" style="background-color:#<?=$curBind->key[3]['color']?>"><div class="keyboard_layout"><?=$curRow->key[3]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[3]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[3]['title']?></h2></div>
				<div class="key" title="<?=$curBind->key[4]['action']?>" style="background-color:#<?=$curBind->key[4]['color']?>"><div class="keyboard_layout"><?=$curRow->key[4]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[4]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[4]['title']?></h2></div>
				<div class="key" title="<?=$curBind->key[5]['action']?>" style="background-color:#<?=$curBind->key[5]['color']?>"><div class="keyboard_layout"><?=$curRow->key[5]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[5]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[5]['title']?></h2></div>
			</div>
			<div class="row">
				<div class="key" title="<?=$curBind->key[6]['action']?>" style="background-color:#<?=$curBind->key[6]['color']?>"><div class="keyboard_layout"><?=$curRow->key[6]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[6]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[6]['title']?></h2></div>
				<div class="key" title="<?=$curBind->key[7]['action']?>" style="background-color:#<?=$curBind->key[7]['color']?>"><div class="keyboard_layout"><?=$curRow->key[7]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[7]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[7]['title']?></h2></div>
				<div class="key" title="<?=$curBind->key[8]['action']?>" style="background-color:#<?=$curBind->key[8]['color']?>"><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[8]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><div class="keyboard_layout"><?=$curRow->key[8]['title']?></div><h2 class="key_title"><?=$curBind->key[8]['title']?></h2></div>
			</div>
		</div>
		<div class="row" id="arrows">
			<div class="key" title="<?=$curBind->key[9]['action']?>" style="border:2px solid #000;border-bottom:none;background-color:#<?=$curBind->key[9]['color']?>"><div class="keyboard_layout"><?=$curRow->key[9]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[9]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[9]['title']?></h2></div>
		</div>
		<div class="row" id="arrows_bottom">
			<div class="key" title="<?=$curBind->key[10]['action']?>" style="background-color:#<?=$curBind->key[10]['color']?>"><div class="keyboard_layout"><?=$curRow->key[10]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[10]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[10]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[11]['action']?>" style="background-color:#<?=$curBind->key[11]['color']?>"><div class="keyboard_layout"><?=$curRow->key[11]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[11]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[11]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[12]['action']?>" style="background-color:#<?=$curBind->key[12]['color']?>"><div class="keyboard_layout"><?=$curRow->key[12]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[12]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[12]['title']?></h2></div>
		</div>
	</div>
	<?
	// Numpad
	$curRow = $lang->keyboard->numpad[0];
	$curBind = $xml->keyboard->numpad[0];
	?>
	<div id="numpad">
		<div class="row">
			<div class="key" title="<?=$curBind->key[0]['action']?>" style="background-color:#<?=$curBind->key[0]['color']?>"><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[0]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><div class="keyboard_layout"><?=$curRow->key[0]['title']?></div><h2 class="key_title"><?=$curBind->key[0]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[1]['action']?>" style="background-color:#<?=$curBind->key[1]['color']?>"><div class="keyboard_layout"><?=$curRow->key[1]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[1]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[1]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[2]['action']?>" style="background-color:#<?=$curBind->key[2]['color']?>"><div class="keyboard_layout"><?=$curRow->key[2]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[2]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[2]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[3]['action']?>" style="background-color:#<?=$curBind->key[3]['color']?>"><div class="keyboard_layout"><?=$curRow->key[3]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[3]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[3]['title']?></h2></div>
		</div>
		<div class="row">
			<div class="key" title="<?=$curBind->key[4]['action']?>" style="background-color:#<?=$curBind->key[4]['color']?>"><div class="keyboard_layout"><?=$curRow->key[4]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[4]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[4]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[5]['action']?>" style="background-color:#<?=$curBind->key[5]['color']?>"><div class="keyboard_layout"><?=$curRow->key[5]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[5]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[5]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[6]['action']?>" style="background-color:#<?=$curBind->key[6]['color']?>"><div class="keyboard_layout"><?=$curRow->key[6]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[6]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[6]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[7]['action']?>" id="numpad_plus"style="float:right;background-color:#<?=$curBind->key[7]['color']?>"><div class="keyboard_layout"><?=$curRow->key[7]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[7]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[7]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[8]['action']?>" style="float:right;background-color:#<?=$curBind->key[8]['color']?>"><div class="keyboard_layout"><?=$curRow->key[8]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[8]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[8]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[9]['action']?>" style="float:right;background-color:#<?=$curBind->key[9]['color']?>"><div class="keyboard_layout"><?=$curRow->key[9]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[9]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[9]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[10]['action']?>" style="float:right;background-color:#<?=$curBind->key[10]['color']?>"><div class="keyboard_layout"><?=$curRow->key[10]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[10]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[10]['title']?></h2></div>
		</div>
		<div class="row">
			<div class="key" title="<?=$curBind->key[11]['action']?>" style="background-color:#<?=$curBind->key[11]['color']?>"><div class="keyboard_layout"><?=$curRow->key[11]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[11]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[11]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[12]['action']?>" style="background-color:#<?=$curBind->key[12]['color']?>"><div class="keyboard_layout"><?=$curRow->key[12]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[12]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[12]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[13]['action']?>" style="background-color:#<?=$curBind->key[13]['color']?>"><div class="keyboard_layout"><?=$curRow->key[13]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[13]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[13]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[14]['action']?>" id="numpad_enter" style="float:right;background-color:#<?=$curBind->key[14]['color']?>"><div class="keyboard_layout"><?=$curRow->key[14]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[14]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[14]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[15]['action']?>" style="float:right;background-color:#<?=$curBind->key[15]['color']?>"><div class="keyboard_layout"><?=$curRow->key[15]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[15]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[15]['title']?></h2></div>
			<div class="key" title="<?=$curBind->key[16]['action']?>" id="numpad_insert" style="float:right;background-color:#<?=$curBind->key[16]['color']?>"><div class="keyboard_layout"><?=$curRow->key[16]['title']?></div><?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->key[16]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?><h2 class="key_title"><?=$curBind->key[16]['title']?></h2></div>
		</div>
	</div><!-- end numpad -->
</div><!-- end keyboard_container -->
<?
// Mouse
$curRow = $lang->mouse[0];
$curBind = $xml->mouse[0];
?>
<div id="mouse_container">
	<div id="mouse_binds_left">
		<div class="mouse_bind" title="<?=$curBind->button[0]['action']?>">
			<?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->button[0]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?>
			<div class="mouse_layout" id="mouse_1"><?=$curRow->button[0]['title']?></div>
			<h2 class="mouse_title"><?=$curBind->button[0]['title']?></h2>
		</div>
		<div class="mouse_bind" title="<?=$curBind->button[1]['action']?>">
			<?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->button[1]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?>
			<div class="mouse_layout" id="mouse_2"><?=$curRow->button[1]['title']?></div>
			<h2 class="mouse_title"><?=$curBind->button[1]['title']?></h2>
		</div>
		<div class="mouse_bind" title="<?=$curBind->button[2]['action']?>">
			<?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->button[2]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?>
			<div class="mouse_layout" id="mouse_3"><?=$curRow->button[2]['title']?></div>
			<h2 class="mouse_title"><?=$curBind->button[2]['title']?></h2>
		</div>
		<div class="mouse_bind" id="mouse_bind_last_l" title="<?=$curBind->button[3]['action']?>">
			<?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->button[3]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?>
			<div class="mouse_layout" id="mouse_4"><?=$curRow->button[3]['title']?></div>
			<h2 class="mouse_title"><?=$curBind->button[3]['title']?></h2>
		</div>
	</div>
	<img src="img/mouse_lines.gif" style="float:left;margin:0;" />
	<div id="mouse_binds_right">
		<div class="mouse_bind" title="<?=$curBind->button[4]['action']?>">
			<?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->button[4]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?>
			<div class="mouse_layout" id="mouse_5"><?=$curRow->button[4]['title']?></div>
			<h2 class="mouse_title"><?=$curBind->button[4]['title']?></h2>
		</div>
		<div class="mouse_bind" title="<?=$curBind->button[5]['action']?>">
			<?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->button[5]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?>
			<div class="mouse_layout" id="mouse_6"><?=$curRow->button[5]['title']?></div>
			<h2 class="mouse_title"><?=$curBind->button[5]['title']?></h2>
		</div>
		<div class="mouse_bind" title="<?=$curBind->button[6]['action']?>">
			<?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->button[6]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?>
			<div class="mouse_layout" id="mouse_7"><?=$curRow->button[6]['title']?></div>
			<h2 class="mouse_title"><?=$curBind->button[6]['title']?></h2>
		</div>
		<div class="mouse_bind" id="mouse_bind_last_r1" title="<?=$curBind->button[7]['action']?>">
			<?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->button[7]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?>
			<div class="mouse_layout" id="mouse_8"><?=$curRow->button[7]['title']?></div>
			<h2 class="mouse_title"><?=$curBind->button[7]['title']?></h2>
		</div>
		<div class="mouse_bind" id="mouse_bind_last_r2" title="<?=$curBind->button[8]['action']?>">
			<?=($logged_in) ? "<a href=\"tpl/edit_bind.php?item=".$curBind->button[8]['id']."\" class=\"bind_edit\"><img src=\"css/img/pencil.png\" title=\"edit keybind\" alt=\"edit\" /></a>" : "" ?>
			<div class="mouse_layout" id="mouse_9"><?=$curRow->button[8]['title']?></div>
			<h2 class="mouse_title"><?=$curBind->button[8]['title']?></h2>
		</div>
	</div>
</div>
<script type="text/javascript">
// This has to be here for the tooltips to be properly initialize when
// loaded by AJAX
$(document).ready(function() {
	 initTooltips();
 });
</script>
<div class="jqmWindow" id="ex2">
Please wait... <img src="img/ajax_loader.gif" alt="loading" />
</div>
	<?
}





//
// Deprecated
//




// Build the XML | Accepts a bind_array as above
// -----------------------------------------------------
// <keyboard>
	// <row>
		// <id>key_1</id>
		// <key id="key_backtick" bind="Console" color="" />
	// </row>
// </keyboard>
function buildKeyboardXML($bind_array,$output_name) {
	$xml_output = "<?xml version='1.0' standalone='yes'?>\n<keyboard>\n";
	foreach ($bind_array as $row) {
		$xml_output .= "\t<row>\n";
		foreach ($row as $key=>$title) {
			$xml_output .= "\t\t<key id=\"$key\" title=\"$title\" />\n";
		}
		$xml_output .= "\t</row>\n";
	}
	$xml_output .= "</keyboard>";
	
	// Write to XML file
	$fh = fopen($output_name, 'w') or die("can't open file");
	fwrite($fh, $xml_output);
	fclose($fh);
	return "Successfully output <b>$output_name</b>.<br />";
}

?>
