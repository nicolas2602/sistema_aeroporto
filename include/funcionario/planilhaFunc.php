<?php 
    include("../../php/conexao.php");

    function corrigir($txt){
        return mb_convert_encoding($txt, "ISO-8859-1", "UTF-8");
    }

    # chmod -R 777 <diretório da pasta>
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=funcionario.csv');  
    
    $arquivo = fopen("php://output", "w"); 

    $cabecalho = ['ID', corrigir('Nome do funcionário'), corrigir('Gênero'), corrigir('Cargo')];

    fputcsv($arquivo, $cabecalho, ';');

    $c = "select IdFuncionario, nomeFuncionario, descGenero, descCargo
            from funcionario as f

            inner join genero as gen
            on f.fk_IdGenero = gen.IdGenero

            inner join cargo as car
            on f.fk_IdCargo = car.IdCargo;";

    $query = mysqli_query($conexao, $c);

    while($row = mysqli_fetch_assoc($query)){
        fputcsv($arquivo, mb_convert_encoding($row, "ISO-8859-1", "UTF-8"), ';');
    }

    fclose($arquivo);

?>
