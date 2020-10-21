<?php
include("config/config-servicio.php");

if(isset($_GET['edit'])){
  $servicio = getServicio($_GET['edit']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link type="text/css" rel="stylesheet" href="styles/home2.css">
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container" id="containerr">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand">LOGO</a>
      <div class="navbar-nav mr-auto">
        <a class="nav-item nav-link active" href="home.html">Home</a>
        <span class="nav-item nav-link">|</span>
        <a class="nav-item dropdown active">
          <div class="btn-group btn-group-md">
            <a class="nav-item nav-link active" href="taller.php">Taller</a>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTaller" data-toggle="dropdown"></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="unidad.php">Alta Unidades</a>
              <a class="dropdown-item" href="reparacion.php">Alta Reparaciones</a>
            </div>
          </div>
        </a>
        <span class="nav-item nav-link">|</span>
        <a class="nav-item dropdown active">
          <div class="btn-group btn-group-md">
            <a class="nav-item nav-link active" href="listado-servicios.php">Listado de Servicios</a>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTaller" data-toggle="dropdown"></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="servicio.php">Alta Servicios</a>
            </div>
          </div>
        </a>
        <span class="nav-item nav-link">|</span>
        <a class="nav-item dropdown active">
          <div class="btn-group btn-group-md">
            <a class="nav-item nav-link active" href="calendario-viajes.html">Calendario de Viajes</a>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTaller" data-toggle="dropdown"></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="viaje.html">Alta Viajes</a>
            </div>
          </div>
        </a>
        <span class="nav-item nav-link">|</span>
        <a class="nav-item dropdown active">
          <div class="btn-group btn-group-md">
            <a class="nav-item nav-link active" href="estacion.php">Estaciones</a>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTaller" data-toggle="dropdown"></a>
            <div class="dropdown-menu">
                  <a class="dropdown-item" href="altaEstaciones.php">Alta Estacion</a>
            </div>
          </div>
        </a>
        <span class="nav-item nav-link">|</span>
        <a class="nav-item nav-link active" href="chofer.html">Alta Choferes</a>
      </div>
      <div>
        <a href="login.html" class="btn btn-primary">Logout</a>
      </div>
    </nav>
    <div class="container" id="main-container">
      <div class="row" id="unidad-container">
        <div class="col-md-6">
          <h2>Servicio</h2>
          <hr>
          <form>
            <div class="form-group" id="form-servicio-id">
              <label for="input-id-servicio">ID Servicio</label>
              <input class="form-control" type="text" id="input-id-servicio" placeholder="e.g.:1234" value="<?php echo (isset($_GET['edit']))?$servicio->get_idServicio():'';?>" disabled />
            </div>
            <div class="form-group">
              <label for="select-tipo-unidad">Tipo Unidad</label>
              <select class="form-control" id="select-tipo-unidad">
                <option value="1" <?php if(isset($_GET['edit']) && $servicio->get_tipoUnidad() == 1){ echo 'selected';} ?>>Cama</option>
                <option value="2" <?php if(isset($_GET['edit']) && $servicio->get_tipoUnidad() == 2){ echo 'selected';} ?>>Semi Cama</option>
                <option value="3" <?php if(isset($_GET['edit']) && $servicio->get_tipoUnidad() == 3){ echo 'selected';} ?>>Mixto</option>
                <option value="-1" <?php if(!isset($_GET['edit'])){ echo 'selected';} ?>>Seleccione una opcion</option>
              </select>
            </div>
            <div class="form-group">
              <label for="select-dia-partida">Dia de Partida</label>
              <select class="form-control" id="select-dia-partida">
                <option value="1" <?php if(isset($_GET['edit']) && $servicio->get_diaPartida() == 1){ echo 'selected';} ?>>Lunes</option>
                <option value="2" <?php if(isset($_GET['edit']) && $servicio->get_diaPartida() == 2){ echo 'selected';} ?>>Martes</option>
                <option value="3" <?php if(isset($_GET['edit']) && $servicio->get_diaPartida() == 3){ echo 'selected';} ?>>Miercoles</option>
                <option value="4" <?php if(isset($_GET['edit']) && $servicio->get_diaPartida() == 4){ echo 'selected';} ?>>Jueves</option>
                <option value="5" <?php if(isset($_GET['edit']) && $servicio->get_diaPartida() == 5){ echo 'selected';} ?>>Viernes</option>
                <option value="6" <?php if(isset($_GET['edit']) && $servicio->get_diaPartida() == 6){ echo 'selected';} ?>>Sabado</option>
                <option value="7" <?php if(isset($_GET['edit']) && $servicio->get_diaPartida() == 7){ echo 'selected';} ?>>Domingo</option>
                <option value="-1" <?php if(!isset($_GET['edit'])){ echo 'selected';} ?>>Seleccione una opcion</option>
              </select>
            </div>
            <div class="form-group">
              <label for="input-hora-partida">Hora de Partida</label>
              <input class="form-control" type="time" id="input-hora-partida" value="<?php echo (isset($_GET['edit']))?$servicio->get_horaPartida():'';?>" />
            </div>
            <div class="form-group">
              <label for="select-estacion-origen">Estacion Origen</label>
              <select class="form-control" id="select-estacion-origen">
                <?php
                  if(isset($_GET['edit'])){
                    getEstaciones($servicio, 'origen');
                  }
                  else{
                    getEstaciones(null, null);
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="select-estacion-destino">Estacion Destino</label>
              <select class="form-control" id="select-estacion-destino">
                <?php
                  if(isset($_GET['edit'])){
                    getEstaciones($servicio, 'destino');
                  }
                  else{
                    getEstaciones(null, null);
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
            <input type="button" class="btn btn-info boton-save-servicio" value="Guardar">
            <input type="button" class="btn boton-disable-servicio 
                                          <?php
                                                 if(isset($_GET['edit'])){
                                                  if($servicio->get_habilitado() == 1) echo 'btn-danger';
                                                  else echo 'btn-success';
                                                }
                                                else echo '';
                                              ?>"
                                   id="<?php 
                                            if(isset($_GET['edit'])){
                                              if($servicio->get_habilitado() == 1) echo 0;
                                              else echo 1;
                                              }
                                            else echo '';
                                          ?>"
                                   value="<?php 
                                            if(isset($_GET['edit'])){
                                              if($servicio->get_habilitado() == 1) echo 'Deshabilitar';
                                              else echo 'Habilitar';
                                              }
                                            else echo '';
                                          ?>">
            </div>
          </form>
        </div>
      </div>
      <br>
    </div>
  </div>
  <script>
    $(function() {
    if ( window.location.search.indexOf('edit=') != -1 ) {
      $(".boton-save-servicio").attr("id","update");
    }
    else{
      $("#form-servicio-id").hide();
      $(".boton-disable-servicio").hide();
      $(".boton-save-servicio").attr("id","insert");
    }
    })
    $(function(){
    $('.boton-save-servicio').click(function(){
        var clickBtnIdAction = this.id;
        var url = 'config/config-servicio.php',
        data =
        { 'action': clickBtnIdAction,
          'id-servicio': $('#input-id-servicio').val(),
          'tipo-unidad': parseInt($('#select-tipo-unidad').val(), 10),
          'dia-partida': parseInt($('#select-dia-partida').val(), 10),
          'hora-partida': $('#input-hora-partida').val(),
          'estacion-origen': parseInt($('#select-estacion-origen').val(), 10),
          'estacion-destino': parseInt($('#select-estacion-destino').val(), 10)
        };
        $.post(url, data, function (response) {
            if(clickBtnIdAction == 'insert'){
              alert("Servicio agregado satisfactoriamente");
            }
            else if(clickBtnIdAction == 'update'){
              alert("Servicio modificado satisfactoriamente");
            }
            window.location.href='listado-servicios.php';
        });
    });
    })
    $(function(){
    $('.boton-disable-servicio').click(function(){
        var clickBtnIdAction = this.id;
        var url = 'config/config-servicio.php',
        data = 
        { 'action': 'disable',
          'id-servicio': $('#input-id-servicio').val(),
          'status' : parseInt(this.id, 10)
        };
        $.post(url, data, function (response) {
          if(clickBtnIdAction == 0){
              alert("Servicio deshabilitado satisfactoriamente");
            }
            else if(clickBtnIdAction == 1){
              alert("Servicio habilitado satisfactoriamente");
            }
            window.location.href='listado-servicios.php';
        });
    });
    })
  </script>
</body>