<?php
require_once('coneclinix.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $identificacion=$_POST['identificacion'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['pass'];
    
 $sql= "SELECT * FROM users WHERE id_users='$identificacion' AND correo='$correo'";
 $resultado=mysqli_query($conn, $sql);
 
 if($resultado->num_rows){
    $sql2="UPDATE users SET pass = '{$contraseña}' WHERE id_users='$identificacion' AND correo='$correo'";
    $save=mysqli_query($conn, $sql2);
    if($save){
        echo "<script> alert('La contraseña a sido actualizada');location.replace('../index.php') </script>";
    }
 }
 else {
    echo "<script> alert('La identificacion y el correo no son correctos');location.replace('./contrase.php') </script>";

 }
}


?>
