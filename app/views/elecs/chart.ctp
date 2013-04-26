<?php
	echo $this->Html->link('Biểu đồ chi tiết từng công ty', array('controller'=>'elecs', 'action'=>'chart_detail'));
	echo $this->Form->create('Elec',array('action'=>'chart'));
	echo $this->Form->input('YM',array('label'=>'Chọn tháng- năm','type'=>'date','dateFormat'=>'YM',
												'minYear' => date('Y') - 15, 'maxYear' => date('Y') + 5));
	echo $this->Form->end(__('Xem', true));
	
	$mom = nhuan($y);
	$elec = array();
	$elec_r = array();
	$total= 0;
	foreach($cus as $c){
		$k = $c['Customer']['id'];
		$e = 0;
			foreach($c['Room'] as $j){
				$r = $j['id'];
				$i = 0;
				for($d=1;$d<=$mom[(int)$m];$d++){
				$a = $this->requestAction('/elecs/getElec/'.date($y."-".$m."-".$d).'/'.$j["id"]);
				$b = $this->requestAction('/elecs/getElec/'.date($y."-".$m."-".($d+1)).'/'.$j["id"]);
				if ($b!=""&& $a!="") {
					$c = $b-$a;
					$i =$i+ $c;
				}
			}
			$e = $e +$i;
			$elec_r[$r] = $i;
			}
		$elec[$k]=$e;
		$total = $total + $e;
	}
	//debug($elec_r);
	ksort($elec_r);
	if($total==0)$total = 1;
	include_once('/../libs/libchart/classes/libchart.php');
	$w1 = count($elec)*100;
    $chart = new VerticalBarChart($w1, 700);
    $dataSet = new XYDataSet();
	for($i=0;$i<count($cus);$i++){
		$pt = round(($elec[$cus[$i]['Customer']['id']]*100)/$total,2);
		$dataSet->addPoint(new Point($cus[$i]['Customer']['name'], $pt."%"));
		$chart->setDataSet($dataSet);
	}
    $chart->setTitle("BIEU DO DIEN THONG KE THEO CONG TY ".$m."_".$y);
	$chart->render("images/dien.png");

	$w2 = count($elec_r)*70;	
	$chart2 = new VerticalBarChart($w2, 700);

	$dataSet2 = new XYDataSet();
	for($j=0;$j<count($elec_r);$j++){
		$pr = round(($elec_r[$rooms[$j]['Room']['id']]*100)/$total,2);
		$dataSet2->addPoint(new Point($rooms[$j]['Room']['room'], $pr."%"));
		$chart2->setDataSet($dataSet2);
	}
	$chart2->setTitle("BIEU DO DIEN THONG KE THEO PHONG ".$m."_".$y);
	$chart2->render("images/dien_phong.png");
?>
<img src="<?php echo $this->webroot;?>/images/dien.png">
<img src="<?php echo $this->webroot;?>/images/dien_phong.png">

<script> var title= "Biểu đồ tỉ lệ dùng điện";</script>