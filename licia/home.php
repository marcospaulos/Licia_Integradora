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

<html>
<head>
  <meta charset="utf-8">
  <title>

  </title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!-- MetisMenu CSS -->
  <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

  body{
  margin:0;
  background-color:#013e4e;
  overflow:auto;

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

<body>

  <?php 
  include './Classes/conecta.php';
  require_once './Classes/functions.php';
  
  $func = new funcoes();
  
  $qtnp = $func->quantidadeProvas();
  $rs_qtnp = pg_query($bd_licia, $qtnp) or die("Erro ao checar notas da integradora!! " . $qtnp ); 
  $provas = pg_fetch_array($rs_qtnp);

  $qtnz =$func->quantNotaZero();
  $rs_qtnz = pg_query($bd_licia, $qtnz) or die("Erro ao checar notas da integradora!! " . $qtnz ); 
  $notazero = pg_fetch_array($rs_qtnz);
  
  $qtn = $func->quantNota();

  $rs_qtn = pg_query($bd_licia, $qtn) or die("Erro ao checar notas da integradora!! " . $qtn ); 
  $quantNota  = pg_fetch_array($rs_qtn);
  
  include './Classes/desconecta.php';
  INCLUDE_ONCE 'include/barra.php';

  ?>


  <div class="container-fluid">
    <div class="row content">

      <?php 
      include 'include/menu1.php';
      ?>
      <div class="col-sm-10">


        <div class="jumbotron text-center">
          <h2>Apuração de notas integradora !</h2>
          <p>Pr.Licia Margarida</p> 
        </div>

        <!-- Primeira dive -->
        <div class="col-lg-3 col-md-6">

          <div class="alert alert-success" role="alert"><h3><?php echo $provas[0]; ?></h3>
            <strong>PROVAS COMPUTADAS</strong>  

          </div>
          <div class="alert alert-warning" role="alert"><h3><?php echo $notazero[0]; ?></h3> 
            <strong> PROVAS COMPUTADAS COM NOTA ZERO
            </strong>
          </div>
          <div  class="alert alert-info" role="alert"><h3> <?php echo $quantNota[0]; ?></h3>
            <strong>PROVAS COMPUTADAS COM NOTA </strong> 

          </div>


        </div>

        <!-- Final Primeira dive -->


        <!-- Segunda div -->
        <div class="col-lg-3 col-md-6">

          <div class="alert alert-success" role="alert"><h3><?php  ?></h3>
            <strong></strong>  

          </div>
          <div class="alert alert-warning" role="alert"><h3><?php  ?></h3> 
            <strong> 
            </strong>
          </div>
          <div  class="alert alert-info" role="alert"><h3> <?php  ?></h3>
            <strong> </strong> 

          </div>


        </div>

        <!-- Final da Segunda div -->

        <!-- Terceira  div -->
        <div class="col-lg-3 col-md-6">

          <div class="alert alert-success" role="alert"><h3><?php  ?></h3>
            <strong></strong>  

          </div>
          <div class="alert alert-warning" role="alert"><h3><?php  ?></h3> 
            <strong> 
            </strong>
          </div>
          <div  class="alert alert-info" role="alert"><h3> <?php  ?></h3>
            <strong></strong> 

          </div>


        </div>

        <!-- final da Terceira  div -->

        <!-- Quarta div -->
        <div class="col-lg-3 col-md-6">

          <div class="alert alert-success" role="alert"><h3><?php  ?></h3>
            <strong></strong>  

          </div>
          <div class="alert alert-warning" role="alert"><h3><?php  ?></h3> 
            <strong> 
            </strong>
          </div>
          <div  class="alert alert-info" role="alert"><h3> <?php  ?></h3>
            <strong></strong> 

          </div>


        </div>
        <!--final da  Quarta div -->

      </div>


    </div>
  </div>
</div>
<footer class="container-fluid">
  <p>Ucsal 2017/2</p>
</footer>







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