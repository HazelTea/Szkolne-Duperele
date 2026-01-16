<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zurzycie energii</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $t_day = 0.90;
        $t_night = 0.45;

        $dayArrays = [
            ['Poniedziałek',5.2, 2.1],
            ['Wtorek', 4.8, 2.6],
            ['Sroda', 6.1, 1.9],
            ['Czwartek', 5.5, 2.3],
            ['Piątek', 6.4, 2.8],
            ['Sobota', 4.9, 3.2],
            ['Niedziela', 5.7, 2.5],
        ];

        function MakeDayTables($dayArrays) {
            $t_day = 0.90;
            $t_night = 0.45;
            foreach ($dayArrays as $dayArray) {
                $day = $dayArray[0];
                $usage_day = $dayArray[1];
                $usage_night = $dayArray[2];
            
                $cost_day = $usage_day * $t_day;
                $cost_night = $usage_night * $t_night;
                $full_cost = $cost_day + $cost_night;

                $string = 
                "
                <tr>
                    <td>$day</td>
                    <td>$usage_day</td>
                    <td>$cost_day</td>
                    <td>$usage_night</td>
                    <td>$cost_night</td>
                    <td>$full_cost</td>
                </tr>
                ";

                echo $string;
            };
        };

        function CalculateSum($dayArrays) {
            $t_day = 0.90;
            $t_night = 0.45;
            $sum = 0;
            foreach ($dayArrays as $dayArray) {
                $day = $dayArray[0];
                $usage_day = $dayArray[1];
                $usage_night = $dayArray[2];
            
                $cost_day = number_format($usage_day * $t_day,2);
                $cost_night = number_format($usage_night * $t_night;
                $full_cost = number_format($cost_day + $cost_night,2);
                $sum += $full_cost;
            };
            return $sum;
        }
    ?>

    <table>
        <tr>
            <th>Dzień</th>
            <th>Zużycie Dzienne [kWh]</th>
            <th>Koszt Dzienny [zł]</th>
            <th>Zużycie Nocne [kWh]</th>
            <th>Koszt Nocny [zł]</th>
            <th>Koszt Dobowy [zł]</th>
        </tr>
        <?php MakeDayTables($dayArrays); ?>
        <th colspan="6" class=last_row>
            Łączny koszt w całym tygodniu: <u><?=number_format(CalculateSum($dayArrays),2)?></u>
        </th>
    </table>
</body>
</html>