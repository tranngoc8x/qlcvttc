<?php
	echo $this->Form->create('Elec',array('action'=>'chart'));
	echo $this->Form->input('date1',array('label'=>'Từ ngày','type'=>'text','id'=>'date1','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));
	echo $this->Form->input('date2',array('label'=>'Đến ngày','type'=>'text','onchange'=>'subdate()','id'=>'date2','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));
	
	echo $this->Form->end(__('Xem',true));


	$elec = array();
	$elec_r = array();
	$total= 0;


	foreach($cus as $c){
		$k = $c['Customer']['id'];
		$e = 0;
			foreach($c['Room'] as $j){
				$r = $j['id'];
				$c = $this->requestAction('/elecs/getElecchart/'.$datestart."/".$dateend.'/'.$j["id"]);
				//$b = $this->requestAction('/elecs/getElec/'.date($y."-".$m."-".($d+1)).'/'.$j["id"]);
				$e = $e +$c;
				$elec_r[$r] = $c;
			}
		$elec[$k]=$e;
		$total = $total + $e;
	}
	ksort($elec_r);
	if($total==0)$total = 1;
	App::import('Lib','libchart/classes/libchart');
	$w1 = count($elec)*70;
    $chart = new VerticalBarChart($w1, 700);
    $dataSet = new XYDataSet();
	for($i=0;$i<count($cus);$i++){
		$pt = round(($elec[$cus[$i]['Customer']['id']]*100)/$total,2);
		$dataSet->addPoint(new Point($cus[$i]['Customer']['name'], $pt."%"));
		$chart->setDataSet($dataSet);
	}
    $chart->setTitle("BIỂU ĐỒ ĐIỆN THỐNG KÊ THEO CÔNG TY ".$d1.' - '.$d2);
	$chart->render("images/dien.png");

	$w2 = count($elec_r)*70;	
	$chart2 = new VerticalBarChart($w2, 700);

	$dataSet2 = new XYDataSet();
	for($j=0;$j<count($elec_r);$j++){
		$pr = round(($elec_r[$rooms[$j]['Room']['id']]*100)/$total,2);
		$dataSet2->addPoint(new Point($rooms[$j]['Room']['room'], $pr."%"));
		$chart2->setDataSet($dataSet2);
	}
	$chart2->setTitle("BIỂU ĐỒ ĐIỆN THỐNG KÊ THEO PHÒNG ".$d1.' - '.$d2);
	$chart2->render("images/dien_phong.png");
?>
<img src="<?php echo $this->webroot;?>/images/dien.png">
<img src="<?php echo $this->webroot;?>/images/dien_phong.png">

<script> var title= "Biểu đồ tỉ lệ dùng điện";</script>