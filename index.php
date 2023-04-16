<?php
    include("php/conexao.php");
    include("php/insertPais.php");
    include("php/updatePais.php");
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
    <div class="d-flex justify-content-center">
        <div class="w-50 p-3">
            <div class="card container">
                <h2 class="text-center">Cadastro de País</h2><hr>
                <form method="post">
                    <div class="row">               
                        <div class="col">
                            <label for="">Digite o nome do país:</label>
                            <input type="text" class="form-control" name="nomePais" required>
                        </div>
                        <p></p>
                        <div class="row">
                            <div class="col">
                                <input type="submit" class="btn btn-success mb-3" name="cadPais" value="Cadastrar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>

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
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalEditPais" data-bs-whateverPais="<?=$IdPais;?>"
                            data-bs-whateverNome="<?=$nomePais;?>">
                            Atualizar
                        </button>
                        <a href="" class="btn btn-danger btn-sm" onclick="return confirm('Deseja apagar o registro?');">
                            Excluir
                        </a>
                    </td>
                </tbody>

                <?php } ?>

            </table>
        </div>
    </div>
    <?php include("include/modalUpPais.php"); ?>
    <script type="text/javascript">
        var modal_pais = document.getElementById('modalEditPais')
            modal_pais.addEventListener('show.bs.modal', function (event) {               
            var button = event.relatedTarget

            var idPais = button.getAttribute('data-bs-whateverPais')
            var nomePais = button.getAttribute('data-bs-whateverNome')

            var modalTitle = modal_pais.querySelector('.modal-title')
            var idInput = modal_pais.querySelector('#idPais')
            var paisInput = modal_pais.querySelector('#nomePais')

            modalTitle.textContent = 'ID do País: ' + idPais
            idInput.value = idPais
            paisInput.value = nomePais
        })
    </script>
    <?php include("include/script.php"); ?>
</body>
</html>