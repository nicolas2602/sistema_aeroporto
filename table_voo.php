<div class="d-flex justify-content-center">
    <div class="container">
        <h3>Tabela de voos</h3>
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
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInsertVoo">
                            Adicionar voos
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
                    <th scope="col">Aeroporto Saída</th>
                    <th scope="col">Aeroporto Destino</th>
                    <th scope="col">Companhia aérea</th>
                    <th scope="col">Horário de chegada</th>
                    <th scope="col">Horário de saída</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <?php
                $sqlVoo = "select IdVoo, airs.nomeAeroporto as aeroportoSaida,  aird.nomeAeroporto as aeroportoDestino,  
                            nomeCompanhia, fk_IdAeroporto_Destino, fk_IdAeroporto_Saida, fk_IdCompanhia,
                            ifnull(horarioChegada, 'Horário Indefinido') as horarioChegada, 
                            ifnull(horarioSaida, 'Horário Indefinido') as horarioSaida
                            from voo as v

                            left join aeroporto as aird
                            on v.fk_IdAeroporto_Destino = aird.IdAeroporto

                            left join aeroporto as airs
                            on v.fk_IdAeroporto_Saida = airs.IdAeroporto

                            left join companhia_aerea as ca 
                            on v.fk_IdCompanhia = ca.IdCompanhia;";

                $queryVoo = mysqli_query($conexao, $sqlVoo);
                while($voo = mysqli_fetch_assoc($queryVoo)){
                    $IdVoo = $voo['IdVoo'];
                    $aeroportoSaida = $voo['aeroportoSaida'];
                    $aeroportoDestino = $voo['aeroportoDestino'];
                    $nomeComapanhia = $voo['nomeCompanhia'];
                    $horarioChegada = $voo['horarioChegada'];
                    $horarioSaida = $voo['horarioSaida'];
            
            ?>

            <tbody>
                <td><?php echo($IdVoo)?></td>
                <td><?php echo($aeroportoSaida)?></td>
                <td><?php echo($aeroportoDestino)?></td>
                <td><?php echo($nomeComapanhia)?></td>
                <td><?php echo($horarioChegada)?></td>
                <td><?php echo($horarioSaida)?></td>
                <td>
                    <form action="" method="post">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalUpVoo" data-bs-whateverId="<?=$IdVoo?>" data-bs-whateverAeroSaida="<?=$voo['fk_IdAeroporto_Saida']?>"
                            data-bs-whateverAeroDest="<?=$voo['fk_IdAeroporto_Destino']?>" data-bs-whateverComp="<?=$voo['fk_IdCompanhia']?>"
                            data-bs-whateverHorCheg="<?=$horarioChegada?>" data-bs-whateverHorSaida="<?=$horarioSaida?>">
                            Atualizar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" 
                            data-bs-target="#modalDelVoo" data-bs-whateverId="<?=$IdVoo?>" data-bs-whateverAeroSaida="<?=$voo['fk_IdAeroporto_Saida']?>"
                            data-bs-whateverAeroDest="<?=$voo['fk_IdAeroporto_Destino']?>" data-bs-whateverComp="<?=$voo['fk_IdCompanhia']?>"
                            data-bs-whateverHorCheg="<?=$horarioChegada?>" data-bs-whateverHorSaida="<?=$horarioSaida?>">
                            Excluir
                        </button>
                    </form>
                </td>
            </tbody>

            <?php } ?>

        </table>
    </div>
</div>

<?php include("include/voo/modalInsertVoo.php"); ?>
<?php include("include/voo/modalUpVoo.php"); ?>
<?php include("include/voo/modalDelVoo.php"); ?>
    
<script type="text/javascript">

    // Atualizar país
    var modalUpVoo = document.getElementById('modalUpVoo')
        modalUpVoo.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idVoo = button.getAttribute('data-bs-whateverId')
        var aeroSaida = button.getAttribute('data-bs-whateverAeroSaida')
        var aeroDest = button.getAttribute('data-bs-whateverAeroDest')
        var companhia = button.getAttribute('data-bs-whateverComp')
        var horarioCheg = button.getAttribute('data-bs-whateverHorCheg')
        var horarioSaida = button.getAttribute('data-bs-whateverHorSaida');

        var modalTitle = modalUpVoo.querySelector('.modal-title')
        var idInput = modalUpVoo.querySelector('#idVoo')
        var aeroSaidaInput = modalUpVoo.querySelector('#fkSaida')
        var aeroDestInput = modalUpVoo.querySelector('#fkDest')
        var companhiaInput = modalUpVoo.querySelector('#fkComp')
        var horarioSaidaInput = modalUpVoo.querySelector('#horarioSaida')
        var horarioChegInput = modalUpVoo.querySelector('#horarioCheg')

        modalTitle.textContent = 'ID do voo: ' + idVoo
        idInput.value = idVoo
        aeroSaidaInput.value = aeroSaida
        aeroDestInput.value = aeroDest
        companhiaInput.value = companhia
        horarioSaidaInput.value = horarioSaida
        horarioChegInput.value = horarioCheg 
    })
    
    // Deletar País
    var modalDelVoo = document.getElementById('modalDelVoo')
        modalDelVoo.addEventListener('show.bs.modal', function (event) {               
        var button = event.relatedTarget

        var idVoo = button.getAttribute('data-bs-whateverId')
        var aeroSaida = button.getAttribute('data-bs-whateverAeroSaida')
        var aeroDest = button.getAttribute('data-bs-whateverAeroDest')
        var companhia = button.getAttribute('data-bs-whateverComp')
        var horarioCheg = button.getAttribute('data-bs-whateverHorCheg')
        var horarioSaida = button.getAttribute('data-bs-whateverHorSaida');

        var modalTitle = modalDelVoo.querySelector('.modal-title')
        var idInput = modalDelVoo.querySelector('#idVoo')
        var aeroSaidaInput = modalDelVoo.querySelector('#fkSaida')
        var aeroDestInput = modalDelVoo.querySelector('#fkDest')
        var companhiaInput = modalDelVoo.querySelector('#fkComp')
        var horarioSaidaInput = modalDelVoo.querySelector('#horarioSaida')
        var horarioChegInput = modalDelVoo.querySelector('#horarioCheg')

        modalTitle.textContent = 'ID do voo: ' + idVoo
        idInput.value = idVoo
        aeroSaidaInput.value = aeroSaida
        aeroDestInput.value = aeroDest
        companhiaInput.value = companhia
        horarioSaidaInput.value = horarioSaida
        horarioChegInput.value = horarioCheg 
    })

</script>