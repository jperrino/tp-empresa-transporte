<?php
include("config/connection.php");

if(isset($_POST['login'])) { 
    validacion();
}
?>

<head>
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link type="text/css" rel="stylesheet" href="styles/login.css">
</head>
<body>
<div class="login-reg-panel">           
        <div class="white-panel">
            <form class="login-show show-log-panel" method="post">
                <h2>Iniciar Sesion</h2>
                <input type="text" placeholder="Usuario" name ="usuario" id="usuario" required>
                <input type="password" placeholder="Contraseña" name="password" id="password" required>
                <input type="submit" name="login" value="Ingresar"/>
            </form>
        </div>
        <div class="col-md-3 offset-md-6 align-self-center" style="height: 100px;">
        </div>
        <div id="image-container" class="col-md-3 offset-md-8 align-self-center">
            <img src="../imgs/logo.png" width="200" height="160">
        </div>
</div>

<?php

function validacion(){
    $usu = $_POST['usuario'];
    $pas = $_POST['password'];
    $sql="SELECT * FROM `usuario` WHERE `nombre_usuario`='".$usu."' AND `contrasena`='".$pas."'";
    $result = executeQuery($sql);  
    if ($result->num_rows > 0) {
        header('location: home.php');
        }
    }
?>
</body>