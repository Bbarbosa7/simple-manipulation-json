<?php
// Brincando com a API da HG Brasil
$json_api = file_get_contents("https://api.hgbrasil.com/weather");

$json_decode = json_decode($json_api);
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <title>Previsão do Tempo</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-3"><?= $json_decode->results->city; ?></h1>
                    <p class="lead">Previsão meteorológica</p>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table table-striped center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Cidade</th>
                            <th scope="col">Clima Agora</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Velocidade do Vento</th>
                            <th scope="col">Atualizado às</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"><?= $json_decode->results->date; ?></td>
                            <td><?= $json_decode->results->city; ?></td>
                            <td><?= $json_decode->results->temp; ?>º</td>
                            <td><?= $json_decode->results->description; ?></td>
                            <td><?= $json_decode->results->wind_speedy; ?></td>
                            <td><?= $json_decode->results->time; ?> Hrs</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br />
            <div class="col-md-12">
                <table class="table table-striped center">
                    <thead class="thead-dark">
                        <tr>
                            <th class="col-md-12" width="100%">Previsão para os próximos dias</th>
                        </tr>
                    </thead>
                </table>
                <table class="table table-striped center">
                    <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Dia</th>
                            <th scope="col">Máx.</th>
                            <th scope="col">Min</th>
                            <th scope="col">Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($json_decode->results->forecast as $key => $value) { ?>
                            <tr>
                            <td scope="row"><?= $value->date; ?></td>
                            <td><?= $value->weekday; ?></td>
                            <td><?= $value->max; ?>º</td>
                            <td><?= $value->min; ?>º</td>
                            <td><?= $value->description; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>