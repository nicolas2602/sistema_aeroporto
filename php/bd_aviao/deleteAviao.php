<?php 

if(isset($_POST['delAviao'])){
    $id = $_POST['idAviao'];
    $qtd = (int)$_POST['qtdAssent'];
    $tipo = $_POST['tipoAssent'];
    $fkComp = $_POST['fkComp'];

    $queryAv = "delete from aviao where IdAviao={$id}";
    mysqli_query($conexao, $queryAv);
}

?>