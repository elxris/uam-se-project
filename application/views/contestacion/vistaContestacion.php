<div class="container">
    <form class="form-horizontal" role="form" id="form" name="form" action="<?=base_url('/contestacion/guardar')?>" method="POST">
        <div class="col-4">
            <h1 class="text-center">Contestación</h1>
            <br>
            <div class="form-group">
                <label class="col-4">Seleccione un Cuestionario... </label>
                <div class="col-4">
                    <select class="form-control" name="idEncuesta" id="idEncuesta" required="">
                        <option value="" disabled selected> Seleccione un cuestionario </option>
                        <?php
                        if($encuesta != FALSE){
                            foreach ($encuesta->result() as $row){
                                echo "<option value=".$row->idEncuesta.">".$row->nombreEncuesta."</option>";
                            }
                        }
                        else{
                            echo 'No hay Cuestionarios';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <br>
            <div class="form-group">
                <label class="col-4">Seleccione un Encuestador... </label>
                <div class="col-4">
                    <select class="form-control" name="idUsuario" id="idUsuario" required="">
                        <option value="" disabled selected> Seleccione un encuestador </option>
                        <?php
                        if($usuario != FALSE){
                            foreach ($usuario->result() as $row){
                                echo "<option value=".$row->idUsuario.">".$row->nombreUsuario."</option>";
                            }
                        }
                        else{
                            echo 'No hay Encuestadores';
                        }
                        ?>
                    </select>
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

