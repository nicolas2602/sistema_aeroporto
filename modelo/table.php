<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Sistema Aeroporto</title>
</head>
<body>
    <form method="post">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Sistema Aeroporto</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <input type="submit" class="nav-link active" aria-current="page" value="Início" data-bs-toggle="modal" name="fechar">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Gráficos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

    <br/><br/>

    <div class="d-flex justify-content-center">
        <div class="container">
            <h3>Modelo de tabela</h3>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="container">
            <hr>
            <div class="row justify-content-start">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownPais" data-bs-toggle="dropdown" aria-expanded="false">
                        Configuração
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownPais">
                        <li>
                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertBag">
                                Adicionar bagagens dos passageiros
                            </button>
                        </li>
                        <li>
                            <form action="include/bagagem/planilhaBag.php" method="post">
                                <input type="submit" class="dropdown-item" name="exportBag" value="Exportar">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="container">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Idade</th>
                        <th scope="col">Data de nascimento</th>
                    </tr>
                </thead>

                <tbody>
                    <td>1</td>
                    <td>Nicolas</td>
                    <td>20</td>
                    <td>26/12/2002</td>
                    <td>
                        <form action="" method="post">
                            <button type="button" class="btn btn-primary btn-sm">
                                Atualizar
                            </button>
                            <button type="button" class="btn btn-danger btn-sm">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tbody>

                <tbody>
                    <td>2</td>
                    <td>Nicolas</td>
                    <td>20</td>
                    <td>26/12/2002</td>
                    <td>
                        <form action="" method="post">
                            <button type="button" class="btn btn-primary btn-sm">
                                Atualizar
                            </button>
                            <button type="button" class="btn btn-danger btn-sm">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tbody>

                <tbody>
                    <td>3</td>
                    <td>Nicolas</td>
                    <td>20</td>
                    <td>26/12/2002</td>
                    <td>
                        <form action="" method="post">
                            <button type="button" class="btn btn-primary btn-sm">
                                Atualizar
                            </button>
                            <button type="button" class="btn btn-danger btn-sm">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tbody>

            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

</body>
</html>