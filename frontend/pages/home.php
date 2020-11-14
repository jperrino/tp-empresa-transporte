<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="styles/bootstrap_4-5-2.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="js/jquery_3-5-1.min.js"></script>
  <script src="js/popper_1-16-0.min.js"></script>
  <script src="js/bootstrap_4-5-2.min.js"></script>
</head>

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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTaller" data-toggle="dropdown"></a>
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
        <h2>Manual del Sitio</h2>
        <hr>
        <div class="jumbotron">
          <h4>Unidades</h4>
          <ul>
            <li>
              <u>Listado de Unidades (y sus reparaciones):</u> dirijase a Taller.
            </li>
            <li>
            <u>Modificacion:</u> seleccione Editar dentro de Taller.
            </li>
            <li>
            <u>Baja:</u> seleccione Deshabilitar dentro de la Modificacion de Unidades.
            </li>
            <li>
            <u>Alta:</u> dentro del menu Taller, seleccione Alta Unidadades.
            </li>
          </ul>
          <h4>Reparaciones</h4>
          <ul>
            <li>
            <u>Listado de Reparaciones por Unidad:</u> dentro de la Modificacion de Unidades,
              el listado de Reparaciones asignadas a la Unidad se muestra en la seccion inferior.
            </li>
            <li>
            <u>Modificacion:</u> dentro del listado de Reparaciones por Unidad seleccione Editar.
            </li>
            <li>
            <u>Baja:</u> seleccione Borrar dentro de la Modificacion de Reparaciones.
            </li>
            <li>
            <u>Alta:</u> dentro del menu Taller, seleccione Alta Reparaciones.
            </li>
          </ul>
          <h4>Servicios</h4>
          <ul>
            <li>
            <u>Listado de Servicios:</u> dirijase a Listado de Servicios.
            </li>
            <li>
            <u>Modificacion:</u> seleccione Editar dentro del Listado de Servicios.
            </li>
            <li>
            <u>Baja:</u> seleccione Deshabilitar dentro de la Modificacion de Servicios.
            </li>
            <li>
            <u>Alta:</u> dentro del menu Listado de Servicios, seleccione Alta Servicios.
            </li>
          </ul>
          <h4>Viajes</h4>
          <ul>
            <li>
            <u>Listado de Viajes:</u> dirijase a Calendario de Viajes.
            </li>
            <li>
            <u>Modificacion:</u> seleccione Editar dentro del Calendario de Viajes.
            </li>
            <li>
            <u>Baja:</u> seleccione Borrar dentro de la Modificacion de Viajes.
            </li>
            <li>
            <u>Alta:</u> dentro del menu Calendario de Viajes, seleccione Alta Viajes.
            </li>
          </ul>
          <h4>Estaciones</h4>
          <ul>
            <li>
            <u>Listado de Estaciones:</u> dirijase a Estaciones.
            </li>
            <li>
            <u>Modificacion:</u> seleccione Editar dentro de Estaciones.
            </li>
            <li>
            <u>Alta:</u> dentro del menu Estaciones, seleccione Alta Estacion.
            </li>
          </ul>
          <h4>Choferes</h4>
          <ul>
            <li>
            <u>Listado de Choferes:</u> dirijase a Listado de Choferes.
            </li>
            <li>
            <u>Modificacion:</u> seleccione Editar dentro del Listado de Choferes.
            </li>
            <li>
            <u>Baja:</u> seleccione Borrar dentro de la Modificacion de Choferes.
            </li>
            <li>
            <u>Alta:</u> dentro del menu Listado de Choferes, seleccione Alta Choferes.
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>