<?php
include ('conect.php');
$variable=$_POST["deletecar"];
$variable=explode('-',$variable);
$id_producto=$variable[0];
$idcliente=$variable[1];
$delete=mysqli_query($c,"DELETE FROM carrito WHERE id_producto='$id_producto' AND id_client='$idcliente'");
if ($delete){
    echo "<script>alert('Eliminado correctamente');</script>";
}
?>



        <table>
        <tr>
                <th>ID PRODUCTO</th>
                <th>PRODUCTO</th>
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
<script src="../js/deletecar.js"></script>
<script src="../js/changecantidad.js"></script>