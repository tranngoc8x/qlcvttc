<div class="tasks form">
<?php
	echo $this->Form->create('Task',array('type'=>'file'));
	echo $this->Form->input('taskid',array('label'=>'Mã công việc'));
	echo $this->Form->input('name',array('label'=>'Tên công việc'));
	echo $this->Form->input('content',array('label'=>'Nội dung công việc'));
	echo $this->Form->input('start',array('label'=>'Ngày bắt đầu','type'=>'text','placeholder'=>'Bấm để chọn ngày','value'=>date('d/m/Y',strtotime($this->data['Task']['start'])),'readonly'=>1,'class'=>'input-short datepicker'));
	echo $this->Form->input('end',array('label'=>'Ngày kết thúc','type'=>'text','placeholder'=>'Bấm để chọn ngày','value'=>date('d/m/Y',strtotime($this->data['Task']['end'])),'readonly'=>1,'class'=>'input-short datepicker'));
	echo $this->Form->input('types_id',array('label'=>'Loại công việc'));
	echo $this->Form->input('linhvucs_id',array('label'=>'Lĩnh vực'));
	echo $this->Form->input('files. ',array('name'=>'files[]','label'=>'File văn bản','type'=>'file','multiple'=>true));
	echo $this->Form->input("folder",array('label'=>"Thư mục lưu trữ bản cứng công việc"));
	echo $this->Form->end(__('Lưu lại', true));
?>
<script type="text/javascript">
	var title = "Quản lý công việc";
</script>