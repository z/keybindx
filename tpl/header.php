<? include_once('functions/func_session.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Tyler '-z-' Mulligan - www.nexuizninjaz.com" />
<meta name="Description" content="<?=$description?>" />
<title><?=$sitename?> - <?=$pagetitle?></title>
	<link rel="stylesheet" href="css/default.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/jquery.tooltip.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/jquery.suckerfish.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/jquery.jqmodal.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/jquery.farbtastic.css" type="text/css" media="screen" />
	<script src="js/jquery-1.2.3.min.js" type="text/javascript"></script>
	<script src="js/jquery.dimensions.js" type="text/javascript"></script>
	<script src="js/jquery.tooltip.min.js" type="text/javascript"></script>
	<script src="js/jquery.scrollTo-min.js" type="text/javascript"></script>
	<script src="js/jquery.jqModal.js" type="text/javascript"></script>
	<script src="js/jquery.jqDnR.js" type="text/javascript"></script>
	<script src="js/jquery.farbtastic.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
</head>
<body>
<div id="header">
<? if($pagename=="index") { ?>
	<div id="bindset_info">
		<h3>Viewing Ninja Pack v1</h3>
		<p style="text-align:right;margin:0;padding:0;">Created by -z-</p>
		<p id="bind_rating">rated: 4.5/5</p>
		<p id="bind_share">Share these binds:</p>
		<input type="text" id="page_link" value='http://toolz.nexuizninjaz.com/keybinds/' style="width:600px;float:right;margin-right:0px;" />
	</div>
<? } ?>
	<h1 style="width:500px;">Visual Keybind Playground</h1>
	<h3><a href="http://www.nexuizninjaz.com" target="_blank">Created by -z- of Nexuiz Ninjaz</a></h3>	
	<? include('tpl/menu.php'); ?>
	<div id="ajax_loader">
		<img src="img/ajax_loader.gif" alt="Loading..." title="Loading..." style="float:left;" /><p style="float:left;margin:0 0 0 5px;padding:0;">Loading...</p><br style="clear:left;" />
	</div>
</div><!-- header -->
<br style="margin-top:4px;" />
