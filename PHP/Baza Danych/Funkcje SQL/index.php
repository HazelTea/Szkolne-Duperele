<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require("../connection.php");

    $conn = $GLOBALS['conn'];
    $query = $conn->query("SELECT * FROM czytelnicy");

    if (mysqli_num_rows($query) > 0) {
        echo '<ol style="list-style-type: circle;">';
        while ($row = mysqli_fetch_assoc($query)) {
            echo '<li>Number: ' . $row['Nr_czytelnika'] . '. Imię i nazwisko: ' . $row['Imie'] . ' ' . $row["Nazwisko"] . '</li>';
        }
        echo '</ol>';
    }
    ?>

</body>

</html>