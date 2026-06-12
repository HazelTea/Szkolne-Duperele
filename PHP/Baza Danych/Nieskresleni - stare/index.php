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
     SELECT czytelnicy.Imie												       AS "reader__name",
            czytelnicy.Nazwisko												   AS "reader__lastname",
            czytelnicy.Plec 								               	   AS "gender",
            czytelnicy.Data_ur							               		   AS "birth_date",
            czytelnicy.Ulica        										   AS "address__street",
            czytelnicy.Kod        											   AS "address__postal_code",
            czytelnicy.Ulica        										   AS "address__street",
            czytelnicy.Miasto        										   AS "address__city",
            czytelnicy.Nr_legitymacji								           AS "id_card_num",
            czytelnicy.Data_zapisania								           AS "signed_date"
    FROM czytelnicy
    WHERE czytelnicy.Data_skreslenia IS NULL
    EOD;

    $query = $conn->query($query_text);
    $table_headers = ['Czytelnik','Płeć','Data urodzenia','Adres','Numer legitymacji','Data zapisania'];

    function CreateHeaders() {
        global $table_headers;
        foreach ($table_headers as $header) echo "<th>".$header.'</td>';
    }
    ?>

    <p>Kolumny: <b><?=join(' | ',$table_headers)?></b></p>
    <table>
        <tr>
            <?php CreateHeaders() ?>
        </tr>

    </table>
</body>

</html>