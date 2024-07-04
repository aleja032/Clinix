<?php
require_once('coneclinix.php');

    $nombre = $_POST['title'];
    $tipo = $_POST['tipo'];
    $identificacion=$_POST['identificacion'];
    $telefono=$_POST['telefono'];
    $afiliacion = $_POST['afiliacion'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['pass'];
    $sql1 = "SELECT * FROM users WHERE id_users='$identificacion' OR correo='$correo'";
    $consulta1 = $conn->query($sql1);
    
    if ($consulta1->num_rows > 0) {
        while ($datos = mysqli_fetch_array($consulta1)) {
            if ($datos['id_users'] == $identificacion) {
                echo "<script>alert('La identificación que ingresó ya se encuentra registrada.'); window.location='registro.php'; </script>";
            } else if ($datos['correo'] == $correo) {
                echo "<script>alert('El correo que ingresó ya se encuentra registrado.'); window.location='registro.php'; </script>";
            }
        }
    } else {
        $sql = "INSERT INTO users (id_users, nombre, tipo, telefono, afiliacion, correo, pass, id_rol) VALUES ('$identificacion','$nombre','$tipo','$telefono','$afiliacion','$correo', '$contraseña',2)";
        $consulta = $conn->query($sql);
        if ($consulta) {
            echo "<script>alert('La información quedó registrada.'); window.location='../index.php'; </script>";
        } else {
            echo "<script>alert('Error al registrar la información.'); window.location='registro.php'; </script>";
        }
    }
    
    // Cierra la conexión a la base de datos al finalizar
    $conn->close();
    
/*WHERE id_users <> $identificacion OR correo<> $correo */

?>
