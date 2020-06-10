$(document).ready(function () {

    fetch_guest_data();

    function fetch_guest_data(query = '') {
        $.ajax({
            url: "http://nc.test/api/guest/search",
            method: 'GET',
            data: {
                query: query
            },
            dataType: 'json',
            success: function (data) {
                $('tbody').html(data.table_data);
            }
        })
    }

    $(document).on('keyup', '#guest_searcher', function () {
        var query = $(this).val();
        fetch_guest_data(query);
    });
});


// function customer_data(query = '') {
//     $.ajax({
//         url: ' / api / guest / ' + name + '/search',
//         method: 'GET',
//         data: {
//             query: query
//         },
//         dataType: 'json',
//         success: function (data) {
//             $('body').html(data.table_data);
//             $('#total_records').text(data.total_data);
//         }
//     })
// }
