<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $count = 20;
    ?>

    <table>
        <?php
        for ($y=0; $y <= $count; $y++) { 
            echo "<tr>";
            for ($x=0; $x <= $count; $x++) { 
                $selected_values = abs($count / 2 + ($y - $count)) == $x;
                $selected_values2 = abs($count / 2 - ($y + $count)) == $x;
                // $selected_values2 = ($count / 2 - abs($count + ($y + $x)));
                // $selected_values_second = abs($count + ($y - $x));
                // $test = $selected_values == $x || $selected_values_second == $x;
                $class = $selected_values || $selected_values2 ? "selected" : ''; 
                echo "<td class=$class>$y|$x, $selected_values2</td>";
            };
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>