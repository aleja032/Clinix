$('.inputt').on('change', function () {
    var in_id = $(this).data('cantidad');
    var can = $(this).val();
    $.ajax({
        url: 'actualizar.php',
        type: 'POST',
        data: {'in_id': in_id, 'can': can},
        success: function (esta) {
            $("#parte1").html(esta);
        }
    });
});