<div class="modal fade" id="modalUpPn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <label for="">Selecione o passageiro:</label>
                        <input type="hidden" name="idPn" id="idPn">
                        <select class="form-select" aria-label="Default select example" name="passageiro" id="pass" required>
                            <option selected disabled value="">Selecione...</option>
                            <?php 
                                $query = mysqli_query($conexao, "select * from passageiro");
                                while($p = mysqli_fetch_assoc($query)){
                            ?>

                            <option value="<?=$p['IdPassageiro'];?>"><?=$p['nomePassageiro'];?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <br>

                <div class="row">
                    <div class="col">
                        <label for="">Selecione a nacionalidade:</label>
                        <select class="form-select" aria-label="Default select example" name="nacionalidade" id="nac" required>
                            <option selected disabled value="">Selecione...</option required>
                            <?php 
                                $query = mysqli_query($conexao, "select * from nacionalidade");
                                while($n = mysqli_fetch_assoc($query)){
                            ?>

                            <option value="<?=$n['IdNacionalidade'];?>"><?php echo($n['descNacionalidade']);?></option>

                            <?php } ?>
                        </select>
                    </div>
                </div>
            
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary mb-3" name="upPn" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Atualizar">
            </div>
        </form>
    </div>
  </div>
</div>