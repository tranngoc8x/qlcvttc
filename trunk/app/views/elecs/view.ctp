<div class="elecs view">
<h2><?php  __('Elec');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $elec['Elec']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Customers'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($elec['Customers']['name'], array('controller' => 'customers', 'action' => 'view', $elec['Customers']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $elec['Elec']['date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Elec'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $elec['Elec']['elec']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Elec', true), array('action' => 'edit', $elec['Elec']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Elec', true), array('action' => 'delete', $elec['Elec']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $elec['Elec']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Elecs', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Elec', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers', true), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>
