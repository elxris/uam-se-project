
<?php 
    $test = 'prueba de test';
    $botonGuardar = array(
            'value' => 'Registrar',
            'name' => '' ,
            'class' => 'btn btn-primary'
    );
?>

<title>Eliminar respuestas</title>
	<div class="container">
        <div class="col-md-12" >
            <h1>Elminar respuestas</h1>
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">Buscar</button>
                        </span>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
            <br>
            <table class="table">
                <thead>
                     <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Respuesta</th>
                        <th scope="col">Pregunta asociada</th>
                    </tr>
                </thead>
                <tbody>
                <?php
	                if($respuestas){	
	                    foreach ($respuestas->result() as $respuesta) { ?>
                    <tr>
                        <td><?php echo $respuesta->idRespuesta; ?></td>
                        <td><?php echo $respuesta->nombreRespuesta; ?></td>
                        <td><a href="" class="btn btn-danger" value="Eliminar">Eliminar</a></td>
                    </tr>
                    <?php } 
	                    }else{
		                    echo "<p>No existe el elemento</p>";
	                }
	            ?>
                </tbody>
            </table>
            <div class="col-xs-6 offset-6">
            </div>
        </div>
    </div>
