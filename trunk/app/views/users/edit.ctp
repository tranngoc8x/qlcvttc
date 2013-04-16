	<?php
		echo $this->Form->create("User");
		echo $this->Form->hidden('id');
		echo $this->Form->input('name',array('label'=>'Tên nhân sự'));
		echo $this->Form->input('username',array('label'=>'Tài khoản đăng nhập'));
		echo $this->Form->input('email',array('label'=>'Email nhân sự'));
		echo $this->Form->input('birth',array('label'=>'Ngày sinh','separator'=>'','dateFormat'=>'DMY','minYear'=>date('Y') - 70,'maxYear'=>date('Y')-15));
		echo $this->Form->radio('gioitinh',array("Nam","Nữ"),array('legend'=>'Giới tính'));
		echo $this->Form->input('address',array('label'=>'Địa chỉ','cols'=>4));
		echo $this->Form->input('datestart',array('label'=>'Ngày vào làm','separator'=>'','dateFormat'=>'DMY','minYear'=>1970,'maxYear'=>date('Y')-15));
		echo $this->Form->input('nghiviec',array('label'=>"Nghỉ việc",'id'=>'idnviec'));
		echo "<div class='showdiv'>";
		echo $this->Form->input('dateend',array('label'=>'Ngày nghỉ việc','id'=>'ngaynghi','separator'=>'','div'=>"iddiv input",'dateFormat'=>'DMY','minYear'=>2010,'maxYear'=>date('Y')));
		echo "</div>";
		?>
		<script>
			$("#idnviec").click(function(){
				var f = $("#idnviec").is(':checked');
				if(f == false) {$(".iddiv").slideUp();}
				else{
					$(".iddiv").slideDown();
				}
			});
			$(document).ready(function(){if($("#idnviec").is(':checked') == false) $(".iddiv").slideUp('fast');});
		</script>
		<?php
		echo $this->Form->input('groups_id',array('label'=>'Phòng ban','div'=>false));
		echo $this->Form->input('positions_id',array('label'=>'Chức vụ','div'=>false));
		echo $this->Form->input('desc',array('label'=>'Mô tả công việc'));
		echo $this->Form->end('Lưu lại');
	?>
	<script type="text/javascript">var title = "Cập nhật thông tin nhân sự";</script>
