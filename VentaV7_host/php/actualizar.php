<?php
include ('conect.php');
$id=$_POST["in_id"];
$can=$_POST["can"];

$ids=explode('-',$id);
$id_producto=$ids[0];
$id_cliente=$ids[1];
$validar=mysqli_query($c,"SELECT * FROM inventario WHERE id_pr='$id_producto'");
if($validar){
    $var=mysqli_fetch_array($validar);
    $cantidad=$var["cantidad"];
    $cantidad=intval($cantidad);
    $can=intval($can);
    if($can>$cantidad){
        echo "<script>alert('la cantidad ingresada es mayor a la disponible')</script>";
        $actualizar=mysqli_query($c,"UPDATE carrito SET total='$can' WHERE id_producto='$id_producto' AND id_client='$id_cliente'");
    }else if($can <= $cantidad && $can>0){
        echo "<script>alert('Se ha cambiado la cantidad correctamente')</script>";
        $actualizar=mysqli_query($c,"UPDATE carrito SET total='$can' WHERE id_producto='$id_producto' AND id_client='$id_cliente'");
        if($actualizar){

        }else{
            echo "nooo";
        }
    }
}

?>