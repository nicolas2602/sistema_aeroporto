<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de bagagens dos passageiros</h3>
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
        <?php include("include/pais/alertPais.php"); ?>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div class="container">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Peso da bagagem</th>
                    <th scope="col">Bagagem</th>
                    <th scope="col">Nome do passageiro</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
                $sqlBag = "select IdBagagem, pesoBagagem, nomeBagagem, nomePassageiro,
                            fk_IdPassageiro, fk_IdTipoBagagem
                            from bagagem as bg 
                            left join passageiro as ps
                            on bg.fk_IdPassageiro = ps.IdPassageiro
                            inner join tipo_bagagem as tb 
                            on bg.fk_IdTipoBagagem = tb.IdTipoBagagem;";

                $queryBag = mysqli_query($conexao, $sqlBag);
                while($bag = mysqli_fetch_assoc($queryBag)){
                    $IdBag = $bag['IdBagagem'];
                    $peso = $bag['pesoBagagem'];
                    $bagagem = $bag['nomeBagagem'];
                    $passageiro = $bag['nomePassageiro'];
            
            ?>

            <tbody>
                <td><?php echo($IdBag)?></td>
                <td><?php echo($peso)?></td>
                <td><?php echo($bagagem)?></td>
                <td><?php echo($passageiro)?></td>
                <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalUpBag" data-bs-whateverId="<?=$IdBag?>" data-bs-whateverPeso="<?=$peso?>"
                            data-bs-whateverTb="<?=$bag['fk_IdTipoBagagem']?>" data-bs-whateverPass="<?=$bag['fk_IdPassageiro']?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelBag" data-bs-whateverId="<?=$IdBag?>" data-bs-whateverPeso="<?=$peso?>"
                            data-bs-whateverTb="<?=$bag['fk_IdTipoBagagem']?>" data-bs-whateverPass="<?=$bag['fk_IdPassageiro']?>">
                            Excluir
                        </button>
                    </form>
                </td>
            </tbody>

            <?php } ?>

        </table>
    </div>
</div>

<?php include("include/bagagem/modalInsertBag.php"); ?>
<?php include("include/bagagem/modalUpBag.php"); ?>
<?php include("include/bagagem/modalDelBag.php"); ?>
    
<script type="text/javascript">

    // Atualizar país
    var modalUpBag = document.getElementById('modalUpBag')
        modalUpBag.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idBag = button.getAttribute('data-bs-whateverId')
        var peso = button.getAttribute('data-bs-whateverPeso')
        var fktb = button.getAttribute('data-bs-whateverTb')
        var fkpass = button.getAttribute('data-bs-whateverPass')

        var modalTitle = modalUpBag.querySelector('.modal-title')
        var idBagInput = modalUpBag.querySelector('#idBag')
        var pesoInput = modalUpBag.querySelector('#peso')
        var fkTipoInput = modalUpBag.querySelector('#fkTipo')
        var fkPassInput = modalUpBag.querySelector('#fkPass')

        modalTitle.textContent = 'ID da bagagem: ' + idBag
        idBagInput.value = idBag
        pesoInput.value = peso
        fkTipoInput.value = fktb 
        fkPassInput.value = fkpass
    })
    
    // Deletar País
    var modalDelBag = document.getElementById('modalDelBag')
        modalDelBag.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idBag = button.getAttribute('data-bs-whateverId')
        var peso = button.getAttribute('data-bs-whateverPeso')
        var fktb = button.getAttribute('data-bs-whateverTb')
        var fkpass = button.getAttribute('data-bs-whateverPass')

        var modalTitle = modalDelBag.querySelector('.modal-title')
        var idBagInput = modalDelBag.querySelector('#idBag')
        var pesoInput = modalDelBag.querySelector('#peso')
        var fkTipoInput = modalDelBag.querySelector('#fkTipo')
        var fkPassInput = modalDelBag.querySelector('#fkPass')

        modalTitle.textContent = 'ID da bagagem: ' + idBag
        idBagInput.value = idBag
        pesoInput.value = peso
        fkTipoInput.value = fktb 
        fkPassInput.value = fkpass
    })

</script>