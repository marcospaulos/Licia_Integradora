

<?php

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
<div class="container">

        <div class="col-sm-6">

           <form class="form" action="#" method="post" >
              <div class="form-group">
               
                <p  class="col-1 text-nowrap "><h3>Informe o nome do arquivo!</h3></p>
            </div>
             <div class="form-group">
                 <label for="exampleSelect1" >Escolha o periodo Letivo </label>
    <select class="form-control " name="periodo" id="periodo">
      <option value="2017/2">2017/2</option>
      <option value="2018/1">2018/1</option>
    </select>
  </div>
            <button type="submit" class="btn btn-primary">Exportar Arquivo</button>
        </form>
</div>
        <?php 
  // date_default_timezone_set('America/Bahia');
               $data = date('Y-m-d');
                 
        #VERIFICA SE O POST FOI FEITO
        //echo  $post = $_POST['nomeArquivo'];
         $busBd= new funcoes();
         
        IF( isset( $_POST['periodo']) and $_POST['periodo'] != NULL){
           $periodo =  $_POST['periodo'];
           echo "string". $periodo  ;
         // output headers so that the file is downloaded rather than displayed


include './Classes/conecta.php';
date_default_timezone_set('America/Bahia');
$results = pg_query("select matrcula_aluno,periodo_letivo,multiplicada from integradora  where  periodo_letivo ='2018/1'");
//select matrcula_aluno,periodo_letivo,multiplicada from integradora  where  periodo_letivo ='$periodo'
   include './Classes/desconecta.php';
$list = pg_fetch_array($results);
while ($list = pg_fetch_array($results)) { 
//for($i = 0; $i < count($list); ++$i) {

  echo $matricula = $list['matrcula_aluno'];
echo $periodo_letivo= $list['periodo_letivo'];
  echo $multiplicada = $list['multiplicada'];
  
  $csv= $busBd->csv($matricula, $periodo_letivo, $multiplicada);
  
  echo 'Feito';
 
}
$array_csv = pg_fetch_array($results);
$filename = "NotasAVI". $data.".txt";
 $dowload_csv = $busBd->array_to_csv_download($array_csv, $filename);
            
           } else {
              
               
           }

       

                    // $retornoB = pg_fetch_array($rs_busca);
                     //print_r($retornoB);


                  


        ?>

    
    </div>
</div>
</div>
<footer class="container-fluid">
    <p>Ucsal 2017/2</p>
</footer>


</body>
</html>
