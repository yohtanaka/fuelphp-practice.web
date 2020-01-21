<h2>Editing <span class='muted'>License</span></h2>
<br>

<?php echo render('license/_form'); ?>
<p>
	<?php echo Html::anchor('license/view/'.$license->id, 'View'); ?> |
	<?php echo Html::anchor('license', 'Back'); ?></p>
