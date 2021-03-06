<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/all.css">

    <title>Login</title>
</head>

<body id="body-login">
    <div class="wrapper fadeInDown">
        <div id="formContent" style="background-color: #FFFFFF; opacity: 0.92;">
            <!-- Tabs Titles #2f7299 #2e607d;-->

            <!-- Icon -->
            <div class="fadeIn first m-1" style="background-color: #FFFFFF;">
                <img src="img/logo.png" id="icon" alt="User Icon"/>
                <h1 class="sombraSGA mt-3">Laboratorio de Diagnóstico Molecular</h1>
            </div>

            <!-- Login Form prueba bien commit -->
            <form method="POST" id="frmLogin" onsubmit="return login()" class="mt-4">
                <input type="text" id="usuario" class="fadeIn second " name="usuario" placeholder="Usuario" required>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña"
                    required>
                <a href="registro.php" class="btn btn-danger mt-3 mb-4">
                    <li class="fas fa-address-card"></li> Registrarse
                </a>
                <button type="submit" class="btn btn-success mt-3 mb-4">
                    <li class="fas fa-sign-in-alt"></li> Entrar
                </button>
            </form>
            <!--<a href="recuperarPassword.php" class="text-warning mb-2" style="font-size: 20px; font-weight: bold;">
                <li class="far fa-question-circle"></li> Recuperar contraseña
            </a>-->
        </div>
    </div>

    <script src="librerias/jquery-3.5.1.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>

    <script type="text/javascript">
    function login() {
        $.ajax({
            type: "POST",
            data: $('#frmLogin').serialize(),
            url: "procesos/usuario/login/login.php",
            success: function(respuesta) {
                respuesta = respuesta.trim();
                var valor = $('#usuario').val();
                
                if (respuesta == 1 && valor=="gaboadm"){
                    window.location = "vistas/inicio.php";
                }else if(respuesta == 1){
                    window.location = "vistas/clave_muestra.php";                               
                }else{
                    swal("Datos incorrectos", "Verifique los datos ingresados", "error");
                }
            }
        });
        return false;
    }
    </script>
</body>

</html>