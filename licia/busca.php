
<?php
require_once './Classes/conecta.php';
require_once './Classes/functions.php';
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>

        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
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

                <div class="col-sm-10">


                    <nav class="navbar navbar-nav bg-faded">
                        <form class="form-inline pull-xs-right" action="#" method="post">
                            <input class="form-control" type="text" name="matricula" placeholder="Matricula">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </nav>
                    
                    
                    <?php 
                    
                    if( isset($_POST['matricula']) ){

                        $matriculaAluno = $_POST['matricula'];
                      $busBd= new funcoes();
                    
                    $busca = $busBd->busca($matriculaAluno);
                    
                     $rs_busca = pg_query($bd_licia, $busca) or die("Erro ao inserir notas da integradora!! " . $busca);  
                    
                    // $retornoB = pg_fetch_array($rs_busca);
                     //print_r($retornoB);
                    
                        
                   
                    
                    
                    ?>

                    <table class="table table-sm table-hover">
                        <thead>


                            <tr>

                                <th>Nome</th>
                                <th>Matricula</th>
                                <th>Codgo</th>
                                <th>Importação</th>
                                <th>Atualização</th>
                                <th>Periodo Letivo</th>
                                <th>Nota</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                              <?php 
                              
                              while ($row = pg_fetch_array($rs_busca )) {

                        ?>                         
                              

                                <td><?php echo  $row["nome_aluno"]; ?> </td>
                                <td><?php echo  $row["matrcula_aluno"]; ?></td>
                                <td><?php echo   $row["cod_aluno"]; ?></td>
                                <td><?php echo   $row["date_added"]; ?></td>
                                <td><?php echo  $row["date_updat"]; ?></td>
                                <td><?php echo   $row["periodo_letivo"]; ?></td>
                                <td><?php echo  $row["multiplicada"];  ?></td>

                              <?php

                           } ?>  

                               
                            </tr>

                        </tbody>
                    </table>
 <?php }  ?>

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