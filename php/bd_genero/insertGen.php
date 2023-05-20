<?php

    if(isset($_POST['cadGen'])){
        $descGen = $_POST['nomeGen'];

        $queryGen = "insert into genero(descGenero) values ('$descGen')";
        mysqli_query($conexao, $queryGen);
    }

?>