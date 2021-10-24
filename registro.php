<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registro</title>
</head>

<body id="body-registro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-3 shadow-form mb-3">
                <img class="avatar" src="img/avatar.png" alt="">
                <h3 class="text-center mb-4 sombraR">Registro de usuario</h3>
                <form id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre" class="font-weight-bold">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control"
                                placeholder="Ingrese su nombre" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="apellidos" class="font-weight-bold">Apellidos:</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control"
                                placeholder="Ingrese sus apellidos" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="carrera" class="font-weight-bold">Sexo:</label>
                            <select name="carrera" id="carrera" class="form-control">
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Indistinto">Prefiero no mencionarlo</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email" class="font-weight-bold">Correo electrónico:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Ingrese un correo electrónico" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telefonoCasa" class="font-weight-bold">Teléfono de casa:</label>
                            <input type="text" name="telefonoCasa" id="telefonoCasa" class="form-control"
                                placeholder="10 dígitos" pattern="[0-9]+" MaxLength="10" MinLength="10" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telefono" class="font-weight-bold">Teléfono celular:</label>
                            <input type="text" name="telefono" id="telefono" class="form-control"
                                placeholder="10 dígitos" pattern="[0-9]+" MaxLength="10" MinLength="10" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="direccion" class="font-weight-bold">Dirección completa:</label>
                            <input type="text" name="direccion" id="direccion" class="form-control"
                                placeholder="Ingrese su dirección" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="claveMuestra" class="font-weight-bold">Clave muestra:</label>
                            <input type="text" name="claveMuestra" id="claveMuestra" class="form-control"
                                placeholder="Ingrese su clave muestra" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="catalogo" class="font-weight-bold">Catálogo de enfermedades:</label>
                            <select name="catalogo" id="catalogo" class="form-control">
                                <option value="Femenino">Enfermedad-1</option>
                                <option value="Masculino">Enfermedad-2</option>
                                <option value="Indistinto">Enfermedad-2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="usuario" class="font-weight-bold">Nombre de usuario:</label>
                            <input type="text" name="usuario" id="usuario" class="form-control"
                                placeholder="Ingrese un nombre de usuario" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" class="font-weight-bold">Contraseña:</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Ingrese una contraseña" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 pt-3 text-center ">
                            <a href="index.php" class="btn btn-success mt-2 mb-2">
                                <span class="fas fa-sign-in-alt mr-2"></span>Entrar
                            </a>
                            <button value="Registrarse" class="btn btn-primary mt-2 mb-2 ml-2">Registrarse</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="librerias/jquery-3.5.1.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>

    <script type="text/javascript">
    function agregarUsuarioNuevo() {
        $.ajax({
            method: "POST",
            data: $('#frmRegistro').serialize(),
            url: "procesos/usuario/registro/agregarUsuario.php",
            success: function(respuesta) {
                respuesta = respuesta.trim();
                console.log(respuesta);
                if (respuesta == 1) {
                    $("#frmRegistro")[0].reset();
                    swal("Registro exitoso!!", "Ha sido registrado con éxito", "success");
                } else if (respuesta == 2) {
                    //swal("Este usuario ya existe, por favor ingrese otro", "", "warning");
                    swal({
                        icon: "warning",
                        title: "Este usuario ya existe, por favor ingrese otro",
                        text: "",
                        closeModal: false
                    }).then(function() {
                        swal.close();
                        $('#usuario').focus();
                    });
                } else if (respuesta == 3) {
                    swal({
                        icon: "warning",
                        title: "Este correo ya existe, por favor ingrese otro",
                        text: "",
                        closeModal: false
                    }).then(function() {
                        swal.close();
                        $('#email').focus();
                    });
                } else {
                    swal("Registro fallido", "Verifique los campos", "error");
                }
            }
        });
        return false;
    }
    </script>
</body>

</html>