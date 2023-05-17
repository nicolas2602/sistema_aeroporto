<?php

    if(isset($_POST['upCidade'])){
        $IdCity = $_POST['idCidade'];
        $cidade = $_POST['nomeCidade'];
        $idPais = $_POST['idPais'];

        $queryCity = "update cidade set nomeCidade='$cidade', fk_IdPais=$idPais where IdCidade={$IdCity}";
        mysqli_query($conexao, $queryCity);
    }
?>