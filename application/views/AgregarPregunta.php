<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Agregar pregunta</title>
</head>
<body>
	<h1>Agregar una pregunta</h1>
	<?= form_open("/modificarDatos/recibirDatos") ?>

	<?php

		$nombre = array(
			'name' => 'Nombre' ,
			'placeholder' => 'Escribe tu nombre' 
		);

		$descripcion = array(
			'name' => 'Desc' ,
			'placeholder' => 'Ingresa una descripción' 
		);

	?>
	<?= form_label('Nombre: ','nombre') ?>
	<?= form_input($nombre) ?>
    </br>
    </br>
	<?= form_label('Descripción: ','descripcion') ?>
	<?= form_textarea($descripcion) ?>
	<br>
	<br>
	<?= form_submit('','Guardar') ?>

	<?= form_close() ?>
</body>
</html>