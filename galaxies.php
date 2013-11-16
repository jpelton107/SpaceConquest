<?php
session_start();

include("session.php");
include("global.php");

print "
<title>$title .:. Galactic Browser</title>
<body bgcolor=$bgcolor text=$text>";


print "<table>
<form action=\"galaxies.php\" method=get>
<tr>
	<td align=center>
	Select Sector:
	</td>
	<td>
	<select name=\"GID\">
		<option value=\"1\">1</option>
		<option value=\"2\">2</option>
		<option value=\"3\">3</option>
		<option value=\"4\">4</option>
		<option value=\"5\">5</option>
		<option value=\"6\">6</option>
		<option value=\"7\">7</option>
		<option value=\"8\">8</option>
		<option value=\"9\">9</option>
		<option value=\"10\">10</option>
	</select>
	</td>
</tr>
<tr>
	<td colspan=2 align=center>
	<input type=submit name=choose_galaxies value=\"Choose Galaxy\">
	</td>
</tr>
</form>
</table>
";

// DB connect
mysql_connect("$host", "$user", "$pass");
mysql_select_db("$db");

if ($GID==1) {
	$GALAXY=1;
$table="sc_galaxy1";
}
elseif ($GID==2) {
	$GALAXY=2;
$table="sc_galaxy2";

}
elseif ($GID==3) {
	$GALAXY=3;
$table="sc_galaxy3";

}
elseif ($GID==4) {
	$GALAXY=4;
$table="sc_galaxy4";

}
elseif ($GID==5) {
	$GALAXY=5;
$table="sc_galaxy5";

}
elseif ($GID==6) {
	$GALAXY=6;
$table="sc_galaxy6";
}
elseif ($GID==7) {
	$GALAXY=7;
$table="sc_galaxy7";

}
elseif ($GID==8) {
	$GALAXY=8;
$table="sc_galaxy8";
}
elseif ($GID==9) {
	$GALAXY=9;
$table="sc_galaxy9";

}
elseif ($GID==10) {
	$GALAXY=10;
$table="sc_galaxy10";

}

$row10=@mysql_fetch_assoc(mysql_query("SELECT `username1` , `score1` , `username2` , `score2` , `username3` , `score3` , `username4` , `score4` , `username5` , `score5` , `territories1` , `territories2` , `territories3` , `territories4` , `territories5` , `galaxy` , `alliance1` , `alliance2` , `alliance3` , `alliance4` , `alliance5` FROM `$table` WHERE `galaxy`=$GALAXY"));

print "
<table>
<tr>
	<td align=center>
Galaxy: $GALAXY
	</td>
</tr>
</table>	
<table>
<tr>
	<td width=30%>
	Username:
	</td>
	<td width=10%>
	Territory:
	</td>
	<td>
	Score:
	</td>
	<td>
	Alliance:
	</td>
</tr>
";

	$username1=$row10[username1];
	$territories1=$row10[territories1];
	$score1=$row10[score1];
	$alliance1=$row10[alliance1];			

	$username2=$row10[username2];
	$territories2=$row10[territories2];
	$score2=$row10[score2];
	$alliance2=$row10[alliance2];
		
	$username3=$row10[username3];
	$territories3=$row10[territories3];
	$score3=$row10[score3];
	$alliance3=$row10[alliance3];			

	$username4=$row10[username4];
	$territories4=$row10[territories4];
	$score4=$row10[score4];
	$alliance4=$row10[alliance4];

	$username5=$row10[username5];
	$territories5=$row10[territories5];
	$score5=$row10[score5];
	$alliance5=$row10[alliance5];			

			print "
<tr>
	<td>
	$username1				
	</td>
	<td>
	$territories1
	</td>
	<td>
	$score1
	</td>
	<td>
	$alliance1
	</td>
</tr>
<tr>
	<td>
	$username2				
	</td>
	<td>
	$territories2
	</td>
	<td>
	$score2
	</td>
	<td>
	$alliance2
	</td>
</tr>
<tr>
	<td>
	$username3				
	</td>
	<td>
	$territories3
	</td>
	<td>
	$score3
	</td>
	<td>
	$alliance3
	</td>
</tr>
<tr>
	<td>
	$username4				
	</td>
	<td>
	$territories4
	</td>
	<td>
	$score4
	</td>
	<td>
	$alliance4
	</td>
</tr>
<tr>
	<td>
	$username5				
	</td>
	<td>
	$territories5
	</td>
	<td>
	$score5
	</td>
	<td>
	$alliance5
	</td>
</tr>
</table>
";

?>