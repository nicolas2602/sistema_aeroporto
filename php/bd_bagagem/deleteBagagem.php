<?php 

    if(isset($_POST['delBag'])){
        $id = $_POST['idBag'];
        $peso = $_POST['peso'];
        $tipo = $_POST['fkTipo'];
        $passageiro = $_POST['fkPass'];

        $queryBag = "delete from bagagem where IdBagagem={$id}";
        mysqli_query($conexao, $queryBag);
    }

?>