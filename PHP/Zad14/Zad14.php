<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prostopadłościan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $a = 5;
        $b = 12;
        $c = 84;
        $result = sqrt($a ** 2 + $b ** 2 + $c ** 2);
        $area = (2 * $a*$b) + (2 * $b*$c) + (2 * $a*$c);
    ?>

    <div>
        <span class='hand_one'>☝</span>
        <span class="tekst_1"><?="Długość Przekątnej Prostostopadłościanu o krawędziach długości $a, $b, $c jest równa: $result."?> </span>
        <span class="hand_two">☝</span>
    </div>
    <br>
    <div>
        <span class='hand_three'>✍</span>
        <span class="tekst_2"><?="Pole powierzchni prostopadłościanu o krawędziach długości $a, $b, $c wynosi: $area. j2"?> </span>
        <span class="hand_four">✍</span>
    </div>

</body>
</html>