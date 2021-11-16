<?php

require_once "Conexion.php";

 class Usuario extends Conectar {
	 //Metodo para Registrar usuario
     public function agregarUsuario($datos) {
		 $conexion = Conectar::conexion();

		 if(self::buscarUsuarioRepetido($datos['usuario'])){
			 return 2;
		 }else if(self::bucarCorreo($datos['email'])){
			 return 3;
		 }else{
			$sql = "INSERT INTO t_usuarios (nombre, apellidos, sexo, email, tel_movil, tel_casa, direccion, 
			clave_muestra, usuario, password)
			VALUES (?,?,?,?,?,?,?,?,?,?)";

            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssssss', $datos['nombre'],
					   $datos['apellidos'],
					   $datos['sexo'],					   
					   $datos['email'],
					   $datos['tel_movil'],
					   $datos['tel_casa'],
					   $datos['direccion'],
					   $datos['clave_muestra'],
					   $datos['usuario'],
					   $datos['password']);

            $exito = $query->execute();
            $query->close();
            return $exito;
		 }
		 
	 }
	 //Metodo para Validar usuario repetido al registrarse
	 public function buscarUsuarioRepetido($usuario){
		$conexion = Conectar::conexion();

		$sql = "SELECT usuario FROM t_usuarios WHERE usuario = '$usuario'";
		$result = mysqli_query($conexion, $sql);

		$datos = mysqli_fetch_array($result);

		if($datos['usuario'] != "" || $datos['usuario'] == $usuario){
			return 1;
		}else{
			return 0;
		}
	 }
	 //Metodo para Iniciar sesion
	 public function login($usuario, $password){
		$conexion = Conectar::conexion();

		$sql = "SELECT count(*) as existeUsuario FROM t_usuarios WHERE usuario = '$usuario' AND password = '$password'";
		$result = mysqli_query($conexion, $sql);

		$respuesta = mysqli_fetch_array($result)['existeUsuario'];

		if($respuesta > 0){
			$_SESSION['usuario'] = $usuario;
			
			$sql = "SELECT id_usuario FROM t_usuarios WHERE usuario = '$usuario' AND password = '$password'";
			$result = mysqli_query($conexion, $sql);
			$idUsuario = mysqli_fetch_row($result)[0];

			$_SESSION['idUsuario'] = $idUsuario;

			return 1;
		}else{
			return 0;
		}
	 }

	 //Metodo para buscar correo
	 public function bucarCorreo($email){
		$conexion = Conectar::conexion();

		$sql = "SELECT email FROM t_usuarios WHERE email = '$email'";
		$result = mysqli_query($conexion, $sql);

		$datos = mysqli_fetch_array($result);

		if($datos['email'] != "" || $datos['email'] == $email){
			return 1;
		}else{
			return 0;
		}
	 }

	 public function actualizaPassword($datos) {
		$conexion = Conectar::conexion();

		$sql = "UPDATE t_usuarios SET password = ? WHERE email = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param("ss", $datos['password'],
                                     $datos['email']);
            $respuesta = $query->execute();
            $query->close();
            
            return $respuesta;
		
	}
 }
?>