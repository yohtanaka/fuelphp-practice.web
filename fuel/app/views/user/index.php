<h2>Listing <span class='muted'>Users</span></h2>
<br>
<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Licenses</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user->name; ?></td>
			<td><?php echo $user->email; ?></td>
			<td>
				<?php foreach ($user->licenses as $license): ?>
				<p><?php echo Html::anchor('license/view/'.$license->id, $license->name); ?></p>
				<?php endforeach; ?>
			</td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor(
							'user/view/'.$user->id,
							'<i class="icon-eye-open"></i> View',
							['class' => 'btn btn-default btn-sm']
						); ?>
						<?php echo Html::anchor(
							'user/edit/'.$user->id,
							'<i class="icon-wrench"></i> Edit',
							['class' => 'btn btn-default btn-sm']
						); ?>
						<?php echo Html::anchor(
							'user/delete/'.$user->id,
							'<i class="icon-trash icon-white"></i> Delete',
							['class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]
						); ?>
					</div>
				</div>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>
<p>No Users.</p>
<?php endif; ?>
<p>
	<?php echo Html::anchor('user/create', 'Add new User', array('class' => 'btn btn-success')); ?>
</p>
