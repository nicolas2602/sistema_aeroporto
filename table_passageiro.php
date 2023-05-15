<!-- <div class="d-flex justify-content-center">
    <div class="container">
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalInsertPais">
            Adicionar Cidades
        </button>
        <hr>
    </div>
</div> -->

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
                    <th scope="col">Nome do Passageiro</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Avião</th>
                </tr>
            </thead>

            <?php
                $sqlPass = "select IdPassageiro, nomePassageiro, 
                            DATE_FORMAT(dataNascimento, '%d/%m/%Y') as dataNascimento,
                            descGenero, fk_IdAviao
                            from passageiro as ps 

                            inner join genero as gen 
                            on ps.fk_IdGenero = gen.IdGenero

                            inner join aviao as av 
                            on ps.fk_IdAviao = av.IdAviao;";

                $queryPass = mysqli_query($conexao, $sqlPass);
                while($pass = mysqli_fetch_assoc($queryPass)){
                    $IdPass = $pass['IdPassageiro'];
                    $nomePass = $pass['nomePassageiro'];
                    $dataNasc = $pass['dataNascimento'];
                    $gen = $pass['descGenero'];
                    $aviao = $pass['fk_IdAviao'];
            
            ?>

            <tbody>
                <td><?php echo($IdPass)?></td>
                <td><?php echo($nomePass)?></td>
                <td><?php echo($dataNasc)?></td>
                <td><?php echo($gen)?></td>
                <td><?php echo($aviao)?></td>
                <!-- <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalEditPais" data-bs-whateverPais="<?=$IdPais;?>"
                            data-bs-whateverNome="<?=$nomePais;?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelPais" data-bs-whateverPais="<?=$IdPais;?>"
                            data-bs-whateverNome="<?=$nomePais;?>">
                            Excluir
                        </button>
                    </form>
                </td> -->
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