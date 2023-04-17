<?php 

    include("conexao.php");

    $delPais = "delete from pais where IdPais='".$_GET['del']."'";
    mysqli_query($conexao, $delPais);
    header('location: ../index.php');

?>