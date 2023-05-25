<?php

    if(isset($_POST['delCargo'])){
        $id = $_POST['idCargo'];
        $descCargo = $_POST['nomeCargo'];

        $queryCargo = "delete from cargo where IdCargo={$id}";
        mysqli_query($conexao, $queryCargo);
    }

?>