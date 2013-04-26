<?php
	echo $this->Html->link('Biểu đồ chi tiết từng công ty', array('controller'=>'nuocs', 'action'=>'chart_detail'));
	echo $this->Form->create('Nuoc',array('action'=>'chart'));
	echo $this->Form->input('YM',array('label'=>'Chọn tháng- năm','type'=>'date','dateFormat'=>'YM',
												'minYear' => date('Y') - 15, 'maxYear' => date('Y') + 5));
	echo $this->Form->end(__('Xem', true));
	
	$mom = nhuan($y);
	$nuoc = array();
	$nuoc_r = array();
	$total= 0;	
	foreach($cus as $c){
		$k = $c['Customer']['id'];
		$e = 0;				
			foreach($c['Room'] as $j){				
				$r = $j['id'];
				$i = 0;
				for($d=1;$d<=$mom[(int)$m];$d++){
				$a = $this->requestAction('/nuocs/getNuoc/'.date($y."-".$m."-".$d).'/'.$j["id"]);
				$b = $this->requestAction('/nuocs/getNuoc/'.date($y."-".$m."-".($d+1)).'/'.$j["id"]);				
				if ($b!=""&& $a!="") {
					$c = $b-$a;				
					$i =$i+ $c;					
				}			
			}			
			$e = $e +$i;	
			$nuoc_r[$r] = $i;			
			}		
		$nuoc[$k]=$e;
		$total = $total + $e;		
	}
	//debug($elec_r);
	ksort($nuoc_r);		
	if($total==0)$total = 1;
	//include_once('/../libs/libchart/classes/libchart.php'); 
	App::import('Lib','libchart/classes/libchart');
	$w1 = count($nuoc)*100;
    $chart = new VerticalBarChart($w1, 700);
    $dataSet = new XYDataSet();
	for($i=0;$i<count($cus);$i++){
		$pt = round(($nuoc[$cus[$i]['Customer']['id']]*100)/$total,2);
		$dataSet->addPoint(new Point($cus[$i]['Customer']['name'], $pt."%"));		
		$chart->setDataSet($dataSet);
	}
    $chart->setTitle("BIEU DO DIEN THONG KE THEO CONG TY ".$m."_".$y);
	$chart->render("images/nuoc.png");
	$w2 = count($nuoc_r)*70;	
	$chart2 = new VerticalBarChart($w2, 700);
	$dataSet2 = new XYDataSet();
	for($j=0;$j<count($nuoc_r);$j++){			
		$pr = round(($nuoc_r[$rooms[$j]['Room']['id']]*100)/$total,2);
		$dataSet2->addPoint(new Point($rooms[$j]['Room']['room'], $pr."%"));
		$chart2->setDataSet($dataSet2);
	}
	$chart2->setTitle("BIEU DO DIEN THONG KE THEO PHONG ".$m."_".$y);
	$chart2->render("images/nuoc_phong.png");
?>
<img src="<?php echo $this->webroot;?>/images/nuoc.png">
<img src="<?php echo $this->webroot;?>/images/nuoc_phong.png">

<script> var title= "Biểu đồ tỉ lệ dùng nước";</script>