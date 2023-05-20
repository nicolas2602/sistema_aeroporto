<div class="modal fade" id="modalDelTipoBag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <label for="">Digite o tipo de bagagem:</label>
                        <input type="hidden" name="idTb" id="idTb">
                        <input type="hidden" name="nomeBag" id="nomeBag" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-success" name="delTb" value="Sim">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
            </div>
        </form>
    </div>
  </div>
</div>