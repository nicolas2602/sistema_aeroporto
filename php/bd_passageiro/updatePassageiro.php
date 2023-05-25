<?php 

    if(isset($_POST['upPass'])){
        $id = $_POST['idPass'];
        $nome = $_POST['nomePass'];
        $data = $_POST['dataNasc'];
        $genero = $_POST['gen'];
        $aviao = $_POST['aviao'];
        // insert into passageiro (nomePassageiro, dataNascimento, fk_IdGenero, fk_IdAviao) values
        $queryPass = "update passageiro set nomePassageiro='$nome', dataNascimento='$data', fk_IdGenero=$genero, fk_IdAviao=$aviao
                        where IdPassageiro={$id}";
        mysqli_query($conexao, $queryPass);
    }
?>



