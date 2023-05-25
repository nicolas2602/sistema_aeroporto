<?php 

    if(isset($_POST['upNac'])){
        $id = $_POST['idNac'];
        $desc = $_POST['descNac'];

        $queryNac = "update nacionalidade set descNacionalidade='$desc' where IdNacionalidade={$id}";
        mysqli_query($conexao, $queryNac);
    }

?>