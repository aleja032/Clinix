<?php
require_once('coneclinix.php');
$id=$_POST['bili'];

$sql = "DELETE FROM medico WHERE id=$id";
$resultado = $conn->query($sql);
if($resultado){
    header("location:calendario.php");}

?>