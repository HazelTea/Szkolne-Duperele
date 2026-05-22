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
            CONCAT(ksiazki.Imie,' ',ksiazki.Nazwisko)    AS "author",
            ksiazki.Wydawnictwo					 	     AS "publishing",
            ksiazki.Rok_wyd						 	     AS "rel_date",
            ksiazki.Cena							     AS "price"
       FROM ksiazki
     WHERE (ksiazki.Wydawnictwo = "Helion" OR 
            ksiazki.Wydawnictwo = "PWN") AND
           (ksiazki.Rok_wyd > 1990 AND
            ksiazki.Rok_wyd < 2011)
     ORDER BY ksiazki.Rok_wyd ASC
    EOD;

    $query = $conn->query($query_text);
    $row_query = $conn->query("SHOW COLUMNS FROM ksiazki");
    ?>

    <table>
        <tr>
            <?php foreach (['Sygnatura', 'Tytuł', 'Autor','Wydawnictwo','Rok Wydania','Cena'] as $header) echo "<th>".$header.'</td>'; ?>
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