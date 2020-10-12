<?php
include("config/config-unidad.php");

if(isset($_GET['edit'])){
  $unidad = getUnidad($_GET['edit']);
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
              <a class="dropdown-item" href="reparacion.html">Alta Reparaciones</a>
            </div>
          </div>
        </a>
        <span class="nav-item nav-link">|</span>
        <a class="nav-item dropdown active">
          <div class="btn-group btn-group-md">
            <a class="nav-item nav-link active" href="listado-servicios.html">Listado de Servicios</a>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTaller" data-toggle="dropdown"></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="servicio.html">Alta Servicios</a>
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
        <a class="nav-item nav-link active" href="estacion.html">Alta Estaciones</a>
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
          <h2>Unidad</h2>
          <hr>
          <form>
            <div class="form-group" id="form-unidad-id">
              <label for="input-id-unidad">ID Unidad</label>
              <input class="form-control" type="text" id="input-id-unidad" placeholder="e.g.:1234" value="<?php echo (isset($_GET['edit']))?$unidad->get_idUnidad():'';?>" disabled />
            </div>
            <div class="form-group">
              <label for="input-patente">Patente</label>
              <input class="form-control" type="text" id="input-patente" placeholder="ABC-123-DF" value="<?php echo (isset($_GET['edit']))?$unidad->get_patente():'';?>" />
            </div>
            <div class="form-group">
              <label for="input-fecha-patentamiento">Fecha de Patentamiento</label>
              <input class="form-control" type="date" id="input-fecha-patentamiento" value="<?php echo (isset($_GET['edit']))?$unidad->get_fechaPatentamiento():'';?>" />
            </div>
            <div class="form-group">
              <label for="input-asientos-cama">Asientos Cama</label>
              <input class="form-control" type="number" id="input-asientos-cama" placeholder="0" value="<?php echo (isset($_GET['edit']))?$unidad->get_asientosCama():'';?>" />
            </div>
            <div class="form-group">
              <label for="input-asientos-semi">Asientos Semi Cama</label>
              <input class="form-control" type="number" id="input-asientos-semi" placeholder="0" value="<?php echo (isset($_GET['edit']))?$unidad->get_asientosSemi():'';?>" />
            </div>
            <div class="form-group">
              <label for="select-tipo-unidad">Tipo Unidad</label>
              <select class="form-control" id="select-tipo-unidad">
                <option value="1" <?php if(isset($_GET['edit']) && $unidad->get_tipoUnidad() == 1){ echo 'selected';} ?>>Cama</option>
                <option value="2" <?php if(isset($_GET['edit']) && $unidad->get_tipoUnidad() == 2){ echo 'selected';} ?>>Semi Cama</option>
                <option value="3" <?php if(isset($_GET['edit']) && $unidad->get_tipoUnidad() == 3){ echo 'selected';} ?>>Mixto</option>
                <option value="-1" <?php if(!isset($_GET['edit'])){ echo 'selected';} ?>>Seleccione una opcion</option>
              </select>
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-info boton-save-unidad" value="Guardar">
              <input type="button" class="btn btn-danger boton-delete-unidad" value="Borrar">
            </div>
          </form>
        </div>
      </div>
      <br>
      <div class="row" id="reparacion-container">
        <div class="col-md-6">
          <h2>Reparaciones</h2>
          <hr>
          <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Dias en reparacion</td>
                    <td>Detalle</td>
                    <td>Accion</td>
                </tr>
            </thead>
            <tbody>
            <?php
                    if(isset($_GET['edit'])){
                      getReparaciones($_GET['edit']);
                    }
              ?>
            </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function() {
    if ( window.location.search.indexOf('edit=') != -1 ) {
        $("#reparacion-container").show();
        $(".boton-save-unidad").attr("id","update");
    }
    else{
      $("#reparacion-container").hide();
      $("#form-unidad-id").hide();
      $(".boton-save-unidad").attr("id","insert");
    }
    })
    $("#btn-edit").on("click", function() {
    window.location.href = "reparacion.html?edit=1";
    })
    $(function(){
    $('.boton-save-unidad').click(function(){
        var clickBtnIdAction = this.id;
        var url = 'config/config-unidad.php',
        data = 
        { 'action': clickBtnIdAction,
          'id-unidad': $('#input-id-unidad').val(),
          'patente': $('#input-patente').val(),
          'fecha-patentamiento': $('#input-fecha-patentamiento').val(),
          'asientos-cama': parseInt($('#input-asientos-cama').val(), 10),
          'asientos-semi': parseInt($('#input-asientos-semi').val(), 10),
          'tipo-unidad': parseInt($('#select-tipo-unidad').val(), 10)
        };
        $.post(url, data, function (response) {
            if(clickBtnIdAction == 'insert'){
              alert("Unidad agregada satisfactoriamente");
            }
            else if(clickBtnIdAction == 'update'){
              alert("Unidad modificada satisfactoriamente");
            }
            window.location.href='taller.php';
        });
    });
    })
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
  </script>
</body>