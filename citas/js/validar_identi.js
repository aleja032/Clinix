$('#identificacion').on('change', function () {
    if($(this).val()<=0){
        $(this).val(1);
        console.log("siu");
    }
});