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
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'insert':
            insertEstacion($_POST['id-est'],$_POST['id-loc'],$_POST['dir'],$_POST['tel']);
        break;
        case 'update':
            actualizarEstacion($_POST['id'],$_POST['id-loc'],$_POST['id-est'],$_POST['dir'],$_POST['tel']);
        break;
    }
}
    function getEstacion() {
        $sql = "SELECT * FROM estacion e inner join localidad l on (e.localidad_id = l.localidad_id)";        
        $result = executeQuery($sql);     
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {  
                $ok= true;
                $false2 = false;
                echo "<tr>";
                echo "<td>". $row["nombre"]."</td>";
                echo "<td>". $row["detalle"]."</td>";
                echo "<td>". $row["direccion"]."</td>";
                echo "<td>". $row["telefono"]."</td>";
                echo "<td>";
                echo "<input type='button' class='btn btn-info boton-edit-unidad' id=".$row["estacion_id"]." value='Editar' href='editarEstacion.php'>";
                echo "</tr>";
            }
        }
    }
    
    function getLocalidad(){
        $sql = "SELECT * FROM `localidad`";
        $result = executeQuery($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option class='dropdown-item' value=".$row["localidad_id"].">".$row["detalle"]."</option>";
            }
        }
    }

    function insertEstacion($idnombre,$idlocalidad,$iddireccion,$idtelefono){
        $sql = "INSERT INTO `estacion` (`nombre`, `localidad_id`, `direccion`, `telefono`) VALUES ('".$idnombre."','".$idlocalidad."','".$iddireccion."','".$idtelefono."')";
        $result = executeQuery($sql);
        exit;
    }

    function actualizarEstacion($ID,$idlocalidad,$idnombre,$iddireccion,$idtelefono){
        $sql = "UPDATE `estacion` SET `nombre` = '".$idnombre."', `direccion` = '".$iddireccion."', `telefono` = '".$idtelefono."' WHERE `estacion_id` = ".$ID;
        $result = executeQuery($sql);
        exit;
    }

    function getDatosEstacion($idEstacion) {
        $sql = "SELECT  e.`estacion_id`,
                        l.`detalle` as localidad,
                        e.`nombre`,
                        e.`direccion`,
                        e.`telefono`
                FROM estacion e inner join localidad l on (e.localidad_id = l.localidad_id) WHERE `estacion_id` = ".$idEstacion;      
        $result = executeQuery($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<input class='form-control' type='text' id='input-id' value='".$row["estacion_id"]."' hidden />";
            echo "<div class='dropdown'>";
            echo "<label for='localidad'>Selecciones una Localidad: </label>";
            echo "<select value='localidad' id='input-localidad'>";                  
            echo "<option class='dropdown-item' value=".$row["detalle"].">".$row["localidad"]."</option>";   
            getLocalidad();            
            echo "</select>";
            echo "<br></br>";
            echo "<div class='form-group'>";
            echo "<label for='input-estacion'>Nombre</label>";
            echo "<input class='form-control' type='text' id='input-estacion' value='".$row["nombre"]."' />";
            echo "</div>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='input-direccion'>Direccion</label>";
            echo "<input class='form-control' type='text' id='input-direccion' value='".$row["direccion"]."' />";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label for='input-telefono'>Telefono</label>";
            echo "<input class='form-control' type='text' id='input-telefono' value=".$row["telefono"]." />";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<input type='button' class='btn btn-info boton-save-estacion' value='Guardar'>";
            echo "</div>";
            }
        }
    }

?>


