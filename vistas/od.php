<?php
 session_start();
 if(isset($_SESSION['usuario'])){
    include "header.php";
    
//rs4987117
/*$texto = 'Aprenderausarprueba';
//$rest = substr("abcdef", -1);    // devuelve "f"
echo substr($texto,-2);*/

$select ="SELECT snps as direccion FROM t_snps";

            $sql = "SELECT snps FROM t_snps";

            $result = mysqli_query($mysqli, $sql);

            while($row = $result->fetch_array()){
                $snps = $row['snps'];                
                //echo "valor encontradro: " . $snps;
                /*if($row['snps'] == "rs405509"){
                    echo "*|";
                }else{
                    //echo "valor no encontrado";
                }
                }*/
                //echo $snps ."<br>";
                
            
           
if (($gestor = fopen("C:\Users\hp\Documents\ProyectoLaboratorio\pruebageno.csv", "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor)) !== FALSE) {
        $numero = count($datos);
        
        for ($c=0; $c < $numero; $c++) {
            //echo $row['snps'] ."<br>";
            /*$aux = $datos[$c];
            $aux2 = substr($aux,-3);
            $a = array($aux2);
            $a[0] = $aux2[0];
            $a[1] = $aux2[1];
            $a[2] = $aux2[2];
            echo  $a[0];
            echo  $a[1];
            echo  $a[2] . "</br>";*/

            if($datos[$c] == "rs4987117"){
                echo "****";
            }else{
                //echo "no se encontro";
            }

            //echo $datos[$c] . "<br />\n";
            
            //$texto = 'Aprender a usar explode()';
            /*$array = explode ( ' ', $datos[$c] );
            foreach ( $array as $palabra ) {
            echo $palabra . '<br>';
            }*/
            
            //Creamos el SQL para insertar
            /*$sql = "INSERT INTO prueba VALUES('', '$a[0]','$a[2]')";
            
            //Ejecutamos la sentencia SQL
            if($mysqli->query($sql) === TRUE) {
              echo "SE INSERTO CORRECTAMENTE<br>";
            }*/
        }
    }
    fclose($gestor);
}
}
include "footer.php";
 }else{
     header("location:../index.php");
 }
?>