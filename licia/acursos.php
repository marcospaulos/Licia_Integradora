<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once './Classes/conecta.php';
//require_once './Classes/conectaTotvs.php';
require_once './Classes/functions.php';
//require_once './Classes/functionsTotvs.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script>
      
      //Configuracoes
var dashboard = document.getElementById('grafico_pizza');
var docHeight = document.documentElement.clientHeight - 20; // - 20 jsFiddle hack
var docWidth = document.documentElement.clientWidth - 20;
dashboard.height = docHeight;
dashboard.width = docWidth;
var ctx;
// objeto para ser preenchido do tipo Grafico de Pie(Pizza)
var grafico = {
    espessura: 20,
    corLinha:'#fff',
    cores: ['#616161','#D70060','#98C73D','#F18D05','#61AE24','#00A9E0'],
    gap: 5,
    dataProvider: [],
    init: function () {
        var total = 0;
        var anguloAntigo =0;
        for(var i=0;i<this.dataProvider.length;i++)
        {
            total +=this.dataProvider[i];
        }
        ctx = dashboard.getContext('2d');
        
        for(var i=0;i<this.dataProvider.length;i++)
        {
           var proporcao = this.dataProvider[i]/total;
           var  fatia = 2 * Math.PI * proporcao;
            ctx.beginPath(); 
            var  angulo = anguloAntigo+fatia;
            ctx.fillStyle= this.cores[i];
            ctx.arc(docWidth/2,docHeight/2,docWidth/4,anguloAntigo,angulo);
            ctx.lineTo(docWidth/2,docHeight/2);
            ctx.lineWidth = this.gap;
            ctx.strokeStyle = this.corLinha;
            ctx.closePath();
            ctx.fill();
            ctx.stroke();
            anguloAntigo += fatia;
        }
    }
}

function coresAleatorias()
{
    return "#" + Math.random().toString(16).slice(2, 8);
}
      
      </script>   
      
      <style>
          
          canvas {
    background:#f3f3f3;
    overflow:scroll !important;
    transform: translate3d(0, 0, 0);
}
      </style>
  
</head>

  <?php
        INCLUDE_ONCE 'include/barra.php';
       
        ?>

<body>
 
<div class="container">
    
  <h2>Accordion Example</h2>
  <p><strong>Note:</strong> The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p>
  
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Alunos por curso</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
          <div class="panel-body">
              
              
                <nav class="navbar navbar-nav bg-faded">
                        <form class="form-inline pull-xs-right" action="#" method="post">
                            <div class="form-group">
                                <label for="sel1">Selecione o Curso</label>
                                <select class="form-control" name="Curso" id="sel1">
                                    <option  >Escolha</option>
                                    <option  value='FILOSOFIA' >FILOSOFIA</option>
                                    <option value='DIREITO'>DIREITO</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <button class="btn btn-outline-success"   value="enviar" type="submit">Buscar</button>
                        </form>
                    </nav>
              </br> </br>
</br>              
              <!--  php -->

<?php
                    if (isset($_POST['Curso'])) {




                        $curso = $_POST['Curso'];

                        $busca1 = "select NOME,MATRICULA, EMAIL,CURSO FROM corporerm.dbo.ZINTEGRACAOEAD_LISTA_ALUNOS WHERE CURSO  = '$curso'";
                        $rsCurso = mssql_query($busca1, $bd_totvs) or die("Erro consultar disciplinas.");

                        $retorno = mssql_fetch_array($rsCurso);
                        //Numero de alunos no curso
$alunosCurso = mssql_num_rows($rsCurso);

                        mssql_close($bd_totvs);
 $total = 0;
 $total0z = 0;
 $totalAvi = 0;
 
                        while ($row = mssql_fetch_array($rsCurso)) {


                            $func = new funcoes();

                            $matricula = $row['MATRICULA'];

                            $bsc = $func->buscaNotas($matricula);
                            $rs_qtnp = pg_query($bd_licia, $bsc) or die("Erro ao checar notas da integradora!! " . $bsc);

                            $ali = pg_fetch_array($rs_qtnp);
                           
                        $numerAlunosAvi = pg_num_rows($rs_qtnp);
                        
                        $totalAvi = ($totalAvi + $numerAlunosAvi);
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
                                    
                                    $total = ($total + $soma);
                                    $total0z = ($total0z + $soma0);
                                }// fim do 2º for
                                
                            }// verifca retorno
                            $somaZ = (100*$soma)/20;
                            $soma0Z = (100*$soma0)/20;
   
                            ?>
              
               <div class="row ">  
                                        <div class="col-6 col-md-4">
                                        <p> <?php echo utf8_encode($row['NOME']); ?></p>
                                        <p> <?php echo $row['MATRICULA']; ?></p>
                                        <p> <?php echo utf8_encode($row['CURSO']); ?></p>

                                        <div class="progress">

                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $soma; ?>"
                                                 aria-valuemin="0" aria-valuemax="20" style="width:<?php echo $somaZ; ?>%">
            <?php echo $soma; ?>% success
                                            </div>
                                        </div>
            <?php //if($soma0 =! 0){  ?>

                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $soma0; ?>"
                                                 aria-valuemin="0" aria-valuemax="20" style="width:<?php echo $soma0Z; ?>%">
            <?php echo $soma0; ?>% Erros
                                            </div>
                                        </div>
            <?php //}  ?>

</div>
                                    </div>
              
              
              
              <?php     }// while
              
              
  
    print_r($total);
    echo '</br>';
    echo $totalAvi;
    echo '</br>';
    $media = ($total /$totalAvi);
    
     echo '</br>';
    echo $media.'<-aqui';
    echo '</br>';
    print_r($total0z); 
 
                        
                    }//se existe post
                                ?>              
              <!-- fi php -->
              
              
              
              
              
          </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Collapsible Group 2</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
          <div class="panel-body">
             <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:70%">
    <span class="sr-only">70% Complete</span>
  </div>
</div>
              
          </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Collapsible Group 3</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
  </div> 
</div>
    
</body>

</html>
