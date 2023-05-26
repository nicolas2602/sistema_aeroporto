<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de cargo</h3>
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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertCargo">
                            Adicionar cargos
                        </button>
                    </li>
                    <li>
                        <form action="include/cargo/planilhaCargo.php" method="post">
                            <input type="submit" class="dropdown-item" name="exportCargo" value="Exportar">
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
                    <th scope="col">Descrição cargo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
                $queryCargo = mysqli_query($conexao, "select * from cargo;");
                while($cargo = mysqli_fetch_assoc($queryCargo)){
                    $IdCargo = $cargo['IdCargo'];
                    $descCargo = $cargo['descCargo'];
            
            ?>

            <tbody>
                <td><?php echo($IdCargo)?></td>
                <td><?php echo($descCargo)?></td>
                <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalUpCargo" data-bs-whateverId="<?=$IdCargo?>"
                            data-bs-whateverDesc="<?=$descCargo?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelCargo" data-bs-whateverId="<?=$IdCargo?>"
                            data-bs-whateverDesc="<?=$descCargo?>">
                            Excluir
                        </button>
                    </form>
                </td>
            </tbody>

            <?php } ?>

        </table>
    </div>
</div>

<?php include("include/cargo/modalInsertCargo.php"); ?>
<?php include("include/cargo/modalUpCargo.php"); ?>
<?php include("include/cargo/modalDelCargo.php"); ?>

<script type="text/javascript">

    // Atualizar país
    var modalUpCargo = document.getElementById('modalUpCargo')
        modalUpCargo.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idCargo = button.getAttribute('data-bs-whateverId')
        var desc = button.getAttribute('data-bs-whateverDesc')

        var modalTitle = modalUpCargo.querySelector('.modal-title')
        var idCargoInput = modalUpCargo.querySelector('#idCargo')
        var descInput = modalUpCargo.querySelector('#nomeCargo')

        modalTitle.textContent = 'ID do cargo: ' + idCargo
        idCargoInput.value = idCargo
        descInput.value = desc
    })
    
    // Deletar País
    var modalDelCargo = document.getElementById('modalDelCargo')
        modalDelCargo.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idCargo = button.getAttribute('data-bs-whateverId')
        var desc = button.getAttribute('data-bs-whateverDesc')

        var modalTitle = modalDelCargo.querySelector('.modal-title')
        var idCargoInput = modalDelCargo.querySelector('#idCargo')
        var descInput = modalDelCargo.querySelector('#nomeCargo')

        modalTitle.textContent = 'Descrição do cargo: ' + desc
        idCargoInput.value = idCargo
        descInput.value = desc
    })

</script>