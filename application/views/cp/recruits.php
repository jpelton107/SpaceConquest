<?php
echo validation_errors();
if (isset($error)):
	foreach($error as $err):
?>
<div class="error"><?php echo $err ?></div>
<?php
	endforeach;
endif;
?>
<div class="content">
	Total Recruits: <?php echo $recruits['total']; ?>
	<?php echo form_open('cp/recruits/'); ?>
	<table border=1>
		<tr>
			<td>Crystal Miners</td>
			<td>::IMG::</td>
			<td>
				<?php echo form_input(array('value' => $recruits['crystals'], 'type' => 'number', 'maxlength' => 64, 'size' => 5, 'name' => 'crystal_miners')); ?>
			</td>
		</tr>
		<tr>
			<td>Dilithium Miners</td>
			<td>::IMG::</td>
			<td>
				<?php echo form_input(array('value' => $recruits['dilithium'], 'type' => 'number', 'maxlength' => 64, 'size' => 5, 'name' => 'dilithium_miners')); ?>
			</td>
		</tr>
		<tr>
			<td>Law Enforcement</td>
			<td>::IMG::</td>
			<td>
				<?php echo form_input(array('value' => $recruits['credits'], 'type' => 'number', 'maxlength' => 64, 'size' => 5, 'name' => 'law_enforcement')); ?>
			</td>
		</tr>
		<tr>
			<td colspan=2></td>
			<td><?php echo form_submit('submit', 'Update'); ?></td>
		</tr>
	</table>
	<?php echo form_close(); ?>
</div>
