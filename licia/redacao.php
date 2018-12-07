<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Abre o Arquvio no Modo r (para leitura)
session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:restrito_vestiba.php');
}

$logado = $_SESSION['login'];
date_default_timezone_set('America/Bahia');
?>



<html lang="pt-br">
    <head>
        <title> SPA - Redação  </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>


<?php
INCLUDE_ONCE 'include/barra.php';
?>


        <div class="container-fluid">
            <div class="row content">
 <?php 
      include 'include/menu1.php';
      ?>
                
                <div class="col-sm-10">
                    
            <h1 class="text-center"> SPA - Redação</h1>

            <p class =" text-center" >
                <small>Importação de arquivos.</small>
            </p>
            <p class="text-center">  </p> 

            <div class="alert alert-warning">
                <form  enctype="multipart/form-data"  action="#"  method="post">
                    <div class="form-group">
                        <label for="exampleInputFile">Entrada de arquivo</label>
                        <input type="file"  name="arquivo" id="arquivo" >

                        <p class="help-block">importar Arquivo.</p>
                    </div>

                    <button type="submit" class="btn btn-success">Enviar</button>
                </form>
            </div>

            <div class="jumbotron">
                
                
                <?php
$retVal = (isset($_FILES['arquivo']['name'])) ? $nomeArquivo = $_FILES['arquivo']['name'] : ' Nada foi enviado !';

if (isset($_FILES['arquivo'])) {
    


                  $dir = '/uploads'; //Diretório para uploads
                    $uploadfile = basename($_FILES['arquivo']['name']);
                    //move_uploaded_file($_FILES['arquivo'], $dir ); //Fazer upload do arquivo
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile); //Fazer upload do arquivo
   //$arquivo = fopen ('arquivo-texto.txt', 'r');
 $nome = $_FILES['arquivo']['name'];
// Lê o conteúdo do arquivo 
$names=file($nome);
   /// NOVO
// CONECÇÃO BANCO DE DADOS 
 include './Classes/conecta.php';
 require_once './Classes/functionVestiba.php';
 
                    
                    $funLicia = new vestibalm();
 


                            $periodoLetivo = '2018.1';
                           
                            $data_insert = date("d/m/Y H:i:s");
                            $date_updat = date("d/m/Y H:i:s");

        //indica o caminho do arquivo no servidor
       // $arquivo = $names;

        //cria um array que receberá os dados importados do arquivo txt
        $arquivoArr = array();
        
        //aqui é enviado para função fopen o endereço do arquivo e a instrução 'r' que indica 'somente leitura' e coloca o ponteiro no começo do arquivo
        $arq = fopen($nome, 'r');
        
        //variável armazena o total de linhas importadas
        $total_linhas_importadas = 0;
        
        //a função feof retorna true (verdadeiro) se o ponteiro estiver no fim do arquivo aberto
        //a negação do retorno de feof indicada pelo caracter "!" do lado esquerdo da função faz com 
        //que o laço percorra todas as linhas do arquivo até fim do arquivo (eof - end of file)
        while(!feof($arq)){
                
                //retorna a linha do ponteiro do arquivo                        
                $conteudo = fgets($arq);

                //transforma a linha do ponteiro em uma matriz de string, cada uma como substring de string formada a partir do caracter ';'
                $linha = explode(';', $conteudo);
                
                //array recebe as substring contidas na matriz carregada na variável $linha 
                $arquivoArr[$total_linhas_importadas] = $linha;

                //incremente a variável que armazena o total de linhas importadas
                $total_linhas_importadas++;
                
                
                //print_r($linha);
                
               
             
                
                $retorno = $funLicia ->licia_verifica( $linha[0]); 
               // echo $retorno;
                $rs_notas = pg_query($bd_licia, $retorno) or die("Erro ao checar notas da vestibular!! " . $retorno);

                            $checa_notas = pg_fetch_array($rs_notas);
                            // echo 'aqi'. $chaca_notas ;
                            // print_r($checa_notas);
                            $verifica = pg_num_rows($rs_notas);
                            // pegando o id para o update
                            $matricula = $checa_notas[0];
                            //echo '$matricula -'.$matricula;
                            if( $verifica == 1 ){
                            
                               //echo'Linha -'.$linha[0].'</br>';
                               //echo'Nota-'.$linha[1].'</br>';
                              $matricula2=  $linha[0];
                               $notaRedacao = $linha[1];
                              $update = $funLicia->licia_NotaRed_Update($matricula2, $notaRedacao, $date_updat);
                              // echo  $update = $funLicia->licia_NotaRed_Update($matricula2,$notaRedacao,$id ,$date_updat);
                                $rs_notas = pg_query($bd_licia, $update) or die("Erro ao atualizar notas do vestibular!! " . $update);
                              } else {
                                  echo 'Matricula não encotrada! '.$linha[0];
                              }
                
                
        }

include './Classes/desconecta.php';
   
}//fim else  


   ?>

            </div>  
            </div>
        </div>  
             </div>   

        <!-- Final da Segunda div -->

     
        








</body>
</html>


<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>