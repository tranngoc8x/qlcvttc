Quản lý phòng ban
<?php 
	echo $this->Form->create("Group");
	echo $this->Form->hidden('id');
	echo $this->Form->input('name');
	echo $this->Form->input('magroup');
	echo $this->Form->input('note');
	echo $this->Form->input('order');
	echo $this->Form->end('Lưu lại');
?>
<script type="text/javascript">var title="Chỉnh sửa phòng ban";</script>