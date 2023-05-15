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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#">
                            Adicionar bagagens dos passageiros
                        </button>
                    </li>
                    <li>
                        <form action="" method="post">
                            <input type="submit" class="dropdown-item" name="exportCidade" value="Exportar">
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
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Peso da bagagem</th>
                    <th scope="col">Bagagem</th>
                    <th scope="col">Nome do passageiro</th>
                </tr>
            </thead>

            <?php
                $sqlBag = "select IdBagagem, pesoBagagem, nomeBagagem, nomePassageiro
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
                            data-bs-target="#" data-bs-whatever="">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#" data-bs-whatever="">
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