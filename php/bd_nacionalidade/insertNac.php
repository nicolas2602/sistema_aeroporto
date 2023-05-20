<?php 

    if(isset($_POST['cadNac'])){
        $nacionalidade = $_POST['descNac'];

        $queryNac = "insert into nacionalidade (descNacionalidade) values ('$nacionalidade')";
        mysqli_query($conexao, $queryNac);
    }   

?>