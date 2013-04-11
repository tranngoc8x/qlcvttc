<?php echo $this->element('chucnang');?>

<?php
	echo $this->Form->create('Elec',array('action'=>'listview2'));
	echo $this->Form->input('YM',array('label'=>'Chọn tháng- năm','type'=>'date','dateFormat'=>'YM',
												'minYear' => date('Y') - 15, 'maxYear' => date('Y') + 5));
	echo $this->Form->end(__('Xem', true));
?>	
<?php 
$mom = nhuan((int)date('Y'));?>
<table class="sort-table" cellspacing="0" > 
		<thead> 
		<tr>			
			<th rowspan="3">Tên khách hàng</th>			
			<th rowspan="3">Phòng</th>
			<th colspan="<?php echo $mom[(int)date('m')]*2;?>">Tháng <?php echo date('m');?></th>
		</tr>				
		<tr>
			<?php for($i=1;$i<=$mom[(int)date('m')];$i++){?>
			<th colspan="2"><?php echo $i; ?></th>
			<?php }?>
		</tr>
		<tr>
			<?php for($i=1;$i<=$mom[(int)date('m')];$i++){?>
			<th width="30">cs</th>
			<th style="color:red">mtt</th>
			<?php }?>
		</tr>
		<?php foreach($cus as $c){?>		
		<tr>	
			<td rowspan="<?php echo count($c['Room']);?>"><?php  echo $c['Customer']['name'];?></td>
			<?php foreach($c['Room'] as $i){ ?>
			<td><?php  echo $i['room'];?></td>
			<?php 
			  
			$dom = (int)date('m');
			for($d=1;$d<=$mom[$dom];$d++){			
			?>
			<td align=center>
				<?php echo $this->requestAction('/elecs/getElec/'.date("Y-m-".$d).'/'.$i["id"]);?>
			</td>
			<td align=center style = "color:red;">	
				<?php 
				//$a = 0; 
				    $a = $this->requestAction('/elecs/getElec/'.date("Y-m-".$d).'/'.$i["id"]);
				 	$b = $this->requestAction('/elecs/getElec/'.date("Y-m-".($d+1)).'/'.$i["id"]);
					if ($b!=""&& $a!="")echo $b-$a; else echo '-';
				?>
				 
			</td>
			<?php }?>
			</tr><tr>
			<?php }?>
		</tr>
		<?php }?>
		
</table>

<script>var title = 'Bảng thống kê số điện hàng tháng';</script>