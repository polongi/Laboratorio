<?php
 session_start();
 if(isset($_SESSION['usuario'])){
    include "header.php";
    ?>


<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-center">
            <span class="icono fas fa-atom" style="color: #068a87;"></span>
            Busqueda de Clave Muestra
            <span class="icono fas fa-atom" style="color: #068a87;"></span>
        </h1>
        <hr>
    </div>
    <br>
    <div class="text-center">
    <h4>Ingrese su Clave Muestra a buscar:</h4>
    <input type="text" id="clave_muestra" name="clave_muestra" placeholder="Ingrese su clave muestra">
    <button type="submit" class="btn-success">Buscar</button>
</div>
</div>

<?php
    include "footer.php";
 }else{
     header("location:../index.php");
 }
?>