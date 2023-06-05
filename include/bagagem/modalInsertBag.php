<div class="modal fade" id="modalInsertBag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cadastro de bagagens</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <label for="">Digite o peso da bagagem:</label>
                        <input type="number" class="form-control" min="0" name="peso" id="peso" required>
                    </div>
                    <div class="col">
                        <label for="">Selecione o tipo de bagagem:</label>
                        <select class="form-select" aria-label="Default select example" name="fkTipo" required>
                            <option selected disabled value="">Selecione...</option required>
                            <?php 
                                $sqlTipo = "select * from tipo_bagagem";
                                $query = mysqli_query($conexao, $sqlTipo);
                                while($t = mysqli_fetch_assoc($query)){
                            ?>

                            <option value="<?=$t['IdTipoBagagem'];?>"><?=$t['nomeBagagem'];?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="">Selecione o passageiro:</label>
                        <select class="form-select" aria-label="Default select example" name="fkPass" required>
                            <option selected disabled value="">Selecione...</option required>
                            <?php 
                                $query = mysqli_query($conexao, "select * from passageiro");
                                while($p = mysqli_fetch_assoc($query)){
                            ?>

                            <option value="<?=$p['IdPassageiro'];?>"><?=$p['nomePassageiro'];?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success mb-3" name="cadBag" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Cadastrar">
            </div>
        </form>
    </div>
  </div>
</div>