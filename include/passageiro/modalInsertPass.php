<div class="modal fade" id="modalInsertPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cadastro de passageiros</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <label for="">Digite o nome do passageiro:</label>
                        <input type="text" class="form-control" name="nomePass" id="nomePass" required>
                    </div>
                </div>
                
                <br>
                <div class="row">               
                    <div class="col">
                        <label for="">Selecione a data de nascimento:</label>
                        <input type="date" class="form-control" name="dataNasc" id="dataNasc" required>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col">
                        <label for="">Selecione o gênero:</label>
                        <select class="form-select" aria-label="Default select example" name="gen" required>
                            <option selected disabled value="">Selecione...</option required>
                            <?php 
                                $query = mysqli_query($conexao, "select * from genero");
                                while($gen = mysqli_fetch_assoc($query)){
                            ?>

                            <option value="<?=$gen['IdGenero'];?>"><?=$gen['descGenero'];?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col">
                        <label for="">Selecione o avião:</label>
                        <select class="form-select" aria-label="Default select example" name="aviao" required>
                            <option selected disabled value="">Selecione...</option required>
                            <?php 
                                $query = mysqli_query($conexao, "select * from aviao");
                                while($av = mysqli_fetch_assoc($query)){
                            ?>

                            <option value="<?=$av['IdAviao'];?>"><?=$av['IdAviao'];?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success mb-3" name="cadPass" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Cadastrar">
            </div>
        </form>
    </div>
  </div>
</div>