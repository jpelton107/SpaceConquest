<?php
include("global.php");

if ($delete==accounts) {
	print "
<form action=\"admin.php?delete=accounts2\" method=post>
<table>
<tr>
	<td>
	Admin User:
	</td>
	<td>
	<input type=text name=\"admin_user\" size=20>
	</td>
</tr>
<tr>
	<td>
	Admin Pass: 
	</td>
	<td>
	<input type=password name=\"admin_pass\" size=20>
	</td>
</tr>
</table>
<table>
<tr>
	<td width=90%>
	Username:
	</td>
	<td width=10%>
	</td>
</tr>
";

mysql_connect("$host", "$user", "$pass");

$result=mysql_query("SELECT `username` FROM `$db`.`sc_members` ORDER BY 1 DESC LIMIT 100");

if ($result) {
        $admin=mysql_fetch_assoc($result);
	$numOfRows = mysql_num_rows ($result);
	for ($i = 0; $i < $numOfRows; $i++){

	$username	= mysql_result ($result, $i, "username");
print "
<tr>
	<td>
	$username	
	</td>
	<td>
	<input type=checkbox name=\"delete_username\" value=\"$username\">
	</td>
</tr>
";	
	}
}

print "
<tr>
	<td colspan=2 align=center>
	<input type=\"submit\" value=\"Delete Users!\" name=\"deleeete\">
	</td>
</tr>
</table>
</form>
";
}
elseif ($delete==accounts2) {
	if (($_POST[admin_user] == $admin_user) && ($_POST[admin_pass] == $admin_pass)) {
		mysql_connect("$host", "$user", "$pass");
		$del=mysql_query("DELETE FROM `$db`.`sc_members` WHERE `username`='$_POST[username]'");
		if ($del) { 
			print "Accounts were successfully deleted";
		}
	}
	elseif ($_POST[admin_user] != $admin_user) {
		print "Username incorrect!";
	}
	elseif ($_POST[admin_pass] != $admin_pass) {
		print "Password incorrect!";
	}
}

?>