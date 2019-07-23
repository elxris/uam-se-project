<div class="container">
<?php
if ($datos == false) {
    ?><h3>Error al obtener la pregunta.</h3><?php
} else {
?>
    <h2>Bienvenid@ a la encuesta:</h3>
    <h3><?= $datos->nombreEncuesta ?></h3>
    <h4>Encuestador: <?= $datos->nombreUsuario ?></h4>
    <p>Haremos un par de preguntas de opción multiple. Cuando esté listo, por favor de click en continuar.</p>
    <a class="btn btn-primary" href="<?= base_url("/contestar/index/{$idContestacion}/0") ?>">Continuar</a>
<?php
}
?>
</div>
