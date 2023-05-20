<?php 

    if(isset($_POST['cadTipo'])){
        $nomeBag = $_POST['nomeBag'];

        $queryTipo = "insert into tipo_bagagem (nomeBagagem) values('$nomeBag')";
        mysqli_query($conexao, $queryTipo);
    }

?>