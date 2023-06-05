<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("include/googleCharts.php") ?>
    <link rel="stylesheet" href="css/styles2.css">
    <link rel="icon" href="img/aviao_icon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Sistema Aeroporto</title>
</head>
<body>
    <section class="cabecalho">
        <div class="cavecalho--itens">
            <img src="/img/logo.png" alt="logo">
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
    <br/><br/>


    <div class='d-flex justify-content-center'>
        <div class='container'>
            <div class='alert alert-warning alert-dismissible fade show text-center' role='alert'>
                Bem-vindo ao sistema de aeroporto! Para olhar as tabelas, clique em um dos botões acima!
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</body>
</html>