<?php

	if (!file_exists('files/excel/Report_Elecs_Month.xls')) {
       exit('Please create Report_Elecs_Month.xls first');
    }
    $excel->loadFile('files/excel/Report_Elecs_Month.xls');
    $mom = nhuan($y);
    $day = $mom[$m];
    $excel->cellValign();
    $excel->changeCell("MỨC TIÊU ĐIỆN HÀNG NGÀY CỦA KHÁCH THUÊ (THÁNG (".$m.'/'.$y.")",'A1');
    $excel->mergeCell('E3',$excel->getColumn(($day*2)+3).'3');
    $excel->changeCell("NGÀY",'E3');
    $excel->cellFont('E3','E3',null,true,'FFFFFF',20);
    $excel->cellBorder('E3',$excel->getColumn(($day*2)+3).'3','000000');
    $excel->cellAlign('E3','E3','center');
    //header
    for($i=1;$i<=$day;$i++){

    	//ngày tháng
    	$excel->mergeCell($excel->getColumn(($i*2)+2).'4',$excel->getColumn(($i*2)+3).'4');
		$excel->changeCell($i,$excel->getColumn(($i*2)+2).'4');
		$excel->cellBorder($excel->getColumn(($i*2)+2).'4',$excel->getColumn(($i*2)+3).'4','000000');
		$excel->cellFont($excel->getColumn(($i*2)+2).'4',$excel->getColumn(($i*2)+3).'4',null,true,'FFFFFF');


		$excel->rowHeight('5',35);
		//Chỉ số cũ
		$excel->changeCell('Chỉ số cũ',$excel->getColumn(($i*2)+2).'5');
		$excel->cellWidth($excel->getColumn(($i*2)+2),15);

		$excel->cellBorder($excel->getColumn(($i*2)+2).'5',$excel->getColumn(($i*2)+2).'5','000000');
		$excel->cellFont($excel->getColumn(($i*2)+2).'5',$excel->getColumn(($i*2)+2).'5',null,true,'CCFFFF');

		//mức tiêu thụ
		$excel->changeCell('Mức tiêu thụ',$excel->getColumn(($i*2)+3).'5');
		$excel->cellWidth($excel->getColumn(($i*2)+3),10);//$excel->getColumn(($i*2)+3)
		$excel->cellBorder($excel->getColumn(($i*2)+3).'5',$excel->getColumn(($i*2)+3).'5','000000');
		$excel->cellFont($excel->getColumn(($i*2)+3).'5',$excel->getColumn(($i*2)+3).'5',null,true,'FF8000');
		//

	}
	$excel->cellAlign('E4',($excel->getColumn(($i*2)+2)).'5','center');
	//end header
	//thông tin chỉ số
		$row=6;
		//$startrow=6;
		foreach($cus as $c):

			//custommer name
			$megre = count($c['Room']);
			$excel->mergeCell('A'.$row,'A'.($row+$megre-1));
			$excel->changeCell($c['Customer']['name'],'A'.$row);
			$excel->cellBorder('A'.$row,'A'.($row+$megre-1),'000000');

			//room of customer
			foreach($c['Room'] as $kr => $room):
				$excel->changeCell($room['room'],'B'.($row+$kr));
				$excel->changeCell($room['macto'],'D'.($row+$kr));
				$excel->cellBorder('B'.$row,'B'.($row+$kr),'000000');
				$excel->cellBorder('C'.$row,'C'.($row+$kr),'000000');
				$excel->cellBorder('D'.$row,'D'.($row+$kr),'000000');
				for($i=1;$i<=$day;$i++){
					$a = $this->requestAction('/elecs/getElec/'.date($y."-".$m."-".$i).'/'.$room["id"]);
					//$b = $this->requestAction('/elecs/getElec/'.date($y."-".$m."-".($i+1)).'/'.$room["id"]);
					if(empty($a)){
						$excel->changeCell($a,$excel->getColumn(($i*2)+2).($row+$kr));
						$excel->cellBorder($excel->getColumn(($i*2)+2).($row+$kr),$excel->getColumn(($i*2)+2).($row+$kr),'000000');
						$excel->cellBorder($excel->getColumn(($i*2)+3).($row+$kr),$excel->getColumn(($i*2)+3).($row+$kr),'000000');
					}
				}
				$arrtieuthu= "=";
				for($i=1;$i<=$day;$i++){
					//=$excel->getColumn(($i*2)+4).($row+$kr) - $excel->getColumn(($i*2)+4).($row+$kr)
					$excel->changeCell('='.$excel->getColumn(($i*2)+4).($row+$kr).'-'.$excel->getColumn(($i*2)+2).($row+$kr),$excel->getColumn(($i*2)+3).($row+$kr));
					$excel->cellAlign($excel->getColumn(($i*2)+3).($row+$kr),$excel->getColumn(($i*2)+3).($row+$kr),'center');
					$excel->cellFont($excel->getColumn(($i*2)+3).($row+$kr),$excel->getColumn(($i*2)+3).($row+$kr),null,false,'FF8000');

						$arrtieuthu = $arrtieuthu.$excel->getColumn(($i*2)+3).($row+$kr).'+';

				}
				$arrtieuthu =$arrtieuthu."0";
				$excel->changeCell($arrtieuthu,'C'.($row+$kr));
			endforeach;
			$row=$row+$megre;
		endforeach;
		//debug($arrtieuthu);

	//output file name
    $excel->_output('Report_Elecs_Month');
?>