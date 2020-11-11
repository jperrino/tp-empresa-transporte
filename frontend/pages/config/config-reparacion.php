<?php
include("connection.php");
  
  class Reparacion{

    public $idReparacion;
    public $idUnidad;
    public $tiempoReparacionDias;
    public $detalle;

    function __construct($idReparacion, $idUnidad, $tiempoReparacionDias, $detalle) {
        $this->idReparacion = $idReparacion;
        $this->idUnidad = $idUnidad;
        $this->tiempoReparacionDias = $tiempoReparacionDias;
        $this->detalle = $detalle;
    }

    function get_idReparacion() {
    return $this->idReparacion;
    }

    function get_idUnidad() {
    return $this->idUnidad;
    }

    function get_tiempoReparacionDias() {
    return $this->tiempoReparacionDias;
    }
    
    function get_detalle() {
    return $this->detalle;
    }

    function get_patente_from_unidad(){
    return getPatenteByIdUnidad($this->idUnidad);
    }

  }

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'insert':
                  if (isset($_POST['id-unidad']) && 
                        isset($_POST['dias-reparacion']) && 
                        isset($_POST['detalle']))
                        {
                              insertReparacion($_POST['id-unidad'], 
                                    $_POST['dias-reparacion'], 
                                    $_POST['detalle']);
                        }
                  break;
            case 'update':
                  if (isset($_POST['id-reparacion']) && 
                        isset($_POST['dias-reparacion']) && 
                        isset($_POST['detalle']))
                        {
                              updateReparacion($_POST['id-reparacion'],
                                    $_POST['dias-reparacion'], 
                                    $_POST['detalle']);
                        }
                  break;
            case 'delete':
                  if (isset($_POST['id-reparacion']))
                        {
                              deleteReparacion($_POST['id-reparacion']);
                        }
                  break;
        }
    }

    function getPatenteByIdUnidad($idUnidad){
      $sql = "SELECT  u.patente FROM `unidad` u
              WHERE u.unidad_id = ".$idUnidad;
      $result = executeQuery($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $patente = $row["patente"];
        }
    } else {
        $patente = null;
      }
      return $patente;
    }

    function getUnidadesParaReparar(){
      $sql = "SELECT  u.unidad_id, u.patente FROM `unidad` u
              WHERE u.habilitada = 1";
    
      $result = executeQuery($sql);
    
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<option value=". $row["unidad_id"].">". $row["patente"]."</option>";
          }
          echo "<option value=\"-1\" selected>Seleccione una opcion</option>";
      } else {
          echo "0 results";
      }
    }

    function getReparacion($idReparacion) {
            $sql = "SELECT r.`reparacion_id`, r.`unidad_id`, r.`tiempo_reparacion_dias`, r.`detalle` FROM `reparacion` r WHERE r.`reparacion_id` = ".$idReparacion;

      $result = executeQuery($sql);
        if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $reparacion = new Reparacion($row["reparacion_id"], $row["unidad_id"],  $row["tiempo_reparacion_dias"],  $row["detalle"]);
        }
        return $reparacion;
      } else {
        return null;
      }

    }

    function insertReparacion($idUnidad, $tiempoReparacionDias, $detalle) {
            $sql = "INSERT INTO `reparacion`(`unidad_id`, `tiempo_reparacion_dias`, `detalle`) VALUES ('".$idUnidad."', '".$tiempoReparacionDias."', '".$detalle."')";

      $result = executeQuery($sql);
        exit;
    }

    function updateReparacion($idReparacion, $tiempoReparacionDias, $detalle) {
            $sql = "UPDATE `reparacion` SET `tiempo_reparacion_dias` = '".$tiempoReparacionDias."', `detalle` = '".$detalle."'
              WHERE `reparacion`.`reparacion_id` = ".$idReparacion;

      $result = executeQuery($sql);
        exit;
    }

    function deleteReparacion($idReparacion) {
      $sql = "DELETE FROM `reparacion` WHERE `reparacion`.`reparacion_id` = ".$idReparacion;

      $result = executeQuery($sql);
      exit;
    }
?>