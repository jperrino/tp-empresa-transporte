<?php
include("connection.php");

class Estacion {
    public $idestacion;
    public $idlocalidad;
    public $iddireccion;
    public $idtelefono;

    function __construct($idestacion, $idlocalidad, $iddireccion, $idtelefono){
        $this->estacion_id = $idestacion;
        $this->localidad_id = $idlocalidad;
        $this->direccion = $iddireccion;
        $this->telefono = $idtelefono;
    }
    
}

if(isset($_POST['action'])){
    insertEstacion($_POST['id-estacion'],$_POST['id-loc'],$_POST['dir'],$_POST['tel']);
}
    function getEstacion() {
        $sql = "SELECT * FROM `estacion`";
        $result = executeQuery($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           // $estacion = new Estacion($row["estacion_id"], $row["localidad_id"],  $row["direccion"],  $row["telefono"]);
            echo "<tr>";
            echo "<td>". $row["estacion_id"]."</td>";
            echo "<td>". $row["localidad_id"]."</td>";
            echo "<td>". $row["direccion"]."</td>";
            echo "<td>". $row["telefono"]."</td>";
            echo "</tr>";
            }
        }
    }

    function insertEstacion($idestacion,$idlocalidad,$iddireccion,$idtelefono){
        $sql = "INSERT INTO `estacion` (`estacion_id`, `localidad_id`, `direccion`, `telefono`) VALUES ('".$idestacion."', '".$idlocalidad."', '".$iddireccion."', '".$idtelefono."')";
        $result = executeQuery($sql);
        exit;
    }

?>


