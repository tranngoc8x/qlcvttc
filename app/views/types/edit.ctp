<div class="types form">
<?php echo $this->Form->create('Type');?>
	<fieldset>		
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'Tên'));
		echo $this->Form->input('note',array('label'=>'Chú thích'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Sửa', true));?>
</div>

<script>var title = "Sửa loại công việc";</script>