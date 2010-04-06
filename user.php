<?// This website was developed by Tyler "-z-" Mulligan of Nexuiz Ninjaz

// Used internally
$pagename = "user";

$sitename = "Visual Keybind Playground";
$pagetitle = "NexuizNinjaz.com";

include("tpl/header.php"); ?>
<div id="bind_container" style="padding-left:20px;padding-right:60px;">
<?
//var_dump($_SESSION);
if (isset($_GET['view'])) { // calling for a view
	if ($_GET['view']=="create_new") {
?>
<p>Currently disabled</p>
<!--
	<h3>Create a new user</h3>
	<label class="first" for="username">
		Username<br />
		<input type="text" name="username" id="username" size="15" />
	</label>
	<label for="password">
		Password<br />
		<input type="password" name="password" id="password" size="15" />
	</label>
	<label for="password_2">
		Password Again<br />
		<input type="password" name="password_2" id="password_2" size="15" />
	</label>
	<label for="email">
		Email<br />
		<input type="text" name="email" id="email" size="15" />
	</label>
	<a href="#" id="login_button" onclick="tryLogin();" title="Login to Nexuiz Ninjaz Keybind Configurator"></a>
-->
<?
	}
	if ($_GET['view']=="forgot_password") {
			echo "forgot_password";
	}
	if ($_GET['view']=="preferences") {
			echo "preferences";
	}
	if ($_GET['view']=="profile") {
			echo "profile";
	}
} else {
	echo "Welcome to the user page";
}
?>
</div>
<? include("tpl/footer.php"); ?>
