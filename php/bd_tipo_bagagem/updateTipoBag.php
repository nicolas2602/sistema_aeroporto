<?php 

    if(isset($_POST['upTipo'])){
        $id = $_POST['idTb'];
        $nomeBag = $_POST['nomeBag'];

        $queryTipo = "update tipo_bagagem set nomeBagagem='$nomeBag' where IdTipoBagagem={$id}";
        mysqli_query($conexao, $queryTipo);
    }

?>