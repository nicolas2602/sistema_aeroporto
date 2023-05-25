<?php 

    if(isset($_POST['delVoo'])){
        $id = $_POST['idVoo'];
        $fkSaida = $_POST['fkSaida'];
        $fkDest = $_POST['fkDest'];
        $fkComp = $_POST['fkComp'];
        $horaSaida = $_POST['horarioSaida'];
        $horaCheg = $_POST['horarioCheg'];

        $queryVoo = "delete from voo where IdVoo={$id}";
        mysqli_query($conexao, $queryVoo);
    }

?>