<?php 
    include("../../php/conexao.php");

    # chmod -R 777 <diretório da pasta>
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=pais.csv');  
    
    $arquivo = fopen("php://output", "w"); 

    $cabecalho = ['IdPais', 'nomePais'];

    fputcsv($arquivo, $cabecalho, ';');

    $p = "select * from pais";
    $query_pais = mysqli_query($conexao, $p);

    while($country = mysqli_fetch_assoc($query_pais)){
        fputcsv($arquivo, mb_convert_encoding($country, "ISO-8859-1", "UTF-8"), ';');
    }

    fclose($arquivo);

?>
