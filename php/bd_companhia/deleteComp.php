<?php 

    if(isset($_POST['delComp'])){
        $id = $_POST['idCompanhia'];
        $nome = $_POST['nomeCompanhia'];

        $queryComp = "delete from companhia_aerea where IdCompanhia={$id}";
        mysqli_query($conexao, $queryComp);
    }

?>