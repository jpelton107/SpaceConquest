<?php
// Lets get the session and global files
include("session.php");
include("global.php");

// create title
print "<title>$title .:. Overview</title>";

print "
<table>
<tr>
	<td>
	Crystal: $crystals
	</td>
	<td>
	Ore: $ore
	</td>
	<td>
	Credits: $credits
	</td>
</tr>
<tr>
	<td>
	Zalos: $zalos
	</td>
	<td>
	Intercepters: $intercepters
	</td>
	<td>
	Fighters: $fighters
	</td>
</tr>
<tr>
	<td>
	Wraiths: $wraiths
	</td>
	<td>
	Corsairs: $corsairs
	</td>
	<td>
	Battlecruisers: $battlecruisers
	</td>
</tr>
</table>
";

?>