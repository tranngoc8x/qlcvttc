<?php

	if (!file_exists('files/excel/Report_Nuocs_Month.xls')) {
       exit('Phải tạo file Report_Nuocs_Month.xls trước');
    }
    $excel->loadFile('files/excel/Report_Nuocs_Month.xls');
    //$mom1 = nhuan($y1);
    //$mom2 = nhuan($y2);
    //$day1 = $mom1[$m1];
    //$day2 = $mom2[$m2];
	
    $excel->cellValign();
    $excel->changeCell("MỨC TIÊU NƯỚC HÀNG NGÀY CỦA KHÁCH THUÊ TỪ (".$d1.'/'.$m1.'/'.$y1.") ĐẾN (".$d2.'/'.$m2.'/'.$y2.")",'A1');
    $excel->mergeCell('E3',$excel->getColumn(($d*2)+7).'3');
    $excel->changeCell("NGÀY",'E3');
    $excel->cellFont('E3','E3',null,true,'FFFFFF',20);
    //$excel->cellBorder('E3',$excel->getColumn(($day*2)+3).'3','000000');
    $excel->cellAlign('E3','E3','center');
    //header 
		for($i=1;$i<=$d+1;$i++){
			//ngày tháng
			$excel->mergeCell($excel->getColumn(($i*2)+2).'4',$excel->getColumn(($i*2)+3).'4');
			$dvalue = date('d',strtotime($y1."-".$m1."-".$d1.'+ '.($i-1).' day'));//$d1+$i-1
			
			$excel->changeCell($dvalue,$excel->getColumn(($i*2)+2).'4');
			$excel->cellFont($excel->getColumn(($i*2)+2).'4',$excel->getColumn(($i*2)+3).'4',null,true,'FFFFFF');
			$excel->rowHeight('5',35);
			//Chỉ số cũ
			$excel->changeCell('Chỉ số cũ',$excel->getColumn(($i*2)+2).'5');
			$excel->cellWidth($excel->getColumn(($i*2)+2),15);
			$excel->cellFont($excel->getColumn(($i*2)+2).'5',$excel->getColumn(($i*2)+2).'5',null,true,'CCFFFF');
			//mức tiêu thụ
			$excel->changeCell('Mức tiêu thụ',$excel->getColumn(($i*2)+3).'5');
			$excel->cellWidth($excel->getColumn(($i*2)+3),10);//$excel->getColumn(($i*2)+3)
			$excel->cellFont($excel->getColumn(($i*2)+3).'5',$excel->getColumn(($i*2)+3).'5',null,true,'FF8000');
		}
		$excel->mergeCell($excel->getColumn(($i*2)+2).'4',$excel->getColumn(($i*2)+3).'4');
		$excel->changeCell(date("d/m",strtotime($y2."-".$m2."-".$d2."+1 day")),$excel->getColumn(($i*2)+2).'4');
		$excel->cellFont($excel->getColumn(($i*2)+2).'4',$excel->getColumn(($i*2)+3).'4',null,true,'FFFFFF');
		$excel->rowHeight('5',35);
		//Chỉ số cũ
		$excel->changeCell('Chỉ số cũ',$excel->getColumn(($i*2)+2).'5');
		$excel->cellWidth($excel->getColumn(($i*2)+2),15);
		$excel->cellFont($excel->getColumn(($i*2)+2).'5',$excel->getColumn(($i*2)+2).'5',null,true,'CCFFFF');
		//mức tiêu thụ
		$excel->changeCell('Mức tiêu thụ',$excel->getColumn(($i*2)+3).'5');
		$excel->cellWidth($excel->getColumn(($i*2)+3),10);//$excel->getColumn(($i*2)+3)
		$excel->cellFont($excel->getColumn(($i*2)+3).'5',$excel->getColumn(($i*2)+3).'5',null,true,'FF8000');
 
	//ngày 1 của tháng sau
		





		$excel->cellAlign('E4',($excel->getColumn(($i*2)+2)).'5','center');
		//end header
		//thông tin chỉ số
		$row=6;
		//$startrow=6;
		foreach($cus as $c):

			//custommer name
			$megre1 = count($c['Room']);
			$megre = $megre1>0?$megre1:1;
			$excel->mergeCell('A'.$row,'A'.($row+$megre-1));
			$excel->changeCell($c['Customer']['name'],'A'.$row);
			//$excel->cellBorder('A'.$row,'A'.($row+$megre-1),'000000');

			//room of customer
			foreach($c['Room'] as $kr => $room):
				$excel->changeCell($room['room'],'B'.($row+$kr));
				$excel->changeCell($room['mactonuoc'],'D'.($row+$kr));
				$arrtieuthu= "=";
				$a = $this->requestAction('/nuocs/getNuocEx/'.date("Y-m-d",strtotime($y1."-".$m1."-".$d1)).'/'.date($y2."-".$m2."-".($d2+0)).'/'.$room["id"]);
				$arrkey = array_keys($a);
				$oldcel = 0;
				for($i=1;$i<=$d+1;$i++){
					$s = date('Y-m-d',strtotime($y1."-".$m1."-".$d1.'+ '.($i-1).' day'));
					$keysearch = array_search($s,$arrkey);
					if( isset($a[$s]) && !empty($a[$s])){
						$excel->changeCell($a[$s],$excel->getColumn(($i*2)+2).($row+$kr));
						$oldcel = $a[$s];
					}else{
						$excel->changeCell($oldcel,$excel->getColumn(($i*2)+2).($row+$kr));
					}
				}
				//het ngay 1 thang sau
				$keysearch = array_search($s,$arrkey);
				if( isset($a[$s]) && !empty($a[$s])){
						$excel->changeCell($a[$s],$excel->getColumn(($i*2)+2).($row+$kr));
						$oldcel = $a[$s];
				}else{
					$excel->changeCell($oldcel,$excel->getColumn(($i*2)+2).($row+$kr));
				}
				for($i1=1;$i1<=$d+1;$i1++){
					$excel->changeCell('='.$excel->getColumn(($i1*2)+4).($row+$kr).'-'.$excel->getColumn(($i1*2)+2).($row+$kr),$excel->getColumn(($i1*2)+3).($row+$kr));
					$arrtieuthu = $arrtieuthu.$excel->getColumn(($i1*2)+3).($row+$kr).'+';
				}

				$arrtieuthu =$arrtieuthu."0";
				$excel->changeCell($arrtieuthu,'C'.($row+$kr));
			endforeach;
			$row=$row+$megre;

		endforeach;
		//debug($arrtieuthu);
		$excel->cellBorder('A3',$excel->getColumn(($d*2)+7).($row+$kr-1),'000000');
		//$excel->cellBorder($excel->getColumn(4).'6',$excel->getColumn(($day*2)+2).($row+$kr),'000000');
		//$excel->cellBorder($excel->getColumn(($i*2)+3).($row+$kr),$excel->getColumn(($i*2)+3).($row+$kr),'000000');
		//output file name
    $excel->_output('Report_Nuocs_Month');
?>