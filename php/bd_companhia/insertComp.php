<?php 

    if(isset($_POST['cadCompanhia'])){
        $comp = $_POST['nomeCompanhia'];

        $queryComp = "insert into companhia_aerea(nomeCompanhia) values ('$comp')";
        mysqli_query($conexao, $queryComp);
    }

?>