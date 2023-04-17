<?php
    include("php/conexao.php");
    include("php/bd_pais/insertPais.php");
    include("php/bd_pais/updatePais.php");
    include("php/bd_pais/deletePais.php");
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
        <h2 class="text-center">Tabela de Países</h2><hr>
    </div>

    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="d-flex justify-content-evenly">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalInsertPais">
                    Adicionar países
                </button>
            </div>
            <hr>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="container">
            <?php include("include/pais/alertPais.php"); ?>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="container">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">País</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                    $pais = "select * from pais";
                    $query_pais = mysqli_query($conexao, $pais);
                    while($country = mysqli_fetch_assoc($query_pais)){
                        $IdPais = $country['IdPais'];
                        $nomePais = $country['nomePais'];
                    
                ?>

                <tbody>
                    <td><?php echo($IdPais)?></td>
                    <td><?php echo($nomePais) ?></td>
                    <td>
                        <form action="" method="post">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                                data-bs-target="#modalEditPais" data-bs-whateverPais="<?=$IdPais;?>"
                                data-bs-whateverNome="<?=$nomePais;?>">
                                Atualizar
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                                data-bs-target="#modalDelPais" data-bs-whateverPais="<?=$IdPais;?>"
                                data-bs-whateverNome="<?=$nomePais;?>">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tbody>

                <?php } ?>

            </table>
        </div>
    </div>
    
    <?php include("include/pais/modalInsertPais.php"); ?>
    <?php include("include/pais/modalUpPais.php"); ?>
    <?php include("include/pais/modalDelPais.php"); ?>
    
    <script type="text/javascript">

        // Atualizar país
        var modalEditPais = document.getElementById('modalEditPais')
            modalEditPais.addEventListener('show.bs.modal', function (event) {               
            var button = event.relatedTarget

            var idPais = button.getAttribute('data-bs-whateverPais')
            var nomePais = button.getAttribute('data-bs-whateverNome')

            var modalTitle = modalEditPais.querySelector('.modal-title')
            var idInput = modalEditPais.querySelector('#idPais')
            var paisInput = modalEditPais.querySelector('#nomePais')

            modalTitle.textContent = 'ID do País: ' + idPais
            idInput.value = idPais
            paisInput.value = nomePais
        })
        
        // Deletar País
        var modalDelPais = document.getElementById('modalDelPais')
            modalDelPais.addEventListener('show.bs.modal', function (event) {               
            var button = event.relatedTarget

            var idPais = button.getAttribute('data-bs-whateverPais')
            var nomePais = button.getAttribute('data-bs-whateverNome')

            var modalTitle = modalDelPais.querySelector('.modal-title')
            var idInput = modalDelPais.querySelector('#idPais')
            var paisInput = modalDelPais.querySelector('#nomePais')

            modalTitle.textContent = 'Nome do país: ' + nomePais
            idInput.value = idPais
            paisInput.value = nomePais
        })

    </script>
    <?php include("include/script.php"); ?>
</body>
</html>