<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de funcionários</h3>
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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertFunc">
                            Adicionar funcionários
                        </button>
                    </li>
                    <li>
                        <form action="" method="post">
                            <input type="submit" class="dropdown-item" name="exportFunc" value="Exportar">
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
                    <th scope="col">Nome do Funcionário</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Descrição do cargo</th>
                    <th scope="col">Avião</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
                $sqlFunc = "select IdFuncionario, nomeFuncionario, descGenero, descCargo, fk_IdAviao,
                            fk_IdGenero, fk_IdCargo
                            from funcionario as f

                            inner join genero as gen
                            on f.fk_IdGenero = gen.IdGenero

                            inner join cargo as car
                            on f.fk_IdCargo = car.IdCargo;";

                $queryFunc = mysqli_query($conexao, $sqlFunc);
                while($func = mysqli_fetch_assoc($queryFunc)){
                    $IdFunc = $func['IdFuncionario'];
                    $nomeFunc = $func['nomeFuncionario'];
                    $gen = $func['descGenero'];
                    $cargo = $func['descCargo'];
                    $fkIdAviao = $func['fk_IdAviao'];
            
            ?>

            <tbody>
                <td><?php echo($IdFunc)?></td>
                <td><?php echo($nomeFunc)?></td>
                <td><?php echo($gen)?></td>
                <td><?php echo($cargo)?></td>
                <td><?php echo($fkIdAviao)?></td>
                <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalUpFunc" data-bs-whateverId="<?=$IdFunc?>"
                            data-bs-whateverNome="<?=$nomeFunc?>" data-bs-whateverGen="<?=$func['fk_IdGenero']?>" 
                            data-bs-whateverCargo="<?=$func['fk_IdCargo']?>" data-bs-whateverAviao="<?=$fkIdAviao?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelFunc" data-bs-whateverId="<?=$IdFunc?>"
                            data-bs-whateverNome="<?=$nomeFunc?>" data-bs-whateverGen="<?=$func['fk_IdGenero']?>" 
                            data-bs-whateverCargo="<?=$func['fk_IdCargo']?>" data-bs-whateverAviao="<?=$fkIdAviao?>">
                            Excluir
                        </button>
                    </form>
                </td>
            </tbody>

            <?php } ?>

        </table>
    </div>
</div>

<?php include("include/funcionario/modalInsertFunc.php"); ?>
<?php include("include/funcionario/modalUpFunc.php"); ?>
<?php include("include/funcionario/modalDelFunc.php"); ?>
    
<script type="text/javascript">

    // Atualizar país
    var modalUpFunc = document.getElementById('modalUpFunc')
        modalUpFunc.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idFunc = button.getAttribute('data-bs-whateverId')
        var nome = button.getAttribute('data-bs-whateverNome')
        var gen = button.getAttribute('data-bs-whateverGen')
        var cargo = button.getAttribute('data-bs-whateverCargo')
        var aviao = button.getAttribute('data-bs-whateverAviao')

        var modalTitle = modalUpFunc.querySelector('.modal-title')
        var idFuncInput = modalUpFunc.querySelector('#idFunc')
        var nomeInput = modalUpFunc.querySelector('#nomeFunc')
        var genInput = modalUpFunc.querySelector('#gen')
        var cargoInput = modalUpFunc.querySelector('#cargo')
        var aviaoInput = modalUpFunc.querySelector('#aviao')

        modalTitle.textContent = 'ID do funcionário: ' + idFunc 
        idFuncInput.value = idFunc
        nomeInput.value = nome 
        genInput.value = gen 
        cargoInput.value = cargo 
        aviaoInput.value = aviao
    })
    
    // Deletar País
    var modalDelFunc = document.getElementById('modalDelFunc')
        modalDelFunc.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idFunc = button.getAttribute('data-bs-whateverId')
        var nome = button.getAttribute('data-bs-whateverNome')
        var gen = button.getAttribute('data-bs-whateverGen')
        var cargo = button.getAttribute('data-bs-whateverCargo')
        var aviao = button.getAttribute('data-bs-whateverAviao')

        var modalTitle = modalDelFunc.querySelector('.modal-title')
        var idFuncInput = modalDelFunc.querySelector('#idFunc')
        var nomeInput = modalDelFunc.querySelector('#nomeFunc')
        var genInput = modalDelFunc.querySelector('#gen')
        var cargoInput = modalDelFunc.querySelector('#cargo')
        var aviaoInput = modalDelFunc.querySelector('#aviao')

        modalTitle.textContent = 'Nome do funcionário: ' + nome 
        idFuncInput.value = idFunc
        nomeInput.value = nome 
        genInput.value = gen 
        cargoInput.value = cargo 
        aviaoInput.value = aviao
    })

</script>