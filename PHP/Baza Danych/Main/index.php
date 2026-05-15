<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require('connection.php');
    $conn = $GLOBALS['conn'];
    if ($conn) echo "Successfully connected to database: " . $db;

    $query = $conn->query("SELECT * FROM czytelnicy");
    $name_query = $conn->query("SELECT UPPER(Imie) AS 'imie', UPPER(Nazwisko) AS 'nazwisko' FROM czytelnicy");
    $table_query = $conn->query("SHOW COLUMNS FROM czytelnicy");

    ?>
    <table>
        <tr>
            <?php while ($row = mysqli_fetch_assoc($table_query)) echo "<td>" . $row["Field"] . "</td>"; ?>
        </tr>
        <?php

        while ($row = mysqli_fetch_assoc($query)) {
            echo '<tr>';
            foreach ($row as $column => $value) {
                echo "<td>$value</td>";
            }
            echo '</tr>';
        };
        ?>
    </table>

    <ul>
        <?php
        for ($row = 0; $row < mysqli_num_rows($name_query); $row++) {
            $mysql_assoc = mysqli_fetch_assoc($name_query);
            echo "<li>" . $mysql_assoc['imie'] . "</li>";
        }
        ?>
    </ul>

</body>

</html>