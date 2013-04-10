<div class="rooms view">
<h2><?php  __('Room');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $room['Room']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Customers'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($room['Customers']['name'], array('controller' => 'customers', 'action' => 'view', $room['Customers']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Room'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $room['Room']['room']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Room', true), array('action' => 'edit', $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Room', true), array('action' => 'delete', $room['Room']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rooms', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Room', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers', true), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
