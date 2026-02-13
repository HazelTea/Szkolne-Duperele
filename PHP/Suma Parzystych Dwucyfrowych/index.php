<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Suma Parzystych Dwucyfrowych</title>
</head>
<body>
    <?php 
        function GetEvenNumbersFromList($startNumber, $endNumber) {
            $numbers = [];
            for ($i=$startNumber; $i <= $endNumber; $i++) { 
                if ($i % 2 == 0) array_push($numbers,$i);
            }
            return $numbers;
        }
        $evenNumbers = GetEvenNumbersFromList(9,99);
    ?>
    <p>
        <?php
            foreach ($evenNumbers as $key => $number) {
                $sign = $key == count($evenNumbers) - 1 ? "" : "|";
                echo("$number$sign ");
            }
        ?>
    </p>
    <p>Suma powyższych wyrazów jest równa <?= array_sum($evenNumbers)?></p>
</body>
</html>