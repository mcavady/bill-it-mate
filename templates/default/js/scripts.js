/* Author James Mcavady */
/* ================================================= */
/* === text input selection; select all on click === */
/* ================================================= */
function selectAll(id) {document.getElementById(id).select();document.getElementById(id).focus();}

/* ====================== */
/* === Cookie Setting === */
/* ====================== */

/* === return the cookie via name of cookie === */

function get_cookie(Name) {
  var search = Name + "="
  var returnvalue = "";
  if (document.cookie.length > 0) {
    offset = document.cookie.indexOf(search)
    // if cookie exists
    if (offset != -1) { 
      offset += search.length
      // set index of beginning of value
      end = document.cookie.indexOf(";", offset);
      // set index of end of cookie value
      if (end == -1) end = document.cookie.length;
      returnvalue=unescape(document.cookie.substring(offset, end))
      }
   }
  return returnvalue;
}

/* === check if the cookie has been set and display cookieinfo bar and messenger as user wants === */

function checkCookie() {
		$var = result=get_cookie("cookieAccepted");
		if ($var == "yes") {
   			document.getElementById('cookieInfo').style.display='none';
		} else if($var == "no") {
   			document.getElementById('cookieInfo').style.display='inline';
		}
		
		/* === set the messenger hidden is a state is not found === */

		$toggle = result=get_cookie("toggleMessenger");

		if ($toggle == "hidden") {
			document.getElementById('noticesBubbleUserDash').style.display="none";

		} else if ($toggle == "show") {
			document.getElementById('noticesBubbleUserDash').style.display="inline";

		} else {
			document.cookie="toggleMessenger=hidden"
		}


}

/* === user button to accept cookie  === */

function cookietoggle(button) {
		if (button.value == "yes") {
   			document.getElementById('cookieInfo').style.display='none';
			document.cookie="cookieAccepted=yes";
		}
}

/* === messenger toggle botton === */

function toggleMessenger() {

		$toggleDo = result=get_cookie("toggleMessenger");

		if ($toggleDo == "hidden") {
			document.cookie="toggleMessenger=show"
			document.getElementById('noticesBubbleUserDash').style.display="inline";

		} else if ($toggleDo == "show") {
			document.cookie="toggleMessenger=hidden"
			document.getElementById('noticesBubbleUserDash').style.display="none";

		} 
}


function notReady() {
		alert ("Not ready for use yet");
}


function userWarnDelete() {
	window.confirm("Are you sure you want to do this");
}
