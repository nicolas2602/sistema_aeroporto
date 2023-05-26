<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de nacionalidades</h3>
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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertNac">
                            Adicionar nacionalidades
                        </button>
                    </li>
                    <li>
                        <form action="include/nacionalidade/planilhaNac.php" method="post">
                            <input type="submit" class="dropdown-item" name="exportNac" value="Exportar">
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
                    <th scope="col">Descrição da nacionalidade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
                $queryNac = mysqli_query($conexao, "select * from nacionalidade;");
                while($nac = mysqli_fetch_assoc($queryNac)){
                    $IdNac = $nac['IdNacionalidade'];
                    $descNac = $nac['descNacionalidade'];
            
            ?>

            <tbody>
                <td><?php echo($IdNac)?></td>
                <td><?php echo($descNac)?></td>
                <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalUpNac" data-bs-whateverId="<?=$IdNac?>" 
                            data-bs-whateverDesc="<?=$descNac?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelNac" data-bs-whateverId="<?=$IdNac?>" 
                            data-bs-whateverDesc="<?=$descNac?>">
                            Excluir
                        </button>
                    </form>
                </td>
            </tbody>

            <?php } ?>

        </table>
    </div>
</div>

<?php include("include/nacionalidade/modalInsertNac.php"); ?>
<?php include("include/nacionalidade/modalUpNac.php"); ?>
<?php include("include/nacionalidade/modalDelNac.php"); ?>
    
<script type="text/javascript">

    // Atualizar país
    var modalUpNac = document.getElementById('modalUpNac')
        modalUpNac.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var id = button.getAttribute('data-bs-whateverId')
        var desc = button.getAttribute('data-bs-whateverDesc')

        var modalTitle = modalUpNac.querySelector('.modal-title')
        var idInput = modalUpNac.querySelector('#idNac')
        var descInput = modalUpNac.querySelector('#descNac')

        modalTitle.textContent = 'ID da nacionalidade: ' + id
        idInput.value = id
        descInput.value = desc
    })
    
    // Deletar País
    var modalDelNac = document.getElementById('modalDelNac')
        modalDelNac.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var id = button.getAttribute('data-bs-whateverId')
        var desc = button.getAttribute('data-bs-whateverDesc')

        var modalTitle = modalDelNac.querySelector('.modal-title')
        var idInput = modalDelNac.querySelector('#idNac')
        var descInput = modalDelNac.querySelector('#descNac')

        modalTitle.textContent = 'Nacionalidade: ' + desc
        idInput.value = id
        descInput.value = desc
    })

</script>