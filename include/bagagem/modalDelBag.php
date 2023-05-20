<div class="modal fade" id="modalDelBag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="">Deseja excluir o registro?</label>
                        <input type="hidden" name="idBag" id="idBag">
                        <input type="hidden" name="peso" id="peso">
                        <input type="hidden" name="fkTipo" id="fkTipo">
                        <input type="hidden" name="fkPass" id="fkPass">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" name="delBag" value="Sim">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
            </div>
        </form>
    </div>
  </div>
</div>