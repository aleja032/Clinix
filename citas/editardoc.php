<?php
require_once('coneclinix.php');
$id = $_POST['id'];

// Consulta para obtener los datos del médico
$sql = "SELECT * FROM medico WHERE id = $id";
$resultado = mysqli_query($conn, $sql);

    if (isset($_POST['submit'])) {
        // Procesamiento del formulario de edición
        $nombre = $_POST["nombre"];
        $identificacion = $_POST["identificacion"];
        $especialidad = $_POST["especialidad"];
        $consultorio = $_POST["consultorio"];

        $sql = "UPDATE `medico` SET `nombre` = '{$nombre}', `identificacion` = '{$identificacion}', `especialidad` = '{$especialidad}', `consultorio` = '{$consultorio}' WHERE id = $id";
        $consulta = mysqli_query($conn, $sql);

        if ($consulta) {
            echo "<script>alert('La información quedó actualizada.'); location.replace('calendario.php')</script>";
        } else {
            echo "<script>alert('Hubo un error al actualizar la información.');</script>";
        }
    }

?>