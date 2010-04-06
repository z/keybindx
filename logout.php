<?php
include_once('functions/func_session.php');
include_once('functions/func_js.php');
$_SESSION = array();
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/2000/REC-xhtml1-20000126/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Object Organizer - Logging you out</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Tyler Mulligan - www.detrition.net" />
<meta name="Description" content="Tyler Mulligan's work portfolio.  Web design, logos and print, digital art, web applications and more.">
<link rel="stylesheet" href="default.css" type="text/css"></link>
</head>
<body>
<div id="logo"></div>
<div id="content">
<p>Logging you out...</p>
</div>
<?php js::redirect("index.php");?>
</body>
</html>