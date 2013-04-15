<?php echo $this->element('chucnang');?>
<?php echo $this->Html->script(array('elec_jquery'));?>
<?php
	echo $this->Form->create('Nuoc',array('action'=>'listview'));
	echo $this->Form->input('YM',array('label'=>'Chọn tháng- năm','type'=>'date','dateFormat'=>'YM',
												'minYear' => date('Y') - 15, 'maxYear' => date('Y') + 5));
	echo $this->Form->end(__('Xem', true));
?>	
<?php 
$mom = nhuan($y);?>
<table class="sort-table" cellspacing="0" > 
		<thead> 
		<tr>			
			<th rowspan="3" style="width:70px;">Tên khách hàng</th>			
			<th rowspan="3">Phòng</th>
			<th colspan="<?php echo $mom[(int)$m]*2;?>">Tháng <?php echo $m;?></th>
		</tr>				
		<tr>
			<?php for($i=1;$i<=$mom[(int)$m];$i++){?>
			<th colspan="2"><?php echo $i; ?></th>
			<?php }?>
		</tr>
		<tr>
			<?php for($i=1;$i<=$mom[(int)$m];$i++){?>
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
			  
			$dom = (int)$m;
			for($d=1;$d<=$mom[$dom];$d++){			
			?>
			<td align=center>
				<script>$(document).ready(function(){getNuocs("<?php echo $y."-".$m."-".$d;?>","<?php echo $i["id"]?>");});</script>
				<div id="item_<?php echo $d;?>_<?php echo $i["id"];?>">
				
				</div>
			</td>
			<td align=center style="color:red;">	
				<?php 
				/*
				    $a = $this->requestAction('/elecs/getElec/'.date($y."-".$m."-".$d).'/'.$i["id"]);
				 	$b = $this->requestAction('/elecs/getElec/'.date($y."-".$m."-".($d+1)).'/'.$i["id"]);
					if ($b!=""&& $a!="")echo $b-$a; else echo '-';
				*/
				?>
				 <?php //echo $this->requestAction('/elecs/getElec/'.date($y."-".$m."-".$d).'/'.$i["id"]);?>
				 <!--  số tiêu thụ -->
				<div id="cso_<?php echo $d;?>_<?php echo $i["id"];?>">
				
				 
				 
				</div>
				 
			</td>
			<?php }?>
			</tr><tr>
			<?php }?>
		</tr>
		<?php }?>
		
</table>


<?php 
/**/
	
	/**/
?>

<script>var title = 'Bảng thống kê số nước hàng tháng';</script>
