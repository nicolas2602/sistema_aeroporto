<div class="modal fade" id="modalInsertCidade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cadastro de Cidades</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <label for="">Digite o nome da cidade:</label>
                        <input type="text" class="form-control" name="nomeCidade" id="nomePais" required>
                    </div>
                    <div class="col">
                      <label for="">Selecione o país:</label>
                      <select class="form-select" aria-label="Default select example" name="idPais" required>
                        <option selected></option required>
                        <?php 
                          $query = mysqli_query($conexao, "select * from pais");
                          while($pais = mysqli_fetch_assoc($query)){
                        ?>

                        <option value="<?=$pais['IdPais'];?>"><?=$pais['nomePais'];?></option>

                        <?php } ?>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success mb-3" name="cadCidade" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Cadastrar">
            </div>
        </form>
    </div>
  </div>
</div>