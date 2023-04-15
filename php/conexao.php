<?php 

    $nome_servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "sistema_aeroporto";

    $conexao = mysqli_connect($nome_servidor, $usuario, $senha, $bd);

    if(!$conexao){
        die("Falha na conexão: ".mysqli_connect_error());
    }

?>