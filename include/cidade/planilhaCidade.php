<?php 
    include("../../php/conexao.php");

    function corrigir($txt){
        return mb_convert_encoding($txt, "ISO-8859-1", "UTF-8");
    }

    # chmod -R 777 <diretório da pasta>
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=cidade.csv');  
    
    $arquivo = fopen("php://output", "w"); 

    $cabecalho = ['ID', 'Cidade', corrigir('País')];

    fputcsv($arquivo, $cabecalho, ';');

    $c = "select IdCidade, nomeCidade, nomePais
          from cidade as city
          left join pais as country
          on city.fk_IdPais = country.IdPais;";

    $query_cidade = mysqli_query($conexao, $c);

    while($city = mysqli_fetch_assoc($query_cidade)){
        fputcsv($arquivo, mb_convert_encoding($city, "ISO-8859-1", "UTF-8"), ';');
    }

    fclose($arquivo);

?>
