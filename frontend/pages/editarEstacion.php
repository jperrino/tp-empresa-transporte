<?php
  include("config/config-estacion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Estacion</title>
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
          <h2>Estacion</h2>
          <hr>
            <form>
              <?php getDatosEstacion($_GET['edit']); ?>
            </form>
        </div>
      </div>
    </div>
  </div>

  
<script>
  $(function(){    
    $('.boton-save-estacion').click(function(){
     var btnAction = 'update';
     var url = 'config/config-estacion.php',     
     data = {
       'action': btnAction,
       'id' : $('#input-id').val(),
       'id-est' : $('#input-estacion').val(),
       'id-loc' : $('#input-localidad').val(),
       'dir' : $('#input-direccion').val(),
       'tel' :$('#input-telefono').val()
     };     
     $.post(url, data, function(response) {
      alert("Estacion modificada satisfactoriamente");
      windows.location.href='estacion.php';
    });
   });
   })
  </script>