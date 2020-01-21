<h2>Viewing <span class='muted'>#<?php echo $license->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $license->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $license->description; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $license->user_id; ?></p>

<?php echo Html::anchor('license/edit/'.$license->id, 'Edit'); ?> |
<?php echo Html::anchor('license', 'Back'); ?>