<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require('../connection.php');
    $conn = $GLOBALS['conn'];
    $borrowings = <<<EOD
      SELECT wypozyczenia.Nr_transakcji                                                                               AS "transaction_id",
             wypozyczenia.Data_wypozyczenia                                                                           AS "borrow_date",
             IFNULL(DATE_FORMAT(wypozyczenia.Data_zwrotu,"%Y-%m-%d"), '')                                             AS 'return_date',
             DATEDIFF(DATE_FORMAT(IFNULL(wypozyczenia.Data_zwrotu, NOW()),"%Y-%m-%d"),wypozyczenia.Data_wypozyczenia) AS "days_num"
        FROM wypozyczenia
    ORDER BY days_num
    EOD;

    $table_headers = ['Numer Transakcji', 'Data Wypożyczenia', "Data Zwrócenia", 'Liczba Dni'];

    function CreateTableElement(string $element) {echo "<td>".$element."</td>";}
    ?>

    <table>
        <tr><?php foreach ($table_headers as $value) echo "<th>".$value."</th>"?></tr>
        <?php
        $query = $conn->query($borrowings);
        while ($row = $query->fetch_assoc()) {
            $class = $row["days_num"] % 2 == 0 ? "divisible" : "";
            echo "<tr class=$class>";
            foreach ($row as $key => $value) CreateTableElement($value);
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>