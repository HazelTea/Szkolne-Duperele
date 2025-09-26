<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zad 6</title>
</head>
<style>
    .tabela {
        border: 10px dotted greenyellow;
        margin: 0;
        border-collapse: collapse;
    }

    .tabela th, .tabela td {
        border: 10px dotted greenyellow;
        padding: 100px;
        font-size: 80px;
        color: red;
        text-shadow: 10px 8px yellow;
    }
</style>
<body>
    <?php
    $number = 77;
    $multipliers = [1,2,3,4];
    ?>

    <table class="tabela">
        <tr>
            <?php
            foreach ($multipliers as $multiplier) {
                echo '<th>'.($number * $multiplier).'</th>';
            }
            ?>
        </tr>
    </table>
</body>
</html>