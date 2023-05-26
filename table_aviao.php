<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de aviões</h3>
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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertAviao">
                            Adicionar aviões
                        </button>
                    </li>
                    <li>
                        <form action="include/aviao/planilhaAviao.php" method="post">
                            <input type="submit" class="dropdown-item" name="exportAviao" value="Exportar">
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
                    <th scope="col">Quantidade de Assento</th>
                    <th scope="col">Tipo de Assento</th>
                    <th scope="col">Companhia aérea</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
                $sqlAviao = "select IdAviao, qtdAssento, tipoAssento, nomeCompanhia, fk_IdCompanhia
                            from aviao as av 
                            left join companhia_aerea as ca 
                            on av.fk_IdCompanhia = ca.IdCompanhia;";

                $queryAviao = mysqli_query($conexao, $sqlAviao );
                while($aviao = mysqli_fetch_assoc($queryAviao)){
                    $IdAviao = $aviao['IdAviao'];
                    $qtd = $aviao['qtdAssento'];
                    $tipo = $aviao['tipoAssento'];
                    $companhia = $aviao['nomeCompanhia'];
            
            ?>

            <tbody>
                <td><?php echo($IdAviao)?></td>
                <td><?php echo($qtd)?></td>
                <td><?php echo($tipo)?></td>
                <td><?php echo($companhia)?></td>
                <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalUpAviao" data-bs-whateverId="<?=$IdAviao?>"
                            data-bs-whateverQtd="<?=$qtd?>" data-bs-whateverTipo="<?=$tipo?>" 
                            data-bs-whateverComp="<?=$aviao['fk_IdCompanhia']?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelAviao" data-bs-whateverId="<?=$IdAviao?>"
                            data-bs-whateverQtd="<?=$qtd?>" data-bs-whateverTipo="<?=$tipo?>" 
                            data-bs-whateverComp="<?=$aviao['fk_IdCompanhia']?>">
                            Excluir
                        </button>
                    </form>
                </td>
            </tbody>

            <?php } ?>

        </table>
    </div>
</div>

<?php include("include/aviao/modalInsertAviao.php"); ?>
<?php include("include/aviao/modalUpAviao.php"); ?>
<?php include("include/aviao/modalDelAviao.php"); ?>
    
<script type="text/javascript">

    // Atualizar 
    var modalUpAviao = document.getElementById('modalUpAviao')
        modalUpAviao.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idAviao = button.getAttribute('data-bs-whateverId')
        var qtd = button.getAttribute('data-bs-whateverQtd')
        var tipo = button.getAttribute('data-bs-whateverTipo')
        var companhia = button.getAttribute('data-bs-whateverComp')

        var modalTitle = modalUpAviao.querySelector('.modal-title')
        var idAviaoInput = modalUpAviao.querySelector('#idAviao')
        var qtdInput = modalUpAviao.querySelector('#qtdAssent')
        var tipoInput = modalUpAviao.querySelector('#tipoAssent')
        var compInput = modalUpAviao.querySelector('#fkComp')

        modalTitle.textContent = 'ID do avião: ' + idAviao
        idAviaoInput.value = idAviao
        qtdInput.value = qtd 
        tipoInput.value = tipo 
        compInput.value = companhia
    })
    
    // Deletar 
    var modalDelAviao = document.getElementById('modalDelAviao')
        modalDelAviao.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idAviao = button.getAttribute('data-bs-whateverId')
        var qtd = button.getAttribute('data-bs-whateverQtd')
        var tipo = button.getAttribute('data-bs-whateverTipo')
        var companhia = button.getAttribute('data-bs-whateverComp')

        var modalTitle = modalDelAviao.querySelector('.modal-title')
        var idAviaoInput = modalDelAviao.querySelector('#idAviao')
        var qtdInput = modalDelAviao.querySelector('#qtdAssent')
        var tipoInput = modalDelAviao.querySelector('#tipoAssent')
        var compInput = modalDelAviao.querySelector('#fkComp')

        modalTitle.textContent = 'Registro do avião: ' + idAviao
        idAviaoInput.value = idAviao
        qtdInput.value = qtd 
        tipoInput.value = tipo 
        compInput.value = companhia
    })

</script>