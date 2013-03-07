<?php echo $this->element('chucnang');?>	
<form name="frmList" method="post" action="#">
	<table class="sort-table" cellspacing="0" width="100%"> 
		<thead> 
		<tr>
			<th><input type="checkbox" name="checkall" value="" onClick="docheck(document.frmList.checkall.checked,0);" class="submit"/></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tasks as $task):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $task['Task']['id']; ?>&nbsp;</td>
		<td><?php echo $task['Task']['name']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $task['Task']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $task['Task']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $task['Task']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $task['Task']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<script>var title = "QUản lý công việc";</script>