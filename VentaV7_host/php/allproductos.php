<?php
include ('conect.php');
$id_user = $_POST["iduser"];
$id = $_POST["idrol"];
$pt = $_POST["validar"];
$a = mysqli_query($c, "SELECT * FROM inventario");

if (mysqli_num_rows($a) > 0) {
    while ($fila = $a->fetch_assoc()) {
?>
                           <div class="pr">
                        <div class="productos">
                            <div class="imgg">
                                
                            <?php 
                            
                             $add=$fila["ruta"];
                             echo"<img src='$add'>";
                            ?>
                            </div>
                            <div class="descripcion">
                                <div class="cont_name">

                                    <p class="name1">
                                        
                                        <?php
                                        
                                echo $fila["nombre"];
                                ?>
                                    </p>
                                </div>
                                <div class="cont_cantidad">
                                    <p class="cantidad">Cantidad Disponible:</p>
                                    <p class="cantidad1">
                                        
                                        <?php 
                                echo $fila["cantidad"];
                                ?>
                                    </p>
                                </div>
                                <div class="cont_precio">
                                    
                                    <p class="precio1">
                                    $
                                        <?php 
                                echo $fila["precio"];
                                ?>
                                    </p>
                                </div>

                            </div>
                            <div class="cont_forms">
                                <form method="post" class="formm" data-form="<?php echo $fila["id_pr"];?>">
                                    <input type="hidden" name="idrol" value="<?php echo $id;?>">
                                    <input type="hidden" name="iduser" value="<?php echo $id_user;?>">
                                    <input type="hidden" name="idpr" value="<?php echo $fila['id_pr'];?>">
                                    <?php if($id==1 or $id==2){ ?>
                                    <button type="submit" class="butt ">
                                        Añadir
                                    </button>
                                    <?php }?>
                                </form>
                                <form method="post" class="description" data-form="<?php echo $fila["id_pr"];?>">
                                        <input type="hidden" name="idrol" value="<?php echo $id;?>">
                                        <input type="hidden" name="iduser" value="<?php echo $id_user;?>">
                                        <input type="hidden" name="idpr" value="<?php echo $fila['id_pr'];?>">
                                        <button type="submit" class="opendes" id="o">
                                            Descripcion
                                        </button>
                                    </form>
                            </div>
                        </div>
                    </div>
<?php
    }
}

?>
<script src="../js/desall.js"></script>
<script src="../js/descripcionv.js"></script>
<script src="../js/cerrardescripcion.js"></script>
<script src="../js/anadirproducto.js"></script>
