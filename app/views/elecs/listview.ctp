<?php echo $this->element('chucnang');?>
<?php echo $this->Html->script(array('elec_jquery'));?>
<?php
	echo $this->Form->create('Elec',array('action'=>'listview'));
	echo $this->Form->input('YM',array('label'=>'Chọn tháng- năm','type'=>'date','dateFormat'=>'YM',
												'minYear' => date('Y') - 15, 'maxYear' => date('Y') + 5));
	echo $this->Form->end(__('Xem', true));
?>
<?php
	echo $this->Html->link("xuất ra file excel", array('controller'=>'elecs','action'=>'export',$m,$y));
	$mom = nhuan($y);
	$day = $mom[$m];
?>
<table class="sort-table" cellspacing="0" >
		<thead>
		<tr>
			<th rowspan="3"><span  style="width:140px; display: block">Tên khách hàng</span></th>
			<th rowspan="3"><span  style="width:70px; display: block">Phòng</span></th>
			<th rowspan="3"><span  style="width:90px; display: block">Mã công tơ</span></th>
			<th colspan="<?php echo $mom[(int)$m]*2 +2;?>">Tháng <?php echo $m;?> năm <?php echo $y;?></th>
		</tr>
		<tr>
			<?php for($i=1;$i<=$mom[(int)$m];$i++){?>
			<th colspan="2"><?php echo $i; ?></th>
			<?php }?>
			<th colspan="2"><?php echo date("d/m",strtotime($y."-".$m."-".date('t',$m))); ?></th>
		</tr>
		<tr>
			<?php for($i=1;$i<=$mom[(int)$m];$i++){?>
			<th width="30"><span style="padding:0 25px;">cs</span></th>
			<th style="color:red"><span style="padding:0 20px;">mtt</span></th>
			<?php }?>
			<th width="30"><span style="padding:0 25px;">cs</span></th>
			<th style="color:red"><span style="padding:0 20px;">mtt</span></th>
		</tr>
		<?php foreach($cus as $c){?>
		<tr>
			<td rowspan="<?php echo count($c['Room']);?>"><?php  echo $c['Customer']['name'];?></td>
			<?php if($c['Room']!= NULL){ foreach($c['Room'] as $i){ ?>
			<td align=center ><?php  echo $i['room'];?></td>
			<td align=center ><?php // echo $i['macto'];?></td>
			<?php
			$a = $this->requestAction('/elecs/getElecEx/'.date("Y-m-d",strtotime($y."-".$m."-01")).'/'.date($y."-".$m."-".($day+1)).'/'.$i["id"]);
			$arrkey = array_keys($a);
				//$arrvalue = array_values($a);
				//debug($arrkey);
				//debug($arrvalue);
				//debug($a);
			$oldcel = 0;
			for($d=1;$d<=$day;$d++){
			?>
			<td align=center>
				<script>//$(document).ready(function(){getElecs("<?php echo $y."-".$m."-".$d;?>","<?php echo $i["id"]?>");});</script>
				<!-- <div id="item_<?php echo $d;?>_<?php echo $i["id"];?>">

				</div> -->
				<?php
					$s1 =$d<10? '0'.$d:$d;
					$s2 =$d<10? '0'.($d+1):($d+1);
					$m0 = $m<10?'0'.$m:$m;
					$keysearch = array_search($y."-".$m0."-".$s1,$arrkey);
					if( isset($a[$y."-".$m0."-".$s1]) && !empty($a[$y."-".$m0."-".$s1])){
						echo $a[$y."-".$m0."-".$s1];
						//$oldcel = $a[$y."-".$m0."-".$s1];
					}else{
						//echo $oldcel;
					}
				?>
			</td>
			<td align=center style="color:red;">
				<!-- <div id="cso_<?php echo $d;?>_<?php echo $i["id"];?>">

				</div> -->
				<?php
					if( isset($a[$y."-".$m0."-".$s1]) && !empty($a[$y."-".$m0."-".$s1]) && isset($a[$y."-".$m0."-".$s2])){
							echo $a[$y."-".$m0."-".$s2] - $a[$y."-".$m0."-".$s1];
							//$oldcel = $a[$y."-".$m0."-".$s1];
						}
				?>
			</td>
			<?php }?>

			<td align=center>
				<script>//$(document).ready(function(){getElecs("<?php echo $y."-".$m."-".$d;?>","<?php echo $i["id"]?>");});</script>
				<!-- <div id="item_<?php echo $d;?>_<?php echo $i["id"];?>">

				</div> -->
				<?php
					$s1 =$d<10? '0'.$d:$d;
					$s2 =$d<10? '0'.($d+1):($d+1);
					$m0 = $m<10?'0'.$m:$m;
					$keysearch = array_search($y."-".$m0."-".$s1,$arrkey);
					if( isset($a[$y."-".$m0."-".$s1]) && !empty($a[$y."-".$m0."-".$s1])){
						echo $a[$y."-".$m0."-".$s1];
						//$oldcel = $a[$y."-".$m0."-".$s1];
					}else{
						//echo $oldcel;
					}
				?>
			</td>
			<td align=center style="color:red;">
				<!-- <div id="cso_<?php echo $d;?>_<?php echo $i["id"];?>">

				</div> -->
				<?php
					if( isset($a[$y."-".$m0."-".$s1]) && !empty($a[$y."-".$m0."-".$s1]) && isset($a[$y."-".$m0."-".$s2])){
							//echo $a[$y."-".$m0."-".$s2] - $a[$y."-".$m0."-".$s1];
							//$oldcel = $a[$y."-".$m0."-".$s1];
						}
				?>
			</td>
			</tr><tr>
			<?php
			}}else{?>
			<td align=center style="color:red;"></td>
			<td align=center style="color:red;"></td>
			<?php for($d=1;$d<=$mom[(int)$m];$d++){?>
			<td align=center style="color:red;"></td>
			<td align=center style="color:red;"></td>
			<?php }}?>
		</tr>
		<?php }?>

</table>

<script>var title = 'Bảng thống kê số điện';</script>
