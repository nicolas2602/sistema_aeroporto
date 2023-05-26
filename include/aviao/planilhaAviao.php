<?php 
    include("../../php/conexao.php");

    function corrigir($txt){
        return mb_convert_encoding($txt, "ISO-8859-1", "UTF-8");
    }

    # chmod -R 777 <diretório da pasta>
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=aviao.csv');  
    
    $arquivo = fopen("php://output", "w"); 

    $cabecalho = ['ID', 'Quantidade de assento', 'Tipo de assento', 'Nome da companhia'];

    fputcsv($arquivo, $cabecalho, ';');

    $c = "select IdAviao, qtdAssento, tipoAssento, nomeCompanhia
            from aviao as av 
            left join companhia_aerea as ca 
            on av.fk_IdCompanhia = ca.IdCompanhia;";

    $query = mysqli_query($conexao, $c);

    while($row = mysqli_fetch_assoc($query)){
        fputcsv($arquivo, mb_convert_encoding($row, "ISO-8859-1", "UTF-8"), ';');
    }

    fclose($arquivo);

?>
