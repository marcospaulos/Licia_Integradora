<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MyReadFilter implements PHPExcel_Reader_IReadFilter 
{ 
    public function readCell($column, $row, $worksheetName = 'Resultados') { 
        
// Leia as linhas 1 a 7 e as colunas A a E
        if ($row >= 1 && $row <= 7) { 
            if (in_array($column,range('A','E'))) { 
                return true; 
            } 
        } 
        return false; 
    } 
} 
