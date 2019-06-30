<script>
function alerta()
    {
    var mensaje;
    var opcion = confirm("Clicka en Aceptar o Cancelar");
    if (opcion == true) {
        mensaje = "Has clickado OK";
	} else {
	    mensaje = "Has clickado Cancelar";
	}
	document.getElementById("ejemplo").innerHTML = mensaje;
}

<?php 

    $botonGuardar = array(
            'value' => 'Registrar',
            'name' => '' ,
            'class' => 'btn btn-primary'
    );

    $checador = array(
            'type' => 'checkbox',
            'name' => 'eliminado[]',
            'class' => 'btn btn-primary'
    );

?>

</script>
<?= form_open("pregunta/eliminar") ?>
<title>Eliminar preguntas</title>
	<div class="container">
        <div class="col-md-12" >
            <h1>Elminar preguntas</h1>
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
                        <th scope="col">Pregunta</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
	                if($preguntas){	
	                    foreach ($preguntas->result() as $pregunta) { ?>
                    <tr>
                        <td><?php echo $pregunta->idPregunta; ?></td>
                        <td><?php echo $pregunta->nombreCortoPregunta; ?></td>
                        <td><?php echo $pregunta->descripcionPregunta; ?></td>
                        <td><input type="checkbox" name="eliminar[]" value=<?php echo $pregunta->idPregunta ?> method="POST"></td>
                        <td><?= form_submit($checador) ?>o</td>
                    </tr>
                    <?php } 
	                    }else{
		                    echo "<p>No existe el elemento</p>";
	                }
	            ?>
                </tbody>
            </table>
            <div class="col-xs-6 offset-6">
                <button class="btn btn-danger" type="button">Eliminar</button>
                <button onclick="alerta()">Clicka para mostrar mensaje</button>
                <p id="ejemplo">En este párrafo se mostrará la opción clickada por el usuario</p>
                <?= form_submit($botonGuardar) ?>
            </div>
        </div>
    </div>
<?= form_close() ?>