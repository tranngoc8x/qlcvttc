<?php

	if (!file_exists('files/excel/Report_Elecs_Month.xls')) {
       exit('Please create Report_Elecs_Month.xls first');
    }
    $excel->loadFile('files/excel/Report_Elecs_Month.xls');

    $excel->changeCell('Trần Ngọc THắng', 'A10');
    
    $excel->_output('Report_Elecs_Month');
?>