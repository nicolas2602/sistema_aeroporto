<?php

    if(isset($_POST['upGen'])){
        $id = $_POST['idGen'];
        $descGen = $_POST['descGen'];

        $queryGen = "update genero set descGenero='$descGen' where IdGenero={$id}";
        mysqli_query($conexao, $queryGen);
    }

?>