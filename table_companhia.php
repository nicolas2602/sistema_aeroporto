<!-- <div class="d-flex justify-content-center">
    <div class="container">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalInsertPais">
            Adicionar Cidades
        </button>
        <hr>
    </div>
</div> -->

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
                    <th scope="col">Aeroporto</th>
                </tr>
            </thead>

            <?php
                $companhia = "select * from companhia_aerea";

                $query_companhia = mysqli_query($conexao, $companhia);
                while($c = mysqli_fetch_assoc($query_companhia)){
                    $IdCompanhia = $c['IdCompanhia'];
                    $nomeComapanhia = $c['nomeCompanhia'];
                
            ?>

            <tbody>
                <td><?php echo($IdCompanhia)?></td>
                <td><?php echo($nomeComapanhia)?></td>
                <!-- <td>
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
                </td> -->
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