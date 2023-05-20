<div class="modal fade" id="modalDelPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cadastro de passageiros</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <label for="">Deseja excluir o registro?</label>
                        <input type="hidden" name="idPass" id="idPass">
                        <input type="hidden" name="nomePass" id="nomePass">
                        <input type="hidden" name="dataNasc" id="dataNasc">
                        <input type="hidden" name="gen" id="gen">
                        <input type="hidden" name="aviao" id="aviao">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="delPass" value="Sim">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
            </div>
        </form>
    </div>
  </div>
</div>