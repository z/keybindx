/*
 * Copyright 2008 - Nexuiz Ninjaz
 * 
 * JS Developed my Tyler "-z-" Mulligan, works in combination with
 * a XHTML file that displays a specifically formated XML file I refer
 * to as Keybind XML or KBML.
 * 
 * http://www.nexuizninjaz.com/toolz/keyboard
 * 
 * This code is free to use but this copyright must stay in tact.
 * 
 */

$(document).ready(function() {
	
	// General Setup
	
	// Scroller
	$.scrollTo.defaults.axis = 'xy';
	$.scrollTo( 0 );//reset the screen to (0,0)
	
	// Tooltips
	//initTooltips();

	// Page Link onclick
	$("#page_link").click(function(){ $("#page_link").select(); });
	
	// Change Binds
	$(".bind_def").click(function(){
		$('#ajax_loader').show();
		$.scrollTo( 0 );
		$("#bind_container").hide();
		var nkml = $(this).attr("id");
		$("#bind_container").load("ajax/binds.php?name=" + nkml + "&a=1");
		$("#bind_container")
			.ajaxComplete(function() {
				$('#ajax_loader').hide();
				$("#bind_container").fadeIn(100);
				// Page Link
				$("#page_link").val('http://toolz.nexuizninjaz.com/keybinds/index.php?name=' + nkml);
				initPopups();
			}
		);
		return false;
	});
	
	// Hide Image Loading Animation
	$('#ajax_loader').hide();
	
	// Wide View
	$("#view_wide").click(function(){
		$.scrollTo( 0 );
		$("#keyboard_container").css("width","1760px");
		$("#header").css("padding-left","644px");
		$("#mouse_container").css("margin-left","596px");
		$.scrollTo( {top: '76px', left: '1980px'}, 800 );
		return false;
	});
	
	// Page View
	$("#view_page").click(function(){;
		setTimeout("$('#keyboard_container').css('width','98%')",400);
		setTimeout("$('#header').css('padding-left','52px')",400);
		$("#mouse_container").css("margin-left","0");
		$.scrollTo( {top: '76px', left: '0px'}, 800 );
		return false;
	});
	
	// 'fullscreen' popout View
	$("#view_full").click(function(){
		viewFull('index.php','newpage','scrollbars=yes,fullscreen=yes');
		}
	);
	
	// On cfg click, run this ajax
	$("#cfg_to_xml").click(function(){
		$("#bind_container").hide();
		$("#bind_container").load("ajax/cfg_tools.php?a=1");
		$("#bind_container").ajaxComplete(function() {
			$(".key_title").css("font-size","11px");
			$("#bind_container").fadeIn(100);
		});
		return false;
	});
	
	// On cfg click, run this ajax
	$("#ajax_page").click(function(){
		$("#bind_container").hide();
		$("#bind_container").load("ajax/kbml_to_mysql.php?a=1");
		$("#bind_container").ajaxComplete(function() {
			$("#bind_container").fadeIn(100);
		});
		return false;
	});
	
	// On cfg click, run this ajax
	$("#kbml_to_mysql").click(function(){
		$("#bind_container").hide();
		$("#bind_container").load("ajax/kbml_to_mysql.php?a=1");
		$("#bind_container").ajaxComplete(function() {
			$("#bind_container").fadeIn(100);
		});
		return false;
	});
	
	// Menu
	$("#nav-one li").hover(
		function(){ $("ul", this).fadeIn("fast"); }, 
		function() { } 
	);
	if (document.all) {
		$("#nav-one li").hoverClass ("sfHover");
	}
	
	// Intialize Popups
	initPopups();
	
}); // End $(document).ready

// Menu stuffs
$.fn.hoverClass = function(c) {
	return this.each(function(){
		$(this).hover( 
			function() { $(this).addClass(c);  },
			function() { $(this).removeClass(c); }
		);
	});
};

// Initialize tooltips
function initTooltips() {
	$('.key').tooltip({
		track: true, 
		delay: 0, 
		opacity: 1,
		top: -28,
		left: 20
	});
	$('.mouse_bind').tooltip({
		track: true, 
		delay: 0, 
		opacity: 1,
		top: -14,
		left: 20
	});
}

// Initialize popups
function initPopups(id) {
	 $('#ex2')
	.jqDrag()
	.jqm({
			// Check for [\w]+
			ajax: '@href', 
			trigger: 'a.bind_edit, a.mouse_title',
			onShow: function(h) {
				/* callback executed when a trigger click. Show notice */
				h.w.css('opacity',0.92).fadeIn(); 
			}
	});
}

// View 'fullscreen' popout function
function viewFull(theURL,winName,features) {
	window.open(theURL,winName,features);
}
