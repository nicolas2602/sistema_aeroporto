<?php 

    if(isset($_POST['delPais'])){
        $IdPais = $_POST['IdPais'];
        $nomePais = $_POST['nomePais'];

        $delPais = "delete from pais where IdPais={$IdPais}";
        mysqli_query($conexao, $delPais);
    }

?>