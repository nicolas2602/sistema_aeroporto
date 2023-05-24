<?php 

    if(isset($_POST['upVoo'])){
        $id = $_POST['idVoo'];
        $fkSaida = $_POST['fkSaida'];
        $fkDest = $_POST['fkDest'];
        $fkComp = $_POST['fkComp'];
        $horaSaida = $_POST['horarioSaida'];
        $horaCheg = $_POST['horarioCheg'];

        $queryVoo = "update voo set fk_IdAeroporto_Saida=$fkSaida, fk_IdAeroporto_Destino=$fkDest, fk_IdCompanhia=$fkComp, 
                    horarioChegada='$horaCheg', horarioSaida='$horaSaida' where IdVoo={$id}";
        mysqli_query($conexao, $queryVoo);
    }

?>