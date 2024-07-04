

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/doctor1.css">
    <title>Registrar medico</title>

</head>
<body>
        <header>
          <a href="calendario.php" class="regresar"><i class="fa-solid fa-arrow-left" style="color: black;"></i></a>
        </header>

<div class="container">
    <h1>
        AGREGAR 
    </h1>
    <h1 class="ci">Doctor</h1>
    <form id="formdoc" method="post">
        <i class="fa-solid fa-user"></i>
        <input class="P" type="text" placeholder="Nombre completo" name="nombre" id="nombre">
        <i class="fa-solid fa-id-card" style="color: #111212;"></i>
        <input  class="P" type="text" placeholder="Identificacion" name="identificacion" id="identificacion">
        <i class="fa-solid fa-id-card-clip" style="color: #111212;"></i>
        <input  class="P" type="text" placeholder="Especialidad" name="especialidad" id="especialidad">
        <i class="fa-solid fa-hospital"style="color: #111212;"></i> 
        <input  class="P" type="text" placeholder="Consultorio" name="consultorio" id="consultorio">

        <button name="boton" type="button" id="boton">Registrar</button>
    </form>
</div>
<script>
const formulario = document.getElementById('form');
function enviardatos(){
                    $.ajax({
                        url: "enlacedoc.php",
                        type: "POST",
                        data: $("#formdoc").serialize(),
                        success: function(response1) {
                            $("#formdoc").html(response1);
                    }
                    });
                }
                $("#boton").click(function(){
                    enviardatos ();
                });</script>
</body>

</html>