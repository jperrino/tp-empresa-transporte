<?php
include("config/connection.php");

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
      case 'get-viajes-by-fechas':
        getviajesByFechas($_POST['fecha-salida'], $_POST['fecha-llegada']);
        break;
  }
}

function getviajesByFechas($fechaSalida, $fechaLlegada){

    if($fechaSalida == NULL){
    $fechaSalida = "1990-01-01";
    }

    if($fechaLlegada == NULL){
        $fechaLlegada = "2300-01-01";
        }

  $sql = "SELECT    v.`viaje_id`,
                    CONCAT(e_origen.`nombre`,', ',e_destino.`nombre`,', ',t.`descripcion`,', ',date_format(f.`hora_partida`, '%H:%i')) as `servicio`,
                    u.`patente` as `unidad`,
                    GROUP_CONCAT(c.`cuil` SEPARATOR ', ') as `choferes`,
                    v.`fecha_salida_efectiva`
          FROM `viaje` v
          LEFT JOIN `viaje_chofer` vc on vc.`viaje_id` = v.`viaje_id`
          LEFT JOIN `chofer` c on c.`chofer_id` = vc.`chofer_id`
          JOIN `unidad` u ON u.`unidad_id` = v.`unidad_id`
          JOIN `servicio` s ON s.`servicio_id` = v.`servicio_id`
          JOIN `tipo_unidad` t on t.`tipo_unidad_id` = s.`tipo_unidad_id`
          JOIN `fecha_partida` f on s.`fecha_partida_id` = f.`fecha_partida_id`
          JOIN `estacion` e_origen ON e_origen.`estacion_id` = s.`estacion_id_origen`
          JOIN `estacion` e_destino ON e_destino.`estacion_id` = s.`estacion_id_destino`
          WHERE v.`fecha_salida_efectiva` BETWEEN '".$fechaSalida."' AND '".$fechaLlegada."'
          GROUP BY v.`viaje_id`
          ORDER BY v.`fecha_salida_efectiva` ASC;";

  $result = executeQuery($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["servicio"]."</td>";
        echo "<td>". $row["unidad"]."</td>";
        echo "<td>". $row["choferes"]."</td>";
        echo "<td>". $row["fecha_salida_efectiva"]."</td>";
        echo "<td>
        <input type=\"button\" class=\"btn btn-info boton-edit-viaje\" id=\"".$row["viaje_id"]."\" value=\"Editar\">
        <!--
        <input type=\"button\" class=\"btn btn-danger boton-delete-viaje\" value=\"Borrar\">
        -->
        </td>";
        echo "</tr>";
      }
  } else {
    echo "<tr><td colspan=\"6\">Sin viajes para las fechas seleccionadas</td></tr>";
  }
}
?>