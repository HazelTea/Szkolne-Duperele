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
                $amper = $count / 2 - abs($y - $count / 2);
                $test1 = ($count / 2 - $amper) == $x;
                $test2 = ($count / 2 + $amper) == $x;
                $class = $test1 || $test2 ? "selected" : ''; 
                echo "<td class=$class>$x|$y</td>";
            };
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>