<?php
include("config/config-chofer.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link type="text/css" rel="stylesheet" href="styles/home2.css">
    <title>Listado de Choferes</title>
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTaller"
                            data-toggle="dropdown"></a>
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTaller"
                            data-toggle="dropdown"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="servicio.php">Alta Servicios</a>
                        </div>
                    </div>
                </a>
                <span class="nav-item nav-link">|</span>
                <a class="nav-item dropdown active">
                    <div class="btn-group btn-group-md">
                        <a class="nav-item nav-link active" href="calendario-viajes.php">Calendario de Viajes</a>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTaller"
                            data-toggle="dropdown"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="viaje.php">Alta Viajes</a>
                        </div>
                    </div>
                </a>
                <span class="nav-item nav-link">|</span>
                <a class="nav-item dropdown active">
                    <div class="btn-group btn-group-md">
                        <a class="nav-item nav-link active" href="estacion.php">Estaciones</a>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTaller"
                            data-toggle="dropdown"></a>
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
                <a href="login.html" class="btn btn-primary">Logout</a>
            </div>
        </nav>
        <div class="container" id="main-container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Choferes</h2>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Cuil</td>
                                <td>Apellido</td>
                                <td>Nombre</td>
                                <td>Domicilio</td>
                                <td>Telefono 1</td>
                                <td>Telefono 2</td>
                                <td>Fecha de nacimiento</td>
                                <td>Fecha de baja</td>
                                <td>Accion</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                getChoferes(); 
              ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(".boton-edit-chofer").on("click", function() {
        window.location.href = "chofer.php?edit=" + this.id;
    })
    /*
    $(function(){
    $('.boton-delete-unidad').click(function(){
        var url = 'config/config-unidad.php',
        data = 
        { 'action': 'delete',
          'id-unidad': $('#input-id-unidad').val()
        };
        $.post(url, data, function (response) {
            alert("Unidad borrada satisfactoriamente");
            window.location.href='taller.php';
        });
    });
    })
    */
    </script>
</body>