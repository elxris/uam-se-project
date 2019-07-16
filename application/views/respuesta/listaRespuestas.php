
	<div class="container">
        <div class="col-md-12" >
            <h2><?php 
                            foreach ($pregunta->result() as $p) {
                                echo $p->nombreCortoPregunta;
                            }
                ?></h2>
            <table class="table">
                <thead>
                     <tr>
                        <th scope="col">Respuestas</th>
                    </tr>
                </thead>
                <tbody>
                <?php
	                if($respuestas){	
	                    foreach ($respuestas->result() as $respuesta) { ?>
                    <tr>
                        <td><?php echo $respuesta->nombreRespuesta; ?></td>
                        <td>
                            <a class="btn btn-xs btn-success" href="<?= base_url() ?>"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>
                            <a class="btn btn-xs btn-danger" href="<?= base_url('/pregunta/eliminar/'.$respuesta->idPregunta) ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                        </td>
                    </tr>
                    <?php } 
	                    }else{
		                    echo "<p>No existen respuestas</p>";
	                }
	            ?>
                </tbody>
            </table>
            <div class="col-xs-6 offset-6">
            </div>
        </div>
    </div>
