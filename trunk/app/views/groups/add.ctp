Quản lý phòng ban
<?php 
	echo $this->Form->create("Group");
	echo $this->Form->hidden('id');
	echo $this->Form->input('name',array('label'=>'Tên phòng ban'));
	echo $this->Form->input('magroup',array('label'=>'Mã phòng ban'));
	echo $this->Form->input('note',array('label'=>'Ghi chú'));
	echo $this->Form->input('order',array('label'=>'Thứ tự'));
	echo $this->Form->end('Lưu lại');
?>
<script type="text/javascript">var title="Thêm mới phòng ban";</script>