<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de Aeroporto</h3>
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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertAero">
                            Adicionar aeroporto
                        </button>
                    </li>
                    <li>
                        <form action="include/aeroporto/planilhaAero.php" method="post">
                            <input type="submit" class="dropdown-item" name="exportAero" value="Exportar">
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
                    <th scope="col">Aeroporto</th>
                    <th>Cidade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
                $air = "select IdAeroporto, nomeAeroporto, nomeCidade, fk_IdCidade
                            from aeroporto as a
                            left join cidade as city
                            on a.fk_IdCidade = city.IdCidade;";

                $query_air = mysqli_query($conexao, $air);
                while($a = mysqli_fetch_assoc($query_air)){
                    $IdAeroporto = $a['IdAeroporto'];
                    $nomeAeroporto = $a['nomeAeroporto'];
                    $idCidade = $a['fk_IdCidade'];
                    $nomeCidade = $a['nomeCidade'];
                
            ?>

            <tbody>
                <td><?php echo($IdAeroporto)?></td>
                <td><?php echo($nomeAeroporto)?></td>
                <td><?php echo($nomeCidade) ?></td>
                <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalUpAero" data-bs-whateverId="<?=$IdAeroporto?>"
                            data-bs-whateverNome="<?=$nomeAeroporto?>" data-bs-whateverCity="<?=$idCidade?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelAero" data-bs-whateverId="<?=$IdAeroporto?>"
                            data-bs-whateverNome="<?=$nomeAeroporto?>" data-bs-whateverCity="<?=$idCidade?>">
                            Excluir
                        </button>
                    </form>
                </td>
            </tbody>

            <?php } ?>

        </table>
    </div>
</div>

<?php include("include/aeroporto/modalInsertAero.php"); ?>
<?php include("include/aeroporto/modalUpAero.php"); ?>
<?php include("include/aeroporto/modalDelAero.php"); ?>
    
<script type="text/javascript">

    // Atualizar país
    var modalEditAero = document.getElementById('modalUpAero')
        modalEditAero.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idAero = button.getAttribute('data-bs-whateverId')
        var nomeAero = button.getAttribute('data-bs-whateverNome')
        var city = button.getAttribute('data-bs-whateverCity')

        var modalTitle = modalEditAero.querySelector('.modal-title')
        var idInput = modalEditAero.querySelector('#idAero')
        var nomeInput = modalEditAero.querySelector('#nomeAero')
        var cityInput = modalEditAero.querySelector('#idCidade')

        modalTitle.textContent = 'ID do Aeroporto: ' + idAero
        idInput.value = idAero
        nomeInput.value = nomeAero
        cityInput.value = city
    })
    
    // Deletar País
    var modalDelAero = document.getElementById('modalDelAero')
        modalDelAero.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idAero = button.getAttribute('data-bs-whateverId')
        var nomeAero = button.getAttribute('data-bs-whateverNome')
        var city = button.getAttribute('data-bs-whateverCity')

        var modalTitle = modalDelAero.querySelector('.modal-title')
        var idInput = modalDelAero.querySelector('#idAero')
        var nomeInput = modalDelAero.querySelector('#nomeAero')
        var cityInput = modalDelAero.querySelector('#idCidade')

        modalTitle.textContent = 'Nome do aeroporto: ' + nomeAero
        idInput.value = idAero
        nomeInput.value = nomeAero
        cityInput.value = city
    })

</script>