<?php
namespace App\Models;
use CodeIgniter\Model;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excels_Model extends Model {
    
    public function createfile( $data , $filename, $headerkeys=null )
	{ 
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('sizes');
        $startrow=1;
        if ($headerkeys!=null) {
            $startrow=2;
            array_unshift($headerkeys,'name');
            $sheet->getStyle('A1:Z1')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('ffff00');
            $a2z=array_combine(range(0, 25), range('A', 'Z'));
            $a2keys=array();
            foreach ($headerkeys as $key => $value) {
                $row=1;
                $a2keys[$a2z[$key]]=$value;
                $sheet->setCellValue($a2z[$key].$row, $value);
            }
        }

        foreach($data as $key => $domain) {
          $row = (int)$key+$startrow;
          foreach ($a2keys as $key => $value) {
            $cellval = $key!=='A' ? $domain[$value] : $filename;
            if ($value=='lr' && $domain[$value]==null) {
                $cellval='- ';
            }
            $sheet->setCellValue($key.$row, $cellval);
          }

          /*$sheet->setCellValue('A'.$row, $filename);
          $sheet->setCellValue('B'.$row, $domain['size']);
          $sheet->setCellValue('C'.$row , $domain['rim']);
          $sheet->setCellValue('D'.$row , $domain['li_sr']);
          $sheet->setCellValue('E'.$row , $domain['lr']);
          $sheet->setCellValue('F'.$row , $domain['s_w']);
          $sheet->setCellValue('G'.$row , $domain['fuel']); 
          $sheet->setCellValue('H'.$row , $domain['weather']); 
          $sheet->setCellValue('I'.$row , $domain['noise_db']);*/
        }

        $writer = new Xlsx($spreadsheet);
        $filename = $filename.'.xlsx';
        $writer->save('./xlsx/'.$filename);
        return $filename;
	}
	
	

    public function xlfile( $data , $filename, $morphotherkeys=false, $headerkeys=null )
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Tire Registrations');
        $startrow=1;
        if ($morphotherkeys) {
            $originalheaderkeys=array_keys($data[0]);
        }
        if ($headerkeys!=null) {
            $startrow=2;
            $sheet->getStyle('A1:AZ1')->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()->setARGB('ffff00');
            //Assign custom header keys.
            $rangA_Z= range('A', 'Z');
            $rangAA_ZZ = preg_filter('/^/', 'A', $rangA_Z);
            $rangA_AZ=array_merge($rangA_Z, $rangAA_ZZ);
            $a2z=array_combine(range(0, 51), $rangA_AZ);
            $a2keys=array();
            foreach ($headerkeys as $key => $value) {
                $row=1;
                $a2keys[$a2z[$key]]=$morphotherkeys ? $originalheaderkeys[$key] : $value;
                $sheet->setCellValue($a2z[$key].$row, $value);
            }
        }
        //Loop on data
        foreach($data as $key => $domain) {
          $row = (int)$key+$startrow;
          foreach ($a2keys as $key => $value) {
            // if array key exists or set
            if (!array_key_exists($value, $domain)) {
                $cellval='- ';
            }
            //it value is null
            else if ($domain[$value]==null) {
                $cellval='- ';
            }
            else{
              $cellval = $domain[$value];
            }
            
            
            
            
            //echo "<pre>";print_r($key);echo "</pre>";
            $sheet->setCellValue($key.$row, $cellval);
          }
        }

        $writer = new Xlsx($spreadsheet);
        $filename = $filename.'.xlsx';
        $writer->save('./xlsx/'.$filename);
        return $filename;
    }

    public function readfile( $file )
    {
        $inputFileType = 'Xlsx';
        $inputFileName = $file;
        $sheetname = 'sizes';
        $reader = IOFactory::createReader($inputFileType);
        $reader->setLoadSheetsOnly($sheetname);
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($inputFileName);
        $worksheet = $spreadsheet->getActiveSheet();
        // Get the highest row and column numbers referenced in the worksheet
        $highestRow = $worksheet->getHighestRow(); // e.g. 10
        $highestColumn = $worksheet->getHighestColumn();//$worksheet->getHighestColumn(); // 'I';e.g 'F'


        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // e.g. 5
        

        $headingsArray = $worksheet->rangeToArray('A1:' . $highestColumn . '1', null, false, false, false);

        $headingsArray = $headingsArray[0];
        foreach ($headingsArray as $key => $value) {
            if ($value==null) {
                unset($headingsArray[$key]);
            }
        }
        $atoz=range('A', 'Z');
        $highestColumn=$atoz[count($headingsArray)-1];
        
        $namedDataArray = array();
        $sizes=array();
        for ($row = 2; $row <= $highestRow; ++$row) {
            $rowa=$worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, false, false, false);
            $rowa=$rowa[0];
            if ($rowa[0]!==null || $rowa[1]!==null) {
                foreach ($headingsArray as $columnKey => $columnHeading) {
                    if ($columnKey=='name') {
                        continue;
                    }
                    $namedDataArray[$columnHeading] = $rowa[$columnKey];
                }
                $sizes[]=$namedDataArray;
            }
        }
        return $sizes;
    }
}