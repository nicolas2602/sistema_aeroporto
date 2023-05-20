<div class="modal fade" id="modalUpAero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cadastro de Aeroportos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <label for="">Digite o nome do aeroporto:</label>
                        <input type="hidden" class="form-control" name="idAero" id="idAero" required>
                        <input type="text" class="form-control" name="nomeAero" id="nomeAero" required>
                    </div>
                    <div class="col">
                      <label for="">Selecione a cidade:</label>
                      <select class="form-select" aria-label="Default select example" name="idCidade" id="idCidade" required>
                        <option selected disabled value="">Selecione...</option required>
                        <?php 
                          $query = mysqli_query($conexao, "select * from cidade");
                          while($city = mysqli_fetch_assoc($query)){
                        ?>

                        <option value="<?=$city['IdCidade'];?>"><?=$city['nomeCidade'];?></option>

                        <?php } ?>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary mb-3" name="upAero" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Atualizar">
            </div>
        </form>
    </div>
  </div>
</div>