<?php
if (isset($errors)):
?>
<div class="errors">
	<ul>
<?php
	foreach($errors as $error):
?>
		<li><?php echo $error ?></li>
<?php
	endforeach;
?>
	</ul>
</div>
<?php
elseif (isset($success)):
?>
<div class="success"><?php echo $success ?></div>
<?php
endif;

echo validation_errors();
?>
