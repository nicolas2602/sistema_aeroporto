<?php 
    include("../../php/conexao.php");

    function corrigir($txt){
        return mb_convert_encoding($txt, "ISO-8859-1", "UTF-8");
    }

    # chmod -R 777 <diretório da pasta>
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=aeroporto.csv');  
    
    $arquivo = fopen("php://output", "w"); 

    $cabecalho = ['ID', 'Aeroporto', 'Cidade'];

    fputcsv($arquivo, $cabecalho, ';');

    $a = "select IdAeroporto, nomeAeroporto, nomeCidade
          from aeroporto as a
          inner join cidade as city
          on a.fk_IdCidade = city.IdCidade;";

    $query_air = mysqli_query($conexao, $a);

    while($aero = mysqli_fetch_assoc($query_air)){
        fputcsv($arquivo, mb_convert_encoding($aero, "ISO-8859-1", "UTF-8"), ';');
    }

    fclose($arquivo);

?>
