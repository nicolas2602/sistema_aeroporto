<?php 
    if(isset($_POST['cadFunc'])){
        $nome = $_POST['nomeFunc'];
        $genero = $_POST['gen'];
        $cargo = $_POST['cargo'];
        $aviao = $_POST['aviao'];

        $queryFunc = "insert into funcionario (nomeFuncionario, fk_IdGenero, fk_IdAviao, fk_IdCargo) values
                      ('$nome', $genero, $cargo, $aviao)";
        mysqli_query($conexao, $queryFunc);
    }

?>