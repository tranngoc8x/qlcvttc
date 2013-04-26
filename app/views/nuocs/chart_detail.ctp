<?php
	echo $this->Form->create('Nuoc',array('action'=>'chart_detail'));
	echo $this->Form->input('YM',array('label'=>'Chọn tháng- năm','type'=>'date','dateFormat'=>'YM',
												'minYear' => date('Y') - 15, 'maxYear' => date('Y') + 5));
	echo $this->Form->input('customers_id',array('label'=>'Chon khách hàng'));
	echo $this->Form->end(__('Xem', true));
	//debug($this->data);
	$mom = nhuan($y);
	$nuoc = array();
	$e = 0;	
	if(!empty($r)){
	foreach($r as $p){
		$k = $p['Room']["id"];
		$i = 0;
		for($d=1;$d<=$mom[(int)$m];$d++){
			$a = $this->requestAction('/nuocs/getNuoc/'.date($y."-".$m."-".$d).'/'.$p['Room']["id"]);
			$b = $this->requestAction('/nuocs/getNuoc/'.date($y."-".$m."-".($d+1)).'/'.$p['Room']["id"]);				
		if ($b!=""&& $a!="") {
			$c = $b-$a;				
			$i =$i+ $c;					
			}
		$nuoc[$k] = $i;		
		}
		$e = $e + $i;
	}
	//debug(count($r));
	ksort($nuoc);	
	if($e==0)$e = 1;
	include_once('/../libs/libchart/classes/libchart.php'); 
	$w1 = count($r)*150;
    $chart = new VerticalBarChart($w1, 700);
    $dataSet = new XYDataSet();
	
	for($i=0;$i<count($r);$i++){
		$pt = round(($nuoc[$r[$i]['Room']['id']]*100)/$e,2);
		$dataSet->addPoint(new Point($r[$i]['Room']['room'], $pt."%"));		
		$chart->setDataSet($dataSet);
	}
    $chart->setTitle("BIEU DO DIEN THONG KE CHI TIET " .$r[0]['Customer']['name']."_".$m."_".$y);
	$chart->render("images/nuoc_detail.png");
?>
<img src="<?php echo $this->webroot;?>/images/nuoc_detail.png">
<?php }else echo "Chưa có dữ liệu"; ?>
<script> var title = "Biểu đồ chi tiết công ty";</script>