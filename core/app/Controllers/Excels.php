<?php


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Excels extends CI_Controller {

    public function __construct()
    {        
        if (!($this->session->userdata('logged_in'))) { redirect('login'); }
    }
    
    public function index()
    {       
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'extra.xlsx';
 
        $writer->save($filename); // will create and save the file in the root of the project
 
    }
 
    public function download()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'adabada';
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
 
    }
 
    public function reader()
    {
        $inputFileType = 'Xlsx';
        $inputFileName = 'Dimax_4_Season.xlsx';
        $sheetname = 'size';
        $reader = IOFactory::createReader($inputFileType);
        $reader->setLoadSheetsOnly($sheetname);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($inputFileName);
        //echo "<pre>";
        //print_r( $spreadsheet);
        //$sheet = $spreadsheet->getActiveSheet()->toArray();
        //print_r($sheetData);
        $worksheet = $spreadsheet->getActiveSheet();
        // Get the highest row and column numbers referenced in the worksheet
        $highestRow = $worksheet->getHighestRow(); // e.g. 10
        $highestColumn = 'I';//$worksheet->getHighestColumn(); // e.g 'F'
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5

        $headingsArray = $worksheet->rangeToArray('A1:' . $highestColumn . '1', null, false, false, false);
        $headingsArray = $headingsArray[0];

        //echo "<pre>";
        //print_r($headingsArray);

        $namedDataArray = array();

        //echo $highestRow."highestRow" . PHP_EOL;
        //echo $highestColumn."highestColumn" . PHP_EOL;
        //echo $highestColumnIndex."highestColumnIndex" . PHP_EOL;

        $sizes=array();
        for ($row = 2; $row <= $highestRow; ++$row) {
            $rowa=$worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, false, false, false);
            $rowa=$rowa[0];

            //echo "<pre>";
            //print_r($rowa);

            if ($rowa[0]!==null || $rowa[1]!==null) {
                foreach ($headingsArray as $columnKey => $columnHeading) {
                    if ($columnKey=='name') {
                        continue;
                    }
                    $namedDataArray[$columnHeading] = $rowa[$columnKey];
                }
                $sizes[]=$namedDataArray;
                // if (array_key_exists("$rowa[0]", $sizes)) {
                //     array_push($sizes[$rowa[0]], $namedDataArray);     
                // }else {
                //     $sizes[$rowa[0]] = array($namedDataArray);
                // }            
            }
        }
        //echo json_encode( $sizes );
        //echo "<pre>";
        //echo json_encode( $sizes );
    }
}