<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>
        <?php 
            $text = "Płyta Główna ATX";
            $split_text = mb_str_split($text);

            foreach ($split_text as $character) {
                $class = strtolower($character) === "a" ? 'special_letter' : '';
                $text_to_write = "<span class=$class>$character</span>";
                echo $text_to_write;
            }
        ?>
    </h3>
</body>
</html>