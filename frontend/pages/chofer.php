<?php include "config/config-chofer.php";

$isEdit = isset($_GET['edit']);

if ($isEdit) {
    $chofer = getChofer($_GET['edit']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
                <a class="nav-item nav-link active" href="home.php">Home</a>
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
                <a href="login.php" class="btn btn-primary">Salir</a>
            </div>
        </nav>
        <div class="container" id="main-container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Chofer</h2>
                    <hr>
                    <form>
                        <div class="form-group">
                            <label for="input-id-chofer">ID Chofer</label>
                            <input class="form-control" type="text" id="input-id-chofer" placeholder="no disponible"
                                value="<?php echo $isEdit ? $chofer->get_id() : '' ?>" disabled />
                        </div>
                        <div class="form-group">
                            <label for="input-cuil">CUIL</label>
                            <input class="form-control" type="text" id="input-cuil" placeholder="e.g.:1234"
                                value="<?php echo $isEdit ? $chofer->get_cuil() : '' ?>" />
                        </div>
                        <div class="form-group">
                            <label for="input-apellido">Apellido</label>
                            <input class="form-control" type="text" id="input-apellido" placeholder="e.g.:Juan"
                                value="<?php echo $isEdit ? $chofer->get_apellido() : ''; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="input-nombre">Nombre</label>
                            <input class="form-control" type="text" id="input-nombre" placeholder="e.g.:Perez"
                                value="<?php echo $isEdit ? $chofer->get_nombre() : ''; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="input-domicilio">Domicilio</label>
                            <input class="form-control" type="text" id="input-domicilio"
                                placeholder="e.g.:calle falsa 123"
                                value="<?php echo $isEdit ? $chofer->get_domicilio() : ''; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="input-telefono-1">Telefono 1</label>
                            <input class="form-control" type="text" id="input-telefono-1"
                                placeholder="e.g.:221-5555-555"
                                value="<?php echo $isEdit ? $chofer->get_telefono1() : ''; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="input-telefono-2">Telefono 2</label>
                            <input class="form-control" type="text" id="input-telefono-2"
                                placeholder="e.g.:221-5555-555"
                                value="<?php echo $isEdit ? $chofer->get_telefono2() : ''; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="input-fecha-nacimiento">Fecha de Nacimiento</label>
                            <input class="form-control" type="date" id="input-fecha-nacimiento"
                                value="<?php echo $isEdit ? $chofer->get_fechaNacimiento() : ''; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="input-fecha-ingreso">Fecha de Ingreso</label>
                            <input class="form-control" type="date" id="input-fecha-ingreso"
                                value="<?php echo $isEdit ? $chofer->get_fechaIngreso() : ''; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="input-fecha-baja">Fecha de Baja</label>
                            <input class="form-control" type="date" id="input-fecha-baja"
                                value="<?php echo $isEdit ? $chofer->get_fechaBaja() : ''; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="input-motivo-baja">Motivo de Baja</label>
                            <textarea class="form-control" rows="5" id="input-motivo-baja"
                                placeholder="Detalle de baja ..."
                                value="<?php echo $isEdit ? $chofer->get_motivoBaja() : ''; ?>"><?php echo $isEdit ? $chofer->get_motivoBaja() : ''; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="input-fecha-vencimiento-carnet">Fecha de Vencimiento de Carnet</label>
                            <input class="form-control" type="date" id="input-fecha-vencimiento-carnet"
                                value="<?php echo $isEdit ? $chofer->get_fechaVencimientoCarnet() : ''; ?>" />
                        </div>
                        <div class="form-group">
                            <input type="button" class="btn btn-info boton-save-chofer" value="Guardar">
                            <input type="button" <?php echo $isEdit ? '' : 'disabled' ?>
                                class="btn boton-disable-chofer <?php echo ($isEdit && empty($chofer->get_fechaBaja())) ? 'btn-danger' : (!$isEdit ? 'btn-danger': 'btn-success');?>"
                                id="<?php echo $isEdit && empty($chofer->get_fechaBaja()) ? 0 : 1;?>"
                                value="<?php echo ($isEdit && empty($chofer->get_fechaBaja())) ? 'Deshabilitar' : (!$isEdit ? 'Deshabilitar' : 'Habilitar');?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(function() {
        if (window.location.search.indexOf('edit=') != -1) {
            $(".boton-save-chofer").attr("id", "update");
        } else {
            $(".boton-save-chofer").attr("id", "insert");
        }
    })
    $(function() {
        $('.boton-save-chofer').click(function() {
            var clickBtnIdAction = this.id;
            if (validateInsertFields()) {
                if (validateCuilt()) {
                    var url = 'config/config-chofer.php',
                        data = {
                            'action': clickBtnIdAction,
                            'id': $('#input-id-chofer').val(),
                            'cuil': $('#input-cuil').val(),
                            'apellido': $('#input-apellido').val(),
                            'nombre': $('#input-nombre').val(),
                            'domicilio': $('#input-domicilio').val(),
                            'telefono-1': $('#input-telefono-1').val(),
                            'telefono-2': $('#input-telefono-2').val(),
                            'fecha-nacimiento': $('#input-fecha-nacimiento').val(),
                            'fecha-ingreso': $('#input-fecha-ingreso').val(),
                            'fecha-baja': $('#input-fecha-baja').val(),
                            'motivo-baja': $('#input-motivo-baja').val(),
                            'fecha-vencimiento-carnet': $('#input-fecha-vencimiento-carnet').val()
                        };
                    $.post(url, data, function(response) {
                        if (clickBtnIdAction == 'insert') {
                            alert("Chofer agregado satisfactoriamente");
                        } else {
                            alert("Chofer modificado satisfactoriamente");
                        }
                        window.location.href = 'listado-choferes.php';
                    });
                } else {
                    alert("Formato de CUIL incorrecto.");
                }
            } else {
                alert(
                    "Campos cuil, apellido, nombre, domicilio, telefono 1, fecha de nacimiento, fecha de ingreso y fecha de vencimiento de carnet no pueden estar vacíos"
                );
            }
        });
    })
    $(function() {
        $('.boton-disable-chofer').click(function() {
            var clickBtnIdAction = this.id;
            if (validateDisableFields()) {
                var url = 'config/config-chofer.php',
                    data = {
                        'action': 'disable',
                        'id': $('#input-id-chofer').val(),
                        'fecha-baja': clickBtnIdAction == 0 ? $('#input-fecha-baja').val() : '',
                        'motivo-baja': clickBtnIdAction == 0 ? $('#input-motivo-baja').val() : ''
                    };
                $.post(url, data, function(response) {
                    if (clickBtnIdAction == 0) {
                        alert("Chofer deshabilitado satisfactoriamente");
                    } else if (clickBtnIdAction == 1) {
                        alert("Chofer habilitado satisfactoriamente");
                    }
                    window.location.href = 'listado-choferes.php';
                });
            } else {
                alert("Campos fecha de baja y motivo de baja no pueden estar vacíos");
            }
        });
    })

    function validateDisableFields() {
        return $('#input-fecha-baja').val() != '' && $('#input-motivo-baja').val() != '';
    }

    function validateInsertFields() {
        return $('#input-cuil').val() != '' &&
            $('#input-apellido').val() != '' &&
            $('#input-nombre').val() != '' &&
            $('#input-domicilio').val() != '' &&
            $('#input-telefono-1').val() != '' &&
            $('#input-fecha-nacimiento').val() != '' &&
            $('#input-fecha-ingreso').val() != '' &&
            $('#input-fecha-vencimiento-carnet').val() != '';
    }

    function validateCuilt() {
        return /\b(20|23|24|27|30|33|34)?[0-9]{8}?[0-9]/.test($('#input-cuil').val());
    }
    </script>
</body>