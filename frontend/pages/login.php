<?php
//include("config/config-valUsuario.php");
include("config/connection.php");
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
    <link type="text/css" rel="stylesheet" href="styles/login.css">
</head>

<div class="login-reg-panel">           
        <div class="white-panel">
            <form class="login-show show-log-panel" method="post">
                <h2>LOGIN</h2>
                <input type="text" placeholder="Username" name ="usuario" id="usuario" required>
                <input type="password" placeholder="Password" name="password" id="password" required>
                <input type="submit" name="login" value="login"/>
            </form>
            
        </div>
</div>

<?php

if(isset($_POST['login'])) { 
    validacion();
}
function validacion(){
    $usu = $_POST['usuario'];
    $pas = $_POST['password'];
    $sql="SELECT * FROM `usuario` WHERE `nombre_usuario`='".$usu."' && `contrasena`='".$pas."'";
    $result = executeQuery($sql);  
    if ($result->num_rows > 0) {
        header('location: http://localhost/main/tp-empresa-transporte/frontend/pages/home.php');
        }
    }
?>

<!--
    <script>
        $(function(){
            $('.boton-save-estacion').click(function(){
                var url = 'config/config-valUsuario.php',     
                data = {
                'action' : 'action',
                'usu' : $('#usuario').val(),
                'pass' : $('#password').val()
                },
                success: function(data){
                    alert("hola");
                }
              //  $.post(url, data, function(response) {
                //    alert(response);
                    //window.location.replace("home.php/");
    });
   });
   })
   
        
    </script>
-->