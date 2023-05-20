<?php 

    if(isset($_POST['cadVoo'])){
        $fkSaida = $_POST['fkSaida'];
        $fkDest = $_POST['fkDest'];
        $fkComp = $_POST['fkComp'];
        $horaSaida = $_POST['horarioSaida'];
        $horaCheg = $_POST['horarioCheg'];

        $queryVoo = "insert into voo(fk_IdAeroporto_Saida, fk_IdAeroporto_Destino, fk_IdCompanhia, horarioChegada, horarioSaida)
                    values ($fkSaida, $fkDest, $fkComp, '$horaCheg', '$horaSaida')";

        mysqli_query($conexao, $queryVoo);
    }

?>