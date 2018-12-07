<?php
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php. */
session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:index.php');
}

$logado = $_SESSION['login'];
date_default_timezone_set('America/Bahia');
?>



<html lang="pt-br">
    <head>
        <title> SPA - Vestibular  </title>
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
            <h1 class="text-center"> SPA - Vestibular</h1>

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
                    require_once "Classes/PHPExcel.php";

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
                    for ($x = 7; $x < count($return[$sheetName]); $x++) {
                        // Passando os valores da array para avariavel $dados
                        $dados = $return[$sheetName][$x];

//Buscando indeci da array
                        $key = array_keys($dados);

                        $teste2 = array_values($dados);
//  echo 'pres';
//  print_r($teste2) ;
//    echo 'pres';
                        if ($teste2[0] != '') {
                            ?>
                            <div class="alert alert-info">
                            <?php
                            echo 'Nome Aluno :' . $nomeAlunoTela = $teste2[0] . '</br>';
                            $mt = str_replace('.', '', $teste2[1]);
                            echo 'Matricula :' . $matriculaAlunoTela = str_replace('-', '', $mt)  . '</br>';
                            echo 'Código :' . $codgoTela = $teste2[2] . '</br>';
                            $nomeAluno = $teste2[0];
                          
                            //retirando caracter da string
                            $matr1 = str_replace('.', '', $teste2[1]);
                            $matr2= str_replace('-', '',  $matr1);
                            $matriculaAluno = $matr2;
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
                              $nota21 = $teste2[23] == 'ü' ? 1 : 0;
                              $nota22 = $teste2[24] == 'ü' ? 1 : 0;
                              $nota23 = $teste2[25] == 'ü' ? 1 : 0;
                              $nota24 = $teste2[26] == 'ü' ? 1 : 0;
                              $nota25 = $teste2[27] == 'ü' ? 1 : 0;
                              $nota26 = $teste2[28] == 'ü' ? 1 : 0;
                              $nota27 = $teste2[29] == 'ü' ? 1 : 0;
                              $nota28 = $teste2[30] == 'ü' ? 1 : 0;
                              $nota29 = $teste2[31] == 'ü' ? 1 : 0;
                              $nota30 = $teste2[32] == 'ü' ? 1 : 0;
                              $nota31 = $teste2[33] == 'ü' ? 1 : 0;
                              $nota32 = $teste2[34] == 'ü' ? 1 : 0;
                              $nota33 = $teste2[35] == 'ü' ? 1 : 0;
                              $nota34 = $teste2[36] == 'ü' ? 1 : 0;
                              $nota35 = $teste2[37] == 'ü' ? 1 : 0;
                              $nota36 = $teste2[38] == 'ü' ? 1 : 0;
                              $nota37 = $teste2[39] == 'ü' ? 1 : 0;
                              $nota38 = $teste2[40] == 'ü' ? 1 : 0;
                              $nota39 = $teste2[41] == 'ü' ? 1 : 0;
                             $nota40 = $teste2[42] == 'ü' ? 1 : 0;
                             // $nota41 = $teste2[43] == 'ü' ? 1 : 0;
                            //echo  $nota42 = $teste2[44] == 'ü' ? 1 : 0;

                            // Pegano as notas de linguagens 
                            //exit();
                            $linguaPortu = 0; // Inicializa a variável
                            
                            $lin = 0;                            
                            for ($i = 3; $i <= 14; $i++) {
                                if (isset($teste2[$i])) { // Verifica se o índice está no array
                                    // verifica os carcteres 
                                    if ($teste2[$i] == 'ü') {
                                        $lin = 1; //  Trasformando o Caracter  ü em 1
                                        // de 1 a 12
                                    } else {
                                      $lin = 0; //  Trasformando o Caracter  û em 0  
                                    }
                                    $linguaPortu += $lin;                                    

                                    // echo $n1;
                                    //echo $n2 .'</br>';
                                } else {
                                echo 'erro na questão '.($i-2);    
                                }
                                
                                
                            }// Fim Linguagens 


                            echo 'Nota Liguagen ' . $linguaPortu . '</br>';


                            // Pegando as notas Ciencias Humanas 


                            $cienciasHumanas = 0; // Inicializa a variável 

                            $ch = 0;                            
                            for ($i = 15; $i <= 24; $i++) {
                                if (isset($teste2[$i])) { // Verifica se o índice está no array
                                    // verifica os carcteres 
                                    if ($teste2[$i] == 'ü') {
                                        $ch = 1; //  Trasformando o Caracter  ü em 1
                                        // de 1 a 12
                                    } else {
                                        $ch = 0; //  Trasformando o Caracter  û em 0  
                                    }
                                $cienciasHumanas += $ch;                                    
                                }
                            }// Fim ciencias Humanas 

                            echo 'Nota Ciências Humanas ' . $cienciasHumanas . '</br>';


                            // Pegandos as notas Ciências da Natureza 


                            $cienciasNatureza = 0;
                            
                            $cn = 0;
                            for ($i = 25; $i <= 36; $i++) {
                                if (isset($teste2[$i])) { // Verifica se o índice está no array
                                    // verifica os carcteres 
                                    if ($teste2[$i] == 'ü') {
                                        $cn = 1; //  Trasformando o Caracter  ü em 1
                                        // de 1 a 12
                                    } else {
                                        $cn = 0; //  Trasformando o Caracter  û em 0  
                                    }
                                    $cienciasNatureza += $cn;
                                }
                            }// Fim ciencias Natureza 

                            echo 'Nota Ciências da  Natureza  ' . $cienciasNatureza . '</br>';



                            // Pegando notas Matemática

                            $matematica = 0;

                            $mt = 0;                            
                            for ($i = 37; $i <= 42; $i++) {
                                if (isset($teste2[$i])) { // Verifica se o índice está no array
                                    // verifica os carcteres 
                                    if ($teste2[$i] == 'ü') {
                                        $mt = 1; //  Trasformando o Caracter  ü em 1
                                        // de 1 a 12
                                    } else {
                                        $mt = 0; //  Trasformando o Caracter  û em 0  
                                    }
                                    $matematica += $mt;                                    
                                }
                            }// Fim MATÉMATICA 

                            echo 'Notas Matemática e suas Tecnologias   ' . $matematica . '</br>';
                               $nota_redacao = $teste2[43];
                            echo 'Notas Redação  ' . $nota_redacao . '</br>';
                            
                            

                            // CONECÇÃO BANCO DE DADOS 
                            include './Classes/conecta.php';
                            // Preparando o insert 
                            
                            $linguaPortu;
                            $cienciasHumanas;
                            $cienciasNatureza;
                            $matematica;
                            
                            $nomeAluno;
                            $matriculaAluno;
                            $codgo;
                            $periodoLetivo = '2018.1';
                            $mutiplicado;
                            $data_insert = date("d/m/Y H:i:s");
                            $date_updat = date("d/m/Y H:i:s");


                            // Verificando a existencia do aluno na base de dados

                            $matricula2 = $matriculaAluno;
                           // $matricula2 = substr('000000000' . $matricula, -9);

                            $retorno = $funLicia ->licia_verifica($matricula2);
                            //print_r($retorno);

                            $rs_notas = pg_query($bd_licia, $retorno) or die("Erro ao checar notas da integradora!! " . $retorno);

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
                                $insert = $funLicia->licia_insert($nomeAluno, $matricula2, $codgo, $data_insert, $date_updat, $periodoLetivo, $nota1, $nota2, $nota3, $nota4, $nota5, $nota6, $nota7, $nota8, $nota9, $nota10, $nota11, $nota12, $nota13, $nota14, $nota15
                                        , $nota16, $nota17, $nota18, $nota19, $nota20,$nota21,$nota22,$nota23,$nota24,$nota25,$nota26,$nota27,$nota28,
     $nota29,$nota30,$nota31,$nota32,$nota33,$nota34,$nota35,$nota36,$nota37,$nota38,$nota39,$nota40,$nota_redacao,$linguaPortu, 
            $cienciasHumanas,$cienciasNatureza,$matematica);

                                $rs_notas = pg_query($bd_licia, $insert) or die("Erro ao inserir notas do vestibular!! " . $insert);
                            } else {

                                $update = $funLicia->licia_update($id,$nomeAluno,$matricula2,$codgo,$date_updat,$periodoLetivo,$nota1,
    $nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,$nota12,$nota13,$nota14,$nota15
    ,$nota16, $nota17,$nota18,$nota19,$nota20,$nota21,$nota22,$nota23,$nota24,$nota25,$nota26,$nota27,$nota28,
     $nota29,$nota30,$nota31,$nota32,$nota33,$nota34,$nota35,$nota36,$nota37,$nota38,$nota39,$nota40,$nota_redacao,$linguaPortu, 
            $cienciasHumanas,$cienciasNatureza,$matematica);

                                $rs_notas = pg_query($bd_licia, $update) or die("Erro ao atualizar notas do vestibular!! " . $update);
                                
                                echo 'Nome do Aluno'.$nomeAluno.'<br>';
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
            </div>
        </div>
        <style type="text/css">


            .foot
            {
                background-color:marron;
            }

        </style>
    </body>
</html>