<?php
// get session and global files
include("session.php");
include("global.php");

// Title
print "<title>$title .:. Construct!</title>";

if ($build==1) {
	print "
<table>
<tr>
	<td>
	<font color=yellow>You have successfully built your ships!</font>
	</td>
</tr>
</table>
";
}
elseif ($build==2) {
	print "
<table>
<tr>
	<td>
	<font color=yellow>Error! <i>(You chose to build 0 ships)</i></font>
	</td>
</tr>
</table>
";
}
elseif ($build==3) {
	print "
<table>
<tr>
	<td>
	<font color=yellow>You don't have enough resources!</font>
	</td>
</tr>
</table>
";
}

print "
<table>
<form action=\"construct_check.php\" method=post>
<tr>
	<td>
	Build Zalo(s):
	</td>
	<td>
	<input type=text name=\"zalos\" size=5 value=0>
	</td>
	<td>
	<font size=-1>C: $zalo_c, O: $zalo_o</font>
	</td>
</tr>
<tr>
	<td>
	Build Intercepter(s):
	</td>
	<td>
	<input type=text name=\"intercepters\" size=5 value=0>
	</td>
	<td>
	<font size=-1>C: $intercepter_c, O: $intercepter_o</font>
	</td>
</tr>
<tr>
	<td>
	Build Fighter(s):
	</td>
	<td>
	<input type=text name=\"fighters\" size=5 value=0>
	</td>
	<td>
	<font size=-1>C: $fighter_c, O: $fighter_o</font>
	</td>
</tr>
<tr>
	<td>
	Build Wraith(s):
	</td>
	<td>
	<input type=text name=\"wraiths\" size=5 value=0>
	</td>
	<td>
	<font size=-1>C: $wraith_c, O: $wraith_o</font>
	</td>
</tr> 
<tr>
	<td>
	Build Corsair(s):
	</td>
	<td>
	<input type=text name=\"corsairs\" size=5 value=0>
	</td>
	<td>
	<font size=-1>C: $corsair_c, O: $corsair_o</font>
	</td>
</tr>
<tr>
	<td>
	Build Battlecruiser(s):
	</td>
	<td>
	<input type=text name=\"battlecruisers\" size=5 value=0>
	</td>
	<td>
	<font size=-1>C: $battlecruiser_c, O: $battlecruiser_o</font>
	</td>
</tr>
<tr>
	<td colspan=3 align=center>
	<input type=submit name=\"construct\" value=\"Construct Ship(s)!\">
	</td>
</tr>
</form>
</table>";

?>