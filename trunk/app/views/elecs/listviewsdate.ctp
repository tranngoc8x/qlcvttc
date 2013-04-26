<?php echo $this->element('chucnang');?>
<?php echo $this->Html->script(array('elec_jquery'));?>
<script>

function subdate(){
	var a =  new Date(document.getElementById('date1').value);
	var b =  new Date(document.getElementById('date2').value);	
	var c =b-a;
	if(c<0){
		alert("Không thể nhập ngày bắt đầu sau ngày kết thúc. Hãy nhập lại !");
	}else {
		if(c >31) alert("Không thể xuất dữ liệu nhiều hơn 1 tháng. Hãy nhập lại !");}
	}
</script>
<?php
	echo $this->Form->create('Elec',array('action'=>'listviewsdate'));
	echo $this->Form->input('date1',array('label'=>'Từ ngày','type'=>'text','id'=>'date1','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));
	echo $this->Form->input('date2',array('label'=>'Đến ngày','type'=>'text','onchange'=>'subdate()','id'=>'date2','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));
	
	echo $this->Form->end(__('Xem',true));
$mom1 = nhuan($y1);
$mom2 = nhuan($y2);
?>
<table class="sort-table" cellspacing="0" >
		<thead>
		<tr>
			<th rowspan="3"><span  style="width:140px; display: block">Tên khách hàng</span></th>
			<th rowspan="3"><span  style="width:70px; display: block">Phòng</span></th>
			<th rowspan="3"><span  style="width:90px; display: block">Mã công tơ</span></th>
			<th colspan="<?php echo $d*2+2;?>">Từ <?php echo $d1."/".$m1."/".$y1;?> đến <?php echo $d2."/".$m2."/".$y2;?> </th>
		</tr>
		<tr>
			<?php
			if($m1 != $m2){
				$k1 = $mom1[(int)$m1] - (int)$d1;
				for($i=(int)$d1;$i<=$mom1[(int)$m1];$i++){?>
					<th colspan="2"><?php echo $i."/".$m1; ?></th>
				<?php }			
				for($j=1;$j<=(int)$d2;$j++){?>
					<th colspan="2"><?php echo $j."/".$m2; ?></th>
			<?php }
			}else {
				for($i=(int)$d1;$i<=(int)$d2;$i++){?>
					<th colspan="2"><?php echo $i."/".$m1; ?></th>					
				<?php
				}
			}?>
		</tr>
		<tr>
			<?php for($i=1;$i<=$d+1;$i++){?>
			<th width="30"><span style="padding:0 25px;">cs</span></th>
			<th style="color:red"><span style="padding:0 20px;">mtt</span></th>
			<?php }?>
		</tr>
		<?php foreach($cus as $c){?>
		<tr>
			<td rowspan="<?php echo count($c['Room']);?>"><?php  echo $c['Customer']['name'];?></td>
			<?php if($c['Room']!= NULL){
			foreach($c['Room'] as $k){ ?>
				<td align=center ><?php  echo $k['room'];?></td>
				<td align=center ><?php // echo $i['macto'];?></td>
			<?php if($m1 != $m2){
			 for($i=(int)$d1;$i<=$mom1[(int)$m1];$i++){
			?>
				<td align=center>
					<script>$(document).ready(function(){getElecs("<?php echo $y1."-".$m1."-".$i;?>","<?php echo $k["id"]?>");});</script>
					<div id="item_<?php echo $i;?>_<?php echo $k["id"];?>"></div>
				</td>
				<td align=center style="color:red;">
					<div id="cso_<?php echo $i;?>_<?php echo $k["id"];?>"></div>
				</td>
			<?php }
			for($j=1;$j<=(int)$d2;$j++){
			?>
				<td align=center>
					<script>$(document).ready(function(){getElecs("<?php echo $y1."-".$m1."-".$j;?>","<?php echo $k["id"]?>");});</script>
					<div id="item_<?php echo $j;?>_<?php echo $k["id"];?>"></div>
				</td>
				<td align=center style="color:red;">
					<div id="cso_<?php echo $j;?>_<?php echo $k["id"];?>"></div>
				</td>
			<?php }}else{ 
				for($h=(int)$d1;$h<=(int)$d2;$h++){
			?>
				<td align=center>
					<script>$(document).ready(function(){getElecs("<?php echo $y1."-".$m1."-".$h;?>","<?php echo $k["id"]?>");});</script>
					<div id="item_<?php echo $h;?>_<?php echo $k["id"];?>"></div>
				</td>
				<td align=center style="color:red;">
					<div id="cso_<?php echo $h;?>_<?php echo $k["id"];?>"></div>
				</td>
			<?php }}?>
			</tr><tr>
			<?php 
			}}else{?>
				<td align=center style="color:red;">Chưa xếp phòng</td>
				<td align=center style="color:red;"></td>
				<?php for($i=1;$i<=$d+1;$i++){?>
				<td align=center style="color:red;"></td>
				<td align=center style="color:red;">-</td>
			<?php }}?>
		</tr>
		<?php }?>
</table>
<script>var title = "Bảng thống kê điện theo khoảng thời gian";</script>