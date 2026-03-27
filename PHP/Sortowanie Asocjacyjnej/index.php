<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $array = array(
            "Skazani na Shawshank" => "dramat",
            "Nietykalni" => "biograficzny",
            "Władca Pierścieni: Powrót króla" => "fantasy",
            "Pulp Fiction" => "gangsterski",
            "Siedem" => "kryminał",
            "Podziemny krąg" => "thriller",
            "Django" => "western",
            "Król Lew" => "animacja",
            "Avengers: Wojna bez granic" => "akcja",
            "Dobry, zły i brzydki" => "western"
        );

        function MakeTableForArray($array) {
            echo"<tr> <th>Klucz</th> <th>Wartość</th> </tr>";
            foreach ($array as $title => $type) {
                echo "<tr>
                    <td>$title</td>
                    <td>$type</td>
                 </tr>";
            }
        }
    ?>
    <div class="table_container">
        <table> <caption> Normal </caption> <?php MakeTableForArray($array);                 ?></table>
        <table> <caption> asort  </caption> <?php asort($array); MakeTableForArray($array);  ?></table>
        <table> <caption> ksort  </caption> <?php ksort($array); MakeTableForArray($array);  ?></table>
        <table> <caption> arsort </caption> <?php arsort($array); MakeTableForArray($array); ?></table>
        <table> <caption> krsort </caption> <?php krsort($array); MakeTableForArray($array); ?></table>
    </div>
</body>
</html>