<?php echo $this->element('chucnang');?>
<?php echo $this->Html->script(array('date'));?>
<script>
function subdate(){
	var myDate1 = Date.parseExact(document.getElementById('date1').value,"dd/MM/yyyy");	
	var myDate2 = Date.parseExact(document.getElementById('date2').value,"dd/MM/yyyy");	
	var days = 24*60*60*1000;	
	if((myDate2-myDate1)<0){
		alert("Không thể nhập ngày bắt đầu sau ngày kết thúc. Hãy nhập lại !");
	}else {
		if((myDate2-myDate1) >32*days) alert("Không thể xuất dữ liệu nhiều hơn 1 tháng. Hãy nhập lại !");}
	}	
</script>
<?php
	echo $this->Form->create('Nuoc',array('action'=>'listviewsdate'));
	echo $this->Form->input('date1',array('label'=>'Từ ngày','type'=>'text','id'=>'date1','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));
	echo $this->Form->input('date2',array('label'=>'Đến ngày','type'=>'text','onchange'=>'subdate()','id'=>'date2','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));	
	echo $this->Form->end(__('Xem',true));	
	echo $this->Html->link("Xuất ra file excel", array('controller'=>'nuocs','action'=>'exportdate',($d1.'-'.$m1.'-'.$y1),($d2.'-'.$m2.'-'.$y2)))."<br/>";
	echo $this->Html->link("Xem biểu đồ thống kê chi tiết của tất cả các công ty", array('plugin'=>false,'admin'=>false,'controller'=>'nuocs','action'=>'chart'))."<br/>";
	echo $this->Html->link("Xem biểu đồ thống kê chi tiết của từng công ty", array('plugin'=>false,'admin'=>false,'controller'=>'nuocs','action'=>'chart_detail'));
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
			<?php
			$a = $this->requestAction('/nuocs/getNuocEx/'.date("Y-m-d",strtotime($y1."-".$m1."-".$d1)).'/'.date($y2."-".$m2."-".($d2+0)).'/'.$k["id"]);
			//debug(date($y2."-".$m2."-".($d2+2)));
			$arrkey = array_keys($a);				
			if($m1 != $m2){
			 for($i=(int)$d1;$i<=$mom1[(int)$m1];$i++){
			?>
				<td align=center>					
				<?php					
					$s1 =$i<10? '0'.$i:$i;
					//debug($s1);
					$s2 =$i<10? '0'.($i+1):($i+1);
					//debug($s2);
					$m0 = $m1;					
					$keysearch = array_search($y1."-".$m0."-".$s1,$arrkey);
					//debug($keysearch);
					if( isset($a[$y1."-".$m0."-".$s1]) && !empty($a[$y1."-".$m0."-".$s1])){
						echo $a[$y1."-".$m0."-".$s1];						
						//$oldcel = $a[$y."-".$m0."-".$s1];
					}else{
						//echo $oldcel;
					}
				?>
				</td>
				<td align=center style="color:red;">
					<!--<div id="cso_<?php echo $i;?>_<?php echo $k["id"];?>" > </div> -->
					<?php
					if( isset($a[$y1."-".$m0."-".$s1]) && !empty($a[$y1."-".$m0."-".$s1]) && isset($a[$y1."-".$m0."-".$s2])){
							echo $a[$y1."-".$m0."-".$s2] - $a[$y1."-".$m0."-".$s1];
							//$oldcel = $a[$y."-".$m0."-".$s1];
						}
					?>
				</td>
			<?php }
			for($j=1;$j<=(int)$d2;$j++){
			?>
				<td align=center>
					<script>//$(document).ready(function(){getElecs("<?php echo $y1."-".$m1."-".$j;?>","<?php echo $k["id"]?>");});</script>
					<?php
					$s3 =$j<10? '0'.$j:$j;
					//debug($s3);
					$s4 =$j<10? '0'.($j+1):($j+1);
					//debug($s4);
					$m01 = $m2<10? '0'.$m2:$m2;
					//debug($m01);
					$keysearch = array_search($y2."-".$m01."-".$s3,$arrkey);
					//debug($keysearch);
					if( isset($a[$y2."-".$m01."-".$s3]) && !empty($a[$y2."-".$m01."-".$s3])){
						echo $a[$y2."-".$m01."-".$s3];
						//$oldcel = $a[$y."-".$m0."-".$s1];
					}else{
						//echo $oldcel;
					}
				?>
				</td>
				<td align=center style="color:red;">
					<?php
					if( isset($a[$y2."-".$m01."-".$s3]) && !empty($a[$y2."-".$m01."-".$s3]) && isset($a[$y2."-".$m01."-".$s4])){
							echo $a[$y2."-".$m01."-".$s4] - $a[$y2."-".$m01."-".$s3];
							//$oldcel = $a[$y."-".$m0."-".$s1];
						}
					?>
				</td>
			<?php }}else{ 
				for($h=(int)$d1;$h<=(int)$d2;$h++){
			?>
				<td align=center>				
					<?php
					$s5 =$h<10? '0'.$h:$h;
					//debug($s5);
					$s6 =$h<10? '0'.($h+1):($h+1);
					//debug($s6);
					$m02 = $m2;
					//debug($m02);
					$keysearch = array_search($y2."-".$m02."-".$s5,$arrkey);
					//debug($keysearch);
					if( isset($a[$y2."-".$m02."-".$s5]) && !empty($a[$y2."-".$m02."-".$s5])){
						echo $a[$y2."-".$m02."-".$s5];
						//$oldcel = $a[$y."-".$m0."-".$s1];
					}else{
						//echo $oldcel;
					}
					?>
				</td>
				<td align=center style="color:red;">
					<?php
					if( isset($a[$y2."-".$m02."-".$s5]) && !empty($a[$y2."-".$m02."-".$s5]) && isset($a[$y2."-".$m02."-".$s6])){
							echo $a[$y2."-".$m02."-".$s6] - $a[$y2."-".$m02."-".$s5];
							//$oldcel = $a[$y."-".$m0."-".$s1];
						}
					?>
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
<script>var title = "Bảng thống kê nước theo khoảng thời gian";</script>