<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de cidades</h3>
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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertCidade">
                            Adicionar cidade
                        </button>
                    </li>
                    <li>
                        <form action="include/cidade/planilhaCidade.php" method="post">
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
                    <th scope="col">Cidade</th>
                    <th>País</th>
                    <!-- <th></th> -->
                </tr>
            </thead>

            <?php
                $cidade = "select IdCidade, nomeCidade, nomePais, fk_IdPais
                            from cidade as city
                            left join pais as country
                            on city.fk_IdPais = country.IdPais;";

                $query_city = mysqli_query($conexao, $cidade);
                while($city = mysqli_fetch_assoc($query_city)){
                    $IdCidade = $city['IdCidade'];
                    $nomeCidade = $city['nomeCidade'];
                    $idPais = $city['fk_IdPais'];
                    $pais = $city['nomePais'];
                
            ?>

            <tbody>
                <td><?php echo($IdCidade)?></td>
                <td><?php echo($nomeCidade) ?></td>
                <td><?php echo($pais) ?></td>
                <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalUpCidade" data-bs-whateverId="<?=$IdCidade?>"
                            data-bs-whateverNome="<?=$nomeCidade?>" data-bs-whateverFk="<?=$idPais?>">
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

<?php include("include/cidade/modalInsertCidade.php"); ?>
<?php include("include/cidade/modalUpCidade.php"); ?>
<?php include("include/cidade/modalDelCidade.php"); ?>
    
<script type="text/javascript">

    // Atualizar país
    var modalUpCidade = document.getElementById('modalUpCidade')
        modalUpCidade.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idCidade = button.getAttribute('data-bs-whateverId')
        var nomeCidade = button.getAttribute('data-bs-whateverNome')
        var fkIdPais = button.getAttribute('data-bs-whateverFk')

        var modalTitle = modalUpCidade.querySelector('.modal-title')
        var idInput = modalUpCidade.querySelector('#idCidade')
        var cidadeInput = modalUpCidade.querySelector('#nomeCidade')
        var fkInput = modalUpCidade.querySelector('#idPais')

        modalTitle.textContent = 'ID da Cidade: ' + idCidade
        idInput.value = idCidade
        cidadeInput.value = nomeCidade
        fkInput.value = fkIdPais
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