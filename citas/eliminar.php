<?php
require_once('../coneclinix.php');
session_start();
$eliminar=$_POST["delete"];
$sql = "DELETE FROM cita WHERE id='$eliminar'";
$resultado = mysqli_query($conn, $sql);
$id=$_SESSION['id'];
if ($resultado) {
                $compras1="SELECT * FROM cita INNER JOIN users WHERE users.id_users='$id'";
                $efectuar1=mysqli_query($conn,$compras1);
                if($efectuar1){
                    while($fill1=mysqli_fetch_array($efectuar1)){
                        $a1 =$fill1['id_medico'];
                        $a2 =$fill1['id_horario'];
                        $consult2="SELECT * FROM medico INNER JOIN horario WHERE medico.id='$a1' AND horario.id='$a2'";
                        $efectuar2=mysqli_query($conn,$consult2);
                        if($efectuar2){
                            while($consulta2=mysqli_fetch_array($efectuar2)){
                                $fecha_actual = date("Y-m-d");
                                $fecha_cita = $fill1["fecha"];
                                $puede_eliminar = ($fecha_cita >= $fecha_actual);
                        ?>
                        <div class="container" id="cont" >
                            
                            <div class="campo"><?php echo $fill1["id_users"];?></div>
                            <div class="campo"><?php echo $fill1["nombre"];?></div>
                            <div class="campo"><?php echo $fill1["descripcion"];?></div>
                            <div class="campo"><?php echo $consulta2["nombre"];?></div>
                            <div class="campo"><?php echo $consulta2["especialidad"];?></div>
                            <div class="campo"><?php echo $consulta2["consultorio"];?></div>
                            <div class="campo"><?php echo $fill1["fecha"];?></div>
                            <div class="campo"><?php echo $consulta2['inicio']."-".$consulta2['fin'];?></div>
                            <div class="campo"><form class="miformm" data-form="<?php echo $fill1["id"];?>">
                                <input type="hidden" name="delete" value="<?php echo $fill1["id"];?>">
                                <?php if ($puede_eliminar) { ?>
                                <form class="miformm" data-form="<?php echo $fill1["id"]; ?>">
                                    <input type="hidden" name="delete" value="<?php echo $fill1["id"]; ?>">
                                    <button type="submit" class="but_eliminar">Eliminar</button>
                                </form>
                            <?php } else { ?>
                                <!-- Aquí puedes agregar un mensaje o dejar el espacio en blanco si no deseas mostrar nada -->
                            <?php } ?>                            </form></div>
                           
                        </div>
                    <?php
                    }
                }
            }
        }
            ?>
                <script>
        $(document).ready(function() {
             // Función que se ejecuta cuando se envía un formulario
            $('.miformm').submit(function(event) {
            event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)

            var form_id = $(this).data('form'); // Obtener el identificador único del formulario

            $.ajax({
                url: 'eliminar.php', // Ruta a tu script PHP que procesará los datos
                type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
                data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
                success: function(respuesta) {
                    $('#tabel').html(respuesta); // Actualizar el contenido de la página web con la respuesta del servidor
                    const ventanamodifnews= document.getElementById('modivalores');
                    const abrirmodifnews = document.querySelectorAll('.openmodif');
            
                    abrirmodifnews.forEach((boton) => {
                        boton.addEventListener('click', () => {
                            ventanamodifnews.classList.add('prueba');
                        });
                    });
                },
            });
        });
    });
    </script>
    <?php
}
    ?>