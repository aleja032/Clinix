<?php
include ('conect.php');
session_start();
if(isset($_POST["pase"])){
    $a=$_POST["iden"];
    $b=$_POST["pass"];
    


    $sql = "SELECT * FROM users WHERE id_users='$a' AND pass='$b'";
    $resultado = mysqli_query($c, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $rol=mysqli_fetch_array($resultado);
        $nanee=$rol["nombre"];
        $idd=$rol["id_rol"];
        
        $_SESSION["id"]=$idd;
        $_SESSION["a"]=$nanee;
        $_SESSION["na"]=1;
        echo "<script>window.location='iniciouser.php'</script>";

    }
}
?>