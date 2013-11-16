mysql_connect("$host", "$user", "$pass");
mysql_select_db("$db");

$a=mysql_fetch_assoc(mysql_query("SELECT `zalos_home`, `zalos_out`, `intercepters_home`, `intercepters_out`, `fighters_home`, `fighters_out`, `wraiths_home`, `wraiths_out`, `corsairs_home`, `corsairs_out`, `battlecruisers_home`, `battlecruisers_out` FROM `sc_fleets` WHERE `username`='$session_username'"));

$zalo_defense = $zalos_home*25;
$intercepter_defense = $intercepters_home*29;
$fighter_defense = $fighters_home*34;
$wraith_defense = $wraiths_home*40;
$corsair_defense = $corsairs_home*50;
$battlecruiser_defense = $battlecruisers_home*65;

$zaloaway = $zalos_out*25;
$intercepteraway = $intercepters_out*29;
$figtheraway = $fighters_out*34;
$wraithaway = $wraith_out*40;
$corsairaway = $corsairs_out*50;
$battlecruiseraway = $battlecruisers_out*65;