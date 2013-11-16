<?php
session_start

// get session and global files
include("session.php");
include("global.php");


$username	=	$_SESSION["username"];

$zc	=	$_POST["zalos"]*$zalo_c;
$zo	=	$_POST["zalos"]*$zalo_o;
$ic	=	$_POST["intercepters"]*$intercepter_c;
$io	=	$_POST["intercepters"]*$intercepter_o;
$fc	=	$_POST["fighters"]*$fighter_c;
$fo	=	$_POST["fighters"]*$fighter_o;
$wc	=	$_POST["wraiths"]*$wraith_c;
$wo	=	$_POST["wraiths"]*$wraith_o;
$cc	=	$_POST["corsairs"]*$corsair_c;
$co	=	$_POST["corsairs"]*$corsair_o;
$bc	=	$_POST["battlecruisers"]*$battlecruiser_c;
$bo	=	$_POST["battlecruisers"]*$battlecruiser_o;

print "$crystals";

if (($crystals > $zc) && ($ore > $zo)) {
	$z2="go";
}
elseif (($crystals > $ic) && ($ore > io)) {
	$i2="go";
}
elseif (($crystals > fc) && ($ore > $fo)) {
	$f2="go";
}
elseif (($crystals > $wc) && ($ore > $wo)) {
	$w2="go";
}
elseif (($crystals > $cc) && ($ore > $co)) {
	$c2="go";
}
elseif (($crystals > $bc) && ($ore > $bo)) {
	$b2="go";
}
$total_c="$zc+$ic+$fc+$wc+$cc+$bc";
$total_o="$zo+$io+$fo+$wo+$co+$bo";

if (($crystals > $total_c) && ($ore > $total_o)) {

	// Make a DB connection
	mysql_connect("$host", "$user", "$pass");
	mysql_select_db("$db");

	$c=@mysql_fetch_assoc(mysql_query("SELECT `zalos`, `intercepters`, `fighters`, `wraiths`, `corsairs`, `battlecruisers` FROM `sc_construct` WHERE `username`=$username"));

	$d=@mysql_fetch_assoc(mysql_query("SELECT `zalos`, `intercepters`, `fighters`, `wraiths`, `corsairs`, `battlecruisers` FROM `sc_construct_time` WHERE `username`=$username"));

	// get variables
	$zalos		=	$_POST["zalos"]+$c["zalos"];
	$intercepters	=	$_POST["intercepters"]+$c["intercepters"];
	$fighters	=	$_POST["fighters"]+$c["fighters"];
	$wraiths	=	$_POST["wraiths"]+$c["wraiths"];
	$corsairs	=	$_POST["corsairs"]+$c["corsairs"];
	$battlecruisers	=	$_POST["battlecruisers"]+$c["battlecruisers"];

	// lets see if they left anything blank

	if (!$zalos) {
		$zalos="0";
	}
	elseif (!$intercepters) {
		$intercepters="0";
	}
	elseif (!$fighters) {
		$fighters="0";
	}
	elseif (!$wraiths) {
		$wraiths="0";
	}
	elseif (!$corsairs) {
		$corsairs="0";
	}
	elseif (!$battlecruisers) {
		$battlecruisers="0";
	}
	elseif ((!$zalos) && (!$intercepters) && (!$fighters) && (!$wraiths) && (!$corsairs) && (!$battlecruisers)) {
		header("Location:construct.php?build=2");
		exit();
	}

	$zalo_t			=	$d["zalos"]+2;
	$intercepter_t		=	$d["intercepters"]+4;
	$fighters_t		=	$d["fighters"]+6;
	$wraiths_t		=	$d["wraiths"]+9;
	$corsairs_t		=	$d["corsairs"]+12;
	$battlecruiser_t	=	$d["battlecruisers"]+24;
	mysql_query("DELETE `username` , `zalos` , `fighters` , `intercepters` , `wraiths` , `corsairs` , `battlecruisers` FROM `sc_construct` WHERE `username`=$username");
	
	mysql_query("INSERT INTO `sc_construct` ( `username` , `zalos` , `fighters` , `intercepters` , `wraiths` , `corsairs` , `battlecruisers` ) VALUES ('$username', '$zalos', '$fighters', '$intercepters', '$wraiths', '$corsairs', '$battlecruisers')");

	mysql_query("DELETE `username` , `zalos` , `fighters` , `intercepters` , `wraiths` , `corsairs` , `battlecruisers` FROM `sc_construct_time` WHERE `username`=$username");

	mysql_query("INSERT INTO `sc_construct_time` ( `username` , `zalos` , `intercepters` , `fighters` , `wraiths` , `corsairs` , `battlecruisers` ) VALUES ('$username', '$zalo_t', '$intercepter_t', '$fighters_t', '$wraiths_t', '$corsairs_t', '$battlecruiser_t')");

        mysql_query("DELETE `crystals` , `ore` FROM `sc_members` WHERE `username` = '".$username."'");
$crystals="$crystals-$total_c";
$ore="$ore-$total_o";
mysql_query("INSERT INTO `sc_members` ( `crystals` , `ore` ) VALUES ('$crystals', '$ore')");


	header("Location:construct.php?build=1");
	exit();
}
elseif ($total_c > $crystals) {
	print "Not enough crystals! (<a href=\"construct.php\">Back</a>)";
	exit();
}
elseif ($total_o > $ore) {
        print "Not enough ore! (<a href=\"construct.php\">Back</a>)";
        exit();
}

?> 