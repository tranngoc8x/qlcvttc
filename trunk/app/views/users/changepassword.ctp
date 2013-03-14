<?php 
	echo $this->Form->create("User");	
	echo $this->Form->input('password',array('label'=>'Mật khẩu cũ','type'=>'password'));
	echo $this->Form->input('newpassword',array('label'=>'Mật khẩu mới','type'=>'password'));
	echo $this->Form->input('confirmnewpassword',array('label'=>'Nhập lại mật khẩu mới','type'=>'password'));
	echo $this->Form->end('Lưu lại');
?>
<script type="text/javascript">var title = "Sửa mật khẩu";</script>