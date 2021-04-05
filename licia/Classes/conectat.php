<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(E_ALL);
ini_set('display_errors',1);
ini_set('display_startup_erros',1);

//echo "Conectando ao Banco de Integração... <br>";
	// Dados do banco
	$dbhost   = "1";   #Nome do host
	$db       = "";   #Nome do banco de dados
	$user     = "moodle_user"; #Nome do usuário
	$password = "MoodleDesenv#";   #Senha do usuário

	// Dados da tabela
	//$tabela = "nometabela";    #Nome da tabela
	//$campo1 = "campo1tabela";  #Nome do campo da tabela
	//$campo2 = "campo2tabela";  #Nome de outro campo da tabela

	 $bd_totvs=@sqlsrv_connect($dbhost,$user,$password) or die("Não foi possível a conexão com o servidor Totvs !");
	 @mssql_select_db("$db") or die("Não foi possível selecionar o banco de dados!");
         echo 'marcos';
