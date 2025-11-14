<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozpoczęcie Roku Szkolnego</title>
</head>
<body>
    <?php 
    $date = date_create('2025-09-01');
    $day = date_format($date,'l');
    $dayInt = date_format($date,'z');
    ?>
    <div class="date">
        <?= "Rozpoczęcie tego roku szkolnego odbyło się w $day, i był to $dayInt dzień roku." ?>
    </div>
</body>
</html>