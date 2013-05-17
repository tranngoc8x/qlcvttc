<div class="nuocs form">
<?php echo $this->Form->create('Nuoc');?>
	<?php
		echo $this->Form->input('date',array('label'=>'Chọn ngày','type'=>'text','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));
	?>
	<table class="sort-table" cellspacing="0" width="100%">
		<thead>
		<tr>
			<th>Khách hàng</th>
			<th>Phòng</th>
			<th>Mã số công tơ</th>
			<th>Chỉ số ban đầu</th>
			<th>Ghi chú</th>
			<th>Chỉ số nước</th>
		</tr>
		<?php $l = 0;?>
		<?php foreach ($customers as $k=>$r){		
		?>
		<tr class='tbody'>
			<td rowspan="<?php echo count($r['Room']);?>"><?php echo $r['Customer']['name'];?></td>
			<?php 
			if($r['Room']!= NULL){
			foreach($r['Room'] as $i){
			$l++;		
			?>
			<td><?php echo $i['room']; echo $this->Form->hidden('rooms_id'.$l,array('value'=>$i['id']));?></td>
			<td><?php echo $i['macto']?></td>
			<td><?php echo $i['first']?></td>
			<td><?php echo $i['ghichu']?></td>
			<td><?php echo $this->Form->input('nuoc'.$l,array('label'=>false,'placeholder'=>'Nhập vào số nước','style'=>'width:150px;')); ?></td>
			</tr><tr class='tbody'>			
		<?php }}else{?>
			<td>Chưa xếp phòng</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		<?php }?>
		</tr>
		<?php } ?>
	</table>
<?php echo $this->Form->end(__('Lưu', true));?>
</div>
<script> var title = 'Nhập số nước khách hàng sử dụng hàng ngày';</script>