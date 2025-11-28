<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitwy pierwszej wojny światowej</title>
</head>
<body>
    <?php 
    $setDate = strtotime('August 26th 1914');
    $formattedDate = date('d.m.Y',$setDate);
    $hourTime = 60 * 60 * 24;
    
    $firstResult = time() - $setDate;
    $firstDayCount = round($firstResult / $hourTime);
    ?>

    <p class="special_paragraph"> 
        Bitwa pod Tannenbergiem rozpoczęła się
        <u><?=$formattedDate?></u>
        roku i było to
        <u><?=$firstDayCount?></u>
        dni temu.
    </p>
    <p class="description">(odejmowanie sekund, dzielenie i zaokrąglanie)</p>
    
    <p class="special_paragraph"> 
        Bitwa pod Tannenbergiem rozpoczęła się
        <u><?=$formattedDate?></u>
        roku i było to
        <u><?=$firstDayCount?></u>
        dni temu.
    </p>
    <p class="description">(praca z obiektami: date_create() i date_diff())</p>

</body>
</html>