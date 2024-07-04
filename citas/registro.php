<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />   

    <link rel="stylesheet" href="./css/registroo.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Registrarse</title>
</head>
<body>
    <div class="container">
        <form action="validreg.php" method="post" >
            <div class="texto"><h2>Registrarse</h2> <a href="../index.php"><i class="fa-solid fa-xmark" style="color: #050505;"></i></a></div>
            <input type="text" name="title" id="nombre" placeholder="Nombre y apellido" required>

            <label for="tipoid">Tipo de identificacion</label>
            <select name="tipo" id="tipo" required> 
            <option value="Cedula de ciudadania">Cedula de ciudadania</option>
            <option value="Tarjeta de identidad">Tarjeta de identidad</option> 
            <option value="Cedula de extranjeria">Cedula de extranjeria</option>
            <option value="Registro civil">Registro civil</option> 
 
            <option value="Pasaporte">Pasaporte</option>
            </select> 

            <input type="number" name="identificacion" id="identificacion" placeholder="Identificacion" required>
            <div id="mensaje-error" style="color: red;"></div>

            <input type="number" name="telefono" id="telefono" placeholder="Telefono" required>


            <label for="afiliacion">Afiliación</label>
            <select name="afiliacion" id="afiliacion"> 
            <option value="Contributivo">Contributivo</option>
            <option value="Subsidiado">Subsidiado</option>  
            </select>
            
            <input type="email" name="correo" id="correo" placeholder="Correo Electronico" required>

            <input type="password" name="pass" id="pass" placeholder="Contraseña" required>
            <br>
            <button type="submit">Enviar</button>
            <div class="raya">
                <hr> <P>O</P><hr>
            </div>
        </form>
    </div>
</body>
</html>

<script>
    $('#nombre').on('input', function () {
    var valor = $(this).val();

    // Quitar cualquier caracter que no sea una letra
    var letras = valor.replace(/[^a-zA-Z\s]/g, '');

    $(this).val(letras);
});

$('#identificacion, #telefono').on('input', function () {
    var valor = $(this).val();

    // Quitar cualquier caracter que no sea un número
    var numeros = valor.replace(/\D/g, '');

    // Limitar la longitud a 10 dígitos para el teléfono y 6 a 10 dígitos para la identificación
    if ($(this).attr('id') === 'telefono') {
        numeros = numeros.slice(0, 10);
        var longitudCorrecta = (numeros.length === 10);
    } else if ($(this).attr('id') === 'identificacion') {
        numeros = numeros.slice(0, 10);
        var longitudCorrecta = (numeros.length >= 6 && numeros.length <= 10);
    }

    // Actualizar el valor del campo
    $(this).val(numeros);

    // Verificar si la longitud es la correcta
    if (!longitudCorrecta) {
        $('#mensaje-error').text('Debe tener ' + (($(this).attr('id') === 'telefono') ? '10' : 'entre 6 y 10') + ' dígitos.');
    } else {
        $('#mensaje-error').text('');
    }
});


</script>