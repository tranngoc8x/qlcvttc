<?php echo $this->element('chucnang');?>
<?php 
$a = nhuan(date("Y"));?>
<table class="sort-table" cellspacing="0" > 
		<thead> 
		<tr>			
			<th rowspan="2" width="150">Tên khách hàng</th>			
			<th  rowspan="2" width="70">Vị trí phòng</th>
			<th  colspan="31">Tháng <?php echo date('m');?></th>
		</tr>				
		<tr>
		<?php for($i=1;$i<=$a[(int)date('m')];$i++){?>
		<th width="30"><?php echo $i; ?></th>
		<?php }?>
		</tr>
		<?php foreach($cus as $c){?>		
		<tr>		
			<td><?php  echo $c['Customer']['name'];?></td>
			<td><?php echo $c['Customer']['pos'];?></td>
			<?php 					
			for($i=1;$i<=$a[(int)date('m')];$i++){			
			?>
			<td>
				<?php				
				foreach($s as $e){					
					$arr = explode('-',$e['Elec']['date']);
					//$arr1 = explode(' ',$arr[2]);
					//debug($arr1);
					$d = (int)$arr[2];
					$b = $e['Elec']['customers_id'];
					//debug($d);				
					if(($d==$i) && ($b==$c['Customer']['id'])) echo $e['Elec']['elec'];					
				} ?>
			</td>
			<?php }?>
		</tr>
		<?php }?>
		
</table>
<script>var title = 'Bảng thống kê dùng điện hàng tháng';</script>