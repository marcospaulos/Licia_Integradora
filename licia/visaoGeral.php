

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





            <?php 

                   // if( isset($_POST['matricula']) ){


            $busBd= new funcoes();

            $busca = $busBd->buscaGeral();

            $rs_busca = pg_query($bd_licia, $busca) or die("Erro ao inserir notas da integradora!! " . $busca);  

                    // $retornoB = pg_fetch_array($rs_busca);
                     //print_r($retornoB);





            ?>
 <header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
                    
                </header>
            
            <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Brand" src="...">
      </a>
        
        
    </div>
  </div>
</nav>
            <table class="table table-sm table-hover table table-condensed table-responsive ">
                
                <thead>

               
                    <tr>

                     
                        <th>Matricula</th>
                        <th>Atualização</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>13</th>
                        <th>14</th>
                        <th>15</th>
                        <th>16</th>
                        <th>17</th>
                        <th>18</th>
                        <th>19</th>
                        <th>20</th>
                        <th>Periodo </th>
                        <th>Nota</th>

                    </tr>
                </thead>
                <tbody>


                  <?php 

                  while ($row = pg_fetch_array($rs_busca )) {

                    ?>                         
                    <tr>

                        
                        <td><?php echo  $row["matrcula_aluno"]; ?></td>
                        <td><?php echo  $row["date_updat"]; ?></td>
                        <td><?php echo  $row["nota1"]; ?></td>
                        <td><?php echo  $row["nota2"]; ?></td>
                        <td><?php echo  $row["nota3"]; ?></td>
                        <td><?php echo  $row["nota4"]; ?></td>
                        <td><?php echo  $row["nota5"]; ?></td>
                        <td><?php echo  $row["nota6"]; ?></td>
                        <td><?php echo  $row["nota7"]; ?></td>
                        <td><?php echo  $row["nota8"]; ?></td>
                        <td><?php echo  $row["nota9"]; ?></td>
                        <td><?php echo  $row["nota10"]; ?></td>
                        <td><?php echo  $row["nota11"]; ?></td>
                        <td><?php echo  $row["nota12"]; ?></td>
                        <td><?php echo  $row["nota13"]; ?></td>
                        <td><?php echo  $row["nota14"]; ?></td>
                        <td><?php echo  $row["nota15"]; ?></td>
                        <td><?php echo  $row["nota16"]; ?></td>
                        <td><?php echo  $row["nota17"]; ?></td>
                        <td><?php echo  $row["nota18"]; ?></td>
                        <td><?php echo  $row["nota19"]; ?></td>
                        <td><?php echo  $row["nota20"]; ?></td>
                        <td><?php echo   $row["periodo_letivo"]; ?></td>
                        <td><?php echo  $row["multiplicada"];  ?></td>
                    </tr>
                    <?php

                } ?>  




            </tbody>
        </table>
        <?php //}  ?>

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
