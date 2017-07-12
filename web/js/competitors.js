$('#form_dni').on('submit', function (event) {
    event.preventDefault();
});

function agregarCompetitor() {
    var url = $('#new_competitor').attr('href');
    $.ajax({
        type: "POST",
        url: url,
        data: $('#form_dni').serialize(), // Adjuntar los campos del formulario enviado.
        success: function (data)
        {
            $('#modal_body').html(data); // Mostrar la respuestas del script PHP.
        }
    });
}