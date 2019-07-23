<div class="container">
    <form class="form-horizontal" role="form" id="form" name="form" action="<?=base_url("/cuestionario/guardar")?>" method="POST">
        <div class="col-4">
            <h1 class="text-center"> Agregar Cuestionario </h1>
            <br>
            <br>
            <div class="form-grup"> 
                <label class="col-4"> Nombre del cuestionario: </label>
                <div class="col-4">
                    <input type="text" class="form-control" id="nombreCuestionario" name="nombreCuestionario" placeholder="Ingresa el nombre del cuestionario" autocomplete="off" required>
                </div>
            </div>
            <br>
            <br>
            <div class="text-center">
                <button type="submit" class="btn btn-success" id="guardar" name="guardar"> 
                    <samp class="glyphicon glyphicon-save" aria-heidden="TRUE"></samp> Guardar    
                </button>
            </div>
        </div>
    </form>
</div> 