<?php
// page_title: leave this - it's for func_session
$page_title="Validate";
include_once('functions/func_session.php');
include_once('functions/func_db.php');
/*
// Sanatize Data
$username = $_POST['username'];
$username = mysql_escape_string($username);
$password = $_POST['password'];
$password = mysql_escape_string($password);
$loggedin = 0;

// Query
$password_sql = "SELECT password FROM users WHERE username='".$username."'";

// If rows == 0 username doesn't exist
if (db::count($password_sql)==0) {
	$message = "User does not exist!";
} else {
	// Run the Query
	$password_info=db::fetch(db::query($password_sql));
	// See if passwords match
	if (md5($password)==$password_info[0]['password']) {
	
		$user_sql = "SELECT user_id, user_level_id, last_login FROM users WHERE username='".$username."'";
		$user_info = db::fetch(db::query($user_sql));
		
		// Set Session Variables
		$_SESSION['username'] = $username;
		$_SESSION['user_id'] = $user_info[0]['user_id'];
		$_SESSION['user_level']=$user_info[0]['user_level_id'];
		$_SESSION['last_login'] = $user_info[0]['last_login'];
		
		db::query('UPDATE users SET last_login=NOW() where username="'.$username.'"');
		
		// Success Message
		$message = "Thanks for logging in, ".$username;
		// XML variable checked to know which status to display
		$loggedin = 1;
	} else { 
		$message = "Login failed, please try again.";
	}
}
*/
// hack in the session variables for login
$_SESSION['username'] = "test";
$_SESSION['user_id'] = 1;
$_SESSION['user_level']= 1;

// Return XML
header('Content-type: text/xml');
//echo "<poop><loggedin>".$loggedin."</loggedin><message>".$message."</message></poop>";
echo "<poop><loggedin>1</loggedin><message>Thanks for logging in</message></poop>";
?>
