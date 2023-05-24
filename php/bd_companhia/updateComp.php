<?php 

    if(isset($_POST['upComp'])){
        $id = $_POST['idCompanhia'];
        $nome = $_POST['nomeCompanhia'];

        $queryComp = "update companhia_aerea set nomeCompanhia='$nome' where IdCompanhia={$id}";
        mysqli_query($conexao, $queryComp);
    }

?>