<html>
<head>
	<title>Logged in</title>
</head>
<body>
<header>
	<h3>Space Conquest</h3>
</header>
<nav>
	<ul>
		<li><?php echo anchor('/auth/logout/', 'Logout'); ?></li>
		<li><?php echo anchor('/cp/overview/economy/', 'Economy'); ?></li>
		<li><?php echo anchor('/cp/building/', 'Building'); ?></li>
		<li><?php echo anchor('/cp/fleet/', 'Fleet Status'); ?></li>
		<li><?php echo anchor('/cp/alliance/', 'Alliances'); ?></li>
		<li><?php echo anchor('/cp/intelligence/', 'Intelligence'); ?></li>
	</ul>
</nav>
