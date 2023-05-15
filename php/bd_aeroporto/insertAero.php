<?php 

    if(isset($_POST['cadAero'])){
        $aero = $_POST['nomeAero'];
        $idCity = $_POST['idCidade'];

        $queryAero = "insert into aeroporto(nomeAeroporto, fk_IdCidade) values ('$aero', $idCity)";
        mysqli_query($conexao, $queryAero);
    }

?>