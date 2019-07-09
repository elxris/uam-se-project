<div class="container">
    <h3>Respuestas de pregunta: <?= $cuestionario->result()[0]->nombreCuestionario ?></h3>
    <a href="<?= base_url('/cuestionario/agregarpregunta/'.$id) ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar Pregunta</a>
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
                    <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Borrar del cuestionario</a>
                    <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-up"></span> Subir</a>
                    <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-down"></span> Bajar</a>
                </td>
            </tr>
        <?php
    }
?>
    </tbody>
    </table>
</div>