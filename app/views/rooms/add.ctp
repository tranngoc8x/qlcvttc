<div class="rooms form">
<?php echo $this->Form->create('Room');?>
	<fieldset>
	
	<?php
		echo $this->Form->input('room',array('label'=>'Phòng'));
		echo $this->Form->input('customers_id',array('label'=>'Khách hàng'));
		
								
	?>
	</fieldset>
<?php echo $this->Form->end(__('Lưu', true));?>
</div>
<script> var title = "Thêm mới phòng";</script>