<?php
?><div class="container"><?php
if ($resultado == false) {
    ?><h3>Error al obtener los cuestionarios.</h3><?php
} else {
    ?>
        <h3>Cuestionarios</h3>
        <a href="<?= base_url('/cuestionario/agregar') ?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
        <table class="table">
            <thead>
                <tr><th>Cuestionario</th><th><span class="glyphicon glyphicon-option-horizontal"></span></th></tr>
            </thead>
            <tbody>
    <?php
    foreach ($resultado->result() as $row) {
        ?><tr>
            <td><?= $row->nombreCuestionario ?></td>
            <td>
                <a class="btn btn-xs btn-primary" href="<?= base_url('/cuestionario/preguntas/'.$row->idCuestionario) ?>"><span class="glyphicon glyphicon-th-list"></span> Preguntas</a>
                <a class="btn btn-xs btn-success" href="<?= base_url('/cuestionario/modificar') ?>"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>
                <a class="btn btn-xs btn-danger" href="<?= base_url('/cuestionario/eliminar') ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
            </td>
        <tr><?php
    }
    ?></tbody></table><?php
}
?></div><?php
?>