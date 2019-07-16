<?php $this->load->helper('url'); ?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Sistema</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Respuestas <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/uam-se-project/respuesta/crear/1">Agregar Respuesta</a></li>
                    <li><a href="#">Modificar Respuesta</a></li>
                    <li><a href="#">Eliminar Respuesta</a></li>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Preguntas <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/uam-se-project/pregunta">Agregar Preguntas</a></li>
                    <li><a href="#">Modificar Preguntas</a></li>
                    <li><a href="http://localhost/uam-se-project/pregunta/verPreguntas">Eliminar Preguntas</a></li>
                </ul>
            </li>
            <li><a href="<?= base_url('/cuestionario/') ?>"><span class="glyphicon glyphicon-check"></span> Cuestionarios</a></li>
            <li><a href="encuesta/verTodo"><span class="glyphicon glyphicon-list-alt"></span> Encuestas</a></li>
        </ul>
    </div>
</nav>