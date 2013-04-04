<div class="elecs form">
<?php echo $this->Form->create('Elec');?>
	<fieldset>
		<legend><?php __('Edit Elec'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('customers_id');
		echo $this->Form->input('date');
		echo $this->Form->input('elec');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Elec.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Elec.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Elecs', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers', true), array('controller' => 'customers', 'action' => 'add')); ?> </li>
	</ul>
</div>