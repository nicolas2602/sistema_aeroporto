<?php 
    include("../../php/conexao.php");

    function corrigir($txt){
        return mb_convert_encoding($txt, "ISO-8859-1", "UTF-8");
    }

    # chmod -R 777 <diretório da pasta>
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=passageiro_nacionalidade.csv');  
    
    $arquivo = fopen("php://output", "w"); 

    $cabecalho = ['ID', corrigir('Nome do passageiro'), 'Nacionalidade'];

    fputcsv($arquivo, $cabecalho, ';');

    $c = "select IdPassagNac, nomePassageiro, descNacionalidade
            from passageiro_nacionalidade as pn 

            left join passageiro as ps
            on pn.fk_IdPassageiro = ps.IdPassageiro

            inner join nacionalidade as nc 
            on pn.fk_IdNacionalidade = nc.IdNacionalidade;";

    $query = mysqli_query($conexao, $c);

    while($row = mysqli_fetch_assoc($query)){
        fputcsv($arquivo, mb_convert_encoding($row, "ISO-8859-1", "UTF-8"), ';');
    }

    fclose($arquivo);

?>
