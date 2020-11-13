<?php
include("config/config-viaje.php");

if(isset($_GET['edit'])){
  $viaje = getViaje($_GET['edit']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Viaje</title>
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
    <a class="navbar-brand">
      <img src="imgs/logo_thumb.png">
      </a>
      <div class="navbar-nav mr-auto">
        <a class="nav-item nav-link active" href="home.php">Home</a>
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownListadoServicios" data-toggle="dropdown"></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="servicio.php">Alta Servicios</a>
            </div>
          </div>
        </a>
        <span class="nav-item nav-link">|</span>
        <a class="nav-item dropdown active">
          <div class="btn-group btn-group-md">
            <a class="nav-item nav-link active" href="calendario-viajes.php">Calendario de Viajes</a>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCalendarioViajes" data-toggle="dropdown"></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="viaje.php">Alta Viajes</a>
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
        <a class="nav-item dropdown active">
                    <div class="btn-group btn-group-md">
                        <a class="nav-item nav-link active" href="listado-choferes.php">Listado de Choferes</a>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTaller"
                            data-toggle="dropdown"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="chofer.php">Alta Choferes</a>
                        </div>
                    </div>
                </a>
      </div>
      <div>
        <a href="login.php" class="btn btn-primary">Salir</a>
      </div>
    </nav>
    <div class="container" id="main-container">
      <div class="row">
        <div class="col-md-6">
          <h2>Viaje</h2>
          <hr>
          <form>
            <div class="form-group" id="form-viaje-id">
              <label for="input-id-viaje">ID Viaje</label>
              <input class="form-control" type="text" id="input-id-viaje" placeholder="e.g.:1234" value="<?php echo (isset($_GET['edit']))?$viaje->get_idViaje():'';?>" disabled />
            </div>
            <div class="form-group">
              <label for="select-servicio">Servicio</label>
              <select class="form-control" id="select-servicio">
              <?php
                  if(isset($_GET['edit'])){
                    getServicios($viaje);
                  }
                  else{
                    getServicios(null);
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="select-unidad">Patente Unidad</label>
              <select class="form-control" id="select-unidad">
              <?php
                  if(isset($_GET['edit'])){
                    getUnidades($viaje);
                  }
                  else{
                    getUnidades(null);
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="select-chofer-1">Chofer 1 CUIL</label>
              <select class="form-control" id="select-chofer-1">
              <?php
                  if(isset($_GET['edit'])){
                    getChoferes($viaje->get_idChofer1());
                  }
                  else{
                    getChoferes(null);
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="select-chofer-2">Chofer 2 CUIL</label>
              <select class="form-control" id="select-chofer-2">
              <?php
                  if(isset($_GET['edit'])){
                    getChoferes($viaje->get_idChofer2());
                  }
                  else{
                    getChoferes(null);
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="input-fecha-partida">Fecha de Partida</label>
              <input class="form-control" type="date" id="input-fecha-partida" value="<?php echo (isset($_GET['edit']))?$viaje->get_fechaSalidaEfectiva():'';?>" />
            </div>
            <div class="form-group">
              <label for="input-observaciones">Observaciones</label>
              <textarea class="form-control" rows="5" id="input-observaciones"
              placeholder="Observaciones ..."><?php echo (isset($_GET['edit']))?$viaje->get_observaciones():'';?></textarea>
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-info boton-save-viaje" value="Guardar">
              <input type="button" class="btn btn-danger boton-delete-viaje" value="Borrar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function() {
    if ( window.location.search.indexOf('edit=') != -1 ) {
      $(".boton-save-viaje").attr("id","update");
    }
    else{
      $("#form-viaje-id").hide();
      $(".boton-delete-viaje").hide();
      $(".boton-save-viaje").attr("id","insert");
    }
    })
    $(function(){
    $('.boton-save-viaje').click(function(){
        var clickBtnIdAction = this.id;
        var url = 'config/config-viaje.php',
        data =
        { 'action': clickBtnIdAction,
          'id-viaje': $('#input-id-viaje').val(),
          'id-servicio': parseInt($('#select-servicio').val(), 10),
          'id-unidad': parseInt($('#select-unidad').val(), 10),
          'id-chofer1': parseInt($('#select-chofer-1').val(), 10),
          'id-chofer2': parseInt($('#select-chofer-2').val(), 10),
          'fecha-salida-efectiva': $('#input-fecha-partida').val(),
          'observaciones': $('#input-observaciones').val()
        };
        $.post(url, data, function (response) {
            if(clickBtnIdAction == 'insert'){
              alert("Viaje agregado satisfactoriamente");
            }
            else if(clickBtnIdAction == 'update'){
              alert("Viaje modificado satisfactoriamente");
            }
            window.location.href='calendario-viajes.php';
        });
    });
    })
    $(function(){
    $('.boton-delete-viaje').click(function(){
        var url = 'config/config-viaje.php',
        data = 
        { 'action': 'delete',
          'id-viaje': $('#input-id-viaje').val()
        };
        $.post(url, data, function (response) {
            alert("Viaje borrado satisfactoriamente");
            window.location.href='calendario-viajes.php';
        });
    });
    })
  </script>
</body>