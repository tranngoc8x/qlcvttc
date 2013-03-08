<div class="tasks form">
<?php
	echo $this->Form->create('Task');
	echo $this->Form->hidden('id');
	echo $this->Form->input('name',array('label'=>'Tên công việc'));
	echo $this->Form->input('content',array('label'=>'Nội dung công việc'));
	echo $this->Form->input('start',array('label'=>'Ngày bắt đầu','type'=>'text','readonly'=>1,'class'=>'input-short datepicker'));
	echo $this->Form->input('end',array('label'=>'Ngày kết thúc','type'=>'text','readonly'=>1,'class'=>'input-short datepicker'));
	echo $this->Form->end(__('Lưu lại', true));
?>
<script type="text/javascript">
	var title = "Quản lý công việc";
</script>