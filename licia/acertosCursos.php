
<?php
require_once './Classes/conecta.php';
//require_once './Classes/conectaTotvs.php';
require_once './Classes/functions.php';
//require_once './Classes/functionsTotvs.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
header('content-type: text/html; charset=utf-8');
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>

        </title>


        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <style type="text/css">

            .vertical-menu {
                width: 200px; /* Set a width if you like */
            }

            .vertical-menu a {
                background-color: #eee; /* Grey background color */
                color: black; /* Black text color */
                display: block; /* Make the links appear below each other */
                padding: 12px; /* Add some padding */
                text-decoration: none; /* Remove underline from links */
            }

            .vertical-menu a:hover {
                background-color: #ccc; /* Dark grey background on mouse-over */
            }

            .vertical-menu a.active {
                background-color: #4CAF50; /* Add a green color to the "active/current" link */
                color: white;
            }


        </style>
        <style>
            /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
            .row.content {height: 1500px}

            /* Set gray background color and 100% height */
            .sidenav {
                background-color: #f1f1f1;
                height: 100%;
            }

            /* Set black background color, white text and some padding */
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }
                .row.content {height: auto;}
            }
        </style>

    </head>
    <?php
//include 'classes';
    ?>


    <body>

        <?php
        INCLUDE_ONCE 'include/barra.php';
        ?>


        <div class="container-fluid">





            <div class="row content">
                <?php
                include 'include/menu1.php';
                ?>

                
                <div  class="col-sm">

                    <nav class="navbar navbar-nav bg-faded">
                        <form class="form-inline pull-xs-right" action="#" method="post">
                            <div class="form-group">
                                <label for="sel1">Selecione o Curso</label>
                                <select class="form-control" name="Curso" id="sel1">
                                    <option  value='FILOSOFIA' >FILOSOFIA</option>
                                    <option value='DIREITO'>DIREITO</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </nav>
</div>
<div class="col-sm-10">
                    <?php
                    if (isset($_POST['Curso'])) {




                        $curso = $_POST['Curso'];

                        $busca1 = "select NOME,MATRICULA, EMAIL,CURSO FROM corporerm.dbo.ZINTEGRACAOEAD_LISTA_ALUNOS WHERE CURSO  = '$curso'";
                        $rsCurso = mssql_query($busca1, $bd_totvs) or die("Erro consultar disciplinas.");

                        $retorno = mssql_fetch_array($rsCurso);


                        mssql_close($bd_totvs);

                        while ($row = mssql_fetch_array($rsCurso)) {


                            $func = new funcoes();

                            $matricula = $row['MATRICULA'];

                            $bsc = $func->buscaNotas($matricula);
                            $rs_qtnp = pg_query($bd_licia, $bsc) or die("Erro ao checar notas da integradora!! " . $bsc);

                            $ali = pg_fetch_array($rs_qtnp);

                            // Verifica retorno 
                            if (!empty($ali)) {


                                $teste2 = array_values($ali);
                                $soma = 0; // Inicializa a variável 
                                $soma0 = 0;
                                for ($i = 0; $i <= 19; $i++) {


                                    if (isset($teste2[$i])) { // Verifica se o índice está no array
                                        // verifica os carcteres 
                                        if ($teste2[$i] == 1) {
                                            $n1 = 1; //  Trasformando o Caracter  ü em 1
                                            $soma += $n1;
                                        } elseif ($teste2[$i] == 0) {
                                            # code...

                                            $n2 = 0; //  Trasformando o Caracter  û em 0 
                                            $n0 = 1;
                                            $soma0 += $n0;
                                        }

                                        // echo $n1;
                                        //echo $n2 .'</br>';
                                    }
                                }// fim do 2º for
                                ?>




                                <div class="container">
                                    <div class="row ">  
                                        <div class="col-sm">
                                        <p> <?php echo utf8_encode($row['NOME']); ?></p>
                                        <p> <?php echo $row['MATRICULA']; ?></p>
                                        <p> <?php echo utf8_encode($row['CURSO']); ?></p>

                                        <div class="progress">

                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
                                                 aria-valuemin="0" aria-valuemax="<?php echo $soma; ?>" style="width:<?php echo $soma; ?>%">
            <?php echo $soma; ?>% success
                                            </div>
                                        </div>
            <?php //if($soma0 =! 0){  ?>

                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20"
                                                 aria-valuemin="0" aria-valuemax="<?php echo $soma0; ?>" style="width:<?php echo $soma0; ?>%">
            <?php echo $soma0; ?>% Erros
                                            </div>
                                        </div>
            <?php //}  ?>

</div>
                                    </div>
                                </div>


                                        <?php
                                    }
                                }
                                ?>




                    <?php } ?>

                </div>
            </div>
        </div>
        <footer class="container-fluid">
            <p>Ucsal 2017/2</p>
        </footer>







    </body>
</html>




</body>
</html>