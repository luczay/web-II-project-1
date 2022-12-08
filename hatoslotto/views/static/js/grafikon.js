$(document).ready(function(e) {
    $.post('/index.php?hatosok_darab', {}, function(respond) {
        const ctx = document.getElementById('myChart');
        var respond_as_json = JSON.parse(respond);
        
        talalatok_darabszama = [0, 0, 0, 0, 0, 0];
        for (let i = 0; i < Object.keys(respond_as_json).length; i++) {
            darab = respond_as_json[i].darab;
            if (darab == 0) {
                break;
            }
            talalatok_darabszama[darab - 1] = 1;
        }

        new Chart(ctx, {
        type: 'bar',
            data: {
                labels: ['1', '2', '3', '4', '5', '6'],
                datasets: [{
                label: 'Igen',
                data: [talalatok_darabszama[0], talalatok_darabszama[1], talalatok_darabszama[2], talalatok_darabszama[3], talalatok_darabszama[4], talalatok_darabszama[5]],
                borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
});