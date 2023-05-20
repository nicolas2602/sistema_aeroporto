<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de passageiros</h3>
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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertPass">
                            Adicionar passageiros
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
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome do Passageiro</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Avião</th>
                    <th scope="col">Ações</th>
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

<?php include("include/passageiro/modalInsertPass.php"); ?>
    
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