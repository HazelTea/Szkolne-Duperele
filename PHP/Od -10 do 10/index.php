<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Od -10 do 10</title>
</head>
<body>
    <p class="number_list">
    <?php 
        $maxNum = 10;
        $startNum = -10;
        for ($i=$startNum; $i <= $maxNum; $i++) { 
            $sign = $i < $maxNum ? "," : ".";
            echo("$i$sign ");
        }
    ?>
    </p>
</body>
</html>