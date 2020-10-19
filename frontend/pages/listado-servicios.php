<?php
include("config/config-listado-servicios.php");
//include("config/config-unidad.php");

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
        <a class="nav-item nav-link active" href="estacion.html"> Alta Estaciones</a>
        <span class="nav-item nav-link">|</span>
        <a class="nav-item nav-link active" href="chofer.html"> Alta Choferes</a>
      </div>
      <div>
        <a href="login.html" class="btn btn-primary">Logout</a>
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
                <td>Id</td>
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