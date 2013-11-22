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
		$key = $user_ship['ref_id'] - 1;
		$name = $ship_list[$key]['name'];
?>
		<tr>
			<td><?php echo $name ?></td>
			<td><?php echo $user_ship['hull'] . "/" . $ship_list[$key]['hull'] ?></td>
			<td><?php echo $user_ship['shield'] . "/" . $ship_list[$key]['shield'] ?></td>
			<td><?php echo $user_ship['power'] . "/" . $ship_list[$key]['power'] ?></td>
			<td>
		<?php 
		if ($user_ship['travel'] > 0) echo "traveling (".$user_ship['travel']." ticks)";
		elseif ($user_ship['building'] > 0) echo "building (".$user_ship['building']." ticks)";
		else echo "defending";
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
