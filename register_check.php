$random=rand(1,10);

$g=@mysql_fetch_assoc(mysql_query("SELECT `username1` , `username2` , `username3` , `username4` , `username5` FROM `sc_galaxy$random` WHERE `galaxy` = '$random'"));

if ($g["username1"] != "Empty") { 
	$galaxy=$random;
	$slot="1";
}
elseif ($g["username2"] != "Empty") {
	$galaxy=$random;
	$slot="2";
}
elseif ($g["username3"] != "Empty") {
	$galaxy=$random;
	$slot="3";
}
elseif ($g["username4"] != "Empty") {
	$galaxy=$random;
	$slot="4";
}
elseif ($g["username5"] != "Empty") {
	$galaxy=$random;
	$slot="5";
}

else {
	print "Galaxy is full... <a href=\"register.php\">Go back</a>, and try again!";
	exit();
}
$territories="100";
$score="($territories*2)+($zalos*1.2)+($intercepters*1.5)+($fighters*1.8)+($wraiths*2)+($corsairs*2.8)+($battlecruisers*4)+($crystals)+($ore)+($crystal_mines*2)+($ore_mines*2)";
$alliance="";

		mysql_query("UPDATE `sc_galaxy$galaxy` SET `username$slot` = '$username' , `territories$slot` = '$territories` , `score$slot` = '$score' , `alliance$slot` = '$alliance'");

		mysql_query("INSERT INTO `sc_returning` ( `username` , `fleets_out` ) VALUES ('$username', '0')");





;----------------------------------------------------------------------


<?php
$username=$_POST["username"];
$password=$_POST["password"];
$email=$_POST["email"];

if (!$username) {
	header("Location:register.php?username=1");
	exit();
}
elseif (!$password) {
	header("Location:register.php?password=1");
	exit();
}
elseif (!$email) {
	header("Location:register.php?email=1");
	exit();
}
else {
	include("global.php");

	mysql_connect("$host", "$user", "$pass");
  	mysql_select_db("$db");

	$a=@mysql_fetch_assoc(mysql_query("SELECT `username` FROM `sc_members` WHERE `username`=$username"));
	
	if ($a["username"] = $username) {
		header("Location:register.php?username=2");
		exit();
	}
	elseif ($a["email"] = $email) {
		header("Location:register.php?email=2");
		exit();
	}

		mysql_query("INSERT INTO `sc_members` ( `username` , `password` , `email` , `galaxy` ) VALUES ('$username', '$password', '$email', '$galaxy')");

		setcookie("galaxy", "$galaxy")
		setcookie("username", "$username");
		header("Location:login.php?register=1");
		exit();

	}
}

?>		 