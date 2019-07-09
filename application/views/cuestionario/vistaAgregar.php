<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h3>Agregar Cuestionario</h3>
        <form class="form-horizontal" role="form" id="form" name="form" action="<?=base_url()?>cuestionario/guardar" method="POST">
          <div class="form-group">
            <label form="inputEmail3" class="col-sm-4 control-label">Nombre del cuestionario:  </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nombreCuestionario" name="nombreCuestionario" placeholder="Ingresa el nombre del cuestionario" required>
            </div>
          </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Guardar</button>
              </div>
            </div>
        </form>
    </div>
  </div>
</div>

