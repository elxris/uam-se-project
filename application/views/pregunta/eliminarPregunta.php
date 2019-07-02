<script>
function alerta()
    {
    var mensaje;
    var opcion = confirm("¿Estás seguro que deseas eliminar la pregunta?");
    if (opcion == true) {
        mensaje = true;
	} else {
	    mensaje = false;
	}
	document.getElementById("ejemplo").innerHTML = mensaje;
}

<?php 
    $botonGuardar = array(
            'value' => 'Registrar',
            'name' => '' ,
            'class' => 'btn btn-primary'
    );

    $elimina = array(
            'value' => 'Eliminar',
            'name' => 'elimina',
            'class' => 'btn btn-danger',
            'onclick' => 'alerta()'
    );

?>
</script>

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
                <?= form_open("pregunta/eliminar") ?>
                <?php
	                if($preguntas){	
	                    foreach ($preguntas->result() as $pregunta) { ?>
                    <tr>
                        <td><?php echo $pregunta->idPregunta; ?></td>
                        <td><?php echo $pregunta->nombreCortoPregunta; ?></td>
                        <td><?php echo $pregunta->descripcionPregunta; ?></td>
                        <td><?= form_submit($elimina)?></td>
                    </tr>
                    <?php } 
	                    }else{
		                    echo "<p>No existe el elemento</p>";
	                }
	            ?>
                <?= form_close() ?>
                </tbody>
            </table>
            <div class="col-xs-6 offset-6">
                <p id="ejemplo">En este párrafo se mostrará la opción clickada por el usuario</p>
            </div>
        </div>
    </div>
