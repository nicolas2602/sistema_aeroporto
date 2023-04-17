<?php

    if(isset($_POST['cadPais'])){
        $nomePais = $_POST['nomePais'];

        $queryPais = "insert into pais(nomePais) values ('$nomePais')";
        mysqli_query($conexao, $queryPais);
    }

?>