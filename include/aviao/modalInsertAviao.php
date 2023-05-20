<div class="modal fade" id="modalInsertAviao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cadastro de Cidades</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <label for="">Digite a quantidade de assento:</label>
                        <input type="number" class="form-control" min="0" name="qtdAssent" id="qtdAssent" required>
                    </div>
                    <div class="col">
                      <label for="">Selecione o tipo de assento:</label>
                      <select class="form-select" aria-label="Default select example" name="tipoAssent" required>
                        <option selected disabled value="">Selecione...</option>
                        <option value="Duplo">Duplo</option>
                        <option value="Triplo">Triplo</option>
                        <option value="Quaduplo">Quaduplo</option>
                      </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="">Selecione o aeroporto de destino:</label>
                        <select class="form-select" aria-label="Default select example" name="fkComp" required>
                            <option selected disabled value="">Selecione...</option>
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

            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success mb-3" name="cadAviao" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Cadastrar">
            </div>
        </form>
    </div>
  </div>
</div>