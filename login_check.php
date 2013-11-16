<?php
session_start();
?>
<?php

// Lets see if they've sent the form on login.php
if (!$_POST["username"]) {
	print "Bah, you gotta go to <a href=\"login.php\">First</a>, duh!";
	exit();
}

//+---------------------
// Lets set that session and get username/password!
//+---------------------
$session_username	=	$_POST["username"];
$session_password	=	$_POST["password"];
$_SESSION["username"]	=	$session_username;
$_SESSION["password"]	=	$session_password;

// Get the global crap
include ("global.php";

// Make a db connection
mysql_connect("$host", "$user", "$pass");
mysql_select_db("$db");

//+------------------------------
// Now lets check if they in DB
//+------------------------------
$row1=@mysql_fetch_assoc(mysql_query("SELECT `username`, `password` FROM `sc_members` WHERE `username`='$session_username'"));
if ($session_username = $row1["username"]) {
	$passy			=	$row1["password"];
	$usery			=	$row1["username"];
	$_SESSION["username"] 	= 	$usery;
}
// If there's an error getting this info...
else {
	print "Error Fetching password and username from the table!";
}
// Now lets make sure their password is correct
if ($passy != $session_password) {
	echo "<pre>";
	print_r($SESSION);
	echo "</pre";
	print "<p><a href=\"logout.php?login=1\">Click here to log back in!</a>
}
else {
	print "Login successful! <a href=\"overview.php\">Now lets play some Space Conquest!</a>";
}

?>
 