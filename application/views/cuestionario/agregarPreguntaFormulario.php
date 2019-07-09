<div class="container">
    <h3>Respuestas de pregunta: <?= $cuestionario->result()[0]->nombreCuestionario ?></h3>
<?php
    echo form_open('/cuestionario/guardarpregunta/'.$id);
    ?><div class="form-group"><?php
    echo form_label('Selecciona la pregunta:');
    $options = array();
    foreach ($preguntas->result() as $row) {
        $options[$row->idPregunta] = $row->nombreCortoPregunta . ' - ' . $row->descripcionPregunta;
    }
    echo form_dropdown('idPregunta', $options, $preguntas->result()[0]->idPregunta, 'class="form-control"');
    ?></div><?php
    ?><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar</button><?php
    echo form_close();
?>
</div>