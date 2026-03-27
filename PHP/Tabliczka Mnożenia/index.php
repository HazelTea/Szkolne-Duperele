<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <?php 
            $val_top = range(1,10);
            $val_bot = [1,...$val_top];

            echo "<th class=num_bold>x</th>";
            foreach ($val_top as $value) {
                echo "<th class=num_bold>$value</th>";
            }

            for ($i=0; $i < count($val_top); $i++) { 
                $element_top = $val_top[$i];

                echo "<tr>";
                for ($y=0; $y < count($val_bot); $y++) { 
                    $element_bot = $val_bot[$y];
                    $element_multiplied = $element_bot * $element_top;
                    $class = "";
                    switch ($y) {
                        case 0:
                            $class = "num_bold";
                            break;
                        case $element_top:
                            $class = "num_crossed";
                            break;
                    }
                    echo "<td class=$class> $element_multiplied </td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>