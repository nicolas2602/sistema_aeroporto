<?php 
    include("../../php/conexao.php");

    function corrigir($txt){
        return mb_convert_encoding($txt, "ISO-8859-1", "UTF-8");
    }

    # chmod -R 777 <diretório da pasta>
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=passageiro.csv');  
    
    $arquivo = fopen("php://output", "w"); 

    $cabecalho = ['ID', 'Nome do passageiro', 'Data de nascimento', corrigir('Gênero')];

    fputcsv($arquivo, $cabecalho, ';');

    $c = "select IdPassageiro, nomePassageiro, 
            DATE_FORMAT(dataNascimento, '%d/%m/%Y') as dataNascimento,
            descGenero
            from passageiro as ps 

            inner join genero as gen 
            on ps.fk_IdGenero = gen.IdGenero

            inner join aviao as av 
            on ps.fk_IdAviao = av.IdAviao;";

    $query = mysqli_query($conexao, $c);

    while($row = mysqli_fetch_assoc($query)){
        fputcsv($arquivo, mb_convert_encoding($row, "ISO-8859-1", "UTF-8"), ';');
    }

    fclose($arquivo);

?>
