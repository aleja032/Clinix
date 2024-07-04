<?php
include ('conect.php');
$a=$_POST["id"];
$b=$_POST["pase"];

$insert=mysqli_query($c,"UPDATE users SET estado='0' WHERE id_users='$a'");
if($insert){
    session_start();
    session_destroy();
    header("location: inicio.php");
}

?>