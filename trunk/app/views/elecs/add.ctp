<div class="elecs form">
<?php echo $this->Form->create('Elec');?>
	<?php		
		echo $this->Form->input('date',array('label'=>'Chọn ngày','type'=>'text','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));		
	?>	
	<table class="sort-table" cellspacing="0" width="100%"> 
		<thead> 
		<tr>			
			<th>Khách hàng</th>			
			<th>Phòng</th>			
			<th>Chỉ số điện</th>			
		</tr>
		<?php $l = 0;?>
		<?php foreach ($customers as $k=>$r): ?>	 
		<tr class='tbody'>
			<td rowspan="<?php echo count($r['Room']);?>"><?php echo $r['Customer']['name'];?></td>
			<?php foreach($r['Room'] as $i){$l++;?>		
			<td><?php echo $i['room']; echo $this->Form->hidden('rooms_id'.$l,array('value'=>$i['id']));?></td>		
			<td><?php echo $this->Form->input('elec'.$l,array('label'=>false,'placeholder'=>'Nhập vào số điện','style'=>'width:150px;')); ?></td>
			</tr><tr class='tbody'>
		<?php }?>				
		</tr>
		<?php endforeach; ?>
	</table>
<?php echo $this->Form->end(__('Lưu', true));?>
</div>
<script> var title = 'Nhập số điện khách hàng sử dụng hàng ngày';</script>