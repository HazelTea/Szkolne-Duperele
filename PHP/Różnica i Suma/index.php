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
                    $class = ($y % 7 == 0 && $y > 0) || ($x % 7 == 0 && $x > 0) ? "selected" : ''; 
                    echo "<td class=$class>$y|$x</td>";
                };
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>