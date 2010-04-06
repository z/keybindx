// Object Organizer Login - written by Tyler Mulligan -  www.detrition.net

$(document).ready(function() {
	
	// Some Effects to set the mood
	$("#login_header").hide();
	$("#login_header").fadeIn(1000);
	$("#login_form").hide();
	$("#login_form").fadeIn(2000);
	$("#status_image").hide();
	$("#status_image").fadeIn(3000);
   	
	// Select the username after the effects - this allows the user to 'tab' to the password field or type in a different username
	setTimeout("$('#username').select()", 1800);
   
	// User can hit 'enter' to submit password
    $("#password").keypress(function (e) {
		if (e.which == 13) { // 13 = enter key
			tryLogin();
		}
    });
	
	// Anytime the password field gains focus, select the text
    $("#password").focus(function (e) {
		$("#password").select();
    });
   
});

// tryLogin is called by the pseudo submit
function tryLogin() {

	   // Loader Image
	   $("#status_message").fadeTo(400,0.2);
	   $("#status_image").hide();
	   $("#status_image").attr("src","css/img/login_loader.gif");
	   $("#status_image").fadeIn(500);
	   
	 // Send Post Request
     $.post("validate.php", {username: $("#username").val(), password: $("#password").val()}, function(xml) {
		 
	   // Return the result / parse the xml
	   if ($("loggedin", xml).text()==1) {
			// We can style :) | Success
			$("#status_message").fadeTo(300,1);
			$("#status_image").fadeOut(500);
			$("#status_image").hide(500);
			$("#status_message").addClass("status_success");
			$("#status_message").html($("message", xml).text());
			window.setTimeout("window.location.href='index.php'",600);
		} else { // FAIL
			$("#status_message").addClass("status_alert");
			$("#status_message").html("<img src=\"css/img/icon_error.png\" alt=\"oh noes!\" title=\"Error: " + $("message", xml).text() + "\" /><p>" + $("message", xml).text() + "</p><br style=\"clear:left;\" />");
		    // Loader Image
		    $("#status_message").fadeTo(400,1);
		    $("#status_image").hide();
		    $("#status_image").attr("src","css/img/login_ppm.jpg");
		    $("#status_image").fadeIn(400);
			// Select the username
			$("#username").select();
		}
     });
     
	 // stop normal link click
     return false;
	 
}
