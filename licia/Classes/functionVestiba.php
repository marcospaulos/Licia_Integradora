<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class vestibalm {
    
    
    var $periodoLetivo = '2018.1';
    
    
    
    function licia_insert($nomeAluno,$matricula2,$codgo,$data_insert,$date_updat,$periodoLetivo,$nota1,
    $nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,$nota12,$nota13,$nota14,$nota15
    ,$nota16, $nota17,$nota18,$nota19,$nota20,$nota21,$nota22,$nota23,$nota24,$nota25,$nota26,$nota27,$nota28,
     $nota29,$nota30,$nota31,$nota32,$nota33,$nota34,$nota35,$nota36,$nota37,$nota38,$nota39,$nota40,$nota_redacao,$linguaPortu, 
            $cienciasHumanas,$cienciasNatureza,$matematica){
        
       $sql = "INSERT INTO public.vestibalm(
     nome_aluno, numer_aluno, cod_aluno, date_added, date_updat, 
            periodo_letivo, nota1, nota2, nota3, nota4, nota5, nota6, nota7, 
            nota8, nota9, nota10, nota11, nota12, nota13, nota14, nota15, 
            nota16, nota17, nota18, nota19, nota20, nota21, nota22, nota23, 
            nota24, nota25, nota26, nota27, nota28, nota29, nota30, nota31, 
            nota32, nota33, nota34, nota35, nota36, nota37, nota38, nota39,nota40,nota_redacao, soma_ling_por, soma_cien_hum, soma_cien_nat, soma_mat_tec)
    VALUES ('$nomeAluno','$matricula2','$codgo','$data_insert','$date_updat','$periodoLetivo',$nota1,
    $nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,$nota12,$nota13,$nota14,$nota15
    ,$nota16, $nota17,$nota18,$nota19,$nota20, $nota21,$nota22,$nota23,$nota24,$nota25,$nota26,$nota27,$nota28,
     $nota29,$nota30,$nota31,$nota32,$nota33,$nota34,$nota35,$nota36,$nota37,$nota38,$nota39,$nota40,'$nota_redacao',
      '$linguaPortu',' $cienciasHumanas','$cienciasNatureza','$matematica');" ;
       
    return $sql;   
   
    }
    
    // importação nta Redação
    function licia_NotaRed_Update ($matricula2,$notaRedacao,$date_updat){
        
      $sql =  "UPDATE public.vestibalm
   SET
       nota_redacao='$notaRedacao' , date_updat='$date_updat'
 WHERE  numer_aluno = '$matricula2'and  periodo_letivo= '$this->periodoLetivo'" ;
     
      return $sql;
        
    }
    
    
  function lincia_buscaGeral( ){

  $sql= "SELECT  *
  FROM public.vestibalm where periodo_letivo = '$this->periodoLetivo'";

  return $sql ;
}
            
    
   function licia_select(){
       
       
           $sql = "SELECT id, nome_aluno, numer_aluno, cod_aluno, date_added, date_updat, 
       periodo_letivo, nota1, nota2, nota3, nota4, nota5, nota6, nota7, 
       nota8, nota9, nota10, nota11, nota12, nota13, nota14, nota15, 
       nota16, nota17, nota18, nota19, nota20, nota21, nota22, nota23, 
       nota24, nota25, nota26, nota27, nota28, nota29, nota30, nota31, 
       nota32, nota33, nota34, nota35, nota36, nota37, nota38, nota39,nota40,nota_redacao, soma_ling_por, soma_cien_hum, soma_cien_nat, soma_mat_tec
  FROM public.vestibalm";
       
           return $sql;
           
           
   }
   
   // Atualiza  notas 
 function licia_update ($id,$nomeAluno,$matricula2,$codgo,$date_updat,$periodoLetivo,$nota1,
    $nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,$nota12,$nota13,$nota14,$nota15
    ,$nota16, $nota17,$nota18,$nota19,$nota20,$nota21,$nota22,$nota23,$nota24,$nota25,$nota26,$nota27,$nota28,
     $nota29,$nota30,$nota31,$nota32,$nota33,$nota34,$nota35,$nota36,$nota37,$nota38,$nota39,$nota40,$nota_redacao,$linguaPortu, 
            $cienciasHumanas,$cienciasNatureza,$matematica ){

  $Update = "UPDATE public.vestibalm
  SET  nome_aluno='$nomeAluno', numer_aluno='$matricula2', cod_aluno='$codgo',  
  date_updat='$date_updat', periodo_letivo='$periodoLetivo', nota1= $nota1, nota2=$nota2, nota3=$nota3, nota4=$nota4, 
  nota5=$nota5, nota6=$nota6, nota7=$nota7, nota8=$nota8, nota9=$nota9, nota10=$nota10, nota11=$nota11, 
  nota12=$nota12, nota13=$nota13, nota14=$nota14, nota15=$nota15, nota16=$nota16, nota17=$nota17, nota18=$nota18, 
  nota19=$nota19, nota20=$nota20, nota21=$nota21, nota22=$nota22, nota23=$nota23, nota24=$nota24, nota25=$nota25, 
       nota26=$nota26, nota27=$nota27, nota28=$nota28, nota29=$nota29, nota30=$nota30, nota31=$nota31, nota32=$nota32, 
       nota33=$nota33, nota34=$nota34, nota35=$nota35, nota36=$nota36, nota37=$nota37, nota38=$nota38,  nota39 =$nota39,nota40=$nota40,nota_redacao='$nota_redacao',soma_ling_por='$linguaPortu', soma_cien_hum=$cienciasHumanas, soma_cien_nat=$cienciasNatureza, 
       soma_mat_tec=$matematica
  WHERE id =$id;";

  return $Update; 

}
   
                    
       
    // Verifica a existencia do Candidado
  function licia_verifica ($matricula2){
     $p =  $this->periodoLetivo;
   $sql_verifica = " SELECT id, numer_aluno 
   FROM public.vestibalm WHERE numer_aluno like '%$matricula2' and periodo_letivo = '$p';" ;
   //echo '->'.$sql_verifica;
   return $sql_verifica;  
 }                
                
    
    
    
    
}