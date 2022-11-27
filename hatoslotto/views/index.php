<!DOCTYPE html>
<head>
    <title>Hatoslottó</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="/res/css/style.css">
    <!--Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Bootstrap Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>
</head>

<body>
<header>
    <img id="hatos" src="/res/img/hatos.png" alt="Hatoslottó logo"/>
    <img id="szerencsejatek" src="/res/img/szerencsejatek.png" alt="Szerencsejáték Zrt."/>
    <h1>Hatoslottó eddigi nyerőszámai</h1>
</header>

<main>
    <div class="w-25">
        <ul class="nav nav-pills flex-column align-items-center">
            <li class="nav-item">
                <a class="nav-link active" href="index.php">Főoldal</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-expanded="false">Grafikonok</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="hatos-evente.html">Hatos találatok</a>
                    <a class="dropdown-item" href="talalatok-intervallumonkent.html">Eloszlás</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href = "/hatoslotto/index.php?export">PDF készítés</a>
            </li>
        </ul>
    </div>

    <div id="content">
        
    </div>
</main>

<script>
    fetch('/hatoslotto/index.php?hany_hatos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json; charset=utf-8'
        },
        body: {
            'ev_start': 2000,
            'ev_utolso': 2001
        }
    })
    .then(response => response.json())
    .then(response => {
        //console.log(response);
        var table = $("<table></table>");
        $(table).append("<th>Év</th>" + "<th>Hét</th>" + "<th>Hatosok darabszáma</th>" + "<th>Nyerőszám</th>");
        for (var i = 0; i < response.length;  i++){
            var tr = '<tr>' +
                        '<td>' + response[i].ev + '</td>' +
                        '<td>' + response[i].het + '</td>' +
                        '<td>' + response[i].darab + '</td>' +
                        '<td>' + response[i].szam + '</td>' +
                    '</tr>';
            table.append(tr);        
        }
        $('#content').append(table);
        console.log(table.html());
    });

</script>
</body>