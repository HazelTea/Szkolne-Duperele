<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $title = "Pierwsza strona z PHP-em";
    $link1 = "https://pl.wikipedia.org/wiki/John_Fitzgerald_Kennedy";
    $link2 = "https://pl.wikipedia.org/wiki/Francis_Drake";
    $link3 = "https://pl.wikipedia.org/wiki/Richard_Nixon";

    $linki = [$link1, $link2, $link3];

    echo "<h1>$title</h1>";

    for ($i = 0; $i < sizeof($linki); $i++) {
        $link = $linki[$i];
        echo "<p> <a href='$link'>$link</a> <p>";
    }
    
    ?>

    

</body>
</html>