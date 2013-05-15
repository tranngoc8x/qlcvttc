<form name="frmList" method="post" action="#">
	<table class="sort-table" cellspacing="0" width="100%">
	<tr>
			<th><?php echo $this->Paginator->sort("Tên công việc",'name');?></th>
			<th><?php echo $this->Paginator->sort("Ngày bắt đầu",'start');?></th>
			<th><?php echo $this->Paginator->sort('Ngày kết thúc','end');?></th>
			<th><?php echo $this->Paginator->sort('Trạng thái','done');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($tasks as $task):?>
	<tr class='tbody'>
		<td>
			<?php echo $this->Html->link($task['Task']['name'], array('controller' => 'tasks', 'action' => 'view', $task['Task']['id'])); ?>
		</td>
		<td>
			<?php echo  date("d/m/Y",strtotime($task['Task']['start']));

			 ?>
		</td>
		<td><?php echo  date("d/m/Y",strtotime($task['Task']['end'])); ?>&nbsp;</td>
		<td><?php echo $task['Task']['done']==2?"Hoàn thành":"Chưa làm xong"; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Xem chi tiết', true), array('action' => 'view', $task['Task']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<script>
	var title = "Đánh giá chất lượng làm việc";
</script>