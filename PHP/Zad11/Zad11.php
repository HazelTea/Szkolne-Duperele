<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>int float</title>
</head>
<body>
    <?php 
    $liczba1 = 0;
    $liczba2 = -300;
    $liczba3 = 1.2;
    $liczba4 = -1.0E-5;
    $numbers = [$liczba1,$liczba2,$liczba3,$liczba4];
    $dodaj = 159.85;

    $variables = [
        ['PHP_INT_MAX',PHP_INT_MAX],
        ['PHP_INT_MIN',PHP_INT_MIN],
        ['PHP_INT_SIZE',PHP_INT_SIZE],
        ['PHP_FLOAT_MAX',PHP_FLOAT_MAX],
        ['PHP_FLOAT_MIN',PHP_FLOAT_MIN],
        ['PHP_INT_MAX',PHP_FLOAT_DIG],
        ['PHP_INT_MAX',PHP_FLOAT_EPSILON],
    ];

    function formatBoolean($bool) {
        return 'bool('.($bool ? 'true' : 'false').')';
    }

    function formatNumberForFunc($index,$number,$func) {
        $name = '$liczba'.$index + 1;
        $func = 'is_int';
        $completeString = "Zmienna <i>$name</i> ma wartość <b>$number</b>, a funkcja <code>$func()</code> zwraca dla niej wynik: ".formatBoolean($func($number));
        echo '<p>'.$completeString.'</p>';
    }

    ?>

    <fieldset>
        <legend><strong>AD 2.</strong></legend>
        <?php 
            foreach ($numbers as $index => $number) formatNumberForFunc($index,$number,'is_int');
        echo '<hr>';
            foreach ($numbers as $index => $number) formatNumberForFunc($index,$number,'is_float');
        ?>
    </fieldset>

    <fieldset>
        <legend><strong>AD 3.</strong></legend>
        <p> <?= 'Zmienna dodaj ma wartość <b>'.$dodaj.'</b>, a funkcja <code>is_numeric()</code> zwraca dla niej wynik: '.formatBoolean(is_numeric($dodaj)) ?> </p>
    </fieldset>

    <fieldset>
        <legend><strong>AD 4.</strong></legend>
        <?php
            foreach ($variables as $varArray) {
                $completeString = "Stała <b>$varArray[0]</b> ma wartość $varArray[1]";
                echo '<p>'.$completeString.'</p>';
            }
        ?>
    </fieldset>
</body>
</html>