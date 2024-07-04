<?php
require_once('coneclinix.php');

$a=$_POST["nombre"];
$b=$_POST["identificacion"];
$c=$_POST["especialidad"];
$d=$_POST["consultorio"];

$sql="INSERT INTO medico (identificacion,nombre,especialidad,consultorio) VALUES ('$b','$a','$c','$d')";
$consulta=mysqli_query($conn,$sql);
if($consulta){
   echo" <script>alert('La informacion quedo registrada.'); location.replace('doctor.php')</script>";
}

?>