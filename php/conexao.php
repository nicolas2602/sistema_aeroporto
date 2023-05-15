<?php 

    $nome_servidor = "db";
    $usuario = "root";
    $senha = "1234";
    $bd = "sistema_aeroporto";

    $conexao = mysqli_connect($nome_servidor, $usuario, $senha, $bd);

    if(!$conexao){
        die("Falha na conexão: ".mysqli_connect_error());
    }

?>