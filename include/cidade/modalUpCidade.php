<div class="modal fade" id="modalUpCidade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cadastro de Cidades</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <input type="hidden" name="idCidade" id="idCidade">
                        <label for="">Digite o nome da cidade:</label>
                        <input type="text" class="form-control" name="nomeCidade" id="nomeCidade" required>
                    </div>
                    <div class="col">
                      <label for="">Selecione o país:</label>
                      <select class="form-select" aria-label="Default select example" name="idPais" id="idPais" required>
                        <option selected disabled value="">Selecione...</option>
                        <?php 
                            $sql = "select * from pais";

                            $query = mysqli_query($conexao, $sql);
                            while($pais = mysqli_fetch_assoc($query)){
                        ?>

                        <option value="<?=$pais['IdPais'];?>"><?=$pais['nomePais'];?></option>

                        <?php } ?>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary mb-3" name="upCidade" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Atualizar">
            </div>
        </form>
    </div>
  </div>
</div>