<?php 

    if(isset($_POST['delPass'])){
        $id = $_POST['idPass'];
        $nome = $_POST['nomePass'];
        $data = $_POST['dataNasc'];
        $genero = $_POST['gen'];
        $aviao = $_POST['aviao'];

        $queryPass = "delete from passageiro where IdPassageiro={$id}";
        mysqli_query($conexao, $queryPass);
    }
?>



