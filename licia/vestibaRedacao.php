<?php
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php. */
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


        <div class="container">

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
//                if ( isset( $_POST['Submit'] ) ) {





$retVal = (isset($_FILES['arquivo']['name'])) ? $nomeArquivo = $_FILES['arquivo']['name'] : ' Nada foi enviado !';
?>

                <p class="text-center">  <?php echo $retVal; ?></p>


                <?php
                // Começa
                if (isset($_FILES['arquivo'])) {
                    date_default_timezone_set('America/Bahia');
                    //Definindo timezone padrão


                    $nome = $_FILES['arquivo']['name'];
                    $ext = strtolower(substr($_FILES['arquivo']['name'], -4)); //Pegando extensão do arquivo
                    $new_name = date("Y.m.d-H.i.s") . '_' . $nome . $ext; //Definindo um novo nome para o arquivo
                    $dir = '/uploads'; //Diretório para uploads
                    $uploadfile = basename($_FILES['arquivo']['name']);
                    //move_uploaded_file($_FILES['arquivo'], $dir ); //Fazer upload do arquivo
                    move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile); //Fazer upload do arquivo
                    // chamada de arquivos
                    // require_once 'Classes/conecta.php';
                   // require_once "Classes/PHPExcel.php";

//                    require_once './Classes/functions.php';
//                    
//                    $gravaBd = new funcoes();
                    
                    require_once './Classes/functionVestiba.php';
                    
                    $funLicia = new vestibalm();
                    
                    




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
                    for ($x = 0; $x < count($return[$sheetName]); $x++) {
                        // Passando os valores da array para avariavel $dados
                        $dados = $return[$sheetName][$x];

//Buscando indeci da array
                        $key = array_keys($dados);

                        $teste2 = array_values($dados);
  echo 'pres';
 print_r($teste2) ;
   echo 'pres';
                        if ($teste2[0] != '') {
                            ?>
                            <div class="alert alert-info">
                            <?php
                          // echo 'Nome Aluno :' . $nomeAlunoTela = $teste2[0] . '</br>';
                            $mt = str_replace('.', '', $teste2[0]);
                            echo 'Matricula :' . $matriculaAlunoTela = str_replace('-', '', $mt)  . '</br>';
                            echo 'Código :' . $codgoTela = $teste2[2] . '</br>';
                            $nomeAluno = $teste2[0];
                          
                            //retirando caracter da string
                            $matr1 = str_replace('.', '', $teste2[1]);
                            $matr2= str_replace('-', '',  $matr1);
                            $matriculaAluno = $matr2;
                            $notaRedacao = $teste2[2];

                             
                            

                            // CONECÇÃO BANCO DE DADOS 
                            include './Classes/conecta.php';
                            // Preparando o insert 
                            
//                            $linguaPortu;
//                            $cienciasHumanas;
//                            $cienciasNatureza;
//                            $matematica;
//                            
//                            $nomeAluno;
//                            $matriculaAluno;
//                            $codgo;
                            $periodoLetivo = '2018.1';
                            $mutiplicado;
                            $data_insert = date("d/m/Y H:i:s");
                            $date_updat = date("d/m/Y H:i:s");


                            // Verificando a existencia do aluno na base de dados

                            $matricula2 = $matriculaAluno;
                           // $matricula2 = substr('000000000' . $matricula, -9);

                            $retorno = $funLicia ->licia_verifica($matricula2);
                            //print_r($retorno);

                            $rs_notas = pg_query($bd_licia, $retorno) or die("Erro ao checar notas da vestibular!! " . $retorno);

                            $checa_notas = pg_fetch_array($rs_notas);
                            // echo 'aqi'. $chaca_notas ;
                             print_r($checa_notas);
                            $verifica = pg_num_rows($rs_notas);
                            // pegando o id para o update
                            $id = $checa_notas[0];
                          //  echo '$checa_notas'. $id;
                            //echo 'Verifica'.$verifica;
                            
                           // exit();
                            if ($verifica == 0) {

                               // $matricula = $matriculaAluno;
                                //$matricula2 = substr('000000000' . $matricula, -9);
 $matricula2 = $matriculaAluno;
                               
                                  echo 'Aluno não encontrado na base de dados! Favor verificar nos Arquivos!';

                               // $rs_notas = pg_query($bd_licia, $insert) or die("Erro ao inserir notas do vestibular!! " . $insert);
                            } else {

                                $update = $funLicia->licia_NotaRed_Update($matricula2,$notaRedacao,$id ,$date_updat);
echo $update;
                               // $rs_notas = pg_query($bd_licia, $update) or die("Erro ao atualizar notas do vestibular!! " . $update);
                                
                               // echo 'Nome do Aluno'.$nomeAluno.'<br>';
                                 echo 'Matricula'.$matricula2.'<br>';
                            }


                            include './Classes/desconecta.php';
                            ?>
                            </div>
                                <?php
                            }
                        }

                        move_uploaded_file($_FILES['arquivo']['name'], $dir); //Fazer upload do arquivo
                    }
//                    }
                    /// temina
                    ?>

            </div>
            <!--Footer-->
            <footer class="page-footer blue center-on-small-only">

                <!--Footer Links-->
                <div class="container-fluid">
                    <div class="row">

                        <!--First column-->
                        <div class="col-md-6">
                            <h5 class="title">Sistema de processamento de arquivos - SPA</h5>
                            <p>.</p>
                        </div>
                        <!--/.First column-->

                        <!--Second column-->
<!--                        <div class="col-md-6">
                            <h5 class="title">Links</h5>
                            <ul>
                                <li><a href="#!">Link 1</a></li>
                                <li><a href="#!">Link 2</a></li>
                                <li><a href="#!">Link 3</a></li>
                                <li><a href="#!">Link 4</a></li>
                            </ul>
                        </div>-->
                        <!--/.Second column-->
                    </div>
                </div>
                <!--/.Footer Links-->

                <!--Copyright-->
                <div class="footer-copyright">
                    <div class="container-fluid">
                        © 2018 Copyright: <a href="https://www.ucsal.br"> Ucsal - Salvador BA </a>

                    </div>
                </div>
                <!--/.Copyright-->

            </footer>
            <!--/.Footer-->
        </div>
        <style type="text/css">


            .foot
            {
                background-color:marron;
            }

        </style>
    </body>
</html>