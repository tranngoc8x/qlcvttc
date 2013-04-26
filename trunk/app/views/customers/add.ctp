<?php $this->element('chucnang'); ?>
<div class="customers form">
<?php echo $this->Form->create('Customer');?>
	<fieldset>

	<?php
		echo $this->Form->input('name',array('label'=>'Tên khách hàng'));
		echo $this->Form->input('code',array('label'=>'Tên viết tắt khách hàng'));
		echo $this->Form->input('tax',array('label'=>'Mã số thuế'));
		echo $this->Form->input('email',array('label'=>'Email'));
		echo $this->Form->input('phone',array('label'=>'Số điện thoại'));
		echo $this->Form->input('fax',array('label'=>'Số fax'));
		echo $this->Form->input('add',array('label'=>'Địa chỉ'));
		echo $this->Form->input('agent',array('label'=>'Người đại diện'));
		echo $this->Form->input('chucvu',array('label'=>'Chức vụ'));
		echo $this->Form->input('ngaytl',array('label'=>'Ngày thành lập','type'=>'date','dateFormat'=>'DMY',
											'minYear' => date('Y') - 15, 'maxYear' => date('Y') + 5));
		echo $this->Form->input('nguoilienhe',array('label'=>'Người liên hệ'));
		echo $this->Form->input('dtnguoilh',array('label'=>'Điện thoại người liên hệ'));
		echo $this->Form->input('soluongnv',array('label'=>'Số lượng nhân viên'));
		echo $this->Form->input('soluongxemay',array('label'=>'Số lượng xe máy'));
		echo $this->Form->input('soluongoto',array('label'=>'Số lượng ô tô'));
		echo $this->Form->input('ngaythue',array('label'=>'Ngày thuê','class'=>'datepicker'));
		echo $this->Form->input('ngaychamdut',array('label'=>'Ngày chấm dứt','class'=>'datepicker'));
		echo $this->Form->input('thoihanhd',array('label'=>'Thời hạn hợp đồng','placeholder'=>"  tháng"));
		echo $this->Form->end(__('Lưu', true));
	?>
	</fieldset>
<?php ?>
</div>
<script> var title='Thêm khách hàng';</script>