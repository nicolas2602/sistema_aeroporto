<?php 
    if(isset($_POST['upFunc'])){
        $id = $_POST['idFunc'];
        $nome = $_POST['nomeFunc'];
        $genero = $_POST['gen'];
        $cargo = $_POST['cargo'];
        $aviao = $_POST['aviao'];

        $queryFunc = "update funcionario set nomeFuncionario='$nome', fk_IdGenero=$genero, fk_IdAviao=$aviao,  
                      fk_IdCargo=$cargo where IdFuncionario={$id}";
        mysqli_query($conexao, $queryFunc);
    }

?>