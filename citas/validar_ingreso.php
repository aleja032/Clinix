<?php
require_once('../coneclinix.php');
session_start();
$_SESSION['user'] = null;
$correo = $_POST['correo'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM users WHERE correo='$correo' AND pass='$pass' AND id_rol=2";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $a = mysqli_fetch_array($result);
    $_SESSION['user'] = $a['nombre'];
    $_SESSION['tipo'] = $a['tipo'];
    $_SESSION['telefono'] = $a['telefono'];
    $_SESSION['afiliacion'] = $a['afiliacion'];
    $_SESSION['correo'] = $a['correo'];
    $_SESSION['id'] = $a['id_users'];
    $_SESSION['id_rol'] = $a['id_rol'];
    $_SESSION['pass'] = $a['pass'];
    $id = $a['id_users'];
    echo "<script>window.location='index_user.php'</script>";
} else {
    $sql2 = "SELECT * FROM users WHERE correo='$correo' AND pass='$pass' AND id_rol=1";
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
        $c = mysqli_fetch_array($result2);
        $_SESSION['id'] = $c['id_users'];
        $_SESSION['nombre'] = $c['nombre'];
        $_SESSION['correo'] = $c['correo'];
        $_SESSION['pass'] = $c['pass'];

        echo "<script>window.location='./calendario.php'</script>";
        // echo $_SESSION['id'] = $c['id_users'];
        // header("Location: calendario.php");
        // echo "<script>window.location='calendario.php'</script>";

    } else {
        echo "<script>alert('Datos invalidos')</script>";
        echo "<script>window.location='../index.php'</script>";
    }
}
?>
