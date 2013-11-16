<?php
session_start();
?>
<?php
// Get the global crap
include ("global.php";

//+---------------------
// Lets set that session and get username/password!
//+---------------------
$session_username	=	$_POST["username"];
$session_password	=	$_POST["password"];
$_SESSION["username"]	=	$session_username;
$_SESSION["password"]	=	$session_password;

// Lets see if they've logged in yet :->
if (!$_SESSION["username"]) {
	print "You must be <a href=\"$homepage/login.php\">Logged In</a>/<a href=\"$homepage/register.php\">Registered</a> to play this game!";
	exit();
}

// Make a db connection
mysql_connect("$host", "$user", "$pass");
mysql_select_db("$db");

//+------------------------------
// Now lets check if they in DB
//+------------------------------
$row1=@mysql_fetch_assoc(mysql_query("SELECT `username`, `password` FROM `sc_members` WHERE `username`='$session_username'"));
if ($session_username = $row1["username"]) {
	// Password/username
	$passy			=	$row1["password"];
	$usery			=	$row1["username"];

	// crystals/ore are used for creating ships
	$crystals		=	$row1["crystals"];
	$ore			=	$row1["ore"];

	// Credits are money
	$credits		=	$row1["credits"];

	/* recruits are what are needed to run your ships (for every ship you need 1 recruit */
	$recruits		=	$row1["recruits"];

	// ships, ordered by class (ie: zalo = weakest ship)
	$zalos			=	$row1["zalos"];
	$intercepters		=	$row1["intercepters"];
	$figthers		=	$row1["fighters"];
	$wraiths		=	$row1["wraiths"];
	$corsairs		=	$row1["corsairs"];
	$battlecruisers		=	$row1["battlecruisers"];

/*
	// get alliance info
	$alliance		=	$row1["alliance"];
	$alliance_name		=	$row1["alliance_name"];
	$alliance_info		=	$row1["alliance_info"];
	$alliance_members	=	$row1["alliance_members"];
*/

	// get galaxy info
	$galaxy			=	$row1["galaxy"];

	// Get their score
	$score			=	$row1["score"];
	
	$_SESSION["username"] 	= 	$usery;
}
else {
  print "Error fetching values from table!";
	exit();
}

if ($passy != $session_password) {
	print "Eh, somethin\'s wrong<p><pre>";
	print_r($_SESSION);
	print "</pre>";
	print "<p><a href=\"$homepage/logout.php\">Retry!</a>";
	exit();
}

?>