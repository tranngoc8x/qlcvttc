	<?php
		echo $this->Form->create("User");
		echo $this->Form->hidden('id');
		echo $this->Form->input('name',array('label'=>'Tên nhân sự'));
		echo $this->Form->input('username',array('label'=>'Tài khoản đăng nhập'));
		echo $this->Form->input('password',array('label'=>'Mật khẩu'));
		echo $this->Form->input('groups_id',array('label'=>'Phòng ban'));
		echo $this->Form->input('positions_id',array('label'=>'Chức vụ'));
				echo $this->Form->radio('gioitinh',array("Nam","Nữ"),array('legend'=>'Giới tính'));
		echo $this->Form->input('datestart',array('label'=>'Ngày vào làm'));
		echo $this->Form->input('quequan',array('label'=>'Quê quán'));
		echo $this->Form->end('Lưu lại');
	?>
	<script type="text/javascript">var title = "Thêm mới nhân sự";</script>
