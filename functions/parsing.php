<?
include('func_db.php');

/*
 * Translates from format to another
 * 
 * This function returns an array like such:
 * 
 * 'key_q' => '"say hello"'
 * 'key_w' => '+foward'
 * 'key_e' => '"say goodbye"'
 * 
 * If there is a problem, it will return an error string
 * 
 * @PARAM $cfg_file is a configuration (string)
 * @PARAM $from is the format your translating from (string)
 * @PARAM $to is the format your translating to (string)
 */
function translate($cfg_file, $from, $to) {
	
	// Make sure we only have alphanumerics for format names
	//we'll be building function names off these
	if (!preg_match("/[A-Z0-9]+/i",$from)) { return "\"From\" format is undefined or does not match the [A-Z0-9]+ pattern."; }
	
	if (!preg_match("/[A-Z0-9]+/i",$to)) { return "\"To\" format is undefined or does not match the [A-Z0-9]+ pattern."; }
	
	// Build the function name
	$function_name = "parse".$from."to".$to;
	
	// See if the function exists
	if (!function_exists($function_name)) { return "Function to convert from '$from' to '$to' does not exists"; }
	
	// Put the config file into an Array
	$array = file($cfg_file);

	// Pull out just the binds
	// Currently filtering tilda
	$binds = preg_grep('/^bind "?[\w` \+\[\]\(\)=-]+"?/i', $array);
	
	$n = array(); // $n is the data array we return
	foreach ($binds as $bind) {
		// Format to nexuiz ninjaz keybind xml
		$a2 = $function_name($bind);

		// Append to the return array
		$n[$a2[0]] .= trim($a2[1]);
	}
	// Return an array the generateXML uses
	return $n;
}


/*
 * Parses Nexuiz Configs into KBML
 * 
 * This function returns a reformated string
 * 
 * If there is a problem, it will return an error string
 * 
 * @PARAM $bind is a 'raw' bind from a Nexuiz config (string)
 */
function parseNexuizToKBML($bind) {
	// Reformat the Binds names to KBML
	$bind = preg_replace(array(
			"/^bind escape/i",
			"/^bind `/i",
			"/^bind uparrow/i",
			"/^bind rightarrow/i",
			"/^bind downarrow/i",
			"/^bind leftarrow/i",
			"/^bind kp_ins/i",
			"/^bind kp_del/i",
			"/^bind kp_pgdn/i",
			"/^bind kp_rightarrow/i",
			"/^bind kp_pgup/i",
			"/^bind kp_uparrow/i",
			"/^bind kp_home/i",
			"/^bind kp_leftarrow/i",
			"/^bind kp_end/i",
			"/^bind kp_downarrow/i",
			"/^bind kp_5/i",
			"/^bind kp_enter/i",
			"/^bind kp_plus/i",
			"/^bind kp_minus/i",
			"/^bind kp_multiply/i",
			"/^bind kp_slash/i",
			"/^bind -/i",
			"/^bind =/i",
			"/^bind \[/i",
			"/^bind \]/i",
			"/^bind space/i"
		),
		array(
			"bind esc",
			"bind backtick",
			"bind up",
			"bind right",
			"bind down",
			"bind left",
			"bind num_0",
			"bind num_period",
			"bind num_3",
			"bind num_6",
			"bind num_9",
			"bind num_8",
			"bind num_7",
			"bind num_4",
			"bind num_1",
			"bind num_2",
			"bind num_5",
			"bind num_enter",
			"bind num_plus",
			"bind num_minus",
			"bind num_multiply",
			"bind num_slash",
			"bind minus",
			"bind plus",
			"bind left_bracket",
			"bind right_bracket",
			"bind space_bar"
		),
		$bind);
		
		$new_bind = preg_replace(
			array(
				'/^bind ([\w`]+) ([\w_ \+\^\[\]\(\)]+)$/i',
				'/^bind ([\w`]+) "([\w_ \+\^\[\]\(\)[:punct:]]+)"$/i'
			),
			array(
			"key_$1,$2",
			"key_$1,$2"
			),
		$bind);
		
		// Explode, then set the key_x to the key of the array
		$a2 = explode(",",$new_bind);
		return $a2;
}

/*
 * Generates a US keyboard Layout KBML file
 * 
 * This function builds an xml file
 * 
 * If there is a problem, it will return an error string
 * 
 * @PARAM $array is a data array built by the tranlate function (array)
 * 
 * TODO:
 *  - error handling
 *  - return values
 * 
 */
// This function g
function generateKBML($array) {
	$keybind_xml = "<?xml version='1.0' standalone='yes'?>
	<KBML>
		<title>Autogenerated keybinds</title>
		<software>Nexuiz</software>
		<lang>en</lang>
		<author>A Ninja</author>
		<website>www.nexuizninjaz.com</website>
		<keyboard>
			<function_keys>
				<key id=\"key_esc\" title=\"".$array['key_esc']."\" />
				<key id=\"key_f1\" title=\"".$array['key_f1']."\" />
				<key id=\"key_f2\" title=\"".$array['key_f2']."\" />
				<key id=\"key_f3\" title=\"".$array['key_f3']."\" />
				<key id=\"key_f4\" title=\"".$array['key_f4']."\" />
				<key id=\"key_f5\" title=\"".$array['key_f5']."\" />
				<key id=\"key_f6\" title=\"".$array['key_f6']."\" />
				<key id=\"key_f7\" title=\"".$array['key_f7']."\" />
				<key id=\"key_f8\" title=\"".$array['key_f8']."\" />
				<key id=\"key_f9\" title=\"".$array['key_f9']."\" />
				<key id=\"key_f10\" title=\"".$array['key_f10']."\" />
				<key id=\"key_f11\" title=\"".$array['key_f11']."\" />
				<key id=\"key_f12\" title=\"".$array['key_f12']."\" />
			</function_keys>
			<row>
				<key id=\"key_backtick\" title=\"".$array['key_backtick']."\" />
				<key id=\"key_1\" title=\"".$array['key_1']."\" />
				<key id=\"key_2\" title=\"".$array['key_2']."\" />
				<key id=\"key_3\" title=\"".$array['key_3']."\" />
				<key id=\"key_4\" title=\"".$array['key_4']."\" />
				<key id=\"key_5\" title=\"".$array['key_5']."\" />
				<key id=\"key_6\" title=\"".$array['key_6']."\" />
				<key id=\"key_7\" title=\"".$array['key_7']."\" />
				<key id=\"key_8\" title=\"".$array['key_8']."\" />
				<key id=\"key_9\" title=\"".$array['key_9']."\" />
				<key id=\"key_0\" title=\"".$array['key_0']."\" />
				<key id=\"key_minus\" title=\"".$array['key_minus']."\" />
				<key id=\"key_plus\" title=\"".$array['key_plus']."\" />
				<key id=\"key_backspace\" title=\"".$array['key_backspace']."\" />
			</row>
			<row>
				<key id=\"key_tab\" title=\"".$array['key_tab']."\" />
				<key id=\"key_q\" title=\"".$array['key_q']."\" />
				<key id=\"key_w\" title=\"".$array['key_w']."\" />
				<key id=\"key_e\" title=\"".$array['key_e']."\" />
				<key id=\"key_r\" title=\"".$array['key_r']."\" />
				<key id=\"key_t\" title=\"".$array['key_t']."\" />
				<key id=\"key_y\" title=\"".$array['key_y']."\" />
				<key id=\"key_u\" title=\"".$array['key_u']."\" />
				<key id=\"key_i\" title=\"".$array['key_i']."\" />
				<key id=\"key_o\" title=\"".$array['key_o']."\" />
				<key id=\"key_p\" title=\"".$array['key_p']."\" />
				<key id=\"key_left_bracket\" title=\"".$array['key_left_bracket']."\" />
				<key id=\"key_right_bracket\" title=\"".$array['key_right_bracket']."\" />
				<key id=\"key_backslash\" title=\"".$array['key_backslash']."\" />
			</row>
			<row>
				<key id=\"key_caps_lock\" title=\"".$array['key_caps_lock']."\" />
				<key id=\"key_a\" title=\"".$array['key_a']."\" />
				<key id=\"key_s\" title=\"".$array['key_s']."\" />
				<key id=\"key_d\" title=\"".$array['key_d']."\" />
				<key id=\"key_f\" title=\"".$array['key_f']."\" />
				<key id=\"key_g\" title=\"".$array['key_g']."\" />
				<key id=\"key_h\" title=\"".$array['key_h']."\" />
				<key id=\"key_j\" title=\"".$array['key_j']."\" />
				<key id=\"key_k\" title=\"".$array['key_k']."\" />
				<key id=\"key_l\" title=\"".$array['key_l']."\" />
				<key id=\"key_semicolon\" title=\"".$array['key_semicolon']."\" />
				<key id=\"key_apostrophe\" title=\"".$array['key_apostrophe']."\" />
				<key id=\"key_enter\" title=\"".$array['key_enter']."\" />
			</row>
			<row>
				<key id=\"key_left_shift\" title=\"".$array['key_left_shift']."\" />
				<key id=\"key_z\" title=\"".$array['key_z']."\" />
				<key id=\"key_x\" title=\"".$array['key_x']."\" />
				<key id=\"key_c\" title=\"".$array['key_c']."\" />
				<key id=\"key_v\" title=\"".$array['key_v']."\" />
				<key id=\"key_b\" title=\"".$array['key_b']."\" />
				<key id=\"key_n\" title=\"".$array['key_n']."\" />
				<key id=\"key_m\" title=\"".$array['key_m']."\" />
				<key id=\"key_comma\" title=\"".$array['key_comma']."\" />
				<key id=\"key_period\" title=\"".$array['key_period']."\" />
				<key id=\"key_forwardslash\" title=\"".$array['key_forwardslash']."\" />
				<key id=\"key_right_shift\" title=\"".$array['key_right_shift']."\" />
			</row>
			<row>
				<key id=\"key_left_ctrl\" title=\"".$array['key_left_ctrl']."\" />
				<key id=\"key_left_special\" title=\"".$array['key_left_special']."\" />
				<key id=\"key_left_alt\" title=\"".$array['key_left_alt']."\" />
				<key id=\"key_space_bar\" title=\"".$array['key_space_bar']."\" />
				<key id=\"key_right_alt\" title=\"".$array['key_right_alt']."\" />
				<key id=\"key_right_special\" title=\"".$array['key_right_special']."\" />
				<key id=\"key_popup\" title=\"".$array['key_popup']."\" />
				<key id=\"key_right_ctrl\" title=\"".$array['key_right_ctrl']."\" />
			</row>
			<center_chunk>
				<key id=\"key_prtscr\" title=\"".$array['key_prtscr']."\" />
				<key id=\"key_scrlck\" title=\"".$array['key_scrlck']."\" />
				<key id=\"key_pause\" title=\"".$array['key_pause']."\" />
				<key id=\"key_insert\" title=\"".$array['key_insert']."\" />
				<key id=\"key_home\" title=\"".$array['key_home']."\" />
				<key id=\"key_page_up\" title=\"".$array['key_page_up']."\" />
				<key id=\"key_delete\" title=\"".$array['key_delete']."\" />
				<key id=\"key_end\" title=\"".$array['key_end']."\" />
				<key id=\"key_page_down\" title=\"".$array['key_page_down']."\" />
				<key id=\"key_up\" title=\"".$array['key_up']."\" />
				<key id=\"key_left\" title=\"".$array['key_left']."\" />
				<key id=\"key_down\" title=\"".$array['key_down']."\" />
				<key id=\"key_right\" title=\"".$array['key_right']."\" />
			</center_chunk>
			<numpad>
				<key id=\"key_num_lock\" title=\"".$array['key_num_lock']."\" />
				<key id=\"key_num_slash\" title=\"".$array['key_num_slash']."\" />
				<key id=\"key_num_multiply\" title=\"".$array['key_num_multiply']."\" />
				<key id=\"key_num_minus\" title=\"".$array['key_num_minus']."\" />
				<key id=\"key_num_7\" title=\"".$array['key_num_7']."\" />
				<key id=\"key_num_8\" title=\"".$array['key_num_8']."\" />
				<key id=\"key_num_9\" title=\"".$array['key_num_9']."\" />
				<key id=\"key_num_plus\" title=\"".$array['key_num_plus']."\" />
				<key id=\"key_num_6\" title=\"".$array['key_num_6']."\" />
				<key id=\"key_num_5\" title=\"".$array['key_num_5']."\" />
				<key id=\"key_num_4\" title=\"".$array['key_num_4']."\" />
				<key id=\"key_num_1\" title=\"".$array['key_num_1']."\" />
				<key id=\"key_num_2\" title=\"".$array['key_num_2']."\" />
				<key id=\"key_num_3\" title=\"".$array['key_num_3']."\" />
				<key id=\"key_num_enter\" title=\"".$array['key_num_enter']."\" />
				<key id=\"key_num_period\" title=\"".$array['key_num_period']."\" />
				<key id=\"key_num_0\" title=\"".$array['key_num_0']."\" />
			</numpad>
	</keyboard>
	</KBML>";

	$xml_file = "/var/www/nn/web/toolz/keyboard/xml/new_binds.xml";
	$fh = fopen($xml_file, 'w') or die("can't open file");
	fwrite($fh, $keybind_xml);
	echo "XML Generated Successfully";
	fclose($fh);

}

// Import KBML to MySQL
function parseKBMLToMySQL ($kbml_file) {

	// Default US should have 141 lines
	$count['lines'] = count(file($kbml_file));
	// Open KBML
	$kbml = openKeyboardXML($kbml_file);
	
	if ($kbml==false) {
		return "xml file does not exist";
	} else { // validate
		$fail=false;
			
		$insert['title'] = ($kbml->title!="") ? mysql_escape_string($kbml->title) : false;
		$insert['software'] = ($kbml->software!="") ? mysql_escape_string($kbml->software) : false;
		$insert['lang'] = ($kbml->lang!="") ? mysql_escape_string($kbml->lang) : false;
		$insert['author'] = ($kbml->author!="") ? mysql_escape_string($kbml->author) : false;
		$insert['website'] = ($kbml->website!="") ? mysql_escape_string($kbml->website) : false;

		if($insert['title']==false) { echo "<br />Missing title tag"; $fail=true; }
		if($insert['software']==false) { echo "<br />Missing software tag"; $fail=true; }
		if($insert['lang']==false) { echo "<br />Missing lang tag"; $fail=true; }
		if($insert['author']==false) { echo "<br />Missing author tag"; $fail=true; }
		if($insert['website']==false) { echo "<br />Missing website tag"; $fail=true; }
		
	/*	Lang US key counts
	 *
		function keys: 13
		row 1: 14
		row 2: 14
		row 3: 13
		row 4: 12
		row 5: 8
		center chunk: 13
		numpad: 17
		mouse: 9
	*/
		$count['function_keys']=count($kbml->keyboard->function_keys->key);
		$count['row_1']=count($kbml->keyboard->row[0]->key);
		$count['row_2']=count($kbml->keyboard->row[1]->key);
		$count['row_3']=count($kbml->keyboard->row[2]->key);
		$count['row_4']=count($kbml->keyboard->row[3]->key);
		$count['row_5']=count($kbml->keyboard->row[4]->key);
		$count['center_chunk']=count($kbml->keyboard->center_chunk->key);
		$count['numpad']=count($kbml->keyboard->numpad->key);
		$count['mouse']=count($kbml->mouse->button);
		
		if($count['function_keys']!=13) { echo "<br />Only " . $count['fucntion_keys'] . " in function keys - should be 13"; $fail=true; }
		if($count['row_1']!=14) { echo "<br />Only " . $count['row_1'] . " in row 1 - should be 14"; $fail=true; }
		if($count['row_2']!=14) { echo "<br />Only " . $count['row_2'] . " in row 2 - should be 14"; $fail=true; }
		if($count['row_3']!=13) { echo "<br />Only " . $count['row_3'] . " in row 3 - should be 13"; $fail=true; }
		if($count['row_4']!=12) { echo "<br />Only " . $count['row_4'] . " in row 4 - should be 12"; $fail=true; }
		if($count['row_5']!=8) { echo "<br />Only " . $count['row_5'] . " in row 5 - should be 8"; $fail=true; }
		if($count['center_chunk']!=13) { echo "<br />Only " . $count['center_chunk'] . " in center chunk - should be 13"; $fail=true; }
		if($count['numpad']!=17) { echo "<br />Only " . $count['numpad'] . " in numpad - should be 17"; $fail=true; }
		if($count['mouse']!=9) { echo "<br />Only " . $count['mouse'] . " in mouse - should be 9"; $fail=true; }
		
		// Validation Success - insert into database
		if(!$fail) {
			
			echo "inserting into mysql database";
			if (db::count("SELECT lang_id FROM languages WHERE name='".$insert['lang']."'")==1) {
				$lang_id=db::fetch(db::query("SELECT lang_id FROM languages WHERE name='".$insert['lang']."'"));
			} else {
				echo "language does not exist in database";
				exit(0);
			}
			
			$return = db::insert("INSERT INTO bind_maps (lang_id,bind_map_title,software,author,website) VALUES (".$lang_id[0]['lang_id'].",'".$insert['title']."','".$insert['software']."','".$insert['author']."','".$insert['website']."');");
			
			// If the return value is numeric, it's the id of the bindmap, otherwise, the insert failed.
			$bind_map_id = (is_numeric($return)) ? $return : false;
			
			// We have a bind_map_id
			if (!$bind_map_id) {
				//todo delete inserts
				echo "fail";
				exit(0);
			}
				
			// Insert function keys
			foreach ($kbml->keyboard->function_keys->key as $key) {
				
				if (db::count("SELECT key_id FROM `keys` WHERE kbml_id='".trim($key['id'])."'")==0) {
					echo "Somehow you managed to change the id of one of the keys (".$key['id'].") because this KBML key id is unknown.  Your fault, not mine.";
					// TODO: Remove all inserts
					exit(0);
				} else {
					// get internal key_id
					$key_id = db::fetch(db::query("SELECT key_id FROM `keys` WHERE kbml_id='".trim($key['id'])."'"));				 
					// Try insert
					$return = db::insert("INSERT INTO key_binds_to_maps (key_id,bind_map_id,title,action,color) VALUES (".$key_id[0]['key_id'].",'".$bind_map_id."','".mysql_escape_string($key['title'])."','".mysql_escape_string($key['action'])."','".mysql_escape_string($key['color'])."');");
				}
			}
			
			// Insert row keys
			for($i=0;$i<5;$i++) {
				foreach ($kbml->keyboard->row[$i]->key as $key) {
					
					if (db::count("SELECT key_id FROM `keys` WHERE kbml_id='".trim($key['id'])."'")==0) {
						echo "Somehow you managed to change the id of one of the keys (".$key['id'].") because this KBML key id is unknown.  Your fault, not mine.";
						// TODO: Remove all inserts
						exit(0);
					} else {
						// get internal key_id
						$key_id = db::fetch(db::query("SELECT key_id FROM `keys` WHERE kbml_id='".trim($key['id'])."'"));				 
						// Try insert
						$return = db::insert("INSERT INTO key_binds_to_maps (key_id,bind_map_id,title,action,color) VALUES (".$key_id[0]['key_id'].",'".$bind_map_id."','".mysql_escape_string($key['title'])."','".mysql_escape_string($key['action'])."','".mysql_escape_string($key['color'])."');");
					}
				}
			}
			
			// Insert center chunk keys
			foreach ($kbml->keyboard->center_chunk->key as $key) {
				
				if (db::count("SELECT key_id FROM `keys` WHERE kbml_id='".trim($key['id'])."'")==0) {
					echo "Somehow you managed to change the id of one of the keys (".$key['id'].") because this KBML key id is unknown.  Your fault, not mine.";
					// TODO: Remove all inserts
					exit(0);
				} else {
					// get internal key_id
					$key_id = db::fetch(db::query("SELECT key_id FROM `keys` WHERE kbml_id='".trim($key['id'])."'"));				 
					// Try insert
					$return = db::insert("INSERT INTO key_binds_to_maps (key_id,bind_map_id,title,action,color) VALUES (".$key_id[0]['key_id'].",'".$bind_map_id."','".mysql_escape_string($key['title'])."','".mysql_escape_string($key['action'])."','".mysql_escape_string($key['color'])."');");
				}
			}
			
			// Insert numpad keys
			foreach ($kbml->keyboard->numpad->key as $key) {
				
				if (db::count("SELECT key_id FROM `keys` WHERE kbml_id='".trim($key['id'])."'")==0) {
					echo "Somehow you managed to change the id of one of the keys (".$key['id'].") because this KBML key id is unknown.  Your fault, not mine.";
					// TODO: Remove all inserts
					exit(0);
				} else {
					// get internal key_id
					$key_id = db::fetch(db::query("SELECT key_id FROM `keys` WHERE kbml_id='".trim($key['id'])."'"));				 
					// Try insert
					$return = db::insert("INSERT INTO key_binds_to_maps (key_id,bind_map_id,title,action,color) VALUES (".$key_id[0]['key_id'].",'".$bind_map_id."','".mysql_escape_string($key['title'])."','".mysql_escape_string($key['action'])."','".mysql_escape_string($key['color'])."');");
				}
			}
			
		} // End Validation Success Loop
	} // End Validation Loop
}








// Deprecated

function generateSmallKeyboard($css_file) {
	$array = file($css_file);
	$dimensions = preg_grep('/:\d+/i', $array);
	
	$new_dimensions = array();
	foreach($dimensions as $line) {
		$new_2 = preg_match('/^(\d+)/',$line);
		var_dump($new_2);
		echo "<br />";
		$new_dimensions .= preg_replace('/^(.*)[^#]{1}([0-9]+)(px.*)$/','$1'.$new_2.'$3',$line);
	}
	//var_dump($line);
	echo "<br />";
	//var_dump($new_dimensions);
}

?>