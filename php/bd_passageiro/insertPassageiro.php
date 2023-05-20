<?php 

    if(isset($_POST['cadPass'])){
        $nome = $_POST['nomePass'];
        $data = $_POST['dataNasc'];
        $genero = $_POST['gen'];
        $aviao = $_POST['aviao'];
        // insert into passageiro (nomePassageiro, dataNascimento, fk_IdGenero, fk_IdAviao) values
        $queryPass = "insert into passageiro (nomePassageiro, dataNascimento, fk_IdGenero, fk_IdAviao) values
                    ('$nome', '$data', $genero, $aviao)";
        mysqli_query($conexao, $queryPass);
    }
?>



