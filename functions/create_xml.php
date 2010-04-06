<?
include("keyboard.php");

// Build the array for xml
$ninja_binds = array(
	"row_1" =>
	array(
		"key_backtick" => "Console",
		"key_1" => "I need help",
		"key_2" => "Attacking",
		"key_3" => "Defending",
		"key_4" => "I'm on my way",
		"key_5" => "Sorry %p",
		"key_6" => "Thanks",
		"key_7" => "",
		"key_8" => "",
		"key_9" => "",
		"key_0" => "",
		"key_minus" => "",
		"key_plus" => "",
		"key_backspace" => ""
	),
	"row_2" =>
	array(
		"key_tab" => "Score",
		"key_q" => "Rocket",
		"key_w" => "Up",
		"key_e" => "Laser",
		"key_r" => "MG",
		"key_t" => "Chat",
		"key_y" => "Team Chat",
		"key_u" => "",
		"key_i" => "",
		"key_o" => "",
		"key_p" => "",
		"key_left_bracket" => "",
		"key_right_bracket" => "",
		"key_backslash" => ""
	),
	"row_3" =>
	array(
		"key_caps_lock" => "",
		"key_a" => "Left",
		"key_s" => "Down",
		"key_d" => "Right",
		"key_f" => "Nex",
		"key_g" => "Drop Weapon",
		"key_h" => "",
		"key_j" => "",
		"key_k" => "",
		"key_l" => "",
		"key_semicolon" => "",
		"key_apostrophe" => "",
		"key_enter" => ""
	),
	"row_4" =>
	array(
		"key_left_shift" => "Crouch",
		"key_z" => "Zoom/FOV Adjust",
		"key_x" => "FOV Reset",
		"key_c" => "Mortar",
		"key_v" => "Electro",
		"key_b" => "Best Weapon Fix",
		"key_n" => "",
		"key_m" => "",
		"key_comma" => "",
		"key_period" => "",
		"key_forwardslash" => "",
		"key_right_shift" => ""
	),
	"row_5" =>
	array(
		"key_left_ctrl" => "Nevermind",
		"key_left_special" => "",
		"key_left_alt" => "",
		"key_space_bar" => "Jump",
		"key_right_alt" => "",
		"key_right_special" => "",
		"key_popup" => "",
		"key_right_ctrl" => ""
	)
);


$key_values = array(
	"row_1" =>
	array(
		"key_backtick" => "`",
		"key_1" => "1",
		"key_2" => "2",
		"key_3" => "3",
		"key_4" => "4",
		"key_5" => "5",
		"key_6" => "6",
		"key_7" => "7",
		"key_8" => "8",
		"key_9" => "9",
		"key_0" => "0",
		"key_minus" => "-",
		"key_plus" => "=",
		"key_backspace" => "backspace"
	),
	"row_2" =>
	array(
		"key_tab" => "tab",
		"key_q" => "q",
		"key_w" => "w",
		"key_e" => "e",
		"key_r" => "r",
		"key_t" => "t",
		"key_y" => "y",
		"key_u" => "u",
		"key_i" => "i",
		"key_o" => "o",
		"key_p" => "p",
		"key_left_bracket" => "[",
		"key_right_bracket" => "]",
		"key_backslash" => "\\"
	),
	"row_3" =>
	array(
		"key_caps_lock" => "caps lock",
		"key_a" => "a",
		"key_s" => "s",
		"key_d" => "d",
		"key_f" => "f",
		"key_g" => "g",
		"key_h" => "h",
		"key_j" => "j",
		"key_k" => "k",
		"key_l" => "l",
		"key_semicolon" => ";",
		"key_apostrophe" => "'",
		"key_enter" => "enter"
	),
	"row_4" =>
	array(
		"key_left_shift" => "shift",
		"key_z" => "z",
		"key_x" => "x",
		"key_c" => "c",
		"key_v" => "v",
		"key_b" => "b",
		"key_n" => "n",
		"key_m" => "m",
		"key_comma" => ",",
		"key_period" => ".",
		"key_forwardslash" => "/",
		"key_right_shift" => "shift"
	),
	"row_5" =>
	array(
		"key_left_ctrl" => "ctrl",
		"key_left_special" => "opt",
		"key_left_alt" => "alt",
		"key_space_bar" => "space bar",
		"key_right_alt" => "alt",
		"key_right_special" => "opt",
		"key_popup" => "pop",
		"key_right_ctrl" => "ctrl"
	)
);


echo buildKeyboardXML($key_values,"../default_keys.xml");
//echo buildKeyboardXML($ninja_binds,"../ninja_binds.xml");
?>