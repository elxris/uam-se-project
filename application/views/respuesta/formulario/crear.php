<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Agregar Respuesta</h3>
<?php $hidden = array('idPregunta' => $idPregunta); ?>
<?= form_open('respuesta/recibirDatos', '', $hidden) ?>
<div class="form-group">
    <?= form_label('Respuesta:', 'nombreRespuesta', array('class'=>'col-sm-12')) ?>
    <?= form_textarea(array('name'=>'nombreRespuesta','value'=>'','class'=>'form-control', 'required'=>true)) ?>
</div>
<?= form_submit(array('name' => 'sumbmit', 'value'=>'Crear', 'class'=>'btn btn-success')); ?>
<?= form_close() ?>
        </div>
    </div>
</div>
