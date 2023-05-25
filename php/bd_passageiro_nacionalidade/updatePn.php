<?php 

    if(isset($_POST['upPn'])){
        $id = $_POST['idPn'];
        $passageiro = $_POST['passageiro'];
        $nacionalidade = $_POST['nacionalidade'];

        $queryPn = "update passageiro_nacionalidade set fk_IdPassageiro=$passageiro, fk_IdNacionalidade=$nacionalidade 
                    where IdPassagNac={$id}";
        mysqli_query($conexao, $queryPn);
    }

?>