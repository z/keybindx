<?php
// Database Class by Tyler Mulligan
class db {

	// Global 'link' - determines if there is an established connection
	var $link;
	
	// Connection Settings
	function connect() { //checks for config file first, else go to default settings
		// if(file_exists("../inc/server_Settings.txt")){
			// $file=fopen("../inc/server_settings.txt","r");
			// $u=explode("=",trim(fgets($file)));
			// $u=$u[1];
			// $p=explode('=',trim(fgets($file)));
			// $p=$p[1];
			// if(empty($p)){$p="";}
			// $h=explode('=',trim(fgets($file)));
			// $h=$h[1];
			// fclose($file);
		// }else{
			$u="root";
			$p="local";
			$h="localhost";
		// }
		$d="keybind_me";
		// Connect to the database
		$link = mysql_connect($h,$u,$p);
		// Select the database
		@mysql_select_db($d) or die("Unable to select database");
	}
	
	function isConnected() {
		return (isset($link)) ? true : false;
	}
	
	function getConnection() {
		if (db::isConnected())
			return $link;
		db::connect();
	}
	
	
	// MySQL Functions
	function query($SQL) {
		db::getConnection();
		// Return an array if successful, otherwise return error
		return (!mysql_query($SQL)) ? mysql_error() : mysql_query($SQL);
		mysql_close();
	}
	
	// Fetch turns a mysql array into a php array
	function fetch($res) {
		if ($res==FALSE)
			return $res;
			
		db::getConnection();
		$ret = array();
        while($i=mysql_fetch_assoc($res)) {
            $ret[]=$i;
        }
		mysql_close();
		return $ret;
	}
	
	// count the rows
	function count($SQL) {
		db::getConnection();
		return mysql_num_rows(db::query($SQL));
	}

	// insert into the database
	function insert($SQL) {
		db::getConnection();
		$retVal = mysql_query($SQL);
		$insertedId = mysql_insert_id();
		return (empty($retVal)) ? die(mysql_error()) : $insertedId;
	}
	
}
?>
