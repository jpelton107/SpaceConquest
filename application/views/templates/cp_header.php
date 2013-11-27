<html>
<head>
	<title>Logged in</title>
</head>
<body>
<header>
	<div class="header-left resources">
		<ul>
<?php foreach ($resources as $resource): ?>
			<li><?php echo $resource['name']; ?> <?php echo $resource['quantity']; ?></li>
<?php endforeach; ?>
		</ul>
	</div>
		
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
