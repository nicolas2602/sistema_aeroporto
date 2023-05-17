<?php

    if(isset($_POST['upAero'])){
        $IdAero = $_POST['idAero'];
        $aero = $_POST['nomeAero'];
        $city = $_POST['idCidade'];

        $queryAero = "update aeroporto set nomeAeroporto='$aero', fk_IdCidade=$city where IdAeroporto={$IdAero}";
        mysqli_query($conexao, $queryAero);
    }
?>