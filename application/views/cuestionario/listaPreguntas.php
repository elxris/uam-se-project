<div class="container">
<div class="row">
<div class="col-md-4">
    <h3>Preguntas</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre Corto Pregunta</th>
                <th><span class="glyphicon glyphicon-option-horizontal"></span></th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach ($preguntasRestantes->result() as $row) {
        ?>
            <tr>
                <td><?= $row->nombreCortoPregunta ?></td>
                <td>
                    <a href="<?= base_url('/cuestionario/agregarPregunta/'.$id.'/'.$row->idPregunta) ?>" class="btn btn-primary">Agregar al cuestionario <span class="glyphicon glyphicon-arrow-right"></span></a>
                </td>
            </tr>
        <?php
    }
?>
    </tbody>
    </table>
</div>
<div class="col-md-8">
    <h3>Respuestas al cuestionario: <?= $cuestionario->result()[0]->nombreCuestionario ?></h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre Corto Pregunta</th>
                <th><span class="glyphicon glyphicon-option-horizontal"></span></th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach ($preguntas->result() as $row) {
        ?>
            <tr>
                <td><?= $row->nombreCortoPregunta ?></td>
                <td>
                    <a href="<?= base_url('/cuestionario/borrarPregunta/'.$id.'/'.$row->idPregunta) ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Borrar del cuestionario</a>
                    <a href="<?= base_url('/cuestionario/moverArriba/'.$id.'/'.$row->idPregunta) ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-up"></span> Subir</a>
                    <a href="<?= base_url('/cuestionario/moverAbajo/'.$id.'/'.$row->idPregunta) ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-down"></span> Bajar</a>
                </td>
            </tr>
        <?php
    }
?>
    </tbody>
    </table>
</div>
</div>
</div>
