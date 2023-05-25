<?php 

    if(isset($_POST['delNac'])){
        $id = $_POST['idNac'];
        $desc = $_POST['descNac'];

        $queryNac = "delete from nacionalidade where IdNacionalidade={$id}";
        mysqli_query($conexao, $queryNac);
    }

?>