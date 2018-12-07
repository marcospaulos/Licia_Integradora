    
<?php
//PDO

    include './Classes/conecta.php';


    
$periodo = '2017/2';
    //COLUNAS
$sql ="select matrcula_aluno,periodo_letivo,multiplicada from integradora  where  periodo_letivo ='$periodo'";
$rs_notas = pg_query($bd_licia, $sql) or die("Erro ao checar notas da integradora!! " . $sql ); 

$array = pg_fetch_array($rs_notas);
$list =$array;

var_dump($list);

$fp = fopen('file.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);

include './Classes/desconecta.php';
    ?>