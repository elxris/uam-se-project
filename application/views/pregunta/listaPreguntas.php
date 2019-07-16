
    <?= form_open("/pregunta/recibirDatos") ?>

    <?php

        $nombre = array(
            'name' => 'Nombre' ,
            'placeholder' => 'Ingresa pregunta', 
                        'class' => 'form-control'
                    );

        $descripcion = array(
            'name' => 'Desc' ,
            'placeholder' => 'Ingresa una descripción',
                        'class' => 'form-control'
        );
        

    ?>
        
<div class="container">
    <div class="col-4">
        <h1>Preguntas</h1>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>Agregar</button>
    </div>          
            <table class="table">
                <thead>
                     <tr>
                        <th scope="col">Pregunta</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if($preguntas){ 
                        foreach ($preguntas->result() as $pregunta) { ?>
                    <tr>
                        <td><?php echo $pregunta->nombreCortoPregunta; ?></td>
                        <td><?php echo $pregunta->descripcionPregunta; ?></td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="<?= base_url('respuesta/verRespuestas/'.$pregunta->idPregunta) ?>"><span class="glyphicon glyphicon-th-list"></span>Respuestas</a>
                            <a class="btn btn-xs btn-success" href="<?= base_url() ?>"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>
                            <a class="btn btn-xs btn-danger" href="<?= base_url('/pregunta/eliminar/'.$pregunta->idPregunta) ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                        </td>
                    </tr>
                    <?php } 
                        }else{
                            echo "<p>No existen preguntas</p>";
                    }
                ?>
                </tbody>
            </table>
            <div class="col-xs-6 offset-6">
            </div>
      
    </div>
    
    <?= form_close() ?>
