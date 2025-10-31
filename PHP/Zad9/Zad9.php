<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funkcje Liczbowe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 

    $methodArrays = [
        [' dla liczby ','abs',  [-2]],
        [' dla zestawu ','min', [0,150,30,20,-8,-200]],
        [' dla zestawu ','max', [0,150,30,20,-8,-200]],
        ['','pi',[]],
        [' dla liczby ','round',  [3.4]],
        [' dla liczby ','round',  [3.6]],
        [' dla liczby ','round',  [5.045]],
        [' dla liczby ','round',  [5.055]],
        [' dla liczb ','rand',  [900,1000]],
        [' dla liczby ','sqrt',  [0]],
        [' dla liczby ','sqrt',  [64]],
        [' dla liczby ','sqrt',  [256]],
        [' dla liczby ','sqrt',  [65536]],
    ];
    function MethodToString($startString = "", $argArray = [], $method) {
        echo '<p>'.'Funkcja ' . $method . $startString . trim(json_encode($argArray),"[]") . ' zwraca wynik: ' . $method(...$argArray).'<p>';
    }

    foreach ($methodArrays as $methodArray) {
        $startString = $methodArray[0];
        $method = $methodArray[1];
        $argArray = $methodArray[2];
        MethodToString($startString,$argArray,$method);
    }
    ?>
    <?= "test" ?>
</body>
</html>