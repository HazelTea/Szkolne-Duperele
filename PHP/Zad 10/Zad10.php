<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Działania Matematyczne</title>
    <style>
        fieldset {
            margin-top: 40px;
            border-color: gray;
        }
    </style>
</head>
<body>
    <?php 
        $x = 5;
        $y = 15;
        $a = 4;
        $b = 35;
        $r = 16;
        $alfa = 93;
    ?>

    <fieldset>
        <legend><strong>AD 1.</strong></legend>
        <p>Wynik dodawania 5 i 15 wynosi <?=$x + $y ?></p>
        <p>Wynik mnożenia 5 i 15 wynosi <?=$x * $y ?></p>
        <p>Wynik dzielenia 5 przez 15 wynosi <?=$x / $y ?></p>
        <p>Reszta z dzielenia 5 przez 15 wynosi <?=$x % $y ?></p>
    </fieldset>
    
    <fieldset>
        <legend><strong>AD 2.</strong></legend>
        <p>Obwód Prostokąta o bokach długości 4 i 35 jest równy <?=($a + $b) * 2?></p>
        <p>Pole Prostokąta o bokach długości 4 i 35 jest równy <?=$a * $b ?></p>
    </fieldset>
    
    <fieldset>
        <legend><strong>AD 3.</strong></legend>
        <p>Obwód Koła o promieniu 16 jest równy <?= 2 * pi() * $r ?></p>
        <p>Pole Koła o promieniu 16 jest równy <?= pi() * $r ** 2 ?></p>
        <p>Pole wycinka koła o promieniu 16 i kącie środkowym 93 jest równy <?= ($alfa / 360) * pi() * $r ** 2 ?></p>
    </fieldset>

</body>
</html>