<div class="rooms form">
<?php echo $this->Form->create('Room');?>
	<fieldset>

	<?php
		echo $this->Form->input('room',array('label'=>'Phòng'));
		echo $this->Form->input('customers_id',array('label'=>'Khách hàng'));
		echo $this->Form->input('macto',array('label'=>'Mã số công tơ'));
		echo $this->Form->input('first',array('label'=>'Chỉ số ban đầu'));
		echo $this->Form->input('ghichu',array('label'=>'Ghi chú'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Lưu', true));?>
</div>
<script> var title = "Cập nhật thông tin phòng";</script>