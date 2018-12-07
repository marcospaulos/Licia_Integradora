<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$host  = 'localhost';
	$user = 'postgres';
	$password = 'nuppead@1234';
	$banco = 'db_licia';

	$con_string = 'host='.$host.' port=5432 dbname='.$banco.' user='.$user.' password='.$password;	
	
	$bd_licia = pg_connect($con_string) or die("Erro ao conectar ao banco Licia!<br>String: ".$host."<br>");
        
        
        
        
//       /********************************************************************
//		Conecção ao Banco de dados SQL Server blackcat - producao Totvs
//	*********************************************************************/
//	
//	//echo "Conectando ao Banco de Integração... <br>";
//	// Dados do banco
//	$dbhost   = "10.8.1.56";   #Nome do host
//	$db       = "ucsal";   #Nome do banco de dados
//	$user     = "moodle_user"; #Nome do usuário
//	$password = "MoodleDesenv#";   #Senha do usuário
//
//	// Dados da tabela
//	//$tabela = "nometabela";    #Nome da tabela
//	//$campo1 = "campo1tabela";  #Nome do campo da tabela
//	//$campo2 = "campo2tabela";  #Nome de outro campo da tabela
//
//	 $bd_totvs=@sqlsrv_connect($dbhost,$user,$password) or die("Não foi possível a conexão com o servidor Totvs !");
//	 @mssql_select_db("$db") or die("Não foi possível selecionar o banco de dados!"); 
//        
        