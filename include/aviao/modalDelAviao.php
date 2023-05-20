<div class="modal fade" id="modalDelAviao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cadastro de Cidades</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <div class="row">               
                    <div class="col">
                        <label for="">Deseja excluir o registro?</label>
                        <input type="hidden" name="idAviao" id="idAviao">
                        <input type="hidden" name="qtdAssent" id="qtdAssent">
                        <input type="hidden" name="tipoAssent" id="tipoAssent">
                        <input type="hidden" name="fkComp" id="fkComp">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-success" name="delAviao" value="Sim">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
            </div>
        </form>
    </div>
  </div>
</div>