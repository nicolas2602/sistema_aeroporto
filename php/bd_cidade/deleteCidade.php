<?php 

    if(isset($_POST['delCity'])){
        $IdCity = $_POST['idCidade'];
        $nomeCity = $_POST['nomeCidade'];
        $IdPais = $_POST['idPais'];

        $delCity = "delete c, p
                    from cidade as city 
                    left join pais as p
                    on city.fk_IdPais = p.IdPais
                    where IdCidade={$IdCity}";
        mysqli_query($conexao, $delCity);
    }

?>