<?php
include("global.php");

print "<title>$title .:. Login</title>
<body bgcolor=\"$bgcolor\" text=\"$text\">
";

$username_cookie=$_COOKIE["username"];
$galaxy_cookie	=$_COOKIE["galaxy"];

if ($register==1) {
	print "<font color=yellow>You have successfully joined, $username_cookie!  You are in <b>$galaxy_cooke</b> Galaxy!</font><p>

<strong>Login Now!</strong>";
}

?>
<form action="login_check.php" method="post">
<table>
<tr>
	<td>
	Username:
	</td>
	<td>
	<input type=text name="username" size=20>
	</td>
</tr>
<tr>
	<td>
	Password:
	</td>
	<td>
	<input type=password name="password" size=20>
	</td>
</tr>
<tr>
	<td colspan=2>
	<input type=submit name="login" value="Login Now!">
	</td>
</tr>
</table>
</form>




