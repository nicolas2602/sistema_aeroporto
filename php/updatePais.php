<?php
    include("conexao.php");

    if(isset($_POST['upPais'])){
        $IdPais = $_POST['IdPais'];
        $nomePais = $_POST['nomePais'];

        $queryPais = "update pais set nomePais='$nomePais' where IdPais={$IdPais}";
        mysqli_query($conexao, $queryPais);
    }
?>