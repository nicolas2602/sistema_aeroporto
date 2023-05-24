<?php 

if(isset($_POST['upAviao'])){
    $id = $_POST['idAviao'];
    $qtd = (int)$_POST['qtdAssent'];
    $tipo = $_POST['tipoAssent'];
    $fkComp = $_POST['fkComp'];

    $queryAv = "update aviao set qtdAssento=$qtd, tipoAssento='$tipo', fk_IdCompanhia=$fkComp where IdAviao={$id}";
    mysqli_query($conexao, $queryAv);
}

?>