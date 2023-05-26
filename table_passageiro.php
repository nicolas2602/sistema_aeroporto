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
                        <form action="include/passageiro/planilhaPass.php" method="post">
                            <input type="submit" class="dropdown-item" name="exportPassag" value="Exportar">
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
                            descGenero, fk_IdGenero, fk_IdAviao
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
                            data-bs-target="#modalUpPass" data-bs-whateverId="<?=$IdPass?>"
                            data-bs-whateverNome="<?=$nomePass?>" data-bs-whateverData="<?=$dataNasc?>" 
                            data-bs-whateverGen="<?=$pass['fk_IdGenero']?>" data-bs-whateverAviao="<?=$aviao?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelPass" data-bs-whateverId="<?=$IdPass?>"
                            data-bs-whateverNome="<?=$nomePass?>" data-bs-whateverData="<?=$dataNasc?>" 
                            data-bs-whateverGen="<?=$pass['fk_IdGenero']?>" data-bs-whateverAviao="<?=$aviao?>">
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
<?php include("include/passageiro/modalUpPass.php"); ?>
<?php include("include/passageiro/modalDelPass.php"); ?>
    
<script type="text/javascript">

    // Atualizar país
    var modalUpPass = document.getElementById('modalUpPass')
        modalUpPass.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var id = button.getAttribute('data-bs-whateverId')
        var nome = button.getAttribute('data-bs-whateverNome')
        var data = button.getAttribute('data-bs-whateverData')
        var gen = button.getAttribute('data-bs-whateverGen')
        var aviao = button.getAttribute('data-bs-whateverAviao')

        var modalTitle = modalUpPass.querySelector('.modal-title')
        var idInput = modalUpPass.querySelector('#idPass')
        var nomeInput = modalUpPass.querySelector('#nomePass')
        var dataInput = modalUpPass.querySelector('#dataNasc')
        var genInput = modalUpPass.querySelector('#gen')
        var aviaoInput = modalUpPass.querySelector('#aviao');

        modalTitle.textContent = 'ID do passageiro: ' + id
        idInput.value = id
        nomeInput.value = nome
        dataInput.value = data
        genInput.value = gen
        aviaoInput.value = aviao
    })
    
    // Deletar País
    var modalDelPass = document.getElementById('modalDelPass')
        modalDelPass.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var id = button.getAttribute('data-bs-whateverId')
        var nome = button.getAttribute('data-bs-whateverNome')
        var data = button.getAttribute('data-bs-whateverData')
        var gen = button.getAttribute('data-bs-whateverGen')
        var aviao = button.getAttribute('data-bs-whateverAviao')

        var modalTitle = modalDelPass.querySelector('.modal-title')
        var idInput = modalDelPass.querySelector('#idPass')
        var nomeInput = modalDelPass.querySelector('#nomePass')
        var dataInput = modalDelPass.querySelector('#dataNasc')
        var genInput = modalDelPass.querySelector('#gen')
        var aviaoInput = modalDelPass.querySelector('#aviao');

        modalTitle.textContent = 'Nome do passageiro: ' + nome
        idInput.value = id
        nomeInput.value = nome
        dataInput.value = data
        genInput.value = gen
        aviaoInput.value = aviao
    })

</script>