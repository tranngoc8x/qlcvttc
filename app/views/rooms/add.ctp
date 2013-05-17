<div class="rooms form">
<?php echo $this->Form->create('Room');?>
	<fieldset>

	<?php
		echo $this->Form->input('room',array('label'=>'Phòng'));
		echo $this->Form->input('customers_id',array('label'=>'Khách hàng'));
		echo $this->Form->input('mactodien',array('label'=>'Mã số công tơ điện'));
		echo $this->Form->input('mactonuoc',array('label'=>'Mã số công tơ nước'));
		echo $this->Form->input('firstdien',array('label'=>'Chỉ số điện ban đầu'));
		echo $this->Form->input('firstnuoc',array('label'=>'Chỉ số nước ban đầu'));
		echo $this->Form->input('ghichu',array('label'=>'Ghi chú'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Lưu', true));?>
</div>
<script> var title = "Thêm mới phòng";</script>