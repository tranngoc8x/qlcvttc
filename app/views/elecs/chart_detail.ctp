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
	echo $this->Form->create('Elec',array('action'=>'chart_detail'));
	echo $this->Form->input('date1',array('label'=>'Từ ngày','type'=>'text','id'=>'date1','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));
	echo $this->Form->input('date2',array('label'=>'Đến ngày','type'=>'text','onchange'=>'subdate()','id'=>'date2','placeholder'=>'Bấm để chọn ngày','value'=>"",'readonly'=>1,'class'=>'input-short datepicker'));
	echo $this->Form->input('customers_id',array('label'=>'Chon khách hàng'));
	echo $this->Form->end(__('Xem', true));
	$elec = array();	
	$total= 0;
	$e = 0;	
	if(!empty($r)){
	foreach($r as $p){
		$k = $p['Room']["id"];			
		$c = $this->requestAction('/elecs/getElecchart/'.$datestart."/".$dateend.'/'.$k);	
		$e = $e +$c;				
		$elec[$k] = $c;	
	}	
	ksort($elec);	
	if($e==0)$e = 1;
	App::import('Lib','libchart/classes/libchart');
	$w1 = count($elec)*70;
	($w1<500)?($w1=500):$w1;
    $chart = new VerticalBarChart($w1, 700);
    $dataSet = new XYDataSet();		
	for($i=0;$i<count($r);$i++){	
		$pt = round(($elec[$r[$i]['Room']['id']]*100)/$e,2);
		$dataSet->addPoint(new Point($r[$i]['Room']['room'], $pt."%"));
		$chart->setDataSet($dataSet);
	}
	$chart->setTitle("B.ĐỒ ĐIỆN THỐNG KÊ CỦA CÔNG TY ".$customers[$cus]." từ ".$d1.' - '.$d2);
	$chart->render("images/dien_detail.png");

?>
<img src="<?php echo $this->webroot;?>/images/dien_detail.png">
<?php }else echo "Chưa có dữ liệu"; ?>
<script> var title = "Biểu đồ chi tiết của từng công ty";</script>