<?php echo $this->element('chucnang');?>
<?php echo $this->Html->script(array('elec_jquery'));?>
<?php
	echo $this->Form->create('Elec',array('action'=>'listview'));
	echo $this->Form->input('YM',array('label'=>'Chọn tháng- năm','type'=>'date','dateFormat'=>'YM',
												'minYear' => date('Y') - 15, 'maxYear' => date('Y') + 5));
	echo $this->Form->end(__('Xem', true));
?>
<?php
echo $this->Html->link("xuất ra file excel", array('controller'=>'elecs','action'=>'file_export'));
$mom = nhuan($y);?>
<table class="sort-table" cellspacing="0" >
		<thead>
		<tr>
			<th rowspan="3"><span  style="width:140px; display: block">Tên khách hàng</span></th>
			<th rowspan="3"><span  style="width:70px; display: block">Phòng</span></th>
			<th rowspan="3"><span  style="width:90px; display: block">Mã công tơ</span></th>

			<th colspan="<?php echo $mom[(int)$m]*2;?>">Tháng <?php echo $m;?></th>
		</tr>
		<tr>
			<?php for($i=1;$i<=$mom[(int)$m];$i++){?>
			<th colspan="2"><?php echo $i; ?></th>
			<?php }?>
		</tr>
		<tr>
			<?php for($i=1;$i<=$mom[(int)$m];$i++){?>
			<th width="30"><span style="padding:0 25px;">cs</span></th>
			<th style="color:red"><span style="padding:0 20px;">mtt</span></th>
			<?php }?>
		</tr>
		<?php foreach($cus as $c){?>
		<tr>
			<td rowspan="<?php echo count($c['Room']);?>"><?php  echo $c['Customer']['name'];?></td>
			<?php foreach($c['Room'] as $i){ ?>
			<td><?php  echo $i['room'];?></td>
			<td><?php // echo $i['macto'];?></td>
			<?php

			$dom = (int)$m;
			for($d=1;$d<=$mom[$dom];$d++){
			?>
			<td align=center>
				<script>$(document).ready(function(){getElecs("<?php echo $y."-".$m."-".$d;?>","<?php echo $i["id"]?>");});</script>
				<div id="item_<?php echo $d;?>_<?php echo $i["id"];?>">

				</div>
			</td>
			<td align=center style="color:red;">
				<div id="cso_<?php echo $d;?>_<?php echo $i["id"];?>">

				</div>

			</td>
			<?php }?>
			</tr><tr>
			<?php }?>
		</tr>
		<?php }?>

</table>






<script>var title = 'Bảng thống kê số điện hàng tháng';</script>
