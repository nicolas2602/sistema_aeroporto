<?php

    if(isset($_POST['upCargo'])){
        $id = $_POST['idCargo'];
        $descCargo = $_POST['nomeCargo'];

        $queryCargo = "update cargo set descCargo='$descCargo' where IdCargo={$id}";
        mysqli_query($conexao, $queryCargo);
    }

?>