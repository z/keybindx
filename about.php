<?// This website was developed by Tyler "-z-" Mulligan of Nexuiz Ninjaz

// Used internally
$pagename = "about";

$sitename = "About the Visual Keybind Playground";
$pagetitle = "NexuizNinjaz.com";

include("tpl/header.php"); ?>
<div id="bind_container" style="padding-left:20px;padding-right:60px;">
<h3>About this application</h3>
<p>The Visual Keybind Playground was started as way for advanced <b><a href="http://www.nexuiz.com" target="_blank" title="Nexuiz - A free, open-source cross platform game (that's too fast for your grandma to play">Nexuiz</a> <a href="http://www.nexuizninjaz.com" target="_blank" title="Nexuiz Ninjaz - Practicing the Ninja Arts of Nexuiz">Players</a></b> to share configurations and explain them visually because it's hard to read a cfg file and remember all the binds.  I wanted it to be accessible, automated and scalable so I created a markup language I refer to as Keybind Markup Language or <b>KBML</b>.  It is designed to look best when in channel mode in your browser (f11) on a 1280x1024 screen for best results.  Widescreens are also supported and the application will stretch to the width of your browser window.  Optionally, you may force a wide view of the keyboard.</p>
<p>All binds displayed on this site are built dynamically using PHP that outpouts XHTML styled by CSS and javascript.  Javascript does not <b>NEED</b> to be enabled to view binds, however it does enhance them with tooltips.  Javascript is required if you wish to edit binds.</p>
<h3>Extending this application</h3>
<p>This application can parse any KBML file, so all you have to do is create a script to parse your application's configuration file into KBML.  Examples will be up later.</p>
<h3>About the developer</h3>
<p>This software was developed by Tyler "-z-" Mulligan of the <a href="http://www.nexuizninjaz.com" title="Nexuiz Ninjaz - Praciticng the Ninja arts of Nexuiz">Nexuiz Ninjaz</a>.  If you're interested in learning more about me, you can check out my <a href="http://www.detrition.net" title="detrition.net - The working portfolio of Tyler Mulligan">portfolio here</a> and my <a href="http://www.doknowevil.net" title="Do Know Evil - Tyler Mulligan's Blog">blog here</a>.  The best way to catch me for a quick conversation is in <a href="http://chat.nexuizninjaz.com" title="#nexuiz.ninjaz on irc.quakenet.org" target="_blank">#nexuiz.ninjaz on irc.quakenet.org</a>.</p>
</div>
<? include("tpl/footer.php"); ?>
