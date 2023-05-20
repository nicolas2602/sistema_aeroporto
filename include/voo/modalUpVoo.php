<div class="modal fade" id="modalUpVoo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cadastro de Países</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label for="">Selecione o aeroporto de saída:</label>
                        <input type="hidden" name="idVoo" id="idVoo">
                        <select class="form-select" aria-label="Default select example" name="fkSaida" id="fkSaida" required>
                            <option selected disabled value="">Selecione...</option required>
                            <?php 
                                $sqlSaida = "select saida.IdAeroporto as IdSaida, saida.nomeAeroporto as nomeSaida
                                            from aeroporto as saida";
                                $query = mysqli_query($conexao, $sqlSaida);
                                while($d = mysqli_fetch_assoc($query)){
                            ?>

                            <option value="<?=$d['IdSaida'];?>"><?=$d['nomeSaida'];?></option>

                            <?php } ?>
                        </select>
                    </div>              
                </div>
                
                <br>

                <div class="row">
                    <div class="col">
                        <label for="">Selecione o aeroporto de destino:</label>
                        <select class="form-select" aria-label="Default select example" name="fkDest" id="fkDest" required>
                            <option selected disabled value="">Selecione...</option required>
                            <?php 
                                $sqlDestino = "select dest.IdAeroporto as IdDest, 
                                                    dest.nomeAeroporto as nomeDest
                                                from aeroporto as dest";
                                $query = mysqli_query($conexao, $sqlDestino);
                                while($d = mysqli_fetch_assoc($query)){
                            ?>

                            <option value="<?=$d['IdDest'];?>"><?=$d['nomeDest'];?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <br>

                <div class="row">
                    <div class="col">
                        <label for="">Selecione o aeroporto de destino:</label>
                        <select class="form-select" aria-label="Default select example" name="fkComp" id="fkComp" required>
                            <option selected disabled value="">Selecione...</option required>
                            <?php 
                                $sqlDestino = "select * from companhia_aerea";
                                $query = mysqli_query($conexao, $sqlDestino);
                                while($d = mysqli_fetch_assoc($query)){
                            ?>

                            <option value="<?=$d['IdCompanhia'];?>"><?=$d['nomeCompanhia'];?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <br>

                <div class="row">
                    <div class="col">
                        <label for="">Selecione o horário de saída:</label>
                        <input type="time" class="form-control" name="horarioSaida" id="horarioSaida">
                    </div>
                    
                    <div class="col">
                        <label for="">Selecione o horário de chegada:</label>
                        <input type="time" class="form-control" name="horarioCheg" id="horarioCheg">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary mb-3" name="cadVoo" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Atualizar">
            </div>
        </form>
    </div>
  </div>
</div>
