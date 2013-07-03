<?php
session_start();
include("../class/config.php");
include("../class/function.php");
include("../class/display.php");
include("../class/lang.php");
include("../class/lib.php");
//include('../class/common.inc.php');
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';
$StrDB= new Db_Process();
$StrDisplay= new Web_Display();
$objReader = PHPExcel_IOFactory::createReader('Excel5');
//$objPHPExcel = $objReader->load("templatesd27.xls");

 $objPHPExcel = PHPExcel_IOFactory::load("templatesd16.xls");
$objPHPExcel->setActiveSheetIndex(0);

//$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A3);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(0);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('');
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('');


 

 $sql="select tb_sd16.*,tb_datasd16.FALName,tb_datasd16.MALName from tb_sd16 inner join tb_datasd16
 on tb_sd16.PID=tb_datasd16.PID where tb_sd16.AumId='".$_GET['AumId']."'  order by tb_sd16.Sd27_Id asc
                                        ";
 //$num=$StrDB->NumRows($sql);
$re=$StrDB->Query($sql);



 $row1 = 1;
$row2 = 2;
$row3 = 3;
$no = 1;
$break = 28;


while ($result=$StrDB->FetchData($re)) {
     
  
     $strlen=  substr($result[DOR],4);
                        $age= $strlen-$result[6];
 
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$row1,$StrDisplay->Change_IntThai($no));
     $objPHPExcel->getActiveSheet()->setCellValue('B'.$row1,$StrDisplay->Change_IntThai($result['Class0']));
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$row1,$StrDisplay->Change_IntThai($result['Sd27_Id']));
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$row1,"นาย".$result['FName']);

    $objPHPExcel->getActiveSheet()->setCellValue('E'.$row1, $StrDisplay->Change_IntThai($result['DOB_Y']))
            ->setCellValue('F'.$row1,$StrDisplay->Change_IntThai($age))
            ->setCellValue('G'.$row1,$StrDB->ConName("tb_scar", "Id", "Scar_name", $result['Scar_id']))
            ->setCellValue('I'.$row1,$StrDisplay->Change_IntThai($result['ADDR'])." ".$StrDisplay->Change_IntThai($result['ADDR_M']))
            
             ->setCellValue('J'.$row1, $StrDB->ConName("district", "DISTRICT_CODE", "DISTRICT_NAME", $_GET['AumId']))
                                                 ->setCellValue('K'.$row1, $result['FAName'])
                                                 ->setCellValue('K'.$row2, $result['FALName'])
                                                 ->setCellValue('L'.$row1, $result['MAName'])
                                                  ->setCellValue('L'.$row2, $result['MALName']);
                                                
    
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$row2, $result['FLName']);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$row3, $StrDisplay->Change_IntThai($result['PID']));
     $objPHPExcel->getActiveSheet()->getStyle('K'.$row2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
      $objPHPExcel->getActiveSheet()->getStyle('L'.$row2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('D'.$row2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
    $objPHPExcel->getActiveSheet()->getStyle('E'.$row2)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('A'.$row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('C'.$row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('E'.$row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('F'.$row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('I'.$row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('J'.$row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('L'.$row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('M'.$row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    
     $objPHPExcel->getActiveSheet()->getStyle('A'.$row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('C'.$row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
        $objPHPExcel->getActiveSheet()->getStyle('D'.$row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('E'.$row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('F'.$row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
        $objPHPExcel->getActiveSheet()->getStyle('G'.$row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('I'.$row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('J'.$row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
        $objPHPExcel->getActiveSheet()->getStyle('K'.$row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('L'.$row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    $objPHPExcel->getActiveSheet()->getStyle('M'.$row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
    
    
    $objPHPExcel->getActiveSheet()->getRowDimension($row2)->setRowHeight('30');
     $objPHPExcel->getActiveSheet()->getRowDimension($row3)->setRowHeight('27');
 $objPHPExcel->getActiveSheet()->setBreak('A' . $break, PHPExcel_Worksheet::BREAK_ROW);

    $row1 +=4;
    $row2 += 4;
    $row3 += 4;
    $break += 28;
    $no++;
}

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=sd16_'.$_GET['AumId'].'.xls');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;

?>
 