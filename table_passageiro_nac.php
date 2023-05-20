<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de informações do passageiro</h3>
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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertPn">
                            Adicionar informações do passageiro
                        </button>
                    </li>
                    <li>
                        <form action="" method="post">
                            <input type="submit" class="dropdown-item" name="exportPn" value="Exportar">
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
                    <th scope="col">Nome do Passageiro</th>
                    <th scope="col">Nacionalidade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
                $sqlPassNac = "select IdPassagNac, nomePassageiro, descNacionalidade,
                                fk_IdPassageiro, fk_IdNacionalidade
                                from passageiro_nacionalidade as pn 

                                left join passageiro as ps
                                on pn.fk_IdPassageiro = ps.IdPassageiro

                                inner join nacionalidade as nc 
                                on pn.fk_IdNacionalidade = nc.IdNacionalidade;";

                $queryPassNac = mysqli_query($conexao, $sqlPassNac);
                while($pn = mysqli_fetch_assoc($queryPassNac)){
                    $IdPn = $pn['IdPassagNac'];
                    $nomePn = $pn['nomePassageiro'];
                    $descNac = $pn['descNacionalidade'];
            ?>

            <tbody>
                <td><?php echo($IdPn)?></td>
                <td><?php echo($nomePn)?></td>
                <td><?php echo($descNac)?></td>
                <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalUpPn" data-bs-whateverId="<?=$IdPn?>" 
                            data-bs-whateverPass="<?=$pn['fk_IdPassageiro']?>"
                            data-bs-whateverNac="<?=$pn['fk_IdNacionalidade']?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelPn" data-bs-whateverId="<?=$IdPn?>" 
                            data-bs-whateverPass="<?=$pn['fk_IdPassageiro']?>"
                            data-bs-whateverNac="<?=$pn['fk_IdNacionalidade']?>">
                            Excluir
                        </button>
                    </form>
                </td>
            </tbody>

            <?php } ?>

        </table>
    </div>
</div>

<?php include("include/passageiro_nacionalidade/modalInsertPn.php"); ?>
<?php include("include/passageiro_nacionalidade/modalUpPn.php"); ?>
<?php include("include/passageiro_nacionalidade/modalDelPn.php"); ?>
    
<script type="text/javascript">

    // Atualizar país
    var modalUpPn = document.getElementById('modalUpPn')
        modalUpPn.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var id = button.getAttribute('data-bs-whateverId')
        var passageiro = button.getAttribute('data-bs-whateverPass')
        var nacionalidade = button.getAttribute('data-bs-whateverNac')

        var modalTitle = modalUpPn.querySelector('.modal-title')
        var idInput = modalUpPn.querySelector('#idPn')
        var passInput = modalUpPn.querySelector('#pass')
        var nacInput = modalUpPn.querySelector('#nac')

        modalTitle.textContent = 'ID: ' + id
        idInput.value = id
        passInput.value = passageiro
        nacInput.value = nacionalidade
    })
    
    // Deletar País
    var modalDelPn = document.getElementById('modalDelPn')
        modalDelPn.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var id = button.getAttribute('data-bs-whateverId')
        var passageiro = button.getAttribute('data-bs-whateverPass')
        var nacionalidade = button.getAttribute('data-bs-whateverNac')

        var modalTitle = modalDelPn.querySelector('.modal-title')
        var idInput = modalDelPn.querySelector('#idPn')
        var passInput = modalDelPn.querySelector('#pass')
        var nacInput = modalDelPn.querySelector('#nac')

        modalTitle.textContent = 'ID do passageiro: ' + passageiro
        idInput.value = id
        passInput.value = passageiro
        nacInput.value = nacionalidade
    })

</script>