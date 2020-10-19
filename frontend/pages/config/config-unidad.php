<?php
include("connection.php");
  
  class Unidad{

    public $idUnidad;
    public $patente;
    public $fechaPatentamiento;
    public $asientosCama;
    public $asientosSemi;
    public $tipoUnidad;

    function __construct($idUnidad, $patente, $fechaPatentamiento, $asientosCama, $asientosSemi, $tipoUnidad) {
       //$this->name = $name; 
        $this->idUnidad = $idUnidad;
        $this->patente = $patente;
        $this->fechaPatentamiento = $fechaPatentamiento;
        $this->asientosCama = $asientosCama;
        $this->asientosSemi = $asientosSemi;
        $this->tipoUnidad = $tipoUnidad;
    }

    function get_idUnidad() {
    return $this->idUnidad;
    }

    function get_patente() {
    return $this->patente;
    }

    function get_fechaPatentamiento() {
    return $this->fechaPatentamiento;
    }
    
    function get_asientosCama() {
    return $this->asientosCama;
    }
    
    function get_asientosSemi() {
    return $this->asientosSemi;
    }
    
    function get_tipoUnidad() {
    return $this->tipoUnidad;
    }

  }

  /*
    if(isset($_GET['edit'])){
      getUnidad($_GET['edit']);
      //getReparaciones($_GET['edit']);
    }
    */

    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'insert':
                  if (isset($_POST['patente']) && 
                        isset($_POST['fecha-patentamiento']) && 
                        isset($_POST['asientos-cama']) && 
                        isset($_POST['asientos-semi']) &&
                        isset($_POST['tipo-unidad']))
                        {
                              insertUnidad($_POST['patente'], 
                                    $_POST['fecha-patentamiento'], 
                                    $_POST['asientos-cama'], 
                                    $_POST['asientos-semi'],
                                    $_POST['tipo-unidad']);
                        }
                  break;
            case 'update':
                  if (isset($_POST['id-unidad']) && 
                        isset($_POST['patente']) && 
                        isset($_POST['fecha-patentamiento']) && 
                        isset($_POST['asientos-cama']) && 
                        isset($_POST['asientos-semi']) &&
                        isset($_POST['tipo-unidad']))
                        {
                              updateUnidad($_POST['id-unidad'],
                                    $_POST['patente'], 
                                    $_POST['fecha-patentamiento'], 
                                    $_POST['asientos-cama'], 
                                    $_POST['asientos-semi'],
                                    $_POST['tipo-unidad']);
                        }
                  break;
            case 'delete':
                  if (isset($_POST['id-unidad']))
                        {
                              deleteUnidad($_POST['id-unidad']);
                        }
                  break;
        }
    }

    function getUnidad($idUnidad) {
            $sql = "SELECT u.`unidad_id`, 
                            u.`patente`, 
                            u.`fecha_de_patentamiento`, 
                            u.`cantidad_de_asientos_cama`,
                            u.`cantidad_de_asientos_semicama`, u.`tipo_unidad_id` 
              /*t.`descripcion` */
                    FROM `unidad` u
              /*JOIN `tipo_unidad` t ON u.`tipo_unidad_id` = t.`tipo_unidad_id`*/
                    WHERE u.`unidad_id` = ".$idUnidad;

      $result = executeQuery($sql);
        if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $unidad = new Unidad($row["unidad_id"], $row["patente"],  $row["fecha_de_patentamiento"],  $row["cantidad_de_asientos_cama"],  $row["cantidad_de_asientos_semicama"],  $row["tipo_unidad_id"]);
        }
        return $unidad;
      } else {
        return null;
      }

    }

    function getReparaciones($idUnidad) {
            $sql = "SELECT r.`reparacion_id`, r.`tiempo_reparacion_dias`, r.`detalle` 
            FROM `reparacion` r
            JOIN `unidad` u on u.`unidad_id` = r.`unidad_id`
            WHERE u.`unidad_id` = ".$idUnidad;

      $result = executeQuery($sql);
        if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["reparacion_id"]."</td>";
        echo "<td>". $row["tiempo_reparacion_dias"]."</td>";
        echo "<td>". $row["detalle"]."</td>";
        echo "<td>
        <input type=\"button\" class=\"btn btn-info boton-edit-reparacion\" id=\"".$row["reparacion_id"]."\" value=\"Editar\">
        <!-- <a class=\"btn btn-danger\">Borrar</a> -->
        </td>";
        echo "</tr>";
      }
      } else {
      echo "<tr><td colspan=\"4\">Unidad sin reparaciones</td></tr>";
      }
    }

    function insertUnidad($patente, $fechaPatentamiento, $asientosCama, $asientosSemi, $tipoUnidad) {
            $sql = "INSERT INTO `unidad` (`patente`, `fecha_de_patentamiento`, `cantidad_de_asientos_cama`, `cantidad_de_asientos_semicama`, `tipo_unidad_id`) VALUES ('".$patente."', '".$fechaPatentamiento."', '".$asientosCama."', '".$asientosSemi."', '".$tipoUnidad."')" ;

      $result = executeQuery($sql);
        exit;
    }

    function updateUnidad($idUnidad, $patente, $fechaPatentamiento, $asientosCama, $asientosSemi, $tipoUnidad) {
            $sql = "UPDATE `unidad` SET `patente` = '".$patente."', `fecha_de_patentamiento` = '".$fechaPatentamiento."', `cantidad_de_asientos_cama` = '".$asientosCama."', `cantidad_de_asientos_semicama` = '".$asientosSemi."', 
              `tipo_unidad_id` = '".$tipoUnidad."' 
              WHERE `unidad`.`unidad_id` = ".$idUnidad;

      $result = executeQuery($sql);
        exit;
    }

    function deleteUnidad($idUnidad) {
      $sql = "DELETE FROM `unidad` WHERE `unidad`.`unidad_id` = ".$idUnidad;

      $result = executeQuery($sql);
      exit;
    }
?>