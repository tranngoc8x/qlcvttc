<div class="scores index">
	<h2><?php __('Scores');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('users_id');?></th>
			<th><?php echo $this->Paginator->sort('tasks_id');?></th>
			<th><?php echo $this->Paginator->sort('scores');?></th>
			<th><?php echo $this->Paginator->sort('percent');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($scores as $score):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $score['Score']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($score['Users']['name'], array('controller' => 'users', 'action' => 'view', $score['Users']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($score['Tasks']['name'], array('controller' => 'tasks', 'action' => 'view', $score['Tasks']['id'])); ?>
		</td>
		<td><?php echo $score['Score']['scores']; ?>&nbsp;</td>
		<td><?php echo $score['Score']['percent']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $score['Score']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $score['Score']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $score['Score']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $score['Score']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<script>
	var title = "đánh giá chất lượng làm việc";
</script>