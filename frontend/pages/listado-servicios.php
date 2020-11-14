<?php
include("config/config-listado-servicios.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Listado de Servicios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="styles/bootstrap_4-5-2.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="js/jquery_3-5-1.min.js"></script>
    <script src="js/popper_1-16-0.min.js"></script>
    <script src="js/bootstrap_4-5-2.min.js"></script>
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
        <div class="col-md-12">
          <h2>Listado de Servicios</h2>
          <hr>
          <form>
            <div class="form-group">
              <label for="select-dia-semana">Dia de salida</label>
              <select class="form-control col-md-3" id="select-dia-semana">
                <?php
                  if(isset($_GET['dia'])){
                    getDiasPartida($_GET['dia']);
                  }
                  else{
                    getDiasPartida('*');
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <a class="btn btn-info" id="get-servicios-by-dia">Buscar</a>
            </div>
          </form>

          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <td>Tipo unidad</td>
                <td>Estacion origen</td>
                <td>Estacion destino</td>
                <td>Hora de partida</td>
                <td>Accion</td>
              </tr>
            </thead>
            <tbody>
              <?php
              if(isset($_GET['dia'])){
                getServiciosByDia($_GET['dia']);
              }
              else{
                getServiciosByDia('*');
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(".boton-edit-servicio").on("click", function() {
    window.location.href = "servicio.php?edit=" + this.id;
    })
    $(function(){
    $('#get-servicios-by-dia').click(function(){
        var clickBtnIdAction = this.id;
        var url = 'config/config-listado-servicios.php',
        data = 
        { 'action': clickBtnIdAction,
          'dia-id': parseInt($('#select-dia-semana').val(), 10)
        };
        $.post(url, data, function (response) {
            window.location.href='listado-servicios.php?dia=' + $('#select-dia-semana').val();
        });
    });
    })
  </script>
</body>