<div class="modal fade" id="modalEditPais" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Atualizar País</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <label for="">Digite o nome do país:</label>
                        <input type="hidden" name="IdPais" id="idPais">
                        <input type="text" class="form-control" name="nomePais" id="nomePais" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary mb-3" name="upPais" value="Atualizar">
            </div>
        </form>
    </div>
  </div>
</div>