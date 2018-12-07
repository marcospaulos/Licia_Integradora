<?php

require_once'./phplot-6-2-0/phplot.php';
include './Classes/functions.php' ;
include './Classes/conecta.php';


//-----------------------------------------
$funcGraf = new funcoes();


# Definimos os dados do gráfico
//Acertos
 $qt_certos = $funcGraf->quantNota();
 $rs_qacertos = pg_query($bd_licia,$qt_certos) or die("Erro ao Buscar notas da integradora Acertos!! " . $qt_certos ); 
 
 $provasAcerto = pg_fetch_array($rs_qacertos);
  $acertos = $provasAcerto[0];
  
  $jun_acertos =utf8_decode( 'Pontuação ->'. $acertos); 
  
//Erros
$qterro = $funcGraf->quantNotaZero();
  $rs_qterro = pg_query($bd_licia, $qterro) or die("Erro ao Buscar notas da integradora Erros !! " . $qterro ); 
  
  // Bloco nota 1
  $r_nota1 = $funcGraf->nota1();
     $rs_1 = pg_query($bd_licia, $r_nota1) or die("Erro ao Buscar nota 1 da integradora  !! " . $r_nota1 ); 
         $arr_not =pg_fetch_array($rs_1);
               $nota1 = $arr_not[0];
                   $jun_nota1 = '1-'.$nota1;
 // Bloco nota 2
                   
      $r_nota2 = $funcGraf->nota2();
     $rs_2 = pg_query($bd_licia, $r_nota2) or die("Erro ao Buscar nota 2 da integradora  !! " . $r_nota2 ); 
         $arr_not2 =pg_fetch_array($rs_2);
               $nota2 = $arr_not2[0];
                   $jun_nota2 = '2-'.$nota2; 
                   
  // Bloco nota 3      
 
      $r_nota3 = $funcGraf->nota3();
     $rs_3 = pg_query($bd_licia, $r_nota3) or die("Erro ao Buscar nota 3 da integradora  !! " . $r_nota3 ); 
         $arr_not3 =pg_fetch_array($rs_3);
               $nota3 = $arr_not3[0];
                   $jun_nota3 = '3-'.$nota3;  
                   
    // Bloco nota 4 
                   
     $r_nota4 = $funcGraf->nota4();
     $rs_4 = pg_query($bd_licia, $r_nota4) or die("Erro ao Buscar nota 4 da integradora  !! " . $r_nota4 ); 
         $arr_not4 =pg_fetch_array($rs_4);
               $nota4 = $arr_not4[0];
                   $jun_nota4 = '4-'.$nota4; 
                   
    // Bloco nota 5  
                   
     $r_nota5 = $funcGraf->nota5();
     $rs_5 = pg_query($bd_licia, $r_nota5) or die("Erro ao Buscar nota 5 da integradora  !! " . $r_nota5 ); 
         $arr_not5 =pg_fetch_array($rs_5);
               $nota5 = $arr_not5[0];
                   $jun_nota5 = '5-'.$nota5;    
                   
    // Bloco nota 6 
                   
     $r_nota6 = $funcGraf->nota6();
     $rs_6 = pg_query($bd_licia, $r_nota6) or die("Erro ao Buscar nota 6 da integradora  !! " . $r_nota6 ); 
         $arr_not6 =pg_fetch_array($rs_6);
               $nota6 = $arr_not6[0];
                   $jun_nota6 = '6-'.$nota6; 
                   
   // Bloco nota 7                
                   
     $r_nota7 = $funcGraf->nota7();
     $rs_7 = pg_query($bd_licia, $r_nota7) or die("Erro ao Buscar nota 7 da integradora  !! " . $r_nota7 ); 
         $arr_not7 =pg_fetch_array($rs_7);
               $nota7 = $arr_not7[0];
                   $jun_nota7 = '7-'.$nota7; 
                   
    // Bloco nota 7    
                   
                   
                   
                   
                   
                   
  $provasErro = pg_fetch_array($rs_qterro);
  $erros = $provasErro[0];
  $jun_erro = 'Zeradas ->'. $erros; 
  
$dados = array(
		array($jun_acertos, $acertos),
                array($jun_nota1, $nota1),
                array($jun_nota2, $nota2),
                array( $jun_nota3,$nota3),
                array($jun_nota4, $nota4),
                array( $jun_nota5, $nota5),
                array($jun_nota6, $nota6),
                array( $jun_nota7, $nota7),
                array('nota8', 50),
                array('nota9', 50),
                array('nota10', 5000),
                array('nota11', 700),
                array('nota12', 50),
                array('nota13', 50),
                array('nota14', 50),
                array('nota15', 90),
                array('nota16', 50),
                array('nota17', 20),
                array('nota18', 50),
                array('nota19', 700),
                array('nota20', 50),
    
    
    
		
);


/* O Array são os valores que irão compor o gráfico, coloquei valores estático mas para um projeto dinâmico o ideal seria valores vindo de uma consulta de banco de dados onde seriam usados apenas variáveis. */
$data = $dados; array(array($_SESSION[date], 5, 4, 10, 0, 22, 0, 0),); 
 $plot = new PHPlot(700,510); #Espessura do gráfico, largura e altura.$plot->SetImageBorderType('none');
$plot->SetPlotType(bar); #Bars (Barras), Pie (Pizza), stackedbars (empilhado)
$plot->SetShading(20);   #Define o fefeito 3d e a largura do 3d, para ficar Flat é só definir 0
$plot->SetDataType('text-data'); #Barra normal

$plot->SetDataValues($data);$plot->SetPlotAreaWorld(0);  #Início da Contagem$plot->SetYTickIncrement(2); #Margem da contagem
$plot->SetTitle('AUTUAÇÕES');
$plot->SetYTitle(''); #Legenda no Eixo Y = Vertical$plot->SetXTitle(''); #Legenda no Eixo X = Horizontal

$plot->SetDataColors (array('#6b08b1','green','orange','blue','red','#0fa8ce','#814b15')); #Cores
$plot->SetYDataLabelPos('plotin'); #Plotin difine que aparecerá uma legenda a cima das barras.
$plot->SetLegend(array('MT', 'TA','CL','FT','X','MF','TE'));  #Legenda$plot->SetLegendPixels(40, 50); #Posição da legenda$plot->DrawGraph();  

include './Classes/desconecta.php';
?>
<html>
<body> 
     <img src="grafico.php"> 
</html> 
</body>