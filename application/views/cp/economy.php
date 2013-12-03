<div class="content">
	<table border=1>
		<tr>
			<th>Resource</th>
			<th>Miners</th>
			<th>Production</th>
			<th>Current</th>
		<tr>
<?php 
foreach ($resources as $resource): ?>
			<td><?php echo $resource['name'] ?></td>
			<td><?php echo $resource['miners'] ?></td>
			<td><?php echo $resource['production'] ?></td>
			<td><?php echo $resource['miners'] ?></td>
		</tr>
<?php endforeach; ?>
	</table>
</div>
