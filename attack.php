<?php
session_start();

include("session.php");
include("global.php");

print "<title>$title .:. Attack Page</title>
<body bgcolor=$bgcolor text=$text>
";
include("topbar.php");

if (!$_POST["change_galaxy"]) {
print "
<table align=center>
<form action=\"attack.php?change=1\" method=post>
<tr>
	<td>
	<input type=text size=2 maxlength=2 name=\"change_galaxy\">
	</td>
</tr>
<tr>
	<td>
	<input type=submit name=\"change\" value=\"Change Galaxy\">
	</td>
</tr>
</form>
</table>
";
}
elseif ($change==1) {

	mysql_connect("$host", "$user", "$pass");
	mysql_select_db("$db");

	$gg=@mysql_fetch_assoc(mysql_query("SELECT `username1` , `username2` , `username3` , `username4` , `username5` FROM `sc_galaxy$_POST[change_galaxy]` WHERE `galaxy` = '$_POST[change_galaxy]'"));

$user1	=	$gg[username1];
$user2	=	$gg[username2];
$user3	=	$gg[username3];
$user4	=	$gg[username4];
$user5	=	$gg[username5];

	print "
<table>
<form action=\"attack_check.php\" method=post>
<tr>
	<td>";

	if ($user1=Empty) {
		print "
	<font color=yellow>No members were found in $_POST[change_galaxy]!</font>

	}
	elseif ($user2=Empty) {

		print "
	<select name=\"attack_username\">
	<option value=\"$user1\">$user1</option>
	</select>";
	}
	elseif ($user3=Empty) {	
		print "
	<select name=\"attack_username\">
	<option value=\"$user1\">$user1</option>
	<option value=\"$user2\">$user2</option>
	</select>
		";
	}
	elseif ($user4=Empty) {
		print "
	<select name=\"attack_username\">
	<option value=\"$user1\">$user1</option>
	<option value=\"$user2\">$user2</option>
	<option value=\"$user3\">$user3</option>
	</select>
		";
	}
	elseif ($user5=Empty) {
		print "
	<select name=\"attack_username\">
	<option value=\"$user1\">$user1</option>
	<option value=\"$user2\">$user2</option>
	<option value=\"$user3\">$user3</option>
	<option value=\"$user4\">$user4</option>
	</select>
		";
	}
	else {
		print "
	<select name=\"attack_username\">
	<option value=\"$user1\">$user1</option>
	<option value=\"$user2\">$user2</option>
	<option value=\"$user3\">$user3/option>
	<option value=\"$user4\">$user4</option>
	<option value=\"$user5\">$user5</option>
	</select>
		";
	}
print "
	</td>
</tr>
";
	if ($user1 != "Empty") {
print "
<tr>
	<td>
	<table border=1 bordercolor=#005599>
	<tr>
		<td>
		Zalos:
		</td>
		<td>
		<input type=text name=send_zalos size=5 maxlength=10 value=0>
		</td>
	</tr>
	<tr>
		<td>
		Intercepters:
		</td>
		<td>
		<input type=text name=send_intercepters size=5 maxlength=10 value=0>
		</td>
	</tr>
	<tr>
		<td>
		Fighters:
		</td>
		<td>
		<input type=text name=send_fighters size=5 maxlength=10 value=0>
		</td>
	</tr>
	<tr>
		<td>
		Wraiths:
		</td>
		<td>
		<input type=text name=send_wraiths size=5 maxlength=10 value=0>
		</td>
	</tr>
	<tr>
		<td>
		Corsairs:
		</td>
		<td>
		<input type=text name=send_corsairs size=5 maxlength=10 value=0>
		</td>
	</tr>
	<tr>
		<td>
		Battleruisers:
		</td>
		<td>
		<input type=text name=send_battlecruisers size=5 maxlength=10 value=0>
		</td>
	</tr>
	</table>
	</td>
</tr>	
<tr>
	<td>
	Attack For: <select name=\"attack_for\">
	<option value=\"territories\">Territories</option>
	<option value=\"resources\">Resources</option>
	</select>
	</td>
<tr>
	<td>
	<input type=submit name=\"attack_submit\" value=\"Attack!\">
	</td>
</tr>
";
	}
print "
</form>
</table>
";
}
?>
	