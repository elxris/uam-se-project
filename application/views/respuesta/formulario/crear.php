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
<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Guardar</button>
<?= form_close() ?>
        </div>
    </div>
</div>
