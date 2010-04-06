<?php
session_start();
header("Cache-control: private"); // IE 6 Fix.
include('func_js.php');

// Check to see if the user is logged in before rendering anything
/*
if (!$_SESSION['username'] && $page_title!="Login" && $page_title!="Validate") {
	echo "You must <a href=\"index.php\">login</a> first.";
	js::redirect("login.php");
	exit(0);
}
*/
?>
