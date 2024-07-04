<?php 
require_once('coneclinix.php');

session_start();
if($_SESSION['user'] !=null){
  $a=$_SESSION['correo'];
  $b=$_SESSION['pass'];
  $a1=$a;
  $b1=$b;

  $dato= $_SESSION['id'];
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/calendario12.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./fullcalendar/lib/locales-all.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Administrador</title>
</head>
<body>
    
    <header>
        <h2>Citas programadas</h2>
        <div class="contenedor-usu"><div class="icono"><i class="fa-solid fa-user"></i></div> <p><?php echo $_SESSION['nombre']?></p></div>
    </header>

    <div class="contenedor">
        <div class="cen">
            <div class="barra">
                <div class="list">    
                    <button id="calen" >Calendario</button>
                    <button id="vercita"  >Citas Agendadas</button>
                    <button id="vermedico">Medicos</button>
                </div>
                    <form action="cerrar.php" method="post" id="cerrarsesion" >
                        <button type="submit" class="sesion">Cerrar Sesión <i class="fa-solid fa-power-off"></i></button>
                    </form>
            </div>

          <Section id="uno" class="uno">
                <div id="calendar"></div>   
            </Section>
            <section id="dos" class="dos">

            <div class="buscador"><div class="auxcont"><i class="fa-solid fa-magnifying-glass"></i> <input type="text" placeholder="Buscar" class="buscar"> <button class="filtrar">Filtrar</button></div></div>
    <div class="cont-tabla">

            <table class="tabla" >  <?php
    $sql = "SELECT * FROM cita";
    $resultado = $conn->query($sql);
    if ($resultado->num_rows > 0) {
    ?>
        <tr class="borde1">
			<th class="encabe">Nombre</th>
			<th class="encabe">tipo</th>
			<th class="encabe">Identificacion</th>
			<th class="encabe">Tipo de cita</th>
			<th class="encabe">Fecha</th>
			<th class="encabe">especialista</th>
            <th class="encabe">consultorio</th>
			<th class="encabe">Hora</th>
			<th class="encabe">Eliminar</th>
            <th class="encabe">Editar</th>
            
		</tr><?php
            while($fila = $resultado->fetch_assoc()) {
                $a1 =$fila['id_user'];
                $a2 =$fila['id_medico'];
                $a3 =$fila['id_horario'];
                $sql2= "SELECT * FROM users WHERE id_users='$a1' ";
                $resultado2= $conn->query($sql2);
                if($resultado2){
                    while($fila2 = $resultado2->fetch_assoc()){
                
                $sql3="SELECT* FROM medico WHERE id='$a2'";
                $resultado3= $conn->query($sql3);
                if($resultado3){
                    while($fila3 = $resultado3->fetch_assoc()){
                    $sql4="SELECT* FROM horario WHERE id='$a3'";
                    $resultado4= $conn->query($sql4);
                    if($resultado4){
                        while($fila4 = $resultado4->fetch_assoc()){
            ?>
        
        <tr class="borde2">
				<td class="campo"><?php echo $fila2['nombre']?></td>
				<td class="campo"> <?php echo $fila2['tipo']?></td>
				<td class="campo"><?php echo $fila2['id_users']?></td>
				<td class="campo"><?php echo $fila['descripcion']?></td>
				<td class="campo"><?php echo $fila['fecha']?></td>
				<td class="campo"><?php echo $fila3['especialidad']?></td>
				<td class="campo"><?php echo $fila3['consultorio']?></td>
				<td class="campo"><?php echo $fila4['inicio']."-".$fila4['fin']?></td>
				
				<td class="campo1">
					<form action="delatecita.php" method="post">
						<input type="hidden" name="id" value="<?php echo $fila['id'] ?>">
						<button type='submit' name='eliminar' id="eliminar">Eliminar</button>
					</form>
				</td>
				<td class="campo1">
                <button type="button" class="editar-button" data-toggle="modal" data-target="#formulario-modal" data-id="<?php echo $fila['id'] ?>" data-nombre="<?php echo $fila2['nombre'] ?>" id="editar">Editar</button>
				</td>
			</tr> 
                <?php
                    }
                }
            }
        }
    }}

}};?></table>                </div>


            </section>

            <section id="tres" class="tres">
            <div class="agre">
                <div class="auxagregar">
                    <form action="doctor.php" method="post">
                        <button type='submit' name='eliminar' id="add">Agregar</button>
                       
                    </form>
                </div>
            </div>
        <div class="cont-tabla">
            <table class="tabla">

               <?php 
                $conmedico = "SELECT * FROM medico";
                $resulmedico = $conn->query($conmedico);

                if ($resulmedico->num_rows > 0) {?>
                    <tr class="borde1">
                            <th class="encabe">Identificación</th>
                            <th class="encabe">Nombre</th>
                            <th class="encabe">Especialidad</th>
                            <th class="encabe">Consultorio</th>
                            <th class="encabe">Eliminar</th>
                            <th class="encabe">Editar</th>

                    </tr>
                <?php
                    while($medicos = $resulmedico->fetch_assoc()) {
                        ?>
                        <tr class="borde2">
                                <td class="campo"><?php echo $medicos['identificacion']?></td>
                                <td class="campo"><?php echo $medicos['nombre']?></td>
                                <td class="campo"><?php echo $medicos['especialidad']?></td>
                                <td class="campo"><?php echo $medicos['consultorio']?></td>
                                <td class="campo1">
                                    <form action="delatedoc.php" method="post">
                                        <input type="hidden" name="bili" value="<?php echo $medicos['id'] ?>">
                                        <button type='submit' name='eliminar' id="eliminar">Eliminar</button>
                                    </form>
                                </td>
                                    <!--otra manera de hacerlo-->
                                <td class="campo1">    
                                    <button type="button" class="actualizar-button" data-toggle="modal" data-target="#doctor"  
                                            data-id="<?php echo $medicos['id'] ?>" 
                                            data-identi="<?php echo $medicos['identificacion'] ?>";
                                            data-nombre="<?php echo $medicos['nombre']?>" 
                                            data-especialidad="<?php echo $medicos['especialidad']?>" 
                                            data-consultorio="<?php echo $medicos['consultorio'] ?>" id="editar">

                                        Editar
                                    </button>
                                </td>
                            </tr>
                            <?php
                    }
                    }
?>         </table> </div>
            </section>
    </div>

<script>
    $(document).ready(function() {
        $(".editar-button").click(function() {
            var citaId = $(this).data("id");
            var nombre = $(this).data("nombre");
            // Populate the modal with the data using citaId if needed
            $("#nombreDiv").text(nombre);
            $("#event-id").val(citaId);

            $("#formulario-modal").modal("show");
        });
    });

</script>

 
    <script>
const calendario = document.querySelector('#calen');
const vercita = document.querySelector('#vercita');
const medico = document.querySelector('#vermedico');
const sectionuno = document.querySelector('.uno'); 
const sectiondos = document.querySelector('.dos'); 
const sectiontres= document.querySelector('.tres');

function showvercalen() {
    sectionuno.style.display = 'flex';
    sectionuno.style.visibility = 'visible';

    sectiondos.style.display = 'none';
    sectiondos.style.visibility = 'hidden';

    sectiontres.style.display='none';
    sectiontres.style.visibility='hidden';

}

function showvercita() {
    sectiondos.style.display = 'flex';
    sectiondos.style.visibility = 'visible';

    sectionuno.style.display = 'none';
    sectionuno.style.visibility = 'hidden';

    sectiontres.style.display='none';
    sectiontres.style.visibility='hidden';   
}

function showmedico(){
    sectiontres.style.display='flex';
    sectiontres.style.visibility='visible'; 
    
    sectionuno.style.display = 'none';
    sectionuno.style.visibility = 'hidden';

    sectiondos.style.display = 'none';
    sectiondos.style.visibility = 'hidden';
}
calendario.addEventListener('click', showvercalen);
vercita.addEventListener('click', showvercita);
medico.addEventListener('click', showmedico);

showvercalen();
    document.addEventListener('DOMContentLoaded', function() {
                            var calendarEl = document.getElementById('calendar');
                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                headerToolbar:{
                                                left:'prev,next, today',
                                                center:'title',
                                                right:'dayGridMonth,timeGridWeek,timeGridDay,list'
                                                },
                                locale:'es',
                                
                                //dayMaxEventRows: true, // for all non-TimeGrid views
                                        
                                events: [
                                    <?php
                                    $consulta = "SELECT * FROM cita";
                                    $save = $conn->query($sql);
                                    
                                    foreach ($save as $fila5) { 
                                        
                                        $identi=$fila5["id_user"];
                                        $id_medico=$fila5["id_medico"];
                                        $descrip=$fila5['descripcion'];
                                        $hora=$fila5['id_horario'];
                                
                                                        // Obtener el nombre del usuario usando una consulta a la tabla usuario
                                            $consul = "SELECT nombre, tipo FROM users WHERE id_users = '$identi'";
                                            $resultadoUsuario = $conn->query($consul);
                                            if ($resultadoUsuario->num_rows > 0) {
                                                $filaUsuario = $resultadoUsuario->fetch_assoc();
                                                $nombreUsuario = $filaUsuario['nombre'];
                                                $tipou=$filaUsuario['tipo'];
                                            }
                                            $consul2="SELECT * FROM medico WHERE id=' $id_medico'";
                                            $resulmedi=$conn->query($consul2);
                                            if($resulmedi->num_rows >0){
                                                $medi=$resulmedi->fetch_assoc();
                                                $nameme=$medi['nombre'];
                                                $espe=$medi['especialidad'];
                                                $consulto=$medi['consultorio'];
                                            }
                                            $consul3="SELECT *FROM horario WHERE id='$hora'";
                                            $resulhora=$conn->query($consul3);
                                            if($resulhora->num_rows >0){
                                                $ho=$resulhora->fetch_assoc();
                                                $inicio=$ho['inicio'];
                                                $fin=$ho['fin'];
                                            }

                                        ?>
                                        {   id:'<?php echo $fila5["id"]; ?>',
                                            userId: '<?php echo $fila5["id_user"]; ?>',
                                            title: '<?php echo $nombreUsuario; ?>',
                                            tipo:'<?php echo $tipou; ?>',
                                            descripcion:'<?php echo $descrip ?>',
                                            nameme:'<?php echo $nameme; ?>',
                                            espe:'<?php echo $espe; ?>',
                                            consulto:'<?php echo $consulto; ?>',
                                            start: '<?php echo $fila5["fecha"]; ?>',
                                            hora:'<?php echo $inicio.'--' .$fin?>',
                                            editable:true,
                                        },
                                    <?php }  ?>
                                ],
                                eventClick: function(info) {
                                    var userId = info.event.extendedProps['userId'];

                                    var tipo = info.event.extendedProps['tipo'];
                                    var descripcion = info.event.extendedProps['descripcion'];
                                    var nameme = info.event.extendedProps['nameme'];
                                    var espe = info.event.extendedProps['espe'];
                                    var consulto = info.event.extendedProps['consulto'];
                                    var hora = info.event.extendedProps['hora'];


                                    $("#nombre").text(info.event.title);
                                    $("#descripcion").text(descripcion);
                                    $("#id_users").text(userId);
                                    $("#tipo").text(tipo);
                                    $("#nombreme").text(nameme);
                                    $("#especialidad").text(espe);
                                    $("#consultorio").text(consulto);
                                    $("#hora").text(hora);
                                    $("#fecha").text(info.event.start);
                                    $(".edit-button").data("id", info.event.id); 
                                    $(".delete-button").data("id", info.event.id);
                                // $('#edit,#delete').attr('data-id', id);
                                    $("#detalle").modal("show");

                                    
                                    
                                    $(document).on("click", ".edit-button", function() {
                                        var eventId = $(this).data("id");
                                        var eventTitle = info.event.title;
                                        var nameMeValue = nameme; 
                                        var descripcion=descripcion;
                                        var fecha=info.event.start;
                                        $("#nombreDiv").text(eventTitle );
                                        $("#descripcion select[name='description']").val(descripcion);
                                        $("#fecha input[name='fecha']").val(fecha);
                                        $("#event-id").val(eventId);
                                        $("#detalle").modal("hide");

                                        $("#formulario-modal").modal("show");
                                
                                });
                                $(document).on("click", ".delete-button", function() {
                                    var citaId = $(this).data("id");
                                    // Use AJAX to send the citaId to the delete.php script
                                $.ajax({
                                    url: "delatecita.php",
                                    type: "POST",
                                    data: { id: citaId },
                                    success: function(response) {
                                        alert("Cita eliminada");
                                        location.reload();
                                    },
                                    error: function(xhr, status, error) {
                                        // Handle the error if the request fails
                                        console.error(error);
                                    }
                                });
                                    
                                });


                                },
                            /*  dateClick: function(info) {
                                    alert('Clicked on: ' + info.dateStr);
                                //$("#formulario-modal").modal("show");
                                }*/
                            });

                            calendar.render();
                        });

</script>
</body>
</html>


<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="detalle">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h4 class="modal-title">Detalles de la cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                        <div class="detalle-item">
                           <span id="nombre" class="detalle-value fw-bold fs-4"></span>
                        </div>
                        <div class="detalle-item">

                            <dt class="text-muted">Tipo:</dt>
                            <dd id="tipo" class=""></dd>
                        </div>
                        <div class="detalle-item">  
                            <dt class="text-muted">Identificacion:</dt>
                            <dd id="id_users" class=""></dd>
                        </div>
                        <div class="detalle-item">  
                            <dt class="text-muted">Descripción:</dt>
                            <dd id="descripcion" class=""></dd>
                    </div>
                    <div class="detalle-item">  
                            <dt class="text-muted">Medico:</dt>
                            <dd id="nombreme" class="nombreMedico"></dd>
                    </div>
                    <div class="detalle-item">  
                            <dt class="text-muted">Epecialidad:</dt>
                            <dd id="especialidad" class="especialidad"> </dd>
                    </div>
                    <div class="detalle-item">  
                            <dt class="text-muted">Consultorio:</dt>
                            <dd id="consultorio" class="consultorioMedico"></dd>
                    </div>
                    <div class="detalle-item">  
                            <dt class="text-muted">Fecha:</dt>
                            <dd id="fecha" class=""></dd>
                    </div>
                    <div class="detalle-item">  
                            <dt class="text-muted">Hora:</dt>
                            <dd id="hora" class=""></dd>
                    </div>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0 edit-button">Editar</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0 delete-button">Eliminar</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
$resultdoc=mysqli_query($conn,"SELECT * FROM medico");

$horario = "SELECT * FROM horario";
$consulta_horario = mysqli_query($conn, $horario);

?>
<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="formulario-modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Actualizar datos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="actualizar.php" method="post" id="schedule-form">
        <input type="hidden" name="id" id="event-id" value="">
         
          <div class="form-group mb-2">
            <label for="title" class="control-label">Nombre</label>
                <div id="nombreDiv" class="form-control form-control-sm rounded-0"></div>
            </div>

          <label for="description" id="descripcion">Descripción</label>
                        <select name="descripcion" id="description"> 
                        <option value="lectura de examenes">lectura de examenes</option>
                        <option value="Cita externa">Cita externa</option>  
                        </select> 
          <div class="form-group mb-2">
            <label for="especialidad" class="control-label">Especialista</label>
            <select class="form-control form-control-sm rounded-0" name="especialidad" id="especialidad">
              <?php
              if ($resultdoc) {
                while ($row = $resultdoc ->fetch_assoc()) {
                  echo "<option value='" . $row['id'] . "'>" . $row['especialidad'] . "</option>";
                }
              }
              ?>
            </select>
          </div>
          <div class="especial" id="special"></div>
          <div class="consultorioid" id="consulto"></div>

            <div class="fecha" id="fecha">  
                    <label for="start_datetime">Fecha</label>
                    <input type="date" name="fecha" id="fecha" min="<?php echo date('d-m-Y'); ?>" required> <!--no funciona lo de la fecha que se elija todo menor lod dias anteriores al actual-->
            </div>

            <div class="Hora" id="hora">   
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="schedule-form"  >Actualizar</button>
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal" >Cancelar</button>
      </div>
    </div>
  </div>
</div>

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
<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="doctor">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff; color: #fff;">
                <h5 class="modal-title">Actualizar datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 20px;">
                <form id="formdoc" method="post" action="editardoc.php">
                <input type="hidden" name="id" id="actu" value="">

                    <div class="input-container">
                    <label for="title" class="control-label">Nombre</label>

                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Nombre completo" name="nombre" id="nom">
                    </div>
                    <div class="input-container">
                    <label for="title" class="control-label">Identificación: </label>

                        <i class="fa-solid fa-id-card" style="color: #111212;"></i>
                        <input type="text" placeholder="Identificacion" name="identificacion" id="identi">
                    </div>
                    <div class="input-container">
                    <label for="title" class="control-label">Especialidad</label>

                        <i class="fa-solid fa-id-card-clip" style="color: #111212;"></i>
                        <input type="text" placeholder="Especialidad" name="especialidad" id="especi">
                    </div>
                    <div class="input-container">
                    <label for="title" class="control-label">Consultorio: </label>

                        <i class="fa-solid fa-hospital" style="color: #111212;"></i>
                        <input type="text" placeholder="Consultorio" name="consultorio" id="consul">
                    </div>
                    <button name="submit" type="submit" id="boton2" 
                            style="background-color: #007bff; color: #fff; border: none; padding: 10px 20px; cursor: pointer;">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
$(document).ready(function() {
    $(".actualizar-button").click(function() {
        var medicoId = $(this).data("id");
        var identifi=$(this).data("identi");
        var nombre = $(this).data("nombre");
        var especialidad = $(this).data("especialidad");
        var consultorio = $(this).data("consultorio");

        $("#actu").val(medicoId);


        $("#nom").val(nombre);
        $("#identi").val(identifi);
        $("#especi").val(especialidad);
        $("#consul").val(consultorio);

        $("#doctor").modal("show");
    });
});
</script>
