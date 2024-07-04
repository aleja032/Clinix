<?php
require_once('coneclinix.php');
$id=$_POST['id'];
$sql = "DELETE FROM cita WHERE id= '$id' ";
$resultado = $conn->query($sql);
if($resultado){
    echo "<script>alert('Cita eliminada')</script>";
    echo "<script>window.location='calendario.php'</script>";

}
?>