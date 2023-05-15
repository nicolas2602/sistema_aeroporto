<?php 

    if(isset($_POST['cadCidade'])){
        $cidade = $_POST['nomeCidade'];
        $idPais = $_POST['idPais'];

        $queryPais = "insert into cidade(nomeCidade, fk_IdPais) values ('$cidade', $idPais)";
        mysqli_query($conexao, $queryPais);
    }

?>