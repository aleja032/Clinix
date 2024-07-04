
<?php 
require_once('../coneclinix.php');
session_start();
$sql = "SELECT * FROM medico";
$result = mysqli_query($conn, $sql);
    $horario = "SELECT * FROM horario";
    $consulta_horario = mysqli_query($conn, $horario);

$reci=$_POST['dato'];


$sql2="SELECT * FROM users WHERE id_users= '$reci'";
$consulta2=mysqli_query($conn,$sql2);
if(mysqli_num_rows($consulta2)>0){
    $dato=mysqli_fetch_array($consulta2);
    $nombre=$dato['nombre'];
    $tipo=$dato['tipo'];
    $afili=$dato['afiliacion']  ;
    $telefono=$dato['telefono'];
    $identi=$dato['id_users'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Adamina&family=Merriweather:ital@1&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <link rel="stylesheet" href="./css/usuario15.css">
    <title>Perfil</title>
</head>
<body>
      
        <header>
        
            <div class="modal">

                <div class="logo">
                    <div class="regre"> <a href="index_user.php" class="regresar" id="regre" ><i class="fa-solid fa-arrow-left" style="color: #11307C;"></i></a> </div>
                    <div class="containlogo">
                        <img id="image" src="../img/logo.png" alt="">
                        <p class="">CLINIX</p>
                    </div>
                </div>

                <a href="#agendar" id="agendarCitas">Agendar citas</a>
                <a href="#mis" id="misCitas"> Mis citas</a>

            </div>
            
            <div class="nameuser">
                <div class="user"><i class="fa-solid fa-user" style="color: #064bc1;"></i></div>
                <?php
                echo $nombre;
                ?>
            </div>
        </header>
    <section class="uno" id="agendar">
        <div class="modalcita">
            <div class="container">
                <div class="container1">
                
                    <div class="cont_img"></div><img class="fami" src="../img/family.jpg" alt="" srcset="">
                </div>
                <div class="container2">
                    <div class="texto"> <h2>Solicitar cita</h2></div>
            
                    <form action=""  method="post" id="schedule-form">
                        <div class="dat">   
                            <label for="title">Nombres y apellidos</label>
                            <div class="datoss"> 
                                <?php echo $nombre;?>
                            </div>
                        </div>
                        <div class="dat">
                            <label for="tipo">Tipo de identificacion</label>
                            <div class="datoss">     
                                <?php echo $tipo; ?>
                            </div>
                        </div>
                        <div class="dat">
                            <label for="identificacion">Identificacion</label>
                                <div class="datoss">     
                                    <?php echo $reci; ?>
                                </div>
                        </div>
                        <div class="dat">
                            <label for="telefono">Telefono</label>
                            <div class="datoss">     
                                        <?php echo $telefono; ?>
                            </div>
                        </div>
            
                        <label for="description">Descripción</label>
                        <select name="description" id="description"> 
                        <option value="Cita externa">Cita externa</option>  
                        <option value="lectura de examenes">lectura de examenes</option>
                        
                        </select> 

                        <div class="dat">
                            <label for="afiliacion">Afiliación</label>
                                <div class="datoss">     
                                            <?php echo $afili; ?>
                                </div>
                        </div>     
                        <div class="cont-especialidad">
                                                    <label for="especialidad">Especialista</label>
                                                    <select name="especialidad" id="especialidad">   
                                                        
                                                    <?php
            
                                                        if($result){
                                                            while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='".$row['id']."'>".$row['especialidad']."</option>";                                              
                                                            }
                                                        }
                                                        ?>                                                                   
                                                    </select>
                        </div>
            
                        <div class="especial" id="special">
                        </div>
            
                        <div class="consultorio" id="consulto">
                        </div>
                        
            
                        <div class="fecha" id="fecha">  
                            <label for="start_datetime">Fecha</label>
                            <input type="date" name="start_datetime" id="start_datetime" min="<?php echo  date('Y-m-d')?>" required> <!--no funciona lo de la fecha que se elija todo menor lod dias anteriores al actual-->
                        </div>
                                               
                        <div class="Hora">  
                            <label for="fech">Hora</label>
                            <select name="hora" id="fech">   
                                                        
                                                        <?php  
                                                            if($consulta_horario){
                                                                while ($row1 = $consulta_horario->fetch_assoc()) {
                                                                echo "<option value='".$row1['id']."'>".$row1['inicio']." - ".$row1['fin']."</option>";                                              
                                                                }
                                                            }
                                                            ?>                                                                   
                                                        </select>
                                                        
                        </div>
                        <input type="hidden" name="dato" value="<?php echo $reci?>">
                    </form>
                    <div class="button-container">
                            <button class="guardar"  type="button" form="schedule-form" name="dato1" id="porfin" value="<?php echo $reci?>"><i class="fa fa-save"></i> Enviar</button>
                            <button class="cancelar" type="reset" form="schedule-form"> <a  id="vali" href="index_user.php">Cancelar</a></button>
                            
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dos" id="mis">
        
    <div id="tabel" class="cotenedor">
    <?php
    $comparar = "SELECT * FROM cita INNER JOIN users WHERE users.id_users='$identi' AND cita.id_user=$identi";
    $efectuar1 = mysqli_query($conn, $comparar);
    if ($efectuar1) {
        while ($fill1 = mysqli_fetch_array($efectuar1)) {
            $a1 = $fill1['id_medico'];
            $a2 = $fill1['id_horario'];
            $consult2 = "SELECT * FROM medico INNER JOIN horario WHERE medico.id='$a1' AND horario.id='$a2'";
            $efectuar2 = mysqli_query($conn, $consult2);
            if ($efectuar2) {
                while ($consulta2 = mysqli_fetch_array($efectuar2)) {
                    $fecha_actual = date("Y-m-d");
                    $fecha_cita = $fill1["fecha"];
                    $puede_eliminar = ($fecha_cita >= $fecha_actual);
                    ?>
                    <div class="container" id="cont">
                        <div class="campo"><?php echo $nombre; ?></div>
                        <div class="campo"><?php echo $fill1["descripcion"]; ?></div>
                        <div class="campo"><?php echo $consulta2["nombre"]; ?></div>
                        <div class="campo"><?php echo $consulta2["especialidad"]; ?></div>
                        <div class="campo">Consultorio: <?php echo $consulta2["consultorio"]; ?></div>
                        <div class="campo"><?php echo $fill1["fecha"]; ?></div>
                        <div class="campo"><?php echo $consulta2['inicio'] . "-" . $consulta2['fin']; ?></div>
                        <div class="campo">
                            <?php if ($puede_eliminar) { ?>
                                <form class="miformm" data-form="<?php echo $fill1["id"]; ?>">
                                    <input type="hidden" name="delete" value="<?php echo $fill1["id"]; ?>">
                                    <button type="submit" class="but_eliminar">Eliminar</button>
                                </form>
                            <?php } else { ?>
                                <!-- Aquí puedes agregar un mensaje o dejar el espacio en blanco si no deseas mostrar nada -->
                            <?php } ?>
                        </div>
                    </div>
    <?php
                }
            }
        }
    }
    ?>
</div>


    </section>
  <div class="barrita"></div>

    <script>
        // Obtener referencias a los enlaces y sections
        const agendarCitasLink = document.querySelector('#agendarCitas');
        const misCitasLink = document.querySelector('#misCitas');
        const sectionAgendarCitas = document.querySelector('.uno');
        const sectionMisCitas = document.querySelector('.dos');

        // Función para mostrar la sección de Agendar citas
        function showAgendarCitas() {
            sectionAgendarCitas.style.display = 'flex';
            sectionAgendarCitas.style.visibility = 'visible';
            sectionMisCitas.style.display = 'none';
            sectionMisCitas.style.visibility = 'hidden';

        }

        // Función para mostrar la sección de Mis citas
        function showMisCitas() {
            sectionAgendarCitas.style.display = 'none';
            sectionAgendarCitas.style.visibility = 'hidden';
            sectionMisCitas.style.display = 'flex';
            sectionMisCitas.style.visibility = 'visible';
        }

        // Agregar eventos a los enlaces
        agendarCitasLink.addEventListener('click', showAgendarCitas);
        misCitasLink.addEventListener('click', showMisCitas);

        // Por defecto, mostramos la sección de Agendar citas al cargar la página
        showAgendarCitas();


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

        <script>
            $("#especialidad, #consultorioid").change(function() { // agregamos el evento change para ambos selects
                var valorSeleccionado = $(this).val();
                $.ajax({
                url: "lista.php",
                type: "POST",
                data: { valor: valorSeleccionado },
                    success: function(response) {
                            var valores = response.split(","); // separamos los valores recibidos por la coma
                            $("#special").html(valores[0]); // actualizamos el primer select con el nombre
                            $("#consulto").html(valores[1]); // actualizamos el segundo select con el consultorio
                    }
                });
            });
        </script>
</body> 
</html>
<script>
        function closesess() {
            $.ajax({
                url: "save_schedule.php",
                type: "POST",
                data: $("#schedule-form").serialize(),
                success: function (respon3) {
                    $(".barrita").html(respon3);
                    location.reload();
                }
            });
        }

        $("#porfin").click(function () {
            closesess();
        });
</script>
