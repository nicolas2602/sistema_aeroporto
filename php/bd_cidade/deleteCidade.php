<?php 

    if(isset($_POST['delCity'])){
        $IdCity = $_POST['idCidade'];
        $nomeCity = $_POST['nomeCidade'];
        $IdPais = $_POST['idPais'];

        $delCity = "delete from cidade where IdCidade={$IdCity}";
        mysqli_query($conexao, $delCity);
    }

?>