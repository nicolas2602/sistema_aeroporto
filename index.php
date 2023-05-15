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
                    <input type="submit" class="btn btn-danger btn-sm" value="Fechar" data-bs-toggle="modal" name="fechar">
                    <input type="submit" class="btn btn-success btn-sm" value="Mostrar os países" name="showPais">
                    <input type="submit" class="btn btn-primary btn-sm" value="Mostrar as cidades" name="showCidade">
                    <input type="submit" class="btn btn-warning btn-sm" value="Mostrar aeroporto" name="showAeroporto">
                    <input type="submit" class="btn btn-secondary btn-sm" value="Mostrar companhia aérea" name="showCompanhia">
                    <input type="submit" class="btn btn-info btn-sm" value="Mostrar voos" name="showVoo">
                </form>
            </div>
            <br>
            <div class="d-flex justify-content-evenly">
                <form method="post">
                    <input type="submit" class="btn btn-danger btn-sm" value="Mostrar aviões" name="showAviao">
                    <input type="submit" class="btn btn-success btn-sm" value="Mostrar cargos" name="showCargo">
                    <input type="submit" class="btn btn-primary btn-sm" value="Mostrar gêneros" name="showGen">
                    <input type="submit" class="btn btn-warning btn-sm" value="Mostrar funcionários" name="showFunc">
                    <input type="submit" class="btn btn-secondary btn-sm" value="Mostrar passageiros" name="showPass">
                    <input type="submit" class="btn btn-info btn-sm" value="Mostrar nacionalidades" name="showNac">
                </form>
            </div>
            <br>
            <div class="d-flex justify-content-evenly">
                <form method="post">
                    <input type="submit" class="btn btn-dark btn-sm" value="Mostrar informações dos passageiros" name="showPn">
                    <input type="submit" class="btn btn-danger btn-sm" value="Mostrar tipo de bagagens" name="showTipo">
                    <input type="submit" class="btn btn-success btn-sm" value="Mostrar as bagagens dos passageiros" name="showBag">
                </form>
            </div>
            <hr>
        </div>
    </div>

    <?php 
        //include("include/mostrar.php");
        if(isset($_POST['showPais'])){
            include("table_pais.php");
        }else if(isset($_POST['showCidade'])){
            include("table_cidade.php");
        }else if(isset($_POST['showAeroporto'])){
            include("table_aeroporto.php");
        }else if(isset($_POST['showCompanhia'])){
            include("table_companhia.php");
        }else if(isset($_POST['showVoo'])){
            include("table_voo.php");
        }else if(isset($_POST['showAviao'])){
            include("table_aviao.php");
        }else if(isset($_POST['showCargo'])){
            include("table_cargo.php");
        }else if(isset($_POST['showGen'])){
            include("table_genero.php");
        }else if(isset($_POST['showFunc'])){
            include("table_funcionario.php");
        }else if(isset($_POST['showPass'])){
            include("table_passageiro.php");
        }else if(isset($_POST['showNac'])){
            include("table_nacionalidade.php");
        }else if(isset($_POST['showPn'])){
            include("table_passageiro_nac.php");
        }else if(isset($_POST['showTipo'])){
            include("table_tipo_bagagem.php");
        }else if(isset($_POST['showBag'])){
            include("table_bagagem.php");
        }else{
            echo("
                <div class='d-flex justify-content-center'>
                    <div class='container'>
                        <div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
                            Bem-vindo ao sistema de aeroporto! Para olhar as tabelas, clique em um dos botões acima!
                        </div>
                    </div>
                </div>
            ");
        }
    ?>

    <div class="d-flex justify-content-center">
        <div class="container">
            <?php include("include/pais/alertPais.php"); ?>
        </div>
    </div>

    <?php include("include/script.php"); ?>

</body>
</html>