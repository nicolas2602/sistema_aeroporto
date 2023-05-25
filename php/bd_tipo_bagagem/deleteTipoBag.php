<?php 

    if(isset($_POST['delTb'])){
        $id = $_POST['idTb'];
        $nomeBag = $_POST['nomeBag'];

        $queryTipo = "delete from tipo_bagagem where IdTipoBagagem={$id}";
        mysqli_query($conexao, $queryTipo);
    }

?>