
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
                
                $botonGuardar = array(
            'value' => 'Registrar',
            'name' => '' ,
            'class' => 'btn btn-primary'
        );

    ?>
        
<div class="container">
    <div class="col-4">
        <h1>Ingresa pregunta</h1>
        <br>
        <br>
        <?= form_label('Nombre: ', 'nombre') ?>
        <?= form_input($nombre, null, 'required') ?>
        </br>
        </br>
        <?= form_label('Descripción: ', 'descripcion') ?>
        <?= form_textarea($descripcion, null, 'required') ?>
        <br>
        <br>

        <?= form_submit($botonGuardar) ?>
        <br>
        <br>
    </div>          

</div>
    
    <?= form_close() ?>
