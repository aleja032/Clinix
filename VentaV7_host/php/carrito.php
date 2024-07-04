<?php
include ('conect.php');
session_start();
$a=0;
$idproducto=$_POST["idpr"];
$idcliente= $_SESSION['id'];
$validar=mysqli_query($c,"SELECT * FROM carrito WHERE id_producto='$idproducto' AND id_client='$idcliente'");
if(mysqli_num_rows($validar)>0){
    $a=1;
}
if($a==1){
    echo "<script>alert('ya has añadido este producto al carrito')</script>";
}else{
    $consulta=mysqli_query($c,"INSERT INTO carrito (id_producto,id_client,total) VALUES ('$idproducto','$idcliente',1)");
    if($consulta){
        echo "<script>alert('añadido correctamente')</script>";
    }
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
                
<script src="../js/deletecar.js"></script>
<script src="../js/changecantidad.js"></script>
