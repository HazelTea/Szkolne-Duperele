<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $date = date('G:i:s');
        $date_time_class = date('U') % 2 == 0 ? 'text--even' : 'text--odd';
        echo "<h1 class='text $date_time_class'>$date</h1>";
    ?>
</body>
</html>