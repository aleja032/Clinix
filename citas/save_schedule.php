<?php
require_once('../coneclinix.php');
session_start();
$descripcion=$_POST['description'];
$especialista=$_POST['especialidad'];
$fecha=$_POST['start_datetime'];
$hora=$_POST['hora'];
$id_user=$_POST['dato'];


$sql="SELECT* FROM cita WHERE fecha='$fecha' AND id_user='$id_user' AND id_horario='$hora'";
$resultado=mysqli_query($conn,$sql);
if(mysqli_num_rows($resultado)){
    echo"<script>alert('No es posible agendar')</script>";
   // echo "<script>window.location='usuario.php'</script>";
}else{
        $sql="SELECT* FROM cita WHERE id_medico='$especialista' AND fecha='$fecha' AND id_user='$id_user'";
        $resultado=mysqli_query($conn,$sql);
        if(mysqli_num_rows($resultado)){
            echo"<script>alert('Ya tiene agendada un cita para este fecha con el doctor que escogio')</script>";
            //echo "<script>window.location='index_user.php'</script>";
        }
        else{
            $cita="SELECT * FROM cita WHERE id_medico='$especialista' AND fecha='$fecha' AND id_horario='$hora'";
            $ejecutar=mysqli_query($conn,$cita);
            if (mysqli_num_rows($ejecutar)>0){
                echo "<script>alert('No disponible')</script>";
                //echo "<script>window.location='index_user.php'</script>";
            }else{
                $cita1="INSERT INTO cita (id_user,descripcion,id_medico,fecha,id_horario)VALUES ('$id_user','$descripcion','$especialista','$fecha','$hora')";
                    $ejecutar1=mysqli_query($conn,$cita1);
                if ($ejecutar1){
                echo "<script>alert('Cita Agregada')</script>";
                //echo "<script>window.location='index_user.php'</script>";
            }
            }
        }
}
?>
