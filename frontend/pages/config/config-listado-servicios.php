<?php
include("config/connection.php");

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
      case 'get-servicios-by-dia':
            if (isset($_POST['dia-id']))
                  {
                    getServiciosByDia($_POST['dia-id']);
                  }
            break;
  }
}

function getDiasPartida($diaId){
  $sql = "SELECT d.`dia_id`, d.`descripcion` FROM `dia` d";

  $result = executeQuery($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      if(is_numeric($diaId)){
        while($row = $result->fetch_assoc()) {
          if($diaId == $row["dia_id"]){
            echo "<option value=".$row["dia_id"]." selected>".$row["descripcion"]."</option>";
          }
          else{
            echo "<option value=".$row["dia_id"].">".$row["descripcion"]."</option>";
          }
        }
        //con javascript no deberia dejar que llegue un -1
        if($diaId == -1){
          $default = "selected";
        }
        echo "<option value=\"-1\" ".$default.">todos</option>";
      }
      else{
        while($row = $result->fetch_assoc()) {
          echo "<option value=".$row["dia_id"].">".$row["descripcion"]."</option>";
        }
        echo "<option value=\"-1\" selected>todos</option>";
      }
  } else {
      echo "0 results";
  }
}

function getServiciosByDia($diaId){

  if(is_numeric($diaId) AND $diaId > 1){
    $condition = "WHERE f.`dia_id` = ". $diaId;
  }
  else{
    $condition = "WHERE 1";
  }

  $sql = "SELECT s.`servicio_id`,
                  s.`tipo_unidad_id`,
                  e_origen.`direccion` as `direccion_origen`,
                  e_destino.`direccion` as `direccion_destino`,
                  date_format(f.`hora_partida`, '%H:%i') as `hora_de_partida`
          FROM `servicio` s
          JOIN `fecha_partida` f ON s.`fecha_partida_id` = f.`fecha_partida_id`
          /*
          JOIN `tipo_unidad` t ON t.`tipo_unidad_id` = s.`tipo_unidad_id`
          */
          JOIN `estacion` e_origen ON e_origen.`estacion_id` = s.`estacion_id_origen`
          JOIN `estacion` e_destino ON e_destino.`estacion_id` = s.`estacion_id_destino` "
          . $condition.
          " ORDER BY s.`servicio_id` ASC";

  $result = executeQuery($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["servicio_id"]."</td>";
        switch($row["tipo_unidad_id"])
        {
          case 1: echo "<td> Cama </td>"; break;
          case 2: echo "<td> Semicama </td>"; break;
          case 3: echo "<td> Mixto </td>"; break;
        }
        //echo "<td>". $row["tipo_unidad_id"]."</td>";
        echo "<td>". $row["direccion_origen"]."</td>";
        echo "<td>". $row["direccion_destino"]."</td>";
        echo "<td>". $row["hora_de_partida"]."</td>";
        echo "<td>
        <input type=\"button\" class=\"btn btn-info boton-edit-servicio\" id=\"".$row["servicio_id"]."\" value=\"Editar\">
        <!--
        <input type=\"button\" class=\"btn btn-danger boton-delete-servicio\" value=\"Borrar\">
        -->
        </td>";
        echo "</tr>";
      }
  } else {
    echo "<tr><td colspan=\"6\">Sin servicios para el dia seleccionado</td></tr>";
  }
}
?>