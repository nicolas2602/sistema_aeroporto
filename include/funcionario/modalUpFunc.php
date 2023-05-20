<div class="modal fade" id="modalUpFunc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cadastro de funcionários</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <label for="">Digite o nome do funcionário:</label>
                        <input type="hidden" class="form-control" name="idFunc" id="idFunc">
                        <input type="text" class="form-control" name="nomeFunc" id="nomeFunc" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="">Selecione o gênero:</label>
                        <select class="form-select" aria-label="Default select example" name="gen" id="gen" required>
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
                        <label for="">Selecione o cargo:</label>
                        <select class="form-select" aria-label="Default select example" name="cargo" id="cargo" required>
                            <option selected disabled value="">Selecione...</option required>
                            <?php 
                                $query = mysqli_query($conexao, "select * from cargo");
                                while($cargo = mysqli_fetch_assoc($query)){
                            ?>

                            <option value="<?=$cargo['IdCargo'];?>"><?=$cargo['descCargo'];?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="">Selecione o avião:</label>
                        <select class="form-select" aria-label="Default select example" name="aviao" id="aviao" required>
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
                <input type="submit" class="btn btn-primary mb-3" name="upFunc" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Atualizar">
            </div>
        </form>
    </div>
  </div>
</div>