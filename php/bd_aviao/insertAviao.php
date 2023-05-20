<?php 

if(isset($_POST['cadAviao'])){
    $qtd = (int)$_POST['qtdAssent'];
    $tipo = $_POST['tipoAssent'];
    $fkComp = $_POST['fkComp'];

    $queryAv = "insert into aviao(qtdAssento, tipoAssento, fk_IdCompanhia) values ($qtd, '$tipo', $fkComp)";
    mysqli_query($conexao, $queryAv);
}

?>