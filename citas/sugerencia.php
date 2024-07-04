<?php
require_once("coneclinix.php");
if (isset($_POST['enviar'])) {
    $suge = $_POST['sugerencia'];

    // Preparar y ejecutar la consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO `sugerencia` (`sugerencia` ) VALUES ('$suge')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Sugerencia guardada.'); window.location='index_user.php'</script>";
    } else {
        echo "Error al guardar la sugerencia: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();

}

 ?>