<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

include './Classes/PHPExcel.php';
include './Classes/PHPExcel/IOFactory.php' ;
include './Classes/M_Celulas.php';


$objReader = PHPExcel_IOFactory::createReader($inputFileType);

$worksheetData = $objReader->listWorksheetInfo($inputFileName);

echo '<h3>Worksheet Information</h3>';
echo '<ol>';
foreach ($worksheetData as $worksheet) {
    echo '<li>', $worksheet['worksheetName'], '<br />';
    echo 'Rows: ', $worksheet['totalRows'],
         ' Columns: ', $worksheet['totalColumns'], '<br />';
    echo 'Cell Range: A1:',
    $worksheet['lastColumnLetter'], $worksheet['totalRows'];
    echo '</li>';
}
echo '</ol>';