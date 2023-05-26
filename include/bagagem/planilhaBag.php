<?php 
    include("../../php/conexao.php");

    function corrigir($txt){
        return mb_convert_encoding($txt, "ISO-8859-1", "UTF-8");
    }

    # chmod -R 777 <diretório da pasta>
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=bagagem.csv');  
    
    $arquivo = fopen("php://output", "w"); 

    $cabecalho = ['ID', 'Peso da bagagem', 'Bagagem', 'Nome do passageiro'];

    fputcsv($arquivo, $cabecalho, ';');

    $c = "select IdBagagem, pesoBagagem, nomeBagagem, nomePassageiro
            from bagagem as bg 
            left join passageiro as ps
            on bg.fk_IdPassageiro = ps.IdPassageiro
            inner join tipo_bagagem as tb 
            on bg.fk_IdTipoBagagem = tb.IdTipoBagagem;";

    $query = mysqli_query($conexao, $c);

    while($row = mysqli_fetch_assoc($query)){
        fputcsv($arquivo, mb_convert_encoding($row, "ISO-8859-1", "UTF-8"), ';');
    }

    fclose($arquivo);

?>
