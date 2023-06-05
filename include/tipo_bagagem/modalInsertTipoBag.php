<div class="modal fade" id="modalInsertTipoBag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cadastro de tipo de bagagens</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <label for="">Digite o tipo de bagagem:</label>
                        <input type="text" class="form-control" name="nomeBag" id="nomeBag" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success mb-3" name="cadTipo" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Cadastrar">
            </div>
        </form>
    </div>
  </div>
</div>