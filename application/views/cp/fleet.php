<div class="content">
	<table border=1>
		<tr>
			<th>Class</th>
			<th>Atk</th>
			<th>Def</th>
			<th>Hull</th>
			<th>Shield</th>
			<th>Power</th>
			<th>Status</th>
		</tr>
<?php foreach($ships as $row): ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['attack']; ?></td>
			<td><?php echo $row['defense']; ?></td>
			<td><?php echo $row['current_hull'] . "/" . $row['max_hull']; ?></td>
			<td><?php echo $row['current_shield'] . "/" . $row['max_shield']; ?></td>
			<td><?php echo $row['current_power'] . "/" . $row['max_power']; ?></td>
			<td>
<?php 
	if ($row['current_building'] != 0): 
		echo "Building ".$row['current_building']." ticks";
	elseif ($row['current_travel'] != 0):
		echo "Traveling ".$row['current_travel']." ticks";
	else:
		echo "Defending";
	endif;
?>
			</td>
		</tr>
<?php endforeach; ?>
	</table>
</div>
