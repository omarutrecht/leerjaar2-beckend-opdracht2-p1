<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php var_dump($data) ?>
   <form action="verwerk_formulier.php" method="POST">
    <h2>Wijzigen Voertuig</h2>

    <!-- Instructeur -->
    <label for="instructeur">Instructeur:</label>
    <input type="text" id="instructeur" name="instructeur" required>
    <br><br>

    <!-- Type voertuig -->
    <label for="typevoertuig">Type voertuig:</label>
    <input type="text" id="typevoertuig" name="typevoertuig" value="<?=$data["TypeVoertuig"] ?>" required>
    <br><br>

    <!-- Type -->
    <label for="type">Type:</label>
    <input type="text" id="type" name="type" value="<?=$data["Type"]?>" required>
    <br><br>

    <!-- Bouwjaar -->
    <label for="bouwjaar">Bouwjaar:</label>
    <input type="date" id="bouwjaar" name="bouwjaar" value="<?=$data["bouwjaar"]?>" required>
    <br><br>

   <!-- Brandstof -->
   <label>Brandstof:</label>
    <br>
    <input type="radio" id="benzine" name="brandstof" value="Benzine" required>
    <label for="benzine">Benzine</label>
    
    <input type="radio" id="diesel" name="brandstof" value="Diesel" required>
    <label for="diesel">Diesel</label>
    
    <input type="radio" id="elektrisch" name="brandstof" value="Elektrisch" required>
    <label for="elektrisch">Elektrisch</label>
    <br><br>

    <!-- Kenteken -->
    <label for="kenteken">Kenteken:</label>
    <input type="text" id="kenteken" name="kenteken" value="<?=$data["Kenteken"]?>" required>
    <br><br>

    <!-- Submit-knop -->
    <input type="submit" value="wijzigen">
</form>

</body>
</html>