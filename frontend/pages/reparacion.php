<?php
include("config/config-reparacion.php");

if(isset($_GET['edit'])){
  $reparacion = getReparacion($_GET['edit']);
  //getReparaciones($_GET['edit']);
  /*
  <?php echo (isset($result))?$result:'';?>
  */
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
      <div class="row">
        <div class="col-md-6">
          <h2>Reparacion</h2>
          <hr>
          <form>
            <div class="form-group" id="form-reparacion-id">
              <label for="input-id-reparacion">ID Reparacion</label>
              <input class="form-control" type="text" id="input-id-reparacion" placeholder="e.g.:1234" value="<?php echo (isset($_GET['edit']))?$reparacion->get_idReparacion():'';?>" disabled />
            </div>
            <!--
            <div class="form-group">
              <label for="input-unidad-id">ID Unidad</label>
              <input class="form-control" type="text" id="input-unidad-id" placeholder="e.g.:1234" value="<?php echo (isset($_GET['edit']))?$reparacion->get_idUnidad():'';?>" />
            </div>
            -->
            <div class="form-group">
              <label for="select-unidad-id">ID Unidad</label>
              <select class="form-control" id="select-unidad-id">
                <?php
                     if(isset($_GET['edit'])){
                       echo "<option value=".$reparacion->get_idUnidad()." selected >".$reparacion->get_idUnidad()."</option>";
                     }
                     else if(!isset($_GET['edit'])){
                      getUnidadesParaReparar();
                     }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="input-dias-reparacion">Dias En Reparacion</label>
              <input class="form-control" type="number" id="input-dias-reparacion" placeholder="0" value="<?php echo (isset($_GET['edit']))?$reparacion->get_tiempoReparacionDias():'';?>" />
            </div>
            <div class="form-group">
              <label for="input-detalle">Detalle</label>
              <textarea class="form-control" rows="5" id="input-detalle"
              placeholder="Detalle reparacion ..."><?php echo (isset($_GET['edit']))?$reparacion->get_detalle():'';?></textarea>
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-info boton-save-reparacion" value="Guardar">
              <input type="button" class="btn btn-danger boton-delete-reparacion" value="Borrar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
        $(function() {
    if ( window.location.search.indexOf('edit=') != -1 ) {
        $("#select-unidad-id").prop('disabled', true);
        $(".boton-save-reparacion").attr("id","update");
    }
    else{
      $("#select-unidad-id").prop('disabled', false);
      $("#form-reparacion-id").hide();
      $(".boton-save-reparacion").attr("id","insert");
    }
    })
    $(function(){
    $('.boton-save-reparacion').click(function(){
        var clickBtnIdAction = this.id;
        var url = 'config/config-reparacion.php',
        data = 
        { 'action': clickBtnIdAction,
          'id-reparacion': $('#input-id-reparacion').val(),
          'id-unidad': $('#select-unidad-id').val(),
          'dias-reparacion': $('#input-dias-reparacion').val(),
          'detalle': $('#input-detalle').val()
        };
        $.post(url, data, function (response) {
            if(clickBtnIdAction == 'insert'){
              alert("Reparacion agregada satisfactoriamente");
            }
            else if(clickBtnIdAction == 'update'){
              alert("Reparacion modificada satisfactoriamente");
            }
            window.location.href='taller.php';
        });
    });
    })
    $(function(){
    $('.boton-delete-reparacion').click(function(){
        var url = 'config/config-reparacion.php',
        data = 
        { 'action': 'delete',
          'id-reparacion': $('#input-id-reparacion').val()
        };
        $.post(url, data, function (response) {
            alert("Reparacion borrada satisfactoriamente");
            window.location.href='taller.php';
        });
    });
    })
  </script>
</body>