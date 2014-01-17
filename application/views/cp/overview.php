<div class="content">
	<table class="ship-display">
		<tr>
			<th>Class</th>
			<th>Hull</th>
			<th>Shield</th>
			<th>Power</th>
			<th>Status</th>
		</tr>
<?php 
if ($user_ships):
	foreach($user_ships as $user_ship): 
?>
		<tr>
			<td><?php echo $user_ship['name'] ?></td>
			<td><?php echo $user_ship['current_hull'] . "/" . $user_ship['max_hull'] ?></td>
			<td><?php echo $user_ship['current_shield'] . "/" . $user_ship['max_shield'] ?></td>
			<td><?php echo $user_ship['current_power'] . "/" . $user_ship['max_power'] ?></td>
			<td>
		<?php 
		if ($user_ship['current_travel'] > 0) echo "Traveling (".$user_ship['current_travel']." ticks)";
		elseif ($user_ship['current_building'] > 0) echo "Building (".$user_ship['current_building']." ticks)";
		else echo "Defending";
?>
			</td>
		</tr>
<?php endforeach; 
endif; ?>
	</table>
</div>
<div class="content notification">
	<h4>Notifications</h4>
	<p>Admin</p>
	<p>Alliance</p>
	<p>Sector</p>
</div>
<div class="content research">
	<h4>Research</h4>
	<p>Progress</p>
</div>
