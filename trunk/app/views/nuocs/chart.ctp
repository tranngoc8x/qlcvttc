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
	echo $this->Form->create('Nuoc',array('action'=>'chart'));
	echo $this->Form->input('date1',array('label'=>'Từ ngày','type'=>'text','id'=>'date1','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));
	echo $this->Form->input('date2',array('label'=>'Đến ngày','type'=>'text','onchange'=>'subdate()','id'=>'date2','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));	
	echo $this->Form->end(__('Xem',true));
	$nuoc = array();
	$nuoc_r = array();
	$total= 0;
	foreach($cus as $c){
		$k = $c['Customer']['id'];
		$e = 0;
			foreach($c['Room'] as $j){
				$r = $j['id'];
				$c = $this->requestAction('/nuocs/getNuocchart/'.$datestart."/".$dateend.'/'.$j["id"]);				
				$e = $e +$c;
				$nuoc_r[$r] = $c;
			}
		$nuoc[$k]=$e;
		$total = $total + $e;
	}
	ksort($nuoc_r);
	if($total==0)$total = 1;
	App::import('Lib','libchart/classes/libchart');
	$w1 = count($nuoc)*70;
    $chart = new VerticalBarChart($w1, 700);
    $dataSet = new XYDataSet();
	for($i=0;$i<count($cus);$i++){
		$pt = round(($nuoc[$cus[$i]['Customer']['id']]*100)/$total,2);
		$dataSet->addPoint(new Point($cus[$i]['Customer']['name'], $pt."%"));
		$chart->setDataSet($dataSet);
	}
    $chart->setTitle("BIỂU ĐỒ NƯỚC THỐNG KÊ THEO CÔNG TY ".$d1.' - '.$d2);
	$chart->render("images/nuoc.png");

	$w2 = count($nuoc_r)*70;	
	$chart2 = new VerticalBarChart($w2, 1000);
	$dataSet2 = new XYDataSet();
	for($j=0;$j<count($nuoc_r);$j++){
		$pr = round(($nuoc_r[$rooms[$j]['Room']['id']]*100)/$total,2);
		$dataSet2->addPoint(new Point($rooms[$j]['Room']['room'], $pr."%"));
		$chart2->setDataSet($dataSet2);
	}
	$chart2->setTitle("BIỂU ĐỒ NƯỚC THỐNG KÊ THEO PHÒNG ".$d1.' - '.$d2);
	$chart2->render("images/nuoc_phong.png");
?>
<img src="<?php echo $this->webroot;?>/images/nuoc.png">
<img src="<?php echo $this->webroot;?>/images/nuoc_phong.png">

<script> var title= "Biểu đồ tỉ lệ dùng nước";</script>