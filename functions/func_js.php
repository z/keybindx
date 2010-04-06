<?php
class js {
	
	function redirect($page) {
		echo "<script type=\"text/javascript\">\n
	<!--\n
		window.location = \"".$page."\"\n
	//-->\n
		</script>\n";
	}

	function redirectDelay($page,$time) {
		$timed=$time*1000;
		echo "<script type=\"text/javascript\">\n
	<!--\n
		window.setTimeout('window.location.href=\'" . $page . "\''," . $timed .");\n
	//-->\n
		</script>\n";
	}
	
	function backDelay($time) {
		$timed=$time*1000;
		echo "<script type=\"text/javascript\">\n
	<!--\n
		window.setTimeout('history.back()'," . $timed .");\n
	//-->\n
		</script>\n";
	}
}
?>