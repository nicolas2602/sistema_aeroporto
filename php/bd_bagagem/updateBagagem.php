<?php 

    if(isset($_POST['upBag'])){
        $id = $_POST['idBag'];
        $peso = $_POST['peso'];
        $tipo = $_POST['fkTipo'];
        $passageiro = $_POST['fkPass'];

        $queryBag = "update bagagem set pesoBagagem=$peso, fk_IdTipoBagagem=$tipo, fk_IdPassageiro=$passageiro
                     where IdBagagem={$id}";
        mysqli_query($conexao, $queryBag);
    }

?>