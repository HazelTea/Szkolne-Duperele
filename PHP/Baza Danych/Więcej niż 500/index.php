<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWN lub Helion</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require('../connection.php');
    $conn = $GLOBALS['conn'];
    $query_text = <<<EOD
        SELECT ksiazki.Sygnatura 					 	     AS "signature",
                ksiazki.Tytul	 					         AS "title",
                dzialy.Nazwa								 AS "section",
                CONCAT(ksiazki.Imie,' ',ksiazki.Nazwisko)    AS "author",
                ksiazki.Wydawnictwo					 	     AS "publishing",
                ksiazki.Rok_wyd						 	     AS "rel_date",
                ksiazki.Objetosc_ks							 AS "page_count",
                ksiazki.Cena							     AS "price"
        FROM ksiazki
    INNER JOIN dzialy ON ksiazki.Id_dzial = dzialy.Id_dzial
        WHERE ksiazki.Objetosc_ks > 500
        ORDER BY ksiazki.Rok_wyd ASC
    EOD;

    $query = $conn->query($query_text);
    $row_query = $conn->query("SHOW COLUMNS FROM ksiazki");
    $table_headers = ['Sygnatura', 'Tytuł', 'Autor',"Dział",'Wydawnictwo','Rok Wydania','Liczba stron','Cena'];
    ?>

    <p>Kolumny: <b><?=join(' | ',$table_headers)?></b></p>
    <table>
        <tr>
            <?php foreach ($table_headers as $header) echo "<th>".$header.'</td>'; ?>
        </tr>
        <?php
        while ($row = $query->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                $exploded_val = explode(".", $value);
                $val = $key == "price" ? $exploded_val[0].' zł '.$exploded_val[1].' gr' : $value;
                echo "<td>".$val."</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>