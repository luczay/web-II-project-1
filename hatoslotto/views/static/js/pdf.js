$(document).ready(function(e) {
    $('#submit_btn').click(function() {
        get_data();
        return false;
    });
});

function get_data() {
    var start_year = $('#start_year').val();
    var end_year = $('#end_year').val();
    var money = $('#money').val();

    $.post('/index.php?hatos_ido_penz', {start_year: start_year, end_year: end_year, money: money}, function(respond) {
        var respond_as_json = JSON.parse(respond);

        $('#talalatok_table').append('<tr><th>Kezdő év: ' + start_year + '</th>' + '<th>Utlsó év:' + end_year + '</th>'+ '<th>Minimum nyeremény' + money + '</th></tr>');

        for (let i = 0; i < Object.keys(respond_as_json).length; i++) {
            $('#talalatok_table').append('<tr>'
                                        + '<td>' + respond_as_json[i].ev + '</td>'
                                        + '<td>' + respond_as_json[i].darab + '</td>'
                                        + '<td>' + respond_as_json[i].szam + '</td>'
                                        + '<td>' + respond_as_json[i].ertek + '</td>'
                                        +'</tr>');
        }

    });
};