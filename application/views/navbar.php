<?php $this->load->helper('url'); ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Sistema</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="<?= base_url('/pregunta')?>"><span class="glyphicon glyphicon-question-sign"></span> Preguntas</a></li>
      <li><a href="<?= base_url('/cuestionario') ?>"><span class="glyphicon glyphicon-check"></span> Cuestionarios</a></li>
      <li><a href="<?= base_url('/encuesta/verTodo') ?>"><span class="glyphicon glyphicon-list-alt"></span> Encuestas</a></ul>
      </li>
    </ul>
  </div>
</nav>
