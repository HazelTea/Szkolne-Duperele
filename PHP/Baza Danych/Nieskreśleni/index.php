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
    $reader_query = <<<EOD
      SELECT CONCAT(czytelnicy.Imie,' ',czytelnicy.Nazwisko) AS "fullname",
             czytelnicy.Plec           AS "gender",
             czytelnicy.Data_ur        AS "date_of_birth",
             czytelnicy.Ulica          AS "street",
             czytelnicy.Miasto         AS "city",
             czytelnicy.Kod            AS "postal_code",
             czytelnicy.Nr_legitymacji AS "id_number",
             czytelnicy.Data_zapisania AS "write_date"
        FROM czytelnicy
    ORDER BY czytelnicy.Nr_legitymacji
    EOD;

    function CreateTableElement(string $element) {echo "<td>".$element."</td>";}
    ?>

    <table>
        <tr>
            <th>Czytelnik</th>
            <th>Płeć</th>
            <th>Data urodzenia</th>
            <th>Adres</th>
            <th>Numer legitymacji</th>
            <th>Data zapisania</th>
        </tr>
        <?php
        $query = $conn->query($reader_query);
        while ($row = $query->fetch_assoc()) {
            $petition = $row['postal_code'];
            echo "<tr>";
            CreateTableElement($row['fullname']);
            CreateTableElement($row['gender'] == "M" ? "Mężczyzna" : "Kobieta");
            CreateTableElement($row['date_of_birth']);
            CreateTableElement($row['street']." ".join('-',[substr($petition,0,2),substr($petition,2)])." ".$row["city"]);
            CreateTableElement($row['id_number']);
            CreateTableElement($row['write_date']);
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>