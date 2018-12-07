<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class avaliacao {

    var $host = 'localhost';
    var $user = 'postgres';
    var $senha = 'postgresql';
    var $banco = 'licia';
    var $periodo = '2018/1'; // 2017/2
    
    
    // insere notas da integradora    
  function avali_insert($nomeAluno,$matricula2,$codgo,$data_insert,$date_updat,$periodoLetivo,$nota1,
    $nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,$mutiplicado,$turma_curso ){

    $sql = "INSERT INTO public.integradora(
    nome_aluno, matrcula_aluno, cod_aluno, date_added,date_updat, periodo_letivo, 
    nota1, nota2, nota3, nota4, nota5, nota6, nota7, nota8, nota9, 
    nota10, nota11, nota12, nota13, nota14, nota15, nota16, nota17, 
    nota18, nota19, nota20, multiplicada)
    VALUES ('$nomeAluno','$matricula2','$codgo','$data_insert','$date_updat','$periodoLetivo',$nota1,
    $nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,'$mutiplicado','$turma_curso' );" ;
    echo $sql;
    return $sql;
  } 
  
  
  
  // Atualiza  notas 
 function avali_update ($id,$nomeAluno,$matriculaAluno,$codgo,$data_insert,$date_updat,$periodoLetivo,$nota1,
  $nota2,$nota3,$nota4,$nota5,$nota6,$nota7,$nota8,$nota9,$nota10,$nota11,$nota12,$nota13,$nota14,$nota15
  ,$nota16, $nota17,$nota18,$nota19,$nota20,$mutiplicado,$turma_curso ){

  $Update = "UPDATE public.integradora
  SET  nome_aluno='$nomeAluno', matrcula_aluno='$matriculaAluno', cod_aluno='$codgo',  
  date_updat='$date_updat', periodo_letivo='$periodoLetivo', nota1= $nota1, nota2=$nota2, nota3=$nota3, nota4=$nota4, 
  nota5=$nota5, nota6=$nota6, nota7=$nota7, nota8=$nota8, nota9=$nota9, nota10=$nota10, nota11=$nota11, 
   multiplicada='$mutiplicado',turma_curso='$turma_curso'
  WHERE id =$id;";

  return $Update; 

}

}
