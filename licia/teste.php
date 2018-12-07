<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



include './Classes/conecta.php';


 $busca1 = "select NOME,MATRICULA, EMAIL,CURSO FROM ZINTEGRACAOEAD_LISTA_ALUNOS WHERE CURSO  = 'FILOSOFIA'";
                 $rsCurso = mssql_query($busca1, $bd_totvs) or die("Erro consultar disciplinas.");
                 print_r($rsCurso);
                mssql_close($bd_totvs);
