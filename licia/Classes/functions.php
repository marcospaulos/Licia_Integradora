<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class funcoes{

  var $host = 'localhost';
  var $user = 'postgres';
  var $senha = 'postgresql';
  var  $banco = 'licia';
  var $periodo = '2018/2'; // 2017/2
 
  


//function conecta ( ){
//
//$con_string = 'host='.$this->host.' port=5432 dbname='.$this->banco.' user='.this->user.' password='.$this->senha;  
//  
//  $bd_licia = pg_connect($con_string) or die("Erro ao conectar ao banco Licia!<br>String: ".$host."<br>");
//
//
//}

 // insere notas da integradora    
  function insert($nomeAluno,$matricula2,$codgo,$data_insert,$date_updat,$periodoLetivo,$nota1,
    $nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,$nota12,$nota13,$nota14,$nota15
    ,$nota16, $nota17,$nota18,$nota19,$nota20,$mutiplicado ){

    $sql = "INSERT INTO public.integradora(
    nome_aluno, matrcula_aluno, cod_aluno, date_added,date_updat, periodo_letivo, 
    nota1, nota2, nota3, nota4, nota5, nota6, nota7, nota8, nota9, 
    nota10, nota11, nota12, nota13, nota14, nota15, nota16, nota17, 
    nota18, nota19, nota20, multiplicada)
    VALUES ('$nomeAluno','$matricula2','$codgo','$data_insert','$date_updat','$periodoLetivo',$nota1,
    $nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,$nota12,$nota13,$nota14,$nota15
    ,$nota16, $nota17,$nota18,$nota19,$nota20,'$mutiplicado');" ;
    echo $sql;
    return $sql;
  }

// insere notas da Vestiba 
  function insertvestiba($nomeAluno,$matricula2,$codgo,$data_insert,$date_updat,$periodoLetivo,$nota1,
    $nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,$nota12,$nota13,$nota14,$nota15
    ,$nota16, $nota17,$nota18,$nota19,$nota20 ){

    $sql = "INSERT INTO public.vestibular(
    nome_aluno, matrcula_aluno, cod_aluno, date_added,date_updat, periodo_letivo, 
    nota1, nota2, nota3, nota4, nota5, nota6, nota7, nota8, nota9, 
    nota10, nota11, nota12, nota13, nota14, nota15, nota16, nota17, 
    nota18, nota19, nota20)
    VALUES ('$nomeAluno','$matricula2','$codgo','$data_insert','$date_updat','$periodoLetivo',$nota1,
    $nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,$nota12,$nota13,$nota14,$nota15
    ,$nota16, $nota17,$nota18,$nota19,$nota20);" ;
    return $sql;
  }

// Verifica a existencia do aluno 
  function verifica ($matricula2,$periodoLetivo){
      $this->periodo;
   $sql_verifica = " SELECT id, matrcula_aluno 
   FROM public.integradora WHERE matrcula_aluno = '$matricula2' and periodo_letivo = '$periodoLetivo';" ;
   //echo $sql_verifica;
 //echo '$sql'. $sql_verifica;
   return $sql_verifica;  
 }



// Atualiza  notas 
 function update ($id,$nomeAluno,$matriculaAluno,$codgo,$data_insert,$date_updat,$periodoLetivo,$nota1,
  $nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,$nota12,$nota13,$nota14,$nota15
  ,$nota16, $nota17,$nota18,$nota19,$nota20,$mutiplicado ){

  $Update = "UPDATE public.integradora
  SET  nome_aluno='$nomeAluno', matrcula_aluno='$matriculaAluno', cod_aluno='$codgo',  
  date_updat='$date_updat', periodo_letivo='$periodoLetivo', nota1= $nota1, nota2=$nota2, nota3=$nota3, nota4=$nota4, 
  nota5=$nota5, nota6=$nota6, nota7=$nota7, nota8=$nota8, nota9=$nota9, nota10=$nota10, nota11=$nota11, 
  nota12=$nota12, nota13=$nota13, nota14=$nota14, nota15=$nota15, nota16=$nota16, nota17=$nota17, nota18=$nota18, 
  nota19=$nota19, nota20=$nota20, multiplicada='$mutiplicado'
  WHERE id =$id;";

  return $Update; 

}

function  busca($matriculaAluno){
$this->periodo;
  $sql = " SELECT distinct nome_aluno ,matrcula_aluno, cod_aluno,date_added, date_updat,periodo_letivo, multiplicada
  FROM public.integradora WHERE matrcula_aluno = '$matriculaAluno' and periodo_letivo = '$this->periodo' ;" ;

  return $sql;

}


function buscaGeral( ){

  $sql= "SELECT  *
  FROM public.integradora where periodo_letivo = '$this->periodo'";

  return $sql ;
}

function visaoGrealNotas( ){


 $sql= "SELECT  *
 FROM public.integradora where periodo_letivo = '$this->periodo'";

 return $sql ;
}

function buscaNotas($matricula){

 $sql= "SELECT  nome_aluno, matrcula_aluno,
       periodo_letivo, nota1, nota2, nota3, nota4, nota5, nota6, nota7, 
       nota8, nota9, nota10, nota11, nota12, nota13, nota14, nota15, 
       nota16, nota17, nota18, nota19, nota20, multiplicada
  FROM public.integradora where periodo_letivo = '$this->periodo' and matrcula_aluno = '$matricula'";

  return $sql ;
   
}

function quantidadeProvas( ){

$p = $this->periodo;
  $sql= "SELECT  count(*) as qtnota
  FROM public.integradora where  periodo_letivo ='$p' ";

  return $sql ;
}

function quantNotaZero( ){
    $p = $this->periodo;
  $sql= "SELECT  count(*) as qtnota
  FROM public.integradora where multiplicada = '0' and periodo_letivo ='$p'";

  return $sql ;
}

function quantNota( ){
$p = $this->periodo;
  $sql= "SELECT  count(*) as qtnota
  FROM public.integradora where multiplicada <> '0' and periodo_letivo ='$p'";

  return $sql ;
}
// Funções para o grafico de notas 

function acertos(){
    
    $p = $this->periodo;
    $acertos = "  SELECT count(*) as quantAcertos
  FROM public.integradora where  
  nota1 = 1 and  nota2 = 1 and nota3 = 1 and
  nota4 = 1 and nota5 = 1 and nota6 = 1 and  nota7 = 1 and
  nota8 = 1 and nota9 = 1 and nota10 = 1 and nota11 = 1 and
  nota12 = 1 and nota13 = 1 and nota14 = 1 and nota15 = 1 and
  nota16 = 1 and nota17 = 1 and nota18 = 1 and nota19 = 1 and 
  nota20 = 1 and periodo_letivo ='$p'";
    
    return $acertos ;
    
}
function erros(){
  $p = $this->periodo;
    $erros = "  SELECT count(*) as quantErros
  FROM public.integradora where  
  nota1 = 0 and  nota2 = 0 and nota3 = 0 and
  nota4 = 0 and nota5 = 0 and nota6 = 0 and  nota7 = 0 and
  nota8 = 0 and nota9 = 0 and nota10 = 0 and nota11 = 0 and
  nota12 = 0 and nota13 = 0 and nota14 = 0 and nota15 = 0 and
  nota16 = 0 and nota17 = 0 and nota18 = 0 and nota19 = 0 and 
  nota20 = 0 and periodo_letivo ='$p'";
    
    return $erros ;
    
}



function nota1(){
    
    $nota1 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota1 = 1 and periodo_letivo = '$this->periodo'";
    
   return $nota1;
}

function nota2(){
    
    $nota2 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota2 = 1 and periodo_letivo = '$this->periodo'";
    
   return $nota2;
}

function nota3(){
    $nota3 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota3 = 1 and periodo_letivo = '$this->periodo'";
    
   return $nota3;
}
function nota4(){
    
    $nota4 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota4 = 1 and periodo_letivo = '$this->periodo' ";
    
   return $nota4;
}
function nota5(){
    
      $nota5 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota5 = 1 and periodo_letivo = '$this->periodo'";
    
   return $nota5;
    
}
function nota6(){
    
    $nota6 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota6 = 1 and periodo_letivo = '$this->periodo'";
    
   return $nota6;
}
function nota7(){
    
     $nota7 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota7 = 1 and periodo_letivo = '$this->periodo'";
    
   return $nota7;
    
}
function nota8(){
    
    $nota8 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota8 = 1 and periodo_letivo = '$this->periodo'";
    
   return $nota8;
}
function nota9(){
    
     $nota9 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota9 = 1 and periodo_letivo = '$this->periodo'";
    
   return $nota9;
    
}
function nota10(){
   
     $nota10 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota10 = 1 and periodo_letivo = '$this->periodo'";
    
   return $nota10;
}
function nota11(){
    
   $nota11 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota11 = 1 and periodo_letivo = '$this->periodo'";
    
   return $nota11;
}
function nota12(){
  
    $nota12 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota12 = 1 and periodo_letivo = '$this->periodo'";
    
   return $nota12;
}
function nota13(){
    
  $nota13 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota13 = 1 and periodo_letivo = '$this->periodo'";  
  
  return $nota13;
}
function nota14(){
 
    $nota14 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota14 = 1 and periodo_letivo = '$this->periodo'";  
  return $nota14;  
}
function nota15(){
    
    $nota15 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota15 = 1 ";  
  return $nota15;
}
function nota16(){
 
    $nota16 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota16 = 1 and periodo_letivo = '$this->periodo'";  
  return $nota16;
}
function nota17(){
    
    $nota17 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota17 = 1 and periodo_letivo = '$this->periodo'";  
  return $nota17;
}
function nota18(){
 
    $nota18 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota18 = 1 and periodo_letivo = '$this->periodo'";  
  return $nota18;
}
function nota19(){
  
    $nota19 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota19 = 1 and periodo_letivo = '$this->periodo'";  
  return $nota19;
}
function nota20(){
   
     $nota20 = "SELECT count(*) as quant
  FROM public.integradora where  
  nota20 = 1 and periodo_letivo = '$this->periodo'";  
  return $nota20;
}
        
function array_para_csv(array &$array)
{
   if (count($array) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("php://output", 'w');
   fputcsv($df, array_keys(reset($array)));
   foreach ($array as $row) {
      fputcsv($df, $row);
   }
   fclose($df);
   return ob_get_clean();
}



function exportMysqlToCsv($filename)

{

  $periodo = $this->periodo;

  $csv_terminated = "\n";
  $csv_separator = ";";
  $csv_enclosed = '"';
  $csv_escaped = "\\";

$con_string = 'host='.$this->host.' port=5432 dbname='.$this->banco.' user='.$this->user.' password='.$this->senha;  
  
  $bd_licia = pg_connect($con_string) or die("Erro ao conectar ao banco Licia!<br>String: ".$host."<br>");

  $sql_query = "select matrcula_aluno,periodo_letivo,multiplicada from integradora  where  periodo_letivo ='$periodo' "; //Modifique aqui para gerar a consulta desejada

 $sql_query2 = pg_query($bd_licia, $sql_query) or die("Erro ao inserir notas da integradora!! " . $busca);  

  // Buscando os dados do BD
  $result = $sql_query2;
  $fields_cnt = pg_num_fields($result);
  $schema_insert = '';
  for ($i = 0; $i < $fields_cnt; $i++)
  {
    $l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
      stripslashes(pg_field_name($result, $i))) . $csv_enclosed;
    $schema_insert .= $l;
    $schema_insert .= $csv_separator;
  }
  $out = trim(substr($schema_insert, 0, -1));
  $out .= $csv_terminated;
  
  while ($row = pg_fetch_array($result))
  {
    $schema_insert = '';
    for ($j = 0; $j < $fields_cnt; $j++)
    {
      if ($row[$j] == '0' || $row[$j] != '')
      {
        if ($csv_enclosed == '')
        {
          $schema_insert .= $row[$j];
        } else
        {
          $schema_insert .= $csv_enclosed .
          str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $row[$j]) . $csv_enclosed;
        }
      } else
      {
        $schema_insert .= '';
      }
      if ($j < $fields_cnt - 1)
      {
        $schema_insert .= $csv_separator;
      }
    } // end for
    $out .= $schema_insert;
    $out .= $csv_terminated;
  } // end while
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Content-Length: " .strlen($out));

  header("Content-type: text/x-csv");
  header("Content-type: text/csv");
  header("Content-type: application/csv");
  header("Content-Disposition: attachment; filename=$filename");
  echo $out;
  //exit;
}

function csv($matricula,$periodo_letivo,$multiplicada){
 
$data = date("d-m-y");
$hora = date("H:i:s");

    $msg = $matricula.' ,'.$periodo_letivo.','. $multiplicada; 
    
    //Nome do arquivo:
$arquivo = "integradora_$data.txt";
 
//Texto a ser impresso no log:
$texto = "$msg \n";
 
$manipular = fopen("$arquivo", "a+");
fwrite($manipular, $texto);
fclose($manipular);

}

function array_to_csv_download($array_csv, $filename, $delimiter=";") {
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="'.$filename.'";');

    // open the "output" stream
    // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
    $f = fopen('php://output', 'w');

    foreach ($array_csv as $line) {
        fputcsv($f, $line, $delimiter);
    }
}  

function conctaTotvs(){
    
        
}

function closeTotvs(){
    
    mssql_close();
    
}


function buscaCurso($matriculaAluno){
//buscar curso do aluno no totvs    
    $sql= " SELECT MATRICULA, CURSO
FROM ucsal.dbo.v_mdl_alunos where MATRICULA = '$matriculaAluno' ";
    
    return $sql;
    
}

function curos(){
    
    $sql= "SELECT DISTINCT CURSO
FROM ucsal.dbo.v_mdl_alunos 
WHERE CURSO  NOT  LIKE 'ESPECIALIZAÇÃO%' 
AND   CURSO  NOT  LIKE 'DOUTORADO%'
AND   CURSO  NOT  LIKE 'NBA%'
AND   CURSO  NOT  LIKE 'MBA%'
AND   CURSO  NOT  LIKE 'MESTRADO%'
AND   CURSO  NOT  LIKE 'CURSO DE EXTENSÃO%'";
    
    return $sql;
}


}





