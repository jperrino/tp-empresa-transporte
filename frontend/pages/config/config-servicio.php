<?php
include("connection.php");
  
  class Servicio{

    public $idServicio;
    public $tipoUnidad;
    public $diaPartida;
    public $horaPartida;
    public $estacionOrigen;
    public $estacionDestino;

    function __construct($idServicio, $tipoUnidad, $diaPartida, $horaPartida, $estacionOrigen, $estacionDestino) {
       //$this->name = $name; 
        $this->idServicio = $idServicio;
        $this->tipoUnidad = $tipoUnidad;
        $this->diaPartida = $diaPartida;
        $this->horaPartida = $horaPartida;
        $this->estacionOrigen = $estacionOrigen;
        $this->estacionDestino = $estacionDestino;
    }

    function get_idServicio() {
    return $this->idServicio;
    }

    function get_tipoUnidad() {
      return $this->tipoUnidad;
    }

    function get_diaPartida() {
    return $this->diaPartida;
    }

    function get_horaPartida() {
    return $this->horaPartida;
    }
    
    function get_estacionOrigen() {
    return $this->estacionOrigen;
    }
    
    function get_estacionDestino() {
    return $this->estacionDestino;
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
                  if (isset($_POST['tipo-unidad']) && 
                        isset($_POST['dia-partida']) && 
                        isset($_POST['hora-partida']) && 
                        isset($_POST['estacion-origen']) && 
                        isset($_POST['estacion-destino']))
                        {
                              insertServicio($_POST['tipo-unidad'],
                                    $_POST['dia-partida'], 
                                    $_POST['hora-partida'], 
                                    $_POST['estacion-origen'], 
                                    $_POST['estacion-destino']);
                        }
                  break;
            case 'update':
                  if (isset($_POST['id-servicio']) &&
                      isset($_POST['tipo-unidad']) &&  
                      isset($_POST['dia-partida']) && 
                      isset($_POST['hora-partida']) && 
                      isset($_POST['estacion-origen']) && 
                      isset($_POST['estacion-destino']))
                        {
                              updateServicio($_POST['id-servicio'],
                                    $_POST['tipo-unidad'],
                                    $_POST['dia-partida'], 
                                    $_POST['hora-partida'], 
                                    $_POST['estacion-origen'], 
                                    $_POST['estacion-destino']);
                        }
                  break;
            case 'delete':
                  if (isset($_POST['id-servicio']))
                        {
                              deleteServicio($_POST['id-servicio']);
                        }
                  break;
        }
    }

    function getServicio($idServicio) {
            $sql = "SELECT s.`servicio_id`,
                            s.`tipo_unidad_id`,
                            f.`dia_id`,
                            date_format(f.`hora_partida`, '%H:%i') as `hora_de_partida`,
                            e_origen.`estacion_id` as `estacion_origen`,
                            e_destino.`estacion_id` as `estacion_destino`  
                    FROM `servicio` s
                    JOIN `fecha_partida` f ON s.`fecha_partida_id` = f.`fecha_partida_id`
                    /*
                    JOIN `tipo_unidad` t ON t.`tipo_unidad_id` = s.`tipo_unidad_id`
                    */
                    JOIN `estacion` e_origen ON e_origen.`estacion_id` = s.`estacion_id_origen`
                    JOIN `estacion` e_destino ON e_destino.`estacion_id` = s.`estacion_id_destino`
                    WHERE s.`servicio_id` = ".$idServicio;

      $result = executeQuery($sql);
        if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $servicio = new Servicio($row["servicio_id"], $row["tipo_unidad_id"],  $row["dia_id"],  $row["hora_de_partida"],  $row["estacion_origen"],  $row["estacion_destino"]);
        }
        return $servicio;
      } else {
        return null;
      }

    }

    function getEstaciones($servicio, $tipoEstacion){
      $sql = "SELECT e.`estacion_id`, e.`direccion` FROM `estacion` e";
    
      $result = executeQuery($sql);

      switch($tipoEstacion){
        case 'origen':
          $estacion = $servicio->get_estacionOrigen();
          break;
        case 'destino':
          $estacion = $servicio->get_estacionDestino();
          break;
        default:
        break;
      }
    
      if ($result->num_rows > 0) {
          // output data of each row
          if($servicio != null){
            while($row = $result->fetch_assoc()) {
              if($estacion == $row["estacion_id"]){
                echo "<option value=".$row["estacion_id"]." selected>".$row["direccion"]."</option>";
              }
              else{
                echo "<option value=".$row["estacion_id"].">".$row["direccion"]."</option>";
              }
            }
            /*
            //con javascript no deberia dejar que llegue un -1
            if($diaId == -1){
              $default = "selected";
            }
            */
            echo "<option value=\"-1\">Seleccione una opcion</option>";
          }
          else{
            while($row = $result->fetch_assoc()) {
              echo "<option value=".$row["estacion_id"].">".$row["direccion"]."</option>";
            }
            echo "<option value=\"-1\" selected>Seleccione una opcion</option>";
          }
      } else {
          echo "0 results";
      }
    }

    function insertServicio($tipoUnidad, $idDiaPartida, $horaPartida, $idEstacionOrigen, $idEstacionDestino) {
      insertFechaPartida($idDiaPartida, $horaPartida);
      $fecha_partida_id = getFechaPartidaByDiaPartidaHoraPartida($idDiaPartida, $horaPartida);
      $sql = "INSERT INTO `servicio`(`tipo_unidad_id`, `fecha_partida_id`, `estacion_id_origen`, `estacion_id_destino`) VALUES (".$tipoUnidad.",".$fecha_partida_id.",".$idEstacionOrigen.",".$idEstacionDestino.")";
      $result = executeQuery($sql);
      exit;
    }

    function insertFechaPartida($idDiaPartida, $horaPartida){
      $sql = "INSERT INTO `fecha_partida`(`dia_id`, `hora_partida`) VALUES (".$idDiaPartida.",'".$horaPartida."')";
      $result = executeQuery($sql);
    }

    function getFechaPartidaByDiaPartidaHoraPartida($idDiaPartida, $horaPartida){
      $sql = "SELECT `fecha_partida_id` FROM `fecha_partida` f WHERE f.`dia_id` = ".$idDiaPartida." AND f.`hora_partida` = '".$horaPartida."'";
      $result = executeQuery($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $fecha_partida_id = $row["fecha_partida_id"];
        }
      } else {
        $fecha_partida_id = null;
      }
      return $fecha_partida_id;
    }

    function updateServicio($idServicio, $tipoUnidad, $idDiaPartida, $horaPartida, $idEstacionOrigen, $idEstacionDestino) {
      updateFechaPartida($idServicio, $idDiaPartida, $horaPartida);
      $sql_update_servicio = "UPDATE `servicio` SET `tipo_unidad_id`= ".$tipoUnidad.",`estacion_id_origen`= ".$idEstacionOrigen.",`estacion_id_destino`= ". $idEstacionDestino." WHERE `servicio_id`= ".$idServicio;
      $result_update_servicio = executeQuery($sql_update_servicio);
      exit;
    }

    function updateFechaPartida($idServicio, $idDiaPartida, $horaPartida){
      $fecha_partida_id = getFechaPartidaByServicio($idServicio);
      $sql = "UPDATE `fecha_partida` SET `dia_id`=".$idDiaPartida.",`hora_partida`='". $horaPartida."' WHERE `fecha_partida_id`= ".$fecha_partida_id;
      $result = executeQuery($sql);
    }

    function getFechaPartidaByServicio($idServicio){
      $sql = "SELECT `fecha_partida_id` FROM `servicio` s WHERE s.`servicio_id` = ".$idServicio;
      $result = executeQuery($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $fecha_partida_id = $row["fecha_partida_id"];
        }
      } else {
        $fecha_partida_id = null;
      }
      return $fecha_partida_id;
    }

    function deleteServicio($idServicio) {
      $fecha_partida_id = getFechaPartidaByServicio($idServicio);
      $sql = "DELETE FROM `servicio` WHERE `servicio`.`servicio_id` = ".$idServicio;
      $result = executeQuery($sql);
      deleteFechaPartida($fecha_partida_id);
      exit;
    }

    function deleteFechaPartida($fecha_partida_id){
      $sql = "DELETE FROM `fecha_partida` WHERE `fecha_partida`.`fecha_partida_id` = ".$fecha_partida_id;
      $result = executeQuery($sql);
    }
?>