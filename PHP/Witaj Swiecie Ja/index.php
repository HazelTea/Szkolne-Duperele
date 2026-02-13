<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Witaj Swiecie Ja</title>
</head>
<body>
    <?php 
        $text = "Kon'ichiwa sekai";
        $textArray = str_split($text,1);
    ?>

    <table cellspacing="0">
        <?php  
            foreach ($textArray as $letter) {
                echo("<td>$letter</td>");
            }
        ?>
    </table>
</body>
</html>