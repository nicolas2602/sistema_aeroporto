<?php 

    if(isset($_POST['delPn'])){
        $id = $_POST['idPn'];
        $passageiro = $_POST['passageiro'];
        $nacionalidade = $_POST['nacionalidade'];

        $queryPn = "delete from passageiro_nacionalidade where IdPassagNac={$id}";
        mysqli_query($conexao, $queryPn);
    }

?>