<?php
require_once('coneclinix.php');
$dato=$_POST['valor'];
$sql1 = "SELECT * FROM medico WHERE id=$dato";
$resultado1 = $conn->query($sql1);
if ($resultado1) {
    while($fila = $resultado1->fetch_assoc()) { 
        echo "Doctor: ".$fila["nombre"] ."<br>";
        echo "Consultorio: ".$fila["consultorio"]."<br>"; // devolvemos ambos valores separados por una coma
       echo  "<br>";
    }
}

?>