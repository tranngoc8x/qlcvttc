<?php echo $this->Form->create('Position');		
		echo $this->Form->input('name',array('label'=>"Tên chức vụ"));
		echo $this->Form->input('note',array('label'=>"Ghi chú"));
		echo $this->Form->input('groups_id',array('label'=>"Phòng ban"));
		echo $this->Form->input('order',array('label'=>"Thứ tự"));
	
echo $this->Form->end(__('Lưu', true));?>


<script type="text/javascript">
	var title= "Chỉnh sửa chức vụ";
</script>