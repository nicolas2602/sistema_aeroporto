<?php 
    if(isset($_POST['delFunc'])){
        $id = $_POST['idFunc'];
        $nome = $_POST['nomeFunc'];
        $genero = $_POST['gen'];
        $cargo = $_POST['cargo'];
        $aviao = $_POST['aviao'];

        $queryFunc = "delete from funcionario where IdFuncionario={$id}";
        mysqli_query($conexao, $queryFunc);
    }

?>