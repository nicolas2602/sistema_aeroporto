<?php
    include("php/conexao.php");
    include("php/include_pais.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Sistema Aeroporto</title>
</head>
<body>
    <br>

    <div class="container">
        <h2 class="text-center">Sistema de Aeroporto</h2><hr>
    </div>

    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="d-flex justify-content-evenly">
                <form method="post">
                    <input type="submit" class="btn btn-danger" value="Fechar" name="fechar">
                    <input type="submit" class="btn btn-success" value="Mostrar os países" name="showPais">
                    <input type="submit" class="btn btn-primary" value="Mostrar as cidades" name="showCidade">
                </form>
            </div>
            <hr>
        </div>
    </div>

    <?php 
        include("include/mostrar.php"); 
    ?>

    <div class="d-flex justify-content-center">
        <div class="container">
            <?php include("include/pais/alertPais.php"); ?>
        </div>
    </div>

    <?php include("include/script.php"); ?>

</body>
</html>