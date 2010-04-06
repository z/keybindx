<?// This website was developed by Tyler "-z-" Mulligan of Nexuiz Ninjaz

// Used internally
$pagename = "index";

$sitename = "Visual Keybind Playground";
$pagetitle = "NexuizNinjaz.com";

include("tpl/header.php"); ?>
<div id="bind_container">
<?
//var_dump($_SESSION);
?>
<? include("ajax/binds.php"); ?>
</div>
<? include("tpl/footer.php"); ?>
