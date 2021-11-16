<?php

 require_once "../../../clases/Usuario.php";
 
 $password = sha1($_POST['password']);
 $datos = array (
        "nombre" => $_POST['nombre'],
        "apellidos" => $_POST['apellidos'],
        "sexo" => $_POST['sexo'],        
        "email" => $_POST['email'],
        "tel_movil" => $_POST['tel_movil'],
        "tel_casa" => $_POST['tel_casa'],
        "direccion" => $_POST['direccion'],
        "clave_muestra" => $_POST['clave_muestra'],
        "usuario" => $_POST['usuario'],
        "password" => $password        
        );

 $usuario = new Usuario();
 echo $usuario->agregarUsuario($datos);

?>