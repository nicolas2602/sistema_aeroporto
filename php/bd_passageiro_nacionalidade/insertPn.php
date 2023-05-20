<?php 

    if(isset($_POST['cadPn'])){
        $passageiro = $_POST['passageiro'];
        $nacionalidade = $_POST['nacionalidade'];

        $queryPn = "insert into passageiro_nacionalidade (fk_IdPassageiro, fk_IdNacionalidade) values
                    ('$passageiro','$nacionalidade')";
        mysqli_query($conexao, $queryPn);
    }

?>