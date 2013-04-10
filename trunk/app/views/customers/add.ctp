<?php $this->element('chucnang'); ?>
<div class="customers form">
<?php echo $this->Form->create('Customer');?>
	<fieldset>
	
	<?php
		echo $this->Form->input('name',array('label'=>'Tên khách hàng'));
		echo $this->Form->input('tax',array('label'=>'Mã số thuế'));
		echo $this->Form->input('email',array('label'=>'Email'));
		echo $this->Form->input('phone',array('label'=>'Số điện thoại'));
		echo $this->Form->input('fax',array('label'=>'Số fax'));
		echo $this->Form->input('add',array('label'=>'Địa chỉ'));
		echo $this->Form->input('agent',array('label'=>'Người đại diện'));
		echo $this->Form->input('chucvu',array('label'=>'Chức vụ'));		
		echo $this->Form->input('ngaytl',array('label'=>'Ngày thành lập','type'=>'date','dateFormat'=>'DMY',
											'minYear' => date('Y') - 15, 'maxYear' => date('Y') + 5));
								
	?>
	</fieldset>
<?php echo $this->Form->end(__('Lưu', true));?>
</div>
<script> var title='Thêm khách hàng';</script>