<?php
 session_start();
 if(isset($_SESSION['usuario'])){
    include "header.php";
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registro de SNP</title>
</head>
<body>
    <h1>Registro de SNP</h1>
</body>
</html>
<?php
    include "footer.php";
 }else{
     header("location:../index.php");
 }
?>