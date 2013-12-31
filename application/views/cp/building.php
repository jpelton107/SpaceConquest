<?php
$quantity = array(
	'name' => 'quantity',
	'id' => 'quantity',
	'value' => 0,
	'maxlength' => 80,
	'size' => 2,
	'type' => 'number',
);
?>
<div class="content">
	<table border=1>
		<tr>
			<th>Name</th>
			<th>Quantity</th>
			<th>Cost</th>
			<th>Build</th>
		</tr>	
<?php foreach ($all_buildings as $building): ?>
		<?php echo form_open('cp/building/process'); ?>
		<?php echo form_hidden('id', $user_buildings[$building['id']]['id']); ?>
		<tr>
			<td>
				<?php echo $building['name'] ?><br>
				<span class="small-text"><?php echo $building['description'] ?></span>
			</td>
			<td>
				<?php echo $user_buildings[$building['id']]['quantity'] ?>
			</td>
			<td>
				<?php echo $building['cost'] ?>
			</td>
			<td>
				<?php echo form_input($quantity); ?>
				<?php echo form_submit('submit', 'Build'); ?>
			</td>
		</tr>
		<?php echo form_close(); ?>
<?php endforeach; ?>
	</table>
</div>
