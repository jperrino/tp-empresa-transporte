<?php
include "connection.php";
include "entity/entity-chofer.php";

$hasAction = isset($_POST['action']);

/*
if(isset($_GET['edit'])){
getUnidad($_GET['edit']);
//getReparaciones($_GET['edit']);
}
 */

if ($hasAction) {
    $actionValue = $_POST['action'];
    switch ($actionValue) {
        case 'insert':
            if (validateFieldsforCreate()) {
                insertChofer(
                    $_POST['cuil'],
                    $_POST['apellido'],
                    $_POST['nombre'],
                    $_POST['domicilio'],
                    $_POST['telefono-1'],
                    $_POST['telefono-2'],
                    $_POST['fecha-nacimiento'],
                    $_POST['fecha-ingreso'],
                    $_POST['fecha-baja'],
                    $_POST['motivo-baja'],
                    $_POST['fecha-vencimiento-carnet']
                );
            }
            break;
        case 'update':
            if (validateFieldsForUpdate()) {
                updateChofer(
                    $_POST['id'],
                    $_POST['cuil'],
                    $_POST['apellido'],
                    $_POST['nombre'],
                    $_POST['domicilio'],
                    $_POST['telefono-1'],
                    $_POST['telefono-2'],
                    $_POST['fecha-nacimiento'],
                    $_POST['fecha-ingreso'],
                    $_POST['fecha-baja'],
                    $_POST['motivo-baja'],
                    $_POST['fecha-vencimiento-carnet']
                );
            }
            break;
        case 'disable':
            if (validateFieldsForDisable()) {
                disableChofer($_POST['id'], $_POST['fecha-baja'], $_POST['motivo-baja']);
            }
            break;
    }
}

function validateFieldsforCreate() {
    return isset($_POST['cuil']) && isset($_POST['apellido']) && isset($_POST['nombre']) &&
        isset($_POST['domicilio']) && isset($_POST['telefono-1']) && isset($_POST['fecha-nacimiento']) && 
        isset($_POST['fecha-ingreso']) && isset($_POST['fecha-vencimiento-carnet']);
}

function validateFieldsForUpdate() {
    return  isset($_POST['apellido']) && isset($_POST['nombre']) && isset($_POST['domicilio']) && 
            isset($_POST['telefono-1']) && isset($_POST['fecha-nacimiento']) && isset($_POST['fecha-ingreso']);
}

function validateFieldsForDisable() {
    return  isset($_POST['fecha-baja']) && isset($_POST['motivo-baja']);
}

function getChoferes() {
    $sql = "SELECT c.`chofer_id`, c.`cuil`, c.`apellido`, c.`nombre`, c.`domicilio`, c.`telefono_1`, c.`telefono_2`,
            DATE_FORMAT(c.`fecha_de_ingreso`, \"%d-%m-%Y\") as fecha_ingreso,
            DATE_FORMAT(c.`fecha_de_baja`, \"%d-%m-%Y\") as fecha_baja
            FROM `chofer` c";

    $result = executeQuery($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if (intval($row["fecha_baja"]) != null) {
                echo "<tr class=\"table-danger\">";
            } else {
                echo "<tr>";
            }
            echo "<td>" . $row["cuil"] . "</td>";
            echo "<td>" . $row["apellido"] . "</td>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["domicilio"] . "</td>";
            echo "<td>" . $row["telefono_1"] . "</td>";
            echo "<td>" . $row["telefono_2"] . "</td>";
            echo "<td>" . $row["fecha_ingreso"] . "</td>";
            if (intval($row["fecha_baja"]) == null) {
                echo "<td> no disponible </td>";
            } else {
                echo "<td>" . $row["fecha_baja"] . "</td>";
            }
            echo "<td>
          <input type=\"button\" class=\"btn btn-info boton-edit-chofer\" id=\"" . $row["chofer_id"] . "\" value=\"Editar\">
          </td>";
            echo "</tr>";
        }
    } else {
        echo "0 results";
    }
}

function getChofer($choferId)
{
    $sql = "SELECT  c.`chofer_id`, c.`cuil`, c.`apellido`, c.`nombre`, c.`domicilio`,
                    c.`telefono_1`, c.`telefono_2`, c.`fecha_de_nacimiento`,
                    DATE_FORMAT(c.`fecha_de_ingreso`, \"%Y-%m-%d\") as fecha_ingreso,
                    DATE_FORMAT(c.`fecha_de_baja`, \"%Y-%m-%d\") as fecha_baja,
                    c.`motivo_de_baja`,
                    c.`fecha_de_vencimiento_de_carnet`
            FROM `chofer` c
            WHERE c.`chofer_id` = " . $choferId;

    $result = executeQuery($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $chofer = new Chofer(
                $row["chofer_id"],
                $row["cuil"],
                $row["apellido"],
                $row["nombre"],
                $row["domicilio"],
                $row["telefono_1"],
                $row["telefono_2"],
                $row["fecha_de_nacimiento"],
                $row["fecha_ingreso"],
                intval($row["fecha_baja"] == null || $row["fecha_baja"] == '0000-00-00' ) ? '' : $row["fecha_baja"],
                $row["motivo_de_baja"],
                $row["fecha_de_vencimiento_de_carnet"]
            );
        }
        return $chofer;
    } else {
        return null;
    }
}

function insertChofer(
    $cuil,
    $apellido,
    $nombre,
    $domicilio,
    $telefono1,
    $telefono2,
    $fechaNacimiento,
    $fechaIngreso,
    $fechaBaja,
    $motivoBaja,
    $fechaVencimientoCarnet
) {
    $sql = "INSERT INTO `chofer` (`cuil`, `apellido`, `nombre`, `domicilio`, `telefono_1`, `telefono_2`,
                                  `fecha_de_nacimiento`, `fecha_de_ingreso`, `fecha_de_baja`,
                                  `motivo_de_baja`, `fecha_de_vencimiento_de_carnet`)
            VALUES ('" . $cuil . "', '" . $apellido . "', '" . $nombre . "', '" . $domicilio . "', '" . $telefono1 . "',
                    '" . $telefono2 . "', '" . $fechaNacimiento . "', '" . $fechaIngreso . "', '" . $fechaBaja . "',
                    '" . $motivoBaja . "', '" . $fechaVencimientoCarnet . "')";

    $result = executeQuery($sql);
    exit;
}

function updateChofer(
    $idChofer,
    $cuil,
    $apellido,
    $nombre,
    $domicilio,
    $telefono1,
    $telefono2,
    $fechaNacimiento,
    $fechaIngreso,
    $fechaBaja,
    $motivoBaja,
    $fechaVencimientoCarnet
) {
    $sql = "UPDATE `chofer`
            SET `cuil` = '" . $cuil . "', `apellido` = '" . $apellido . "', `nombre` = '" . $nombre . "',
                `domicilio` = '" . $domicilio . "', `telefono_1` = '" . $telefono1 . "', `telefono_2` = '" . $telefono2 . "',
                `fecha_de_nacimiento` = '" . $fechaNacimiento . "', `fecha_de_ingreso` = '" . $fechaIngreso . "',
                `fecha_de_baja` = '" . $fechaBaja . "', `motivo_de_baja` = '" . $motivoBaja . "', `fecha_de_vencimiento_de_carnet` = '" . $fechaVencimientoCarnet . "'
            WHERE `chofer`.`chofer_id` = " . $idChofer;

    $result = executeQuery($sql);
    exit;
}

function disableChofer($idChofer, $fechaBaja, $motivoBaja)
{
    $sql = "UPDATE `chofer`
            SET `fecha_de_baja` = '" . $fechaBaja . "', `motivo_de_baja` = '" . $motivoBaja . "'
            WHERE `chofer`.`chofer_id` = " . $idChofer;

    $result = executeQuery($sql);
    exit;
}

function deleteChofer($idChofer)
{
    $sql = "DELETE FROM `chofer` WHERE `chofer`.`chofer_id` = " . $idChofer;

    $result = executeQuery($sql);
    exit;
}