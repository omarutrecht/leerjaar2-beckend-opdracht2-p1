<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Document</title>
</head>
<body>

<h3><?php echo $data['titleaaa'];?></h3>
<h5>Aantal Instructeurs : <?=$data['Amountofinstructeurs'] ?></h5>

<table border= "1">
    <thead>
        <th>VoorNaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Mobiel</th>
        <th>DatumInDienst</th>
        <th>AantalSterren</th>
        <th>Voertuig</th>

    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>

</body>
</html>