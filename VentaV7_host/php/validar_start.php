<?php
include('conect.php');
session_start();
    $a1= $_POST["correo"];
    $b1 = $_POST["pass"];
    $_SESSION['correo'] = $a1;
    $_SESSION['pass'] = $b1;

    $consulta = "SELECT * FROM users where correo = '$a1'";
    $ejecuta = mysqli_query($c, $consulta);

    if (mysqli_num_rows($ejecuta)>0) {
                $a=mysqli_fetch_array($ejecuta);
                $_SESSION['user'] = $a['nombre'];
                $_SESSION['tipo'] = $a['tipo'];
                $_SESSION['telefono'] = $a['telefono'];
                $_SESSION['afiliacion'] = $a['afiliacion'];
                $_SESSION['correo'] = $a['correo'];
                $_SESSION['id'] = $a['id_users'];
                $_SESSION['id_rol'] = $a['id_rol'];
                $_SESSION['pass'] = $a['pass'];
              }


    header("Location: iniciouser.php");
           
?>