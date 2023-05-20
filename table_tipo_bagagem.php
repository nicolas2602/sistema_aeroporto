<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de tipos de bagagens</h3>
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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertTipoBag">
                            Adicionar o tipo de bagagem
                        </button>
                    </li>
                    <li>
                        <form action="" method="post">
                            <input type="submit" class="dropdown-item" name="exportTb" value="Exportar">
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
        <?php include("include/pais/alertPais.php"); ?>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div class="container">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo de bagagem</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
                $queryTipo = mysqli_query($conexao, "select * from tipo_bagagem;");
                while($tipo = mysqli_fetch_assoc($queryTipo)){
                    $IdTipo = $tipo['IdTipoBagagem'];
                    $nomeTipo = $tipo['nomeBagagem'];
            
            ?>

            <tbody>
                <td><?php echo($IdTipo)?></td>
                <td><?php echo($nomeTipo)?></td>
                <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalUpTipoBag" data-bs-whateverId="<?=$IdTipo?>"
                            data-bs-whateverNome="<?=$nomeTipo?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelTipoBag" data-bs-whateverId="<?=$IdTipo?>"
                            data-bs-whateverNome="<?=$nomeTipo?>">
                            Excluir
                        </button>
                    </form>
                </td>
            </tbody>

            <?php } ?>

        </table>
    </div>
</div>

<?php include("include/tipo_bagagem/modalInsertTipoBag.php"); ?>
<?php include("include/tipo_bagagem/modalUpTipoBag.php"); ?>
<?php include("include/tipo_bagagem/modalDelTipoBag.php"); ?>
    
<script type="text/javascript">

    // Atualizar país
    var modalUpTipoBag = document.getElementById('modalUpTipoBag')
        modalUpTipoBag.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idTipo = button.getAttribute('data-bs-whateverId')
        var desc = button.getAttribute('data-bs-whateverNome')

        var modalTitle = modalUpTipoBag.querySelector('.modal-title')
        var idTipoInput = modalUpTipoBag.querySelector('#idTb')
        var descInput = modalUpTipoBag.querySelector('#nomeBag')

        modalTitle.textContent = 'ID do tipo de bagagem: ' + idTipo
        idTipoInput.value = idTipo
        descInput.value = desc
    })
    
    // Deletar País
    var modalDelTipoBag = document.getElementById('modalDelTipoBag')
        modalDelTipoBag.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idTipo = button.getAttribute('data-bs-whateverId')
        var desc = button.getAttribute('data-bs-whateverNome')

        var modalTitle = modalDelTipoBag.querySelector('.modal-title')
        var idTipoInput = modalDelTipoBag.querySelector('#idTb')
        var descInput = modalDelTipoBag.querySelector('#nomeBag')

        modalTitle.textContent = 'Tipo de bagagem: ' + desc
        idTipoInput.value = idTipo
        descInput.value = desc
    })

</script>