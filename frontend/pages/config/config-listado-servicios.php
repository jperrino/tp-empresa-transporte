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
      if(is_numeric($diaId)){
        while($row = $result->fetch_assoc()) {
          if($diaId == $row["dia_id"]){
            echo "<option value=".$row["dia_id"]." selected>".$row["descripcion"]."</option>";
          }
          else{
            echo "<option value=".$row["dia_id"].">".$row["descripcion"]."</option>";
          }
        }
        if($diaId == -1){
          $default = "selected";
        }
        echo "<option value=\"-1\" ".$default.">Todos</option>";
      }
      else{
        while($row = $result->fetch_assoc()) {
          echo "<option value=".$row["dia_id"].">".$row["descripcion"]."</option>";
        }
        echo "<option value=\"-1\" selected>Todos</option>";
      }
  } else {
      echo "0 results";
  }
}

function getServiciosByDia($diaId){

  if(is_numeric($diaId) AND $diaId >= 1){
    $condition = "WHERE f.`dia_id` = ". $diaId;
  }
  else{
    $condition = "WHERE 1";
  }

  $sql = "SELECT s.`servicio_id`,
                  s.`tipo_unidad_id`,
                  e_origen.`nombre` as `e_nombre_origen`,
                  e_destino.`nombre` as `e_nombre_destino`,
                  date_format(f.`hora_partida`, '%H:%i') as `hora_de_partida`,
                  s.`habilitado`
          FROM `servicio` s
          JOIN `fecha_partida` f ON s.`fecha_partida_id` = f.`fecha_partida_id`
          JOIN `estacion` e_origen ON e_origen.`estacion_id` = s.`estacion_id_origen`
          JOIN `estacion` e_destino ON e_destino.`estacion_id` = s.`estacion_id_destino` "
          . $condition.
          " ORDER BY s.`servicio_id` ASC";

  $result = executeQuery($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if(intval($row["habilitado"]) == 0){
          echo "<tr class=\"table-danger\">";
        }
        else echo "<tr>";
        switch($row["tipo_unidad_id"])
        {
          case 1: echo "<td> Cama </td>"; break;
          case 2: echo "<td> Semicama </td>"; break;
          case 3: echo "<td> Mixto </td>"; break;
        }
        echo "<td>". $row["e_nombre_origen"]."</td>";
        echo "<td>". $row["e_nombre_destino"]."</td>";
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