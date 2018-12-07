<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class funcoesTotvs{
    
    
    function buscaCurso(){

        echo 'aqui';
$sql = "select NOME,MATRICULA, EMAIL,CURSO FROM corporerm.dbo.ZINTEGRACAOEAD_LISTA_ALUNOS WHERE CURSO  = 'FILOSOFIA' ";
        
 //$result = mssql_query("SET ANSI_NULLS ON;");
	         // $result = mssql_query("SET ANSI_WARNINGS ON;"); 
	$rs_alunos_list = mssql_query($sql,$bd_totvs) or die ("Erro ao trazer alunos do Totvs");
        return $rs_alunos_list;
        
        
        
    }
    
    
    
    
    
    

}