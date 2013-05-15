<div class="scores form">
<?php echo $this->Form->create('Score');?>
	<fieldset>
		<legend><?php __('Admin Add Score'); ?></legend>
	<?php
		echo $this->Form->input('users_id');
		echo $this->Form->input('tasks_id');
		echo $this->Form->input('scores');
		echo $this->Form->input('percent');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Scores', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks', true), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tasks', true), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>