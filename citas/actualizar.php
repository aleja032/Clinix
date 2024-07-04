<?php
require_once('coneclinix.php');
$id_cita=$_POST['id'];
$descripcion=$_POST['descripcion'];
$especialidad=$_POST['especialidad'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$actualizar=mysqli_query($conn,"UPDATE cita SET descripcion='$descripcion',id_medico='$especialidad',fecha='$fecha',id_horario='$hora' WHERE id='$id_cita'");
if($actualizar){
    echo "<script>alert('actualizado correctamente')</script>";
    echo "<script>window.location='calendario.php'</script>";
}
else{
    echo"<script>alert ('No se pudo actualizar')</script>";
}
?>