<?php
// start ze seession and get global file
include("session.php");
include("global.php");

// create title
print "<title>$title .:. Fleet</title>";

include("ship_status.php");

print "
<table>
<tr>
	<td>
	Zalos Defending: $zalos_home <i>($zalo_defense)</i>
	</td>
 	<td>
	Zalos Away: $zalos_out <i>($zaloaway)</i>
	</td>
</tr>
<tr>
	<td>
	Intercepters Defending: $intercepters_home <i>($intercepter_defense)</i>
	</td>
	<td>
	Intercepters Away: $intercepters_out <i>($intercepteraway)</i>
	</td>
</tr>
<tr>
	<td>
	Fighters Defending: $fighters_home <i>($fighter_defense)</i>
	</td>
	<td>
	Fighters Away: $fighters_out <i>($fighteraway)</i>
	</td>
</tr>
<tr>
	<td>
	Wraiths Defending: $wraiths_home <i>($wraith_defense)</i>
	</td>
	<td>
	Wraiths Away: $wraiths_out <i>($wraithaway)</i>
	</td>
</tr>
<tr>
	<td>
	Corsairs Defending: $corsairs_home <i>($corsair_defense)</i>
	</td>
	<td>
	Corsairs Away: $corsairs_out <i>($corsairaway)</i>
	</td>
</tr>
<tr>
	<td>
	Battlecruisers Defending: $battlecruisers_home <i>($battlecruiser_defense)</i>
	</td>
	<td>
	Battlecruisers Away: $battlecruisers_out <i>($battlecruiseraway)</i>
	</td>
</tr>
<tr>
	<td colspan=2 align=center>
	[ <a href=\"construct.php\">Construct More Ships</a> ]
	</td>
</tr>
</table>
";

?>