$(document).ready(function () {
    // Función que se ejecuta cuando se envía un formulario
    $('.close_description').submit(function (event) {
        event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)



        $.ajax({
            url: 'nada.php', // Ruta a tu script PHP que procesará los datos
            type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
            data: $('.close_description'), // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
            success: function(data) {
            $('#contain_product').html(data);
            },
        });
    });
});