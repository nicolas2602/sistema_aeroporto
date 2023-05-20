<div class="modal fade" id="modalUpGen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="">Digite o cargo:</label>
                        <input type="hidden" name="idGen" id="idGen">
                        <input type="text" class="form-control" name="descGen" id="descGen" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary mb-3" name="upGen" data-bs-toggle="modal" data-bs-target="#exampleModal" value="Atualizar">
            </div>
        </form>
    </div>
  </div>
</div>