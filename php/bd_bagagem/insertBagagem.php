<?php 

    if(isset($_POST['cadBag'])){
        $peso = $_POST['peso'];
        $tipo = $_POST['fkTipo'];
        $passageiro = $_POST['fkPass'];

        $queryBag = "insert into bagagem(pesoBagagem, fk_IdTipoBagagem, fk_IdPassageiro) values
                    ($peso, $tipo, $passageiro)";
        mysqli_query($conexao, $queryBag);
    }

?>