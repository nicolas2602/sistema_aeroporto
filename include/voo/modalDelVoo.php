<div class="modal fade" id="modalDelVoo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Cadastro de Países</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="post">
            <div class="modal-body">
                <label for="">Deseja excluir o registro?</label>
                <input type="hidden" name="idVoo" id="idVoo">
                <input type="hidden" name="fkSaida" id="fkSaida">
                <input type="hidden" name="fkDest" id="fkDest">
                <input type="hidden" name="fkComp" id="fkComp">
                <input type="hidden" name="horarioSaida" id="horarioSaida">
                <input type="hidden" name="horarioCheg" id="horarioCheg">
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" name="delVoo" value="Sim">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
            </div>
        </form>
    </div>
  </div>
</div>
