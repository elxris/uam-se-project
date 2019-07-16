<div class="container">
    <form class="form-horizontal" role="form" id="form" name="form" action="<?=base_url('/encuesta/editaEncuesta/'.$idEncuesta)?>" method="POST">
        <div class="col-4">
            <h1 class="text-center">Editar Encuesta</h1>
            <br>
            <br>
            <div class="form-group">
                <label class="col-4">Nombre la Encuesta:  </label>
                <div class="col-4">
                    <input type="text" class="form-control" id="nombreEncuesta" name="nombreEncuesta" value="<?=$nombreEncuesta?>" required autocomplete="off">
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-4">Descripción de la Encuesta: </label>
                <div class="col-4">
                    <textarea type="text" class="form-control" id="descripcionEncuestaEncuesta" name="descripcionEncuesta" rows="7" required><?=$descripcionEncuesta?></textarea>
                    <!--<input type="text" class="form-control" id="descripcionEncuesta" name="descripcionEncuesta" rows="6" required>-->
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Fecha de inicio: </label>
                    <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="<?=$fechaInicio?>" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Fecha limite: </label>
                    <input type="date" class="form-control" id="fechaFin" name="fechaFin" value="<?=$fechaFin?>" required>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label class="col-4">Cuestionario Asociado: </label>
            <div class="col-4">
                <select class="form-control" name="idCuestionario" id="idCuestionario" required>
                    <!--<option value="" disabled selected> Seleccione un cuestionario </option>-->
                    <option value="" disabled selected> Seleccione un Cuestionario</option>
                    <?php
                    if($cuestionario != FALSE){
                        foreach ($cuestionario->result() as $row){
                            echo "<option value=".$row->idCuestionario.">".$row->nombreCuestionario."</option>";
                        }
                    }
                    else{
                        echo 'No hay cursos';
                    }
                    ?>
                </select>
            </div>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="guardar" name="guardar"> 
                <samp class="glyphicon glyphicon-edit" aria-heidden="TRUE"></samp> Editar Encuesta    
            </button>
        </div>    
    </form>
</div>

