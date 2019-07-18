<div class="container">
<?php
if ($datos == false) {
    ?><h3>Error al obtener la pregunta.</h3><?php
} else {
?>
    <h3><?= $datos->nombreUsuario ?></h3>
<?php
}
?>
</div>