<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//carrega Class
require_once './Classes/PHPExcel.php';

//inicia objeto 
$pFilename = 'matutino.xls';
//$objReader = new PHPExcel_Reader_Excel5();
$objReader = PHPExcel_IOFactory::createReader('Excel2007');

$objReader->setReadDataOnly(TRUE);
$objPHPExcel =  $objReader->load("matutino.xls");


//Pegar total colunas 
$colunas = $objPHPExcel->setActiveSheetIdex(0)->getHighestDataRow();
$total_colunas = PHPExcel_Cell::columnIndexFromString($colunas);


//pegando Linhas 
$total_linhas = $objPHPExcel->setActiveSheetIndex(0)->getHighestDataRow();


echo "<table boder='1'>";

// Navegando na s linhas 

for ( $linha = 1; $linha <= $total_linhas; $linha++){
    
    echo "<tr>";
    
    // Navegando Colunas 
    
    for ($coluna = 0; $coluna <= $total_colunas - 1; $coluna++) {
        
        if($linha ==1){
            echo "<th>". utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna,$linha)->getValue());    
        } else {
            echo "<th>". utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna,$linha)->getValue());
        }
 
    }
   echo "</tr>"; 
    
}
echo "</table>";
?>





