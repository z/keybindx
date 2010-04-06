<?php
// page_title: leave this - it's for func_session
$site_title = "Nexuiz Ninjaz Keybinds";
$page_title = "Login";
include_once('functions/func_session.php');
include_once('functions/func_js.php');

// The user is already logged in
if ($_SESSION['uid']) { js::redirect("index.php"); }

// They haven't logged in yet
include_once('functions/func_xt.php');
$goes_to = "validate.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title><?=$site_title?> - <?=$page_title?></title>
<link rel="stylesheet" type="text/css" href="css/login.css" title="default" media="screen" />
<script src="js/jquery-1.2.3.min.js" type="text/javascript"></script>
<script src="js/login.js" type="text/javascript"></script>
</head>
<body>
<div id="login_top">
	<a href="#" title="Nexuiz Ninjaz" target="_blank"><img src="css/img/login_header.jpg" alt="Nexuiz Ninjaz" title="Nexuiz Ninjaz" border="0" id="login_header" /></a>
</div>
<div id="login_middle">
	<noscript>
	<p id="javascript_warning">You must enable javascript to use this application!</p>
	</noscript>
	<div id="login_form">
		<label class="first" for="username">
			Username<br />
			<input type="text" name="username" id="username" size="15" />
		</label>
		<label for="password">
			Password<br />
			<input type="password" name="password" id="password" size="15" />
		</label>
		<a href="#" id="login_button" onclick="tryLogin();" title="Login to Nexuiz Ninjaz Keybind Configurator"></a>
		<p id="forgot_password"><a href="forgot_password.php">forgot your password?</a></p>
		<p id="status_message"></p>
	</div>
</div>
<div id="login_bottom">
	<div style="height:36px;">
		<img src="css/img/login_ppm.jpg" alt="Nexuiz Ninjaz" id="status_image" />
	</div>
	<p id="footer">Copyright 2008 NexuizNinjaz.com</p>
</div>
</body>
</html>
