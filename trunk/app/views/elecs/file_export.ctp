
<?php 
$this->Html->charset('utf-8');
$mom = nhuan($y);?>
<table class="sort-table" cellspacing="0" > 
		<thead> 
		<tr>			
			<th rowspan="3" style="width:70px;">T�n kh�ch h�ng</th>			
			<th rowspan="3">Ph�ng</th>
			<th colspan="<?php echo $mom[(int)$m]*2;?>">Th�ng <?php echo $m;?></th>
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
				<?php echo $this->requestAction('/elecs/getElec/'.date($y."-".$m."-".$d).'/'.$i["id"]);?>
			</td>
			<td align=center style="color:red;">	
				<?php 
				
				    $a = $this->requestAction('/elecs/getElec/'.date($y."-".$m."-".$d).'/'.$i["id"]);
				 	$b = $this->requestAction('/elecs/getElec/'.date($y."-".$m."-".($d+1)).'/'.$i["id"]);
					if ($b!=""&& $a!="")echo $b-$a; else echo '-';
				
				?>
				 <?php //echo $this->requestAction('/elecs/getElec/'.date($y."-".$m."-".$d).'/'.$i["id"]);?>
				 <!--  s? ti�u th? -->
				
				 
			</td>
			<?php }?>
			</tr><tr>
			<?php }?>
		</tr>
		<?php }?>
		
</table>