
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

        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Guardar</button>
        <br>
        <br>
    </div>          

</div>
    
    <?= form_close() ?>
