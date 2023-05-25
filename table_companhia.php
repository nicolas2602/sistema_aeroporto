<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de Companhia aérea</h3>
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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertComp">
                            Adicionar companhia aérea
                        </button>
                    </li>
                    <li>
                        <form action="include/companhia/planilhaComp.php" method="post">
                            <input type="submit" class="dropdown-item" name="exportComp" value="Exportar">
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
                    <th scope="col">Companhia aérea</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
                $companhia = "select * from companhia_aerea";

                $query_companhia = mysqli_query($conexao, $companhia);
                while($c = mysqli_fetch_assoc($query_companhia)){
                    $IdCompanhia = $c['IdCompanhia'];
                    $nomeComapanhia = $c['nomeCompanhia'];
                
            ?>

            <tbody>
                <td><?php echo($IdCompanhia)?></td>
                <td><?php echo($nomeComapanhia)?></td>
                <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalUpComp" data-bs-whateverId="<?=$IdCompanhia?>" 
                            data-bs-whateverNome="<?=$nomeComapanhia?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelComp" data-bs-whateverId="<?=$IdCompanhia?>" 
                            data-bs-whateverNome="<?=$nomeComapanhia?>">
                            Excluir
                        </button>
                    </form>
                </td>
            </tbody>

            <?php } ?>

        </table>
    </div>
</div>

<?php include("include/companhia/modalInsertComp.php"); ?>
<?php include("include/companhia/modalUpComp.php"); ?>
<?php include("include/companhia/modalDelComp.php"); ?>
    
<script type="text/javascript">

    // Atualizar país
    var modalUpComp = document.getElementById('modalUpComp')
        modalUpComp.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idComp = button.getAttribute('data-bs-whateverId')
        var nomeComp = button.getAttribute('data-bs-whateverNome')

        var modalTitle = modalUpComp.querySelector('.modal-title')
        var idInput = modalUpComp.querySelector('#idCompanhia')
        var compInput = modalUpComp.querySelector('#nomeCompanhia')

        modalTitle.textContent = 'ID da Companhia: ' + idComp
        idInput.value = idComp
        compInput.value = nomeComp
    })
    
    // Deletar País
    var modalDelComp = document.getElementById('modalDelComp')
        modalDelComp.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idComp = button.getAttribute('data-bs-whateverId')
        var nomeComp = button.getAttribute('data-bs-whateverNome')

        var modalTitle = modalDelComp.querySelector('.modal-title')
        var idInput = modalDelComp.querySelector('#idCompanhia')
        var compInput = modalDelComp.querySelector('#nomeCompanhia')

        modalTitle.textContent = 'Nome da companhia: ' + nomeComp
        idInput.value = idComp
        compInput.value = nomeComp
    })

</script>