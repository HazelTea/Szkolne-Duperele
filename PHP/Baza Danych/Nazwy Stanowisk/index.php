<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require('../connection.php');
    $conn = $GLOBALS['conn'];

    $table_query = $conn->query("SELECT Nazwa AS 'name' FROM stanowiska");
    ?>

    <table>
        <tr>
            <th>Nazwa</th>
            <th>Liczba Liter</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($table_query)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . strlen($row['name']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>