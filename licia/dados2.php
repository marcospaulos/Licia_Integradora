
<?php  
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php.*/
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:restrito.php');
    }

$logado = $_SESSION['login'];
date_default_timezone_set('America/Bahia');


?>



<html lang="pt-br">
    <head>
        <title> Integradra Licia </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>


        <style type="text/css">
            

            
        </style>
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
            <h1>Integradora </h1>
            <p> Importação de notas </p> 
              <p> <h4>Usuário : <?php echo $logado; ?></h4> </p>  
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

//                if ( isset( $_POST['Submit'] ) ) {




                 
                $retVal = (isset($_FILES['arquivo']['name'])) ? $nomeArquivo = $_FILES['arquivo']['name'] : ' Nada foi enviado !';



                ?>

                <p class="text-center">  <?php echo $retVal; ?></p>


                <?php
                // Começa
                if (isset($_FILES['arquivo'])) {
                   date_default_timezone_set('America/Bahia');; //Definindo timezone padrão


                    $nome = $_FILES['arquivo']['name'];
                    $ext = strtolower(substr($_FILES['arquivo']['name'], -4)); //Pegando extensão do arquivo
                    $new_name = date("Y.m.d-H.i.s") . '_' . $nome . $ext; //Definindo um novo nome para o arquivo
                    $dir = '/uploads'; //Diretório para uploads
                    $uploadfile = basename($_FILES['arquivo']['name']);
    //move_uploaded_file($_FILES['arquivo'], $dir ); //Fazer upload do arquivo
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile); //Fazer upload do arquivo

                    // chamada de arquivos
                    // require_once 'Classes/conecta.php';
                    require_once "Classes/PHPExcel.php";
                    
                    require_once './Classes/functions.php';
                    $gravaBd = new funcoes();




//DEFININDO TIPO DE ARQUIVO
                    $fileName = $_FILES['arquivo']['name'];
                    //$fileName = "matutino.xls";

                    /** detecta automaticamente o tipo de arruivo que será carregado */
                    $excelReader = PHPExcel_IOFactory::createReaderForFile($fileName);

/// Definindo manualmente.
// $inputFileType = 'Excel5';
                    $inputFileType = 'Excel2007';
// $inputFileType = 'Excel2003XML';
// $inputFileType = 'OOCalc';
// $inputFileType = 'SYLK';
// $inputFileType = 'Gnumeric';
// $inputFileType = 'CSV';
                    $excelReader = PHPExcel_IOFactory::createReader($inputFileType);

//Se não precisarmos de formatação
                    $excelReader->setReadDataOnly();
//carregar apenas algumas abas
                    $loadSheets = ('Resultados');
                    $excelReader->setLoadSheetsOnly($loadSheets);
                    $excelObj = $excelReader->load($fileName);
                    $excelObj->getActiveSheet()->toArray(null, true, true, true);
//Pega os nomes das abas
                    $worksheetNames = $excelObj->getSheetNames($fileName);
                    $return = array();
                    foreach ($worksheetNames as $key => $sheetName) {
//define a aba ativa
                        $excelObj->setActiveSheetIndexByName($sheetName);
//cria um array com o nome da aba como índice
                        $return[$sheetName] = $excelObj->getActiveSheet()->toArray(null, true, true, true);
//echo $return[$sheetName] .'</br>';
                    }


//exibe o array
// Percorre o arquivo apartir da linha 7
                    for ($x = 7; $x < count($return[$sheetName]); $x++) {
                        // Passando os valores da array para avariavel $dados
                        $dados = $return[$sheetName][$x];

//Buscando indeci da array
                        $key = array_keys($dados);

                        $teste2 = array_values($dados);
//  echo 'pres';
//   print_r($teste2) ;
//    echo 'pres';
                        if ($teste2[0] != '') {
                            ?>
                            <div class="alert alert-info">
                            <?php
                            echo 'Nome Aluno :' . $nomeAlunoTela = $teste2[0] . '</br>';
                            echo 'Matricula :' . $matriculaAlunoTela = $teste2[1] . '</br>';
                            echo 'Código :' . $codgoTela = $teste2[2] . '</br>';
                            // if ($matriculaAlunoTela = ' ' or $matriculaAlunoTela = null ) {
                            //     echo "MATRICULA EM BRANCO!!!!!";
                            //    exit;
                            // }
                            $nomeAluno = $teste2[0];
                           
                            $matriculaAluno = $teste2[1];
                            $codgo = $teste2[2];

                            $nota1 = $teste2[3] == 'ü' ? 1 : 0;
                            $nota2 = $teste2[4] == 'ü' ? 1 : 0;
                            $nota3 = $teste2[5] == 'ü' ? 1 : 0;
                            $nota4 = $teste2[6] == 'ü' ? 1 : 0;
                            $nota5 = $teste2[7] == 'ü' ? 1 : 0;
                            $nota6 = $teste2[8] == 'ü' ? 1 : 0;
                            $nota7 = $teste2[9] == 'ü' ? 1 : 0;
                            $nota8 = $teste2[10] == 'ü' ? 1 : 0;
                            $nota9 = $teste2[11] == 'ü' ? 1 : 0;
                            $nota10 = $teste2[12] == 'ü' ? 1 : 0;
                            $nota11 = $teste2[13] == 'ü' ? 1 : 0;
                            $nota12 = $teste2[14] == 'ü' ? 1 : 0;
                            $nota13 = $teste2[15] == 'ü' ? 1 : 0;
                            $nota14 = $teste2[16] == 'ü' ? 1 : 0;
                            $nota15 = $teste2[17] == 'ü' ? 1 : 0;
                            $nota16 = $teste2[18] == 'ü' ? 1 : 0;
                            $nota17 = $teste2[19] == 'ü' ? 1 : 0;
                            $nota18 = $teste2[20] == 'ü' ? 1 : 0;
                            $nota19 = $teste2[21] == 'ü' ? 1 : 0;
                            $nota20 = $teste2[22] == 'ü' ? 1 : 0;


                            $soma = 0; // Inicializa a variável 
                            for ($i = 3; $i <= 22; $i++) {
                                if (isset($teste2[$i])) { // Verifica se o índice está no array
                                    // verifica os carcteres 
                                    if ($teste2[$i] == 'ü') {
                                        $n1 = 1; //  Trasformando o Caracter  ü em 1
                                        $soma += $n1;
                                    } else {
                                        $n2 = 0; //  Trasformando o Caracter  û em 0  
                                    }

                                    // echo $n1;
                                    //echo $n2 .'</br>';
                                }
                            }


                            //Mutiplicador 
                            $mutiplicador = 0.05;

                            $mutiplicado = $soma * $mutiplicador;
                            echo '$mutiplicado  ' . $mutiplicado . '</br>';

                            // CONECÇÃO BANCO DE DADOS 
                             include './Classes/conecta.php';
                            // Preparando o insert 
                            $nomeAluno;
                            $matriculaAluno;
                            $codgo;
                            $periodoLetivo = '2018/2';
                            $mutiplicado;
                            $data_insert = date("d/m/Y H:i:s");
                            $date_updat = date("d/m/Y H:i:s");
                       
                            
                            // Verificando a existencia do aluno na base de dados
                        
                                $matricula = $matriculaAluno;
                                 $matricula2 = substr('000000000'.$matricula, -9);
                            
                            $retorno = $gravaBd->verifica($matricula2,$periodoLetivo);
                            //print_r($retorno);
                            
                            $rs_notas = pg_query($bd_licia, $retorno) or die("Erro ao checar notas da integradora!! " . $retorno ); 
                         
                            $chaca_notas = pg_fetch_array($rs_notas);
                            // echo 'aqi'. $chaca_notas ;
                              // print_r($chaca_notas);
                            //$verifica = pg_num_rows($chaca_notas);
                            // pegando o id para o update
                              $id =  $chaca_notas[0];
                            
                            if($chaca_notas == NULL){
                                
                                $matricula = $matriculaAluno;
                                 $matricula2 = substr('000000000'.$matricula, -9);
                                
                              $insert = $gravaBd->insert($nomeAluno, $matricula2, $codgo, $data_insert, $date_updat, $periodoLetivo, $nota1, $nota2, $nota3, $nota4, $nota5, $nota6, $nota7, $nota8, $nota9, $nota10, $nota11, $nota12, $nota13, $nota14, $nota15
                                    , $nota16, $nota17, $nota18, $nota19, $nota20, $mutiplicado);

                            $rs_notas = pg_query($bd_licia, $insert) or die("Erro ao inserir notas da integradora!! " . $insert);  
                                
                            } else {
                            
                                $update = $gravaBd->update($id,$nomeAluno, $matricula2, $codgo, $data_insert, $date_updat, $periodoLetivo, $nota1, $nota2, $nota3, $nota4, $nota5, $nota6, $nota7, $nota8, $nota9, $nota10, $nota11, $nota12, $nota13, $nota14, $nota15, $nota16, $nota17, $nota18, $nota19, $nota20, $mutiplicado);
                                
                                $rs_notas = pg_query($bd_licia, $update) or die("Erro ao atualizar notas da integradora!! " . $update); 
                                ?>
                                <p> Atualização </p>
                                <?php 
                                
                            }
                            
                            
                            include './Classes/desconecta.php';
                            
                            ?>
                            </div>
                                <?php
                            }
                        }

                        move_uploaded_file($_FILES['arquivo']['name'], $dir ); //Fazer upload do arquivo
                    }
//                    }

                    /// temina



                    
                    ?>

            </div>
            </div>
        </div>
        </div>

    </body>
</html>