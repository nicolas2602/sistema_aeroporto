<?php

    if(isset($_POST['cadCargo'])){
        $descCargo = $_POST['nomeCargo'];

        $queryCargo = "insert into cargo (descCargo) values ('$descCargo')";
        mysqli_query($conexao, $queryCargo);
    }

?>