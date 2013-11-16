<?php
session_start();

include("session.php");
include("global.php");
$a_username=$_POST[attack_username];
$s_$c1=$_POST[send_$c1];
$s_$c2=$_POST[send_$c2];
$s_$c3=$_POST[send_$c3];
$s_$c4=$_POST[send_$c4];
$s_$c5=$_POST[send_$c5];
$s_$c6=$_POST[send_$c6];
 
print "<html><head><title>$title .:. Attack Check</title></head><body bgcolor=$bgcolor text=$text>";

mysql_connect("$host", "$user", "$pass");
mysql_select_db("$db");

$fl=mysql_fetch_assoc(mysql_query("SELECT `fleets_out` FROM `sc_returning` WHERE `username` = '$username'"));
$FO=$fl[fleets_out];
if ($FO >= "5") {
	print "You already have 5 fleets out! (<a href=\"attack.php\">Back</a>)";
	exit();
}

include("ship_status.php");

if ($a[$c1_home] < $_POST[send_$c1]) {
	print "You do not have that many <b>$c1</b> home!";
	exit();
}
elseif ($a[$c2_home] < $_POST[send_$c2]) {
	print "You do not have that many <b>$c2</b> home!";
	exit();
}
elseif ($a[$c3_home] < $_POST[send_$c3]) {
	print "You do not have that many <b>$c3</b> home!";
	exit();
}
elseif ($a[$c4_home] < $_POST[send_$c4]) {
	print "You do not have that many <b>$c4</b> home!";
	exit();
}
elseif ($a[$c5_home] < $_POST[send_$c5]) {
	print "You do not have that many <b>$c5</b> home!";
	exit();
}
elseif ($a[$c6_home] < $_POST[send_$c6]) {
	print "You do not have that many <b>$c6</b> home!";
	exit();
}

$eh=@mysql_fetch_assoc(mysql_query("SELECT `$c1_home` , `$c2_home` , `$c3_home` , `$c4_home` , `$c5_home` , `$c6_home` FROM `sc_fleets` WHERE `username` = '$_POST[attack_username]'"));

$et=@mysql_fetch_assoc(mysql_query("SELECT `zalos` , `intercepters` , `fighters` , `wraiths` , `corsairs` , `battlecruisers` FROM `sc_members` WHERE `username` = '$_POST[attack_username]'"));

// get enemy ship count
$e_zalos		=	$eh[zalos_home]*25;
$e_intercepters 	= 	$eh[intercepters_home]*29;
$e_fighters 		=	$eh[fighters_home]*34;
$e_wraiths		=	$eh[wraiths_home]*40;
$e_corsairs 		= 	$eh[corsairs_home]*50;
$e_battlecruisers 	= 	$eh[battlecruisers_home]*65;

// Set your enemies defense 
$e_defense = "$e_zalos+$e_intercepters+$e_fighters+$e_wraiths+$e_corsairs+$e_battlecruisers";

// Set YOUR attack
$attack = ($_POST[send_zalos]+$_POST[send_intercepters]+$_POST[send_fighters]+$_POST[send_wraiths]+$_POST[send_corsairs]+$_POST[send_battlecruisers]);

	
if ($attack > $e_defense) {
	$ee=@mysql_fetch_assoc(mysql_query("SELECT `crystals` , `ore` , `credits` , `territories` FROM `sc_members` WHERE `username` = '$_POST[attack_username]'"));
	if ($_POST[attack_for] = "resources") {
		$o_gain = $ee[ore]*0.1;
		$c_gain = $ee[crystals]*0.1;
		$C_gain = $ee[credits]*0.1;
		$ore = $ore+($o_gain);
		$crystals = $crystals+($c_gain);
		$credits = $credits+($C_gain);
		print "You have gained <b>$c_gain</b> Crystals, <b>$o_gain</b> Ore, and <b>$C_gain</b> Credits!<p>";
	}
	elseif ($_POST[attack_for] = "territories") {
		$t_gain=$ee[territories]*0.1;
		$territories = $territories+($t_gain);
		print "You have gained <b>$t_gain</b> Territories!<p>";

/* Also Copy this margin
		$attack="success";
	}
}
else { 
	print "Your attack was unsuccessful!<p>";
	$attack="failed";
}

if ($attack="success") {
	$atkp="0.1";
}
else {
	$atkp="0.03";
}

$e_zalo		=	$eh[zalos_home]*$atkp;
$e_intercepter = $eh[intercepters_home]*$atkp;
$e_fighter = $eh[fighters_home]*$atkp;
$e_wraith = $eh[wraiths_home]*$atkp;
$e_corsair = $eh[corsairs_home]*$atkp;
$e_battlecruiser = $eh[battlecruisers_home]*$atkp;

$e_zalos2 = $e_zalo;
$e_intercepters2	=	$e_intercepter;	
$e_fighters2		=	$e_fighter;
$e_wraiths2		=	$e_wraith;
$e_corsairs2		=	$e_corsair;
$e_battlecruisers2	=       $e_battlecruiser;

$et_zalos		=	$et[zalos]-$e_zalos2;
$et_intercepters	=	$et[intercepters]-$e_intercepters2;
$et_fighters		=	$et[fighters]-$e_fighters2;
$et_wraiths		=	$et[wraiths]-$e_wraiths2;
$et_corsairs		=	$et[corsairs]-$e_corsairs2;
$et_battlecruisers	=    $et[battlecruisers]-$e_battlecruisers2;
*/
	print "You have destroyed:<p>
		<b>$e_zalos2</b> Zalos<br> 
		<b>$e_intercepters2</b> Intercepters<br> 
		<b>$e_fighters2</b> Fighters<br> 
		<b>$e_wraiths2</b> Wraiths<br> 
		<b>$e_corsairs2</b> Corsairs<br> 
		<b>$e_battlecruisers2</b> Battlecruisers";

if ($fl[fleets_out] = "0") {
	$_1 = "1";
}
elseif ($fl[fleets_out] = "1") {
	$_1 = "2";
}
elseif ($fl[fleets_out] = "2") {
	$_1 = "3";
}
elseif ($fl[fleets_out] = "3") {
	$_1 = "4";
}
elseif ($fl[fleets_out] = "4") {
	$_1 = "5";
}
// copy/paste from here below
else {
	print "error";
	exit();
}

$FLEET = "$FO + 1";
$new_fleet=$FLEET;
$return_ticks="6";

// add the returning fleet to table 
$sql02 = "INSERT INTO `sc_fleet$_1` ( `username` , `zalos` , `intercepters` , `fighters` , `wraiths` , `corsairs` , `battlecruisers` , `return_time` ) VALUES ('$username', '$_POST[send_zalos]', '$_POST[send_intercepters]', '$_POST[send_fighters]', '$_POST[send_wraiths]', '$_POST[send_corsairs]', '$_POST[send_battlecruisers]', '$return_ticks')";

print "<hr>Fleet: sc_fleet$_1<hr>";

// add an extra fleet to fleets_out
$sql01 = "UPDATE `sc_returning` SET `fleets_out`='$new_fleet' WHERE `username`='$username'";

mysql_query($sql02);
mysql_query($sql01);

// Gain your resources/territory
mysql_query("UPDATE `sc_members` SET `crystals` = '$c_gain', `ore` = '$o_gain', `credits` = '$C_gain', `territories` = '$t_gain' WHERE `username` = '$username'");

// Take away the ships you destroyed from opponent
mysql_query("UPDATE `sc_members` SET `zalos` = '$et_zalos', `intercepters` = '$et_intercepters', `fighters` = '$et_fighters', `wraiths` = '$et_wraiths', `corsairs` = '$et_corsairs', `battlecruisers` = '$et_battlecruisers' WHERE `username` = '$_POST[attack_username]'");

mysql_query("UPDATE `sc_fleets` SET `zalos_home` = '$eh_zalos', `intercepters_home` = '$eh_intercepters', `fighters_home` = '$eh_fighters', `wraiths_home` = '$eh_wraiths', `corsairs_home` = '$eh_corsairs', `battlecruisers_home` = '$eh_battlecruisers' WHERE `username` = '$_POST[attack_username]'");

// Now change your ships to away status =]
$ya=@mysql_fetch_assoc(mysql_query("SELECT `zalos_away` , `zalos_home` , `intercepters_away` , `intercepters_home` , `fighters_home` , `wraiths_home` , `corsairs_home` , `battlecruisers_home` , `fighters_away` , `wraiths_away` , `corsairs_away` , `battlecruisers_away` FROM `sc_fleets` WHERE `username` = '$username'"));

$zaway	=	$ya[zalos_away]+$_POST[send_zalos];
$zhome	=	$ya[zalos_home]-$_POST[send_zalos];
$iaway	=	$ya[intercepters_away]+$_POST[send_intercepters];
$ihome	=	$ya[intercepters_home]-$_POST[send_intercepters];
$faway	=	$ya[fighters_away]+$_POST[send_fighters];
$fhome	=	$ya[fighters_home]-$_POST[send_fighters];
$waway	=	$ya[wraiths_away]+$_POST[send_wraiths];
$whome	=	$ya[wraiths_home]-$_POST[send_wraiths];
$caway	=	$ya[corsairs_away]+$_POST[send_corsairs];
$chome	=	$ya[corsairs_home]-$_POST[send_corsairs];
$baway	=	$ya[battlecruisers_away]+$_POST[send_battlecruisers];
$bhome	=	$ya[battlecruisers_home]-$_POST[send_battlecruisers];

mysql_query("UPDATE `sc_fleets` SET `zalos_away` = '$zaway', `zalos_home` = '$zhome', `intercepters_away` = '$iaway', `intercepters_home` = '$ihome', `fighters_away` = '$faway', `fighters_home` = '$fhome', `wraiths_home` = '$whome', `wraiths_away` = '$waway', `corsairs_away` = '$caway', `corsairs_home` = '$chome', `battlecruisers_away` = '$baway', `battlecruisers_home` = '$bhome' WHERE `username` = '$username'");

?>
