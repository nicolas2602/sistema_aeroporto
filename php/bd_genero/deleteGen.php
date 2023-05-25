<?php

    if(isset($_POST['delGen'])){
        $id = $_POST['idGen'];
        $descGen = $_POST['descGen'];

        $queryGen = "delete from genero where IdGenero={$id}";
        mysqli_query($conexao, $queryGen);
    }

?>