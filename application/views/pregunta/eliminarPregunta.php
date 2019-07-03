<script>
function alerta(idP)
    {
    var base_url = window.location.origin;
    var opcion = confirm("¿Estás seguro que deseas eliminar la pregunta?");
    if (opcion == true) {
        document.location.href=base_url+"/uam-se-project/pregunta/eliminar/"+idP;
	}
}

<?php 
    $test = 'prueba de test';
    $botonGuardar = array(
            'value' => 'Registrar',
            'name' => '' ,
            'class' => 'btn btn-primary'
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
                <?php
	                if($preguntas){	
	                    foreach ($preguntas->result() as $pregunta) { ?>
                    <tr>
                        <td><?php echo $pregunta->idPregunta; ?></td>
                        <td><?php echo $pregunta->nombreCortoPregunta; ?></td>
                        <td><?php echo $pregunta->descripcionPregunta; ?></td>
                        <td><input type="button" value="Eliminar" onclick="alerta(<?php echo $pregunta->idPregunta?>)" class="btn btn-danger"></input></td>
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
