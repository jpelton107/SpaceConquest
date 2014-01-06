<?php echo doctype(); ?>
<html>
<head>
	<title>Logged in</title>
	<?php echo link_tag('css/layout.css'); ?>
</head>
<body>
<header>
	<h3>Space Conquest</h3>
	<div class="header-left resources">
		<ul>
<?php foreach ($resources as $resource): ?>
			<li><?php echo $resource['name']; ?> <?php echo $resource['quantity']; ?></li>
<?php endforeach; ?>
		</ul>
	</div>
		
</header>
<nav>
	<ul>
		<h4>Economy</h4>
		<li><?php echo anchor('/cp/overview/', 'Overview'); ?></li>
		<li><?php echo anchor('/cp/overview/economy/', 'Resources'); ?></li>
		<li><?php echo anchor('/cp/recruits/', 'Manage Recruits'); ?></li>
		<li><?php echo anchor('/cp/building/', 'Building'); ?></li>
		<li><?php echo anchor('/cp/fleet/build/', 'Construct Ship'); ?></li>
		<h4>Military</h4>
		<li><?php echo anchor('/cp/fleet/attack/', 'Attack'); ?></li>
		<li><?php echo anchor('/cp/fleet/', 'Fleet Status'); ?></li>
		<li><?php echo anchor('/cp/intelligence/', 'Intelligence'); ?></li>
		<h4>Society</h4>
		<li><?php echo anchor('/cp/sector/', 'Sector'); ?></li>
		<li><?php echo anchor('/cp/alliance/', 'Alliance'); ?></li>
		<h4>System</h4>
		<li><?php echo anchor('/cp/settings/', 'Settings'); ?></li>
		<li><?php echo anchor('/auth/logout/', 'Logout'); ?></li>
	</ul>
</nav>
