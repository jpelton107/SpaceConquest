<?php
include("global.php");

mysql_connect("$host", "$user", "$pass");
mysql_select_db("$db");

mysql_query("CREATE table `sc_galaxy1` (galaxy TEXT NOT NULL, username1  TEXT NOT NULL, username2 TEXT NOT NULL, username3 TEXT NOT NULL, username4 TEXT NOT NULL, username5 TEXT NOT NULL, score1 INT(200) NOT NULL, score2 INT(200) NOT NULL, score3 INT(200) NOT NULL, score4 INT(200) NOT NULL, score5 INT(200) NOT NULL, territories1 INT(9) NOT NULL, territories2 INT(9) NOT NULL, territories3 INT(9) NOT NULL, territories4 INT(9) NOT NULL, territories5 INT(9) NOT NULL)");

mysql_query("CREATE table `sc_galaxy2` (galaxy TEXT NOT NULL, username1  TEXT NOT NULL, username2 TEXT NOT NULL, username3 TEXT NOT NULL, username4 TEXT NOT NULL, username5 TEXT NOT NULL, score1 INT(200) NOT NULL, score2 INT(200) NOT NULL, score3 INT(200) NOT NULL, score4 INT(200) NOT NULL, score5 INT(200) NOT NULL, territories1 INT(9) NOT NULL, territories2 INT(9) NOT NULL, territories3 INT(9) NOT NULL, territories4 INT(9) NOT NULL, territories5 INT(9) NOT NULL)");

mysql_query("CREATE table `sc_galaxy3` (galaxy TEXT NOT NULL, username1  TEXT NOT NULL, username2 TEXT NOT NULL, username3 TEXT NOT NULL, username4 TEXT NOT NULL, username5 TEXT NOT NULL, score1 INT(200) NOT NULL, score2 INT(200) NOT NULL, score3 INT(200) NOT NULL, score4 INT(200) NOT NULL, score5 INT(200) NOT NULL, territories1 INT(9) NOT NULL, territories2 INT(9) NOT NULL, territories3 INT(9) NOT NULL, territories4 INT(9) NOT NULL, territories5 INT(9) NOT NULL)");

mysql_query("CREATE table `sc_galaxy4` (galaxy TEXT NOT NULL, username1  TEXT NOT NULL, username2 TEXT NOT NULL, username3 TEXT NOT NULL, username4 TEXT NOT NULL, username5 TEXT NOT NULL, score1 INT(200) NOT NULL, score2 INT(200) NOT NULL, score3 INT(200) NOT NULL, score4 INT(200) NOT NULL, score5 INT(200) NOT NULL, territories1 INT(9) NOT NULL, territories2 INT(9) NOT NULL, territories3 INT(9) NOT NULL, territories4 INT(9) NOT NULL, territories5 INT(9) NOT NULL)");

mysql_query("CREATE table `sc_galaxy5` (galaxy TEXT NOT NULL, username1  TEXT NOT NULL, username2 TEXT NOT NULL, username3 TEXT NOT NULL, username4 TEXT NOT NULL, username5 TEXT NOT NULL, score1 INT(200) NOT NULL, score2 INT(200) NOT NULL, score3 INT(200) NOT NULL, score4 INT(200) NOT NULL, score5 INT(200) NOT NULL, territories1 INT(9) NOT NULL, territories2 INT(9) NOT NULL, territories3 INT(9) NOT NULL, territories4 INT(9) NOT NULL, territories5 INT(9) NOT NULL)");

mysql_query("CREATE table `sc_galaxy6` (galaxy TEXT NOT NULL, username1  TEXT NOT NULL, username2 TEXT NOT NULL, username3 TEXT NOT NULL, username4 TEXT NOT NULL, username5 TEXT NOT NULL, score1 INT(200) NOT NULL, score2 INT(200) NOT NULL, score3 INT(200) NOT NULL, score4 INT(200) NOT NULL, score5 INT(200) NOT NULL, territories1 INT(9) NOT NULL, territories2 INT(9) NOT NULL, territories3 INT(9) NOT NULL, territories4 INT(9) NOT NULL, territories5 INT(9) NOT NULL)");

mysql_query("CREATE table `sc_galaxy7` (galaxy TEXT NOT NULL, username1  TEXT NOT NULL, username2 TEXT NOT NULL, username3 TEXT NOT NULL, username4 TEXT NOT NULL, username5 TEXT NOT NULL, score1 INT(200) NOT NULL, score2 INT(200) NOT NULL, score3 INT(200) NOT NULL, score4 INT(200) NOT NULL, score5 INT(200) NOT NULL, territories1 INT(9) NOT NULL, territories2 INT(9) NOT NULL, territories3 INT(9) NOT NULL, territories4 INT(9) NOT NULL, territories5 INT(9) NOT NULL)");

mysql_query("CREATE table `sc_galaxy8` (galaxy TEXT NOT NULL, username1  TEXT NOT NULL, username2 TEXT NOT NULL, username3 TEXT NOT NULL, username4 TEXT NOT NULL, username5 TEXT NOT NULL, score1 INT(200) NOT NULL, score2 INT(200) NOT NULL, score3 INT(200) NOT NULL, score4 INT(200) NOT NULL, score5 INT(200) NOT NULL, territories1 INT(9) NOT NULL, territories2 INT(9) NOT NULL, territories3 INT(9) NOT NULL, territories4 INT(9) NOT NULL, territories5 INT(9) NOT NULL)");

mysql_query("CREATE table `sc_galaxy9` (galaxy TEXT NOT NULL, username1  TEXT NOT NULL, username2 TEXT NOT NULL, username3 TEXT NOT NULL, username4 TEXT NOT NULL, username5 TEXT NOT NULL, score1 INT(200) NOT NULL, score2 INT(200) NOT NULL, score3 INT(200) NOT NULL, score4 INT(200) NOT NULL, score5 INT(200) NOT NULL, territories1 INT(9) NOT NULL, territories2 INT(9) NOT NULL, territories3 INT(9) NOT NULL, territories4 INT(9) NOT NULL, territories5 INT(9) NOT NULL)");

mysql_query("CREATE table `sc_galaxy10` (galaxy TEXT NOT NULL, username1  TEXT NOT NULL, username2 TEXT NOT NULL, username3 TEXT NOT NULL, username4 TEXT NOT NULL, username5 TEXT NOT NULL, score1 INT(200) NOT NULL, score2 INT(200) NOT NULL, score3 INT(200) NOT NULL, score4 INT(200) NOT NULL, score5 INT(200) NOT NULL, territories1 INT(9) NOT NULL, territories2 INT(9) NOT NULL, territories3 INT(9) NOT NULL, territories4 INT(9) NOT NULL, territories5 INT(9) NOT NULL)");

print "Tables created!";

?>