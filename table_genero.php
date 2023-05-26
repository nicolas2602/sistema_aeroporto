<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de gêneros</h3>
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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertGen">
                            Adicionar gêneros
                        </button>
                    </li>
                    <li>
                        <form action="include/genero/planilhaGen.php" method="post">
                            <input type="submit" class="dropdown-item" name="exportGen" value="Exportar">
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
                    <th scope="col">Descrição gênero</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
                $queryGen = mysqli_query($conexao, "select * from genero;");
                while($gen = mysqli_fetch_assoc($queryGen)){
                    $IdGenero = $gen['IdGenero'];
                    $descGenero = $gen['descGenero'];
            
            ?>

            <tbody>
                <td><?php echo($IdGenero)?></td>
                <td><?php echo($descGenero)?></td>
                <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalUpGen" data-bs-whateverId="<?=$IdGenero?>"
                            data-bs-whateverDesc="<?=$descGenero?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelGen" data-bs-whateverId="<?=$IdGenero?>"
                            data-bs-whateverDesc="<?=$descGenero?>">
                            Excluir
                        </button>
                    </form>
                </td>
            </tbody>

            <?php } ?>

        </table>
    </div>
</div>

<?php include("include/genero/modalInsertGen.php"); ?>
<?php include("include/genero/modalUpGen.php"); ?>
<?php include("include/genero/modalDelGen.php"); ?>
    
<script type="text/javascript">

    // Atualizar país
    var modalUpGen = document.getElementById('modalUpGen')
        modalUpGen.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idGen = button.getAttribute('data-bs-whateverId')
        var desc = button.getAttribute('data-bs-whateverDesc')

        var modalTitle = modalUpGen.querySelector('.modal-title')
        var idGenInput = modalUpGen.querySelector('#idGen')
        var descGenInput = modalUpGen.querySelector('#descGen')

        modalTitle.textContent = 'ID do gênero: ' + idGen
        idGenInput.value = idGen
        descGenInput.value = desc
    })
    
    // Deletar País
    var modalDelGen = document.getElementById('modalDelGen')
        modalDelGen.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idGen = button.getAttribute('data-bs-whateverId')
        var desc = button.getAttribute('data-bs-whateverDesc')

        var modalTitle = modalDelGen.querySelector('.modal-title')
        var idGenInput = modalDelGen.querySelector('#idGen')
        var descGenInput = modalDelGen.querySelector('#descGen')

        modalTitle.textContent = 'Descrição do gênero: ' + desc
        idGenInput.value = idGen
        descGenInput.value = desc
    })

</script>