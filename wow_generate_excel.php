<?php

// function generate(){
require('PHPExcel/PHPExcel.php');
$phpExcel = new PHPExcel;
// Setting font to Arial Black
// $phpExcel->getDefaultStyle()->getFont()->setName('Arial Black');
// Setting font size to 14
// $phpExcel->getDefaultStyle()->getFont()->setSize(14);

//Setting description, creator and title
$phpExcel ->getProperties()->setTitle("Wow Logis");
$phpExcel ->getProperties()->setCreator("Admin");
$phpExcel ->getProperties()->setDescription("Week on Week Reports");
$phpExcel->setActiveSheetIndex(0)->mergeCells('A1:B1');

// Creating PHPExcel spreadsheet writer object
// We will create xlsx file (Excel 2007 and above)
$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");
// When creating the writer object, the first sheet is also created
// We will get the already created sheet
$sheet = $phpExcel ->getActiveSheet();
// Setting title of the sheet
$sheet->setTitle('Week on Week Report');
// Creating spreadsheet header
$sheet ->getCell('A1')->setValue('Date');
$sheet ->getCell('A2')->setValue('From');
$sheet ->getCell('B2')->setValue('To');
$sheet ->getCell('C2')->setValue('No. of Deliveries');
$sheet ->getCell('D2')->setValue('Total Delivery Cost');
$sheet ->getCell('E2')->setValue('Yell X Share');
$j = 3;
for($i=0;$i<3;$i++){
    $sheet ->getCell('A'.$j.'')->setValue($i); 
    $j++;
}
// Making headers text bold and larger
// $sheet->getStyle('A1:D1')->getFont()->setBold(true)->setSize(14);
// $sheet->setActiveSheetIndex(0)->mergeCells('C1:D1');
// Insert product data
// Autosize the columns
// $sheet->getColumnDimension('A')->setAutoSize(true);
// $sheet->getColumnDimension('B')->setAutoSize(true);
// $sheet->getColumnDimension('C')->setAutoSize(true);
// Save the spreadsheet
// $writer->save('products.xlsx');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="files.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');
// }