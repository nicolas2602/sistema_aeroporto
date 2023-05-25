<?php 
    include("../../php/conexao.php");

    function corrigir($txt){
        return mb_convert_encoding($txt, "ISO-8859-1", "UTF-8");
    }

    # chmod -R 777 <diretório da pasta>
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=voo.csv');  
    
    $arquivo = fopen("php://output", "w"); 

    $aeroportoSaida = corrigir('Aeroporto Saída');
    $comp = corrigir('Companhia aérea');
    $horarioCheg = corrigir('Horário Chegada');
    $horarioSaida = corrigir('Horário Saída');

    $cabecalho = ['ID', $aeroportoSaida, 'Aeroporto destino', $comp, $horarioCheg, $horarioSaida];

    fputcsv($arquivo, $cabecalho, ';');

    $c = "select IdVoo, airs.nomeAeroporto as aeroportoSaida,  aird.nomeAeroporto as aeroportoDestino,  
            nomeCompanhia, 
            ifnull(horarioChegada, 'Horário Indefinido') as horarioChegada, 
            ifnull(horarioSaida, 'Horário Indefinido') as horarioSaida
            from voo as v

            left join aeroporto as aird
            on v.fk_IdAeroporto_Destino = aird.IdAeroporto

            left join aeroporto as airs
            on v.fk_IdAeroporto_Saida = airs.IdAeroporto

            left join companhia_aerea as ca 
            on v.fk_IdCompanhia = ca.IdCompanhia;";

    $query = mysqli_query($conexao, $c);

    while($row = mysqli_fetch_assoc($query)){
        fputcsv($arquivo, mb_convert_encoding($row, "ISO-8859-1", "UTF-8"), ';');
    }

    fclose($arquivo);

?>
