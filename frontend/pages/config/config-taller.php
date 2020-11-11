<?php
include("config/connection.php");

function getUnidades(){
  $sql = "SELECT  u.unidad_id, 
                  u.patente, 
                  DATE_FORMAT(u.fecha_de_patentamiento, \"%d-%m-%Y\") as fecha_patentamiento , 
                  u.cantidad_de_asientos_cama, 
                  u.cantidad_de_asientos_semicama, 
                  u.tipo_unidad_id,
                  u.habilitada, 
                  GROUP_CONCAT(r.detalle SEPARATOR ', ' ) as `reparaciones` 
                  FROM `unidad` u 
                  LEFT JOIN `reparacion` r ON u.unidad_id = r.unidad_id 
                  GROUP BY u.unidad_id
                  ORDER BY u.fecha_de_patentamiento ASC";

  $result = executeQuery($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if(intval($row["habilitada"]) == 0){
          echo "<tr class=\"table-danger\">";
        }
        else echo "<tr>";
        echo "<td>". $row["patente"]."</td>";
        echo "<td>". $row["fecha_patentamiento"]."</td>";
        echo "<td>". $row["cantidad_de_asientos_cama"]."</td>";
        echo "<td>". $row["cantidad_de_asientos_semicama"]."</td>";
        switch($row["tipo_unidad_id"])
        {
          case 1: echo "<td> Cama </td>"; break;
          case 2: echo "<td> Semicama </td>"; break;
          case 3: echo "<td> Mixto </td>"; break;
        }
        echo "<td>". $row["reparaciones"]."</td>";
        echo "<td>
        <input type=\"button\" class=\"btn btn-info boton-edit-unidad\" id=\"".$row["unidad_id"]."\" value=\"Editar\">
        <!--
        <input type=\"button\" class=\"btn btn-danger boton-delete-unidad\" value=\"Borrar\">
        -->
        </td>";
        echo "</tr>";
      }
  } else {
      echo "0 results";
  }
}
?>