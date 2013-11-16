<?php
// get session and global files
include("session.php");
include("global.php");

// Title
print "<title>$title .:. Construct Buildings!</title>";
include("topbar.php");
if ($build==1) {
	print "
<table>
<tr>
	<td>
	<font color=yellow>You have successfully built your buildings!</font>
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
	<font color=yellow>Error! <i>(You chose to build 0 buildings)</i></font>
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
<table border=1 style=\"border: 1px dotted yellow\">
<tr>
	<td align=center bordercolor=#000000>
	It Costs <b>$build_c</b> Credits to construct a building
	</td>
</tr>
</table>
<table>
<form action=\"buildings_check.php\" method=post>
<tr>
	<td>
	Build Ore Mine(s):
	</td>
	<td>
	<input type=text name=\"ore\" size=5 value=0>
	</td>
</tr>
<tr>
	<td>
	Build Crystal Mine(s):
	</td>
	<td>
	<input type=text name=\"crystal\"" size=5 value=0>
	</td>
</tr>
<tr>
	<td>
	Build Credit Mine(s):
	</td>
	<td>
	<input type=text name=\"credit\" size=5 value=0>
	</td>
</tr>
<tr>
	<td>
	Build Explorer(s):
	</td>
	<td>
	<input type=text name=\"explorers\" size=5 value=0>
	</td>
</tr> 

<tr>
	<td colspan=3 align=center>
	<input type=submit name=\"construct\" value=\"Construct Building(s)!\">
	</td>
</tr>
</form>
</table>";

?>