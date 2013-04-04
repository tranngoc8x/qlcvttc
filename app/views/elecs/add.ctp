<div class="elecs form">
<?php echo $this->Form->create('Elec');?>
	<?php		
		echo $this->Form->input('date',array('label'=>'Chọn ngày','type'=>'text','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));		
	?>	
	<table class="sort-table" cellspacing="0" width="100%"> 
		<thead> 
		<tr>			
			<th>Tên khách hàng</th>			
			<th>Vị trí phòng</th>			
			<th>Số điện</th>			
		</tr>	
		<?php foreach ($customers as $k=>$customer): ?>	 
		<tr class='tbody'>
				<td><?php echo $customer['Customer']['name']; echo $this->Form->hidden('customers_id'.$k,array('value'=>$customer['Customer']['id'])) ;?>&nbsp;</td>
				<td><?php echo $customer['Customer']['pos'];?>&nbsp;</td>
				<td><?php echo $this->Form->input('elec'.$k,array('label'=>false,'placeholder'=>'Nhập vào số điện','style'=>'width:150px;')); ?>&nbsp;</td>				
		</tr>
		<?php endforeach; ?>
	</table>
<?php echo $this->Form->end(__('Lưu', true));?>
</div>
<script> var title = 'Nhập số điện khách hàng sử dụng hàng ngày';</script>