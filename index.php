<?php

// Stampare tutti i nostri hotel con tutti i dati disponibili.
// Iniziate in modo graduale.
// Prima stampate in pagina i dati, senza preoccuparvi dello stile.
// Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
// Bonus:
// 1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
// 2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)


    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];


    $hotelsparcheggio = $hotels;

    if (isset($_GET['parcheggio']) && $_GET['parcheggio'] === '1') {
        $hotelconparcheggio = [];
        foreach ($hotelsparcheggio as $element) {
            if ($element['parking']) {
                $hotelconparcheggio[] = $element;
            }
        }
        $hotelsparcheggio = $hotelconparcheggio;
    } elseif (isset($_GET['parcheggio']) && $_GET['parcheggio'] === '0') {
        $hotelsenzaparcheggio = [];
        foreach ($hotelsparcheggio as $element) {
            if (!$element['parking']) {
                $hotelsenzaparcheggio[] = $element;
            }
        }
        $hotelsparcheggio = $hotelsenzaparcheggio;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>hotel</title>
</head>
<body class="p-5">
    <form class="w-75 m-auto" action="index.php" method="GET">
        <div class="mb-3">
            <label for="parcheggio" class="form-label">parcheggio</label>
            <select name="parcheggio" id="parcheggio">
                <option value="0">senza parcheggio</option>
                <option value="1">con parcheggio</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <table class="table w-75 m-auto">
        <thead>
            <tr>
                <th scope="col">nome</th>
                <th scope="col">descrizione</th>
                <th scope="col">parcheggio</th>
                <th scope="col">voto</th>
                <th scope="col">distanza dal centro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotelsparcheggio as $element) : ?>
                <tr>
                    <td>
                        <?= $element['name']?>
                    </td>
                    <td>
                        <?= $element['description']?>
                    </td>
                    <td>
                        <?= ( $element['parking'])? 'si' : 'no'?>
                    </td>
                    <td>
                        <?=  $element['vote']?>
                    </td>
                    <td>
                        <?=  $element['distance_to_center']?>
                    </td>
                </tr>
            <?php endforeach ; ?>
        </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>