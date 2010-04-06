	<ul id="nav-one" class="nav">
		<li>
			<a href="index.php" <?=($pagename==index) ? 'id="current_page"' : '' ?>>Keybinds</a>
			<ul>
				<? if ($pagename=="index") { ?>
				<li><a href="#" id="ninja_pack_v1" class="bind_def">Ninja Pack v1</a></li>
				<li><a href="#" id="nexuiz_default" class="bind_def">nexuiz default</a></li>
				<li><a href="#" id="new_binds" class="bind_def">new_binds</a></li>
				<? } else { ?>
				<li><a href="index.php?name=ninja_pack_v1">Ninja Pack v1</a></li>
				<li><a href="index.php?name=nexuiz_default">nexuiz default</a></li>
				<li><a href="index.php?name=new_binds">new_binds</a></li>
				<? } ?>
			</ul>
		</li>
		<li>
			<a href="user.php" <?=($pagename==user) ? 'id="current_page"' : '' ?>>User</a>
			<ul>
				<li>
					<? if (!$_SESSION['username']) { ?><a href="login.php">Login</a><? } else { ?> <a href="logout.php">Logout</a><? } ?>
				</li>
				<? if (!$_SESSION['username']) { ?>
				<li>
					<a href="user.php?view=create_new">Create new user</a>
				</li>
				<li>
					<a href="user.php?view=forgot_password">Forgot Password</a>
				</li>
				<? } ?> 
				<? if ($_SESSION['username']) { ?>
				<li>
					<a href="user.php?view=preferences">Edit Preferences</a>
				</li>
				<li>
					<a href="user.php?view=profile">View User Page</a>
				</li>
				<? } ?> 
			</ul>
		</li>
		<li>
			<? if ($pagename=="index") { ?>
			<a href="#item2">View</a>
			<ul>
				<li><a href="#" id="view_wide">Wide View</a></li>
				<li><a href="#" id="view_page">Fit to browser</a></li>
				<li><a href="#" id="view_full">"fullscreen" (popout)</a></li>
				<li><p>Press F11 for fullscreen</p></li>
			</ul>
			<? } else { ?>
				<a href="#" style="background-color:#333;color:#555;" title="disabled on this page">View</a>
			<? } ?>
		</li>
		<? if ($_SESSION['username'] && $_SESSION['user_level']==1) { ?>
		<li>
			<a href="#">Toolz</a>
			<ul>
				<li><a href="#" id="cfg_to_xml">cfg to kbml</a></li>
				<li><a href="#" id="kbml_to_mysql">KBML to MySQL</a></li>
				<li><a href="#" id="ajax_page">ajax_page</a></li>
			</ul>
		</li>
		<? } ?>
		<li>
			<a href="about.php" title="About the Visual Keybind Playground - Developed by Tyler Mulligan" <?=($pagename==about) ? 'id="current_page"' : '' ?>>About</a>
		</li>
		<li id="last">
			<a href="donate.php" <?=($pagename==donate) ? 'id="current_page"' : '' ?>>Donate</a>
		</li>
	</ul>
