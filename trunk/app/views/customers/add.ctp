<?php $this->element('chucnang'); ?>
<div class="customers form">
<?php echo $this->Form->create('Customer');?>
	<fieldset>
	
	<?php
		echo $this->Form->input('name',array('label'=>'Tên khách hàng'));
		echo $this->Form->input('pos',array('label'=>'Vị trí phòng'));
		echo $this->Form->input('email',array('label'=>'Email'));
		echo $this->Form->input('phone',array('label'=>'Số điện thoại'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Lưu', true));?>
</div>
<script> var title='Thêm khách hàng';</script>