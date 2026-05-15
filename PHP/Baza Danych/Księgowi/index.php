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
    $query_text = <<<EOD
     SELECT CONCAT(pracownicy.Imie,' ', pracownicy.Nazwisko) AS "full_name",
            pracownicy.Miasto AS "city",
            pracownicy.Data_zatrudnienia AS "emp_date",
            pracownicy.Wynagrodzenie AS "salary"
        FROM pracownicy
        WHERE pracownicy.Id_stanowisko = 2
        AND pracownicy.Wynagrodzenie > 2000
        ORDER BY pracownicy.Wynagrodzenie DESC
    EOD;

    $query = $conn->query($query_text);
    ?>
    <table>
        <tr>
            <th>Pracownik</th>
            <th>Miasto</th>
            <th>Data zathudnienia</th>
            <th>Wynagrodzenie</th>
        </tr>
        <tr>
            <?php
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>" . $row['emp_date'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tr>
    </table>
</body>

</html>