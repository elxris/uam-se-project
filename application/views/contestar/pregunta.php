<div class="container">
<?php
if ($datos == false) {
    ?><h3>Error al obtener la pregunta.</h3><?php
} else {
?>
    <h3><?= $datos->nombreEncuesta ?></h3>
    <h4>Encuestador: <?= $datos->nombreUsuario ?></h4>
    <h4><?= $pregunta->nombreCortoPregunta ?></h4>
    <p><?= $pregunta->descripcionPregunta ?></p>
    <form action="<?= base_url('/contestar/guardarRespuesta') ?>" method="POST">
        <input type="hidden" name="idEncuesta" value="<?= $datos->idEncuesta ?>" />
        <input type="hidden" name="idUsuario" value="<?= $datos->idUsuario ?>" />
        <input type="hidden" name="idContestacion" value="<?= $idContestacion ?>" />
        <input type="hidden" name="idPregunta" value="<?= $pregunta->idPregunta ?>" />
        <input type="hidden" name="nextPregunta" value="<?= $numPregunta + 1 ?>" />
        <div class="form-group">
            <?

                foreach ($respuestas->result() as $row) {
                    ?>
                    <div class="radio">
                    <label>
                    <input type="radio" name="idRespuesta" value="<?= $row->idRespuesta ?>" required />
                    <?= $row->nombreRespuesta ?>
                    </label>
                    </div>
                    <?
                }

            ?>
        </div>
        <input type="submit" value="Siguiente" class="btn btn-primary" />
    </form>
<?php
}
?>
</div>
