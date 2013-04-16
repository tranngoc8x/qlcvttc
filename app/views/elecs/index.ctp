<?php echo $this->element('chucnang');?>

<?php
	echo $this->Form->create('Elec',array('action'=>'listindex'));
	echo $this->Form->input('YM',array('label'=>'Chọn tháng- năm','type'=>'date','dateFormat'=>'YM',
												'minYear' => date('Y') - 15, 'maxYear' => date('Y') + 5));
	echo $this->Form->end(__('Xem', true));
?>											
<?php 
$a = nhuan(date("Y"));?>
<table class="sort-table" cellspacing="0" > 
		<thead> 
		<tr>			
			<th rowspan="2" width="150">Tên khách hàng</th>			
			<th  rowspan="2" width="70">Phòng</th>
			<th  colspan="31">Tháng <?php echo date('m');?></th>
		</tr>				
		<tr>
		<?php for($i=1;$i<=$a[(int)date('m')];$i++){?>
		<th width="30"><?php echo $i; ?></th>
		<?php }?>
		</tr>
		<?php foreach($cus as $c){?>		
		<tr>	
			<td rowspan="<?php echo count($c['Room']);?>"><?php  echo $c['Customer']['name'];?></td>
			<?php foreach($c['Room'] as $i){ ?>
			<td><?php  echo $i['room'];?></td>
			<?php 
			
			for($d=1;$d<=$a[(int)date('m')];$d++){			
			?>
			<td align=center>
				<?php echo $this->requestAction('/elecs/getElec/'.date("Y-m-".$d).'/'.$i["id"]);?>
			</td>
			
			<?php }?>
			</tr><tr>
			<?php }?>
		</tr>
		<?php }?>
		
</table>
<script>var title = 'Bảng thống kê số điện hàng tháng';</script>
