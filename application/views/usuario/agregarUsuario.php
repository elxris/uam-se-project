
<script>
    var mostrarValor = function(x){
        document.getElementById('idMiRol').value=x;
        }
</script>
<div class="container">
<hr>


<div class="col-md-9 col-md-offset-4">
<div class="col-md-6">
<div class="card">
<header class="card-header">
    <h4 class="card-title mt-2">Registrar</h4>
</header>
<article class="card-body">

<?= form_open("/usuario/recibirDatos") ?>

<?php

        $nombre = array(
            'name' => 'NombreUsuario' ,
            'placeholder' => 'Ingresa un nombre de usuario', 
            'class' => 'form-control'
                    );

        $contras = array(
            'name' => 'Pass' ,
            'placeholder' => 'Ingresa una contraseña',
            'class' => 'form-control',
            'type' => 'password'
        );

        $inRol = array(
            'name' => 'miRol' ,
            'type' => 'hidden',
            'id' => 'idMiRol'
        );
        

?>


<form>
    <div class="form-row">
      <div class="col form-group">
        <?= form_label('Nombre de usuario: ', 'nombre') ?>
        <?= form_input($nombre, null, 'required') ?>
    </div> <!-- form-group end.// -->
    </div> <!-- form-row end.// -->
  
    <div class="form-group">
        <?= form_label('Contraseña: ', 'contra') ?>
        <?= form_input($contras, null, 'required') ?>
    </div> <!-- form-group end.// -->  
    <div class="form-group" name="miRol">
          <label>Rol</label>
          <select class="form-control" id="idSelect" onchange="mostrarValor(this.value);" required>
              <option value="">Selecciona rol</option>
              <?php
                    if($roles){ 
                        foreach ($roles->result() as $rol) { ?>

              <option value="<?php echo $rol->idRol; ?>"><?php echo $rol->nombreRol; ?></option>
              <?php } 
                        }else{
                            echo "<p>No existen roles</p>";
                    }
              ?>
          </select>
        </div> <!-- form-group end.// -->
    <?= form_input($inRol) ?>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Registrar  </button>
    </div> <!-- form-group// -->                                             
</form>


<?= form_close() ?>

