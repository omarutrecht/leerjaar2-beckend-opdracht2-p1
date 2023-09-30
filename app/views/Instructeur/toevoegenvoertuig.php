<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Document</title>
</head>
<body>

<!-- <?php var_dump($data)?> -->

<h5>Naam: <?= $data['VoorNaam'] . ' ' . $data['Tussenvoegsel'] . ' ' . $data['Achternaam']; ?></h5>
<h5>Datum in dienst: <?= $data   ['DatumInDienst'];  ?></h5>
<h5>AantalSterren: <?= $data   ['AantalSterren'];  ?></h5>

<table border= "1">
    <thead>
        <th>TypeVoertuig</th>
        <th>Type</th>
        <th>Kenteken</th>
        <th>Bouwjaar</th>
        <th>Brandstof</th>
        <th>Rijbewijscategorie</th>
        <th>toevoegen</th>
        <th>Wijzigen</th>


    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
    
</body>
</html>