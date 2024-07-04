<?php
include ('conect.php');
$productos=array();
$a=1;
$idcliente=$_POST["user"];
$consulta=mysqli_query($c,"SELECT * FROM carrito WHERE id_client='$idcliente'");
if($consulta->num_rows > 0){
    while($car= $consulta->fetch_assoc()){
        
        $id=$car["id_producto"];
        $cantidad=$car["total"];
        $consulta1=mysqli_query($c,"SELECT * FROM inventario WHERE id_pr='$id'");
        if($consulta1){
            $ar=mysqli_fetch_array($consulta1);
            $precio=$ar["precio"];
            $disponible=$ar["cantidad"];
                if($cantidad>$disponible or $cantidad<=0){
                    $productos[]=$id;
                    $a++;
                }elseif($cantidad>0 && $cantidad<=$disponible){
                    $total=$precio*$cantidad;
                    $insert=mysqli_query($c,"INSERT INTO compras (id_producto,id_cliente,cantidad,total) VALUES ('$id','$idcliente','$cantidad','$total')");
                    if($insert){
                        $newcantidad=$disponible-$cantidad;
                        $consult=mysqli_query($c,"UPDATE inventario SET cantidad=$newcantidad where id_pr=$id");
                        $consult1=mysqli_query($c,"UPDATE producto SET cantidad=$newcantidad where id_producto=$id");
                        if($consult){
                            if($consult1){
                                
                                $del=mysqli_query($c,"DELETE FROM carrito WHERE id_client='$idcliente' AND id_producto='$id'");
                            }
                        }
                    }
                }
            }
        }
    }
if($a!=1){
    
    echo"<script>alert('No se pudo efectuar la compra de algunos productos')</script>";
}
?>
<table>
<tr>
        <th>ID PRODUCTO</th>
        <th>NOMBRE</th>
        <th>VALOR</th>
        <th>CANTIDAD</th>
        <th>ElIMINAR</th>
    </tr>
    <?php
        $carrito="SELECT * FROM carrito WHERE id_client=$idcliente";
        $concar=mysqli_query($c,$carrito);
        if($concar){
            while($car=mysqli_fetch_array($concar)){  
                $id_pp=$car["id_producto"];
                $carrito1=mysqli_query($c,"SELECT * FROM inventario WHERE id_pr='$id_pp'");
                if($carrito1){
                    while($car1=mysqli_fetch_array($carrito1)){ 
                
                ?>
            <tr class=tr_tr1>

                <td class="campo">
                    <?php echo $car["id_producto"];?>
                </td>
                <td class="campo">
                    <?php echo $car1["nombre"];?>
                </td>
                <td class="campo">
                    <?php echo $car1["precio"];?>
                </td>
                <td class="campo">
                        <input type="number" placeholder="<?php echo $car['total'];?>" data-cantidad="<?php echo $car["id_producto"]."-".$idcliente;?>" class="inputt">
                </td>
                <td class="campo">
                    <form class="delete_car" method="post" data-form="<?php echo $car["id_producto"];?>">
                        <input type="hidden" name="deletecar" value="<?php echo $car["id_producto"]."-".$idcliente;?>">
                        <button type="submit" class="but_eliminar">Eliminar</button>
                    </form>
                </td>

            </tr>
            
            
    <?php
                    }
                }
            }
        }
                else{
                echo "<script>alert('no')</script>";
            }
    
        ?>
        </table>