$(document).ready(function () {
    $('#select-departamento').change(onSelectDepartmentChange);
})

function onSelectDepartmentChange() {
    var departmento_id = $(this).val();


    //AJAX
    $.get('/api/departamento/' + departmento_id + '/municipios', function (data) {
        var html_selected = '<option value="">Seleccione uno</option>';

        for (var i = 0; i < data.length; ++i) {
            html_selected += '<option value="' + data[i].id_municipio + '">' + data[i].municipio + '</option>';
            $('#select-municipio').html(html_selected);
        }

    })
}
