<?php
App::import('Vendor','PHPExcel',array('file' => 'excel/PHPExcel.php'));
App::import('Vendor','PHPExcelWriter',array('file' => 'excel/PHPExcel/Writer/Excel5.php'));

class ExcelHelper extends AppHelper
{

    var $xls;
    var $reader;
    var $sheet;
    var $data;
    var $blacklist = array();

    function excelHelper()
    {

    }

    function loadFile($file)
    {
        $this->reader = new PHPExcel_Reader_Excel5();
        $this->xls = $this->reader->load("{$file}");

        $this->xls->setActiveSheetIndex(0);
        $this->sheet = $this->xls->getActiveSheet();
        $this->sheet->getDefaultStyle()->getFont()->setName('Times New Roman');
    }

    function newFile()
    {
        $this->xls = new PHPExcel();
        $this->sheet = $this->xls->getActiveSheet();
        $this->sheet->getDefaultStyle()->getFont()->setName('Times New Roman');
    }

    function changeCell($value = null, $cell = null)
    {
        $this->sheet->setCellValue($cell, $value);
    }
    //thangtn
    function mergeCell($start = null, $end = null)
    {
        $this->sheet->mergeCells($start.':'.$end);
    }
    function getColumn($colNumber)
    {
        return PHPExcel_Cell::stringFromColumnIndex($colNumber);
    }

     function getCell($col,$row)
    {
        return $col.$row;
    }
    function cellBorder($start = null,$end = null,$colorborder = '000000'){


        $styleArray = array(
            'borders' => array(
                 'outline' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('rgb' => $colorborder),
                 ),
            )
        );
        $this->sheet->getStyle($start.':'.$end)->applyFromArray($styleArray);
    }
    function cellFont($start = null,$end = null,$color = '000000',$bold = false, $back = 'ffffff',$size = 12){
        $styleArray = array(

            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => $back)
            ),
            'font'    => array(
                'name'      => 'Times New Roman',
                'size'        => $size,
                'bold'      => $bold,
                'italic'    => false,
                'underline' => false,
                'strike'    => false,
                'color'     => array(
                    'rgb' => $color
                )
            )
        );
        $this->sheet->getStyle($start.':'.$end)->applyFromArray($styleArray);
    }
    function cellValign(){
        $this->sheet->getStyle('A2:CC100')->getAlignment()->applyFromArray( array( 'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'rotation' => 0, 'wrap' => true ) );
    }
    function cellAlign($start = null,$end = null,$alignment = 'left')
    {
        if($alignment=='right'){
            $this->sheet->getStyle($start.':'.$end)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        }
        elseif($alignment=='center'){
            $this->sheet->getStyle($start.':'.$end)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
        else{
            $this->sheet->getStyle($start.':'.$end)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        }
    }
    function cellWidth($col = null,$width = null){
        if(!empty($col)){
           $this->sheet->getColumnDimension($col)->setWidth($width);
        }
    }
    function rowHeight($row = null,$height = null){
        if(!empty($row)){
          $this->sheet->getRowDimension($row)->setRowHeight($height);
        }
    }
    function generate(&$data, $title = 'Report')
    {
         $this->data =& $data;
         $this->_title($title);
         $this->_headers();
         $this->_rows();
         $this->_output($title);
         return true;
    }

    function _title($title)
    {
        $this->sheet->setCellValue('A2', $title);
        $this->sheet->getStyle('A2')->getFont()->setSize(14);
        $this->sheet->getRowDimension('2')->setRowHeight(23);
    }

    function _headers()
    {
        $i=0;
        foreach ($this->data[0] as $field => $value)
        {
            if (!in_array($field,$this->blacklist))
            {
                $columnName = Inflector::humanize($field);
                $this->sheet->setCellValueByColumnAndRow($i++, 4, $columnName);
            }
        }
        $this->sheet->getStyle('A4')->getFont()->setBold(true);
        $this->sheet->getStyle('A4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $this->sheet->getStyle('A4')->getFill()->getStartColor()->setRGB('969696');
        $this->sheet->duplicateStyle( $this->sheet->getStyle('A4'), 'B4:'.$this->sheet->getHighestColumn().'4');
        for ($j=1; $j<$i; $j++)
        {
            $this->sheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($j))->setAutoSize(true);
        }
    }

    function _rows()
    {
        $i=5;
        foreach ($this->data as $row)
        {
            $j=0;
            foreach ($row as $field => $value)
            {
                if(!in_array($field,$this->blacklist))
                {
                    $this->sheet->setCellValueByColumnAndRow($j++,$i, $value);
                }
            }
            $i++;
        }
    }

    function _output($title)
    {
        header("Content-type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$title.'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = new PHPExcel_Writer_Excel5($this->xls);
        $objWriter->setTempDir(TMP);
        $objWriter->save('php://output');
    }
}
?>