<div class="content">
	<h4>Select ship class</h4>
	<table border=1>
		<tr>
			<th>IMG</th>
			<th>Class</th>
			<th>Credits</th>
			<th>Crystal</th>
			<th>Dilithium</th>
			<th>Atk</th>
			<th>Def</th>
			<th>Hull</th>
			<th>Shield</th>
			<th>Power</th>
			<th>Speed</th>
			<th>Build Time</th>
		</tr>
<?php
foreach ($ship_list as $ship):
echo form_open('cp/fleet/build');
echo form_hidden('ship_id', $ship['id']);
?>
		<tr>
			<td><img src="/<?php echo $ship['image'] ?>" height=50 width=50></td>
			<td><?php echo $ship['name'] ?></td>
			<td><?php echo $ship['cost_credits'] ?></td>
			<td><?php echo $ship['cost_crystal'] ?></td>
			<td><?php echo $ship['cost_dilithium'] ?></td>
			<td><?php echo $ship['attack'] ?></td>
			<td><?php echo $ship['defense'] ?></td>
			<td><?php echo $ship['hull'] ?></td>
			<td><?php echo $ship['shield'] ?></td>
			<td><?php echo $ship['power'] ?></td>
			<td><?php echo $ship['travel_time'] ?></td>
			<td><?php echo form_submit('build'.$ship['id'], "Build in ".$ship['build_time']." ticks"); ?></td>
		</tr>
<?php
echo form_close();
endforeach;
?>
	</table>
</div>
