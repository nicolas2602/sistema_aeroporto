<?php

    if(isset($_POST['delAero'])){
        $IdAero = $_POST['idAero'];
        $aero = $_POST['nomeAero'];
        $city = $_POST['idCidade'];

        $queryAero = "delete from aeroporto where IdAeroporto={$IdAero}";
        mysqli_query($conexao, $queryAero);
    }
?>