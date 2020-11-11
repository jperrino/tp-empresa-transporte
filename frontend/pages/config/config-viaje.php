<?php
include("connection.php");
  
class Viaje{

  public $idViaje;
  public $idServicio;
  public $idUnidad;
  public $idChofer1;
  public $idChofer2;
  public $fechaSalidaEfectiva;
  public $observaciones;

  function __construct($idViaje, $idServicio, $idUnidad, $idChofer1, $idChofer2, $fechaSalidaEfectiva, $observaciones) { 
      $this->idViaje = $idViaje;
      $this->idServicio = $idServicio;
      $this->idUnidad = $idUnidad;
      $this->idChofer1 = $idChofer1;
      $this->idChofer2 = $idChofer2;
      $this->fechaSalidaEfectiva = $fechaSalidaEfectiva;
      $this->observaciones = $observaciones;
  }

  function get_idViaje() {
  return $this->idViaje;
  }

  function get_idServicio() {
    return $this->idServicio;
  }

  function get_idUnidad() {
  return $this->idUnidad;
  }

  function get_idChofer1() {
    return $this->idChofer1;
  }
  function get_idChofer2() {
    return $this->idChofer2;
  }

  function get_fechaSalidaEfectiva() {
  return $this->fechaSalidaEfectiva;
  }
  
  function get_observaciones() {
  return $this->observaciones;
  }

}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'insert':
              if (isset($_POST['id-servicio']) &&  
                    isset($_POST['id-unidad']) && 
                    isset($_POST['id-chofer1']) && 
                    isset($_POST['id-chofer2']) &&
                    isset($_POST['fecha-salida-efectiva']) &&  
                    isset($_POST['observaciones']))
                    {
                        insertViaje($_POST['id-servicio'],
                          $_POST['id-unidad'], 
                          $_POST['id-chofer1'], 
                          $_POST['id-chofer2'], 
                          $_POST['fecha-salida-efectiva'],
                          $_POST['observaciones']);
                    }
              break;
        case 'update':
              if (isset($_POST['id-viaje']) &&
                  isset($_POST['id-servicio']) &&  
                  isset($_POST['id-unidad']) && 
                  isset($_POST['id-chofer1']) && 
                  isset($_POST['id-chofer2']) &&
                  isset($_POST['fecha-salida-efectiva']) &&  
                  isset($_POST['observaciones']))
                    {
                          updateViaje($_POST['id-viaje'],
                          $_POST['id-servicio'],
                          $_POST['id-unidad'], 
                          $_POST['id-chofer1'], 
                          $_POST['id-chofer2'], 
                          $_POST['fecha-salida-efectiva'],
                          $_POST['observaciones']);
                    }
              break;
        case 'delete':
              if (isset($_POST['id-viaje']))
                    {
                          deleteViaje($_POST['id-viaje']);
                    }
              break;
    }
}

function getServicios($viaje){
    $sql = "SELECT CONCAT(e_origen.`nombre`,', ',e_destino.`nombre`,', ',t.`descripcion`,', ',date_format(f.`hora_partida`, '%H:%i')) as `servicio`,
                    s.`servicio_id`
            FROM `servicio` s 
            JOIN `estacion` e_origen on s.estacion_id_origen = e_origen.estacion_id
            JOIN `estacion` e_destino on s.estacion_id_destino = e_destino.estacion_id
            JOIN `tipo_unidad` t on t.`tipo_unidad_id` = s.`tipo_unidad_id`
            JOIN `fecha_partida` f on s.`fecha_partida_id` = f.`fecha_partida_id`
            WHERE s.habilitado = 1;";
  
    $result = executeQuery($sql);
  
    if ($result->num_rows > 0) {
        if($viaje != null){
          while($row = $result->fetch_assoc()) {
            if($viaje->get_idServicio() == $row["servicio_id"]){
              echo "<option value=".$row["servicio_id"]." selected>".$row["servicio"]."</option>";
            }
            else{
              echo "<option value=".$row["servicio_id"].">".$row["servicio"]."</option>";
            }
          }
          echo "<option value=\"-1\">Seleccione una opcion</option>";
        }
        else{
          while($row = $result->fetch_assoc()) {
            echo "<option value=".$row["servicio_id"].">".$row["servicio"]."</option>";
          }
          echo "<option value=\"-1\" selected>Seleccione una opcion</option>";
        }
    } else {
        echo "0 results";
    }
  }

  function getUnidades($viaje){
    $sql = "SELECT u.patente,
                    u.unidad_id
            FROM `unidad` u
            WHERE u.habilitada = 1;";
  
    $result = executeQuery($sql);
  
    if ($result->num_rows > 0) {
        if($viaje != null){
          while($row = $result->fetch_assoc()) {
            if($viaje->get_idUnidad() == $row["unidad_id"]){
              echo "<option value=".$row["unidad_id"]." selected>".$row["patente"]."</option>";
            }
            else{
              echo "<option value=".$row["unidad_id"].">".$row["patente"]."</option>";
            }
          }
          echo "<option value=\"-1\">Seleccione una opcion</option>";
        }
        else{
          while($row = $result->fetch_assoc()) {
            echo "<option value=".$row["unidad_id"].">".$row["patente"]."</option>";
          }
          echo "<option value=\"-1\" selected>Seleccione una opcion</option>";
        }
    } else {
        echo "0 results";
    }
  }

  function getChoferes($chofer_id){
    $sql = "SELECT c.cuil,
                    c.chofer_id
            FROM `chofer` c
            WHERE c.baja = 0;";
  
    $result = executeQuery($sql);
  
    if ($result->num_rows > 0) {
        if($chofer_id != null){
          while($row = $result->fetch_assoc()) {
            if($chofer_id == $row["chofer_id"]){
              echo "<option value=".$row["chofer_id"]." selected>".$row["cuil"]."</option>";
            }
            else{
              echo "<option value=".$row["chofer_id"].">".$row["cuil"]."</option>";
            }
          }
          echo "<option value=\"-1\">Seleccione una opcion</option>";
        }
        else{
          while($row = $result->fetch_assoc()) {
            echo "<option value=".$row["chofer_id"].">".$row["cuil"]."</option>";
          }
          echo "<option value=\"-1\" selected>Seleccione una opcion</option>";
        }
    } else {
        echo "0 results";
    }
  }

function getViaje($idViaje) {
    $sql = "SELECT    v.`viaje_id`,
                    CONCAT(e_origen.`nombre`,', ',e_destino.`nombre`) as `servicio`,
                    v.`servicio_id`,
                    u.`patente` as `unidad`,
                    v.`unidad_id`,
                    GROUP_CONCAT(c.`cuil` SEPARATOR ',') as `choferes_cuil`,
                    GROUP_CONCAT(c.`chofer_id` SEPARATOR ',') as `choferes_id`,
                    v.`fecha_salida_efectiva`,
                    v.`observaciones`
            FROM `viaje` v
            LEFT JOIN `viaje_chofer` vc on vc.`viaje_id` = v.`viaje_id`
            LEFT JOIN `chofer` c on c.`chofer_id` = vc.`chofer_id`
            JOIN `unidad` u ON u.`unidad_id` = v.`unidad_id`
            JOIN `servicio` s ON s.`servicio_id` = v.`servicio_id`
            JOIN `estacion` e_origen ON e_origen.`estacion_id` = s.`estacion_id_origen`
            JOIN `estacion` e_destino ON e_destino.`estacion_id` = s.`estacion_id_destino`
            WHERE v.`viaje_id` = ".$idViaje." GROUP BY v.`viaje_id`;";

$result = executeQuery($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    $choferres_id = explode(",", $row["choferes_id"]);
$viaje = new Viaje($row["viaje_id"], $row["servicio_id"],  $row["unidad_id"],  $choferres_id[0],  $choferres_id[1],  $row["fecha_salida_efectiva"], $row["observaciones"]);
}
return $viaje;
} else {
return null;
}
}

function insertViaje($idServicio, $idUnidad, $idChofer1, $idChofer2, $fechaSalidaEfectiva, $observaciones){
    $sql = "INSERT INTO `viaje` (`servicio_id`, `unidad_id`, `fecha_salida_efectiva`, `observaciones`)
            VALUES ('".$idServicio."', '".$idUnidad."', '".$fechaSalidaEfectiva."', '".$observaciones."');";
    $result = executeQuery($sql);
    $lastIdViaje = getMaxViaje();
    insertViajeChofer($lastIdViaje, $idChofer1);
    insertViajeChofer($lastIdViaje, $idChofer2);
    exit;
}

function getMaxViaje(){
    $sql = "SELECT MAX(v.`viaje_id`) as `last_viaje_id` FROM `viaje` v;";
    $result = executeQuery($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $lastViajeId = $row["last_viaje_id"];
        }
      } else {
        $lastViajeId = null;
      }
    return $lastViajeId;
}

function insertViajeChofer($idViaje, $idChofer){
    $sql = "INSERT INTO `viaje_chofer` (`viaje_id`, `chofer_id`) VALUES ('".$idViaje."', '".$idChofer."');";
    $result = executeQuery($sql);
}

function updateViaje($idViaje, $idServicio, $idUnidad, $idChofer1, $idChofer2, $fechaSalidaEfectiva, $observaciones){
    $choferes = getChoferesByViaje($idViaje);
    $choferres_id = explode(",", $choferes);
    updateViajeChofer($idViaje, $choferres_id[0],$idChofer1);
    updateViajeChofer($idViaje, $choferres_id[1],$idChofer2);
    $sql = "UPDATE `viaje` v 
    SET `servicio_id` = ".$idServicio.",
	v.`unidad_id` = ".$idUnidad.",
	v.`fecha_salida_efectiva` = '".$fechaSalidaEfectiva."',
	v.`observaciones` = '".$observaciones."'
    WHERE v.`viaje_id` = ".$idViaje.";";
    $result = executeQuery($sql);
    exit;
}

function updateViajeChofer($idViaje, $idChoferBefore, $idChoferAfter){
    $sql = "UPDATE `viaje_chofer` SET `chofer_id`= ".$idChoferAfter." WHERE `viaje_id` = ".$idViaje." AND `chofer_id` = ".$idChoferBefore.";";
    $result = executeQuery($sql);
}

function getChoferesByViaje($idViaje){
    $sql = "SELECT    v.`viaje_id`,
                        GROUP_CONCAT(vc.`chofer_id` SEPARATOR ',') as `choferes_id`
            FROM `viaje` v
            LEFT JOIN `viaje_chofer` vc on vc.`viaje_id` = v.`viaje_id`
            WHERE v.`viaje_id` = ".$idViaje." GROUP BY v.`viaje_id`;";
    $result = executeQuery($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $choferesId = $row["choferes_id"];
        }
      } else {
        $choferesId = null;
      }
    return $choferesId;
}

function deleteViaje($idViaje){
    deleteViajeChofer($idViaje);
    $sql = "DELETE FROM `viaje` WHERE `viaje`.`viaje_id` = ".$idViaje.";";
    $result = executeQuery($sql);
    exit;
}

function deleteViajeChofer($idViaje){
    $sql = "DELETE from `viaje_chofer` WHERE `viaje_chofer`.`viaje_id` = ".$idViaje.";";
    $result = executeQuery($sql);
}

?>