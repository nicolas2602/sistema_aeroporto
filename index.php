<?php
    include("php/conexao.php");
    include("php/include_bd.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Sistema Aeroporto</title>
</head>
<body>
    <form method="post">
        <section class="cabecalho">
            <div class="cavecalho--itens">
                <img src="img/logo.png" alt="logo">
            </div>
            <div class="cavecalho--itens">
            <form method="post">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <input type="submit" class="nav-link active text-white" aria-current="page" value="Início" data-bs-toggle="modal" name="fechar">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Gráficos</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tabelas
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><input type="submit" class="dropdown-item" value="Mostrar os países" name="showPais"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar as cidades" name="showCidade"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar aeroporto" name="showAeroporto"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar companhia aérea" name="showCompanhia"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar voos" name="showVoo"></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar aviões" name="showAviao"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar cargos" name="showCargo"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar gêneros" name="showGen"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar funcionários" name="showFunc"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar passageiros" name="showPass"></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar nacionalidades" name="showNac"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar informações dos passageiros" name="showPn"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar tipo de bagagens" name="showTipo"></li>
                                        <li><input type="submit" class="dropdown-item" value="Mostrar as bagagens dos passageiros" name="showBag"></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </form>
            </div>
        </section>
    </form>

    <br/><br/>

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

    <footer class= "alinhaFooter">
        <p class = itensFooter>
            By: Eduardo Luiz e Nicolas Hiroki - 3°Semestre de SI
        </p>
    </footer>

</body>
</html>