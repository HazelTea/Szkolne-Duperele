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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
    }
    function create_elements_for_list($array,$group,$input_type) {
        foreach ($array as $packing_method => $value) {
            ?>
            <div>
                <input type=<?=$input_type?> name='packing_methods[]' value=<?=$value?>>
                <label for=<?=$group?>><?=$packing_method?></label>
            </div>
            <?php
        }
    }
    ?>
    
    <form method="POST">
        <p>
            <div><label for="nazwa_towaru">Nazwa Towaru <span class='osterisk'>*</span></label></div>
            <div><input  type='text' name='nazwa_towaru'></div>

        </p>

        <p>
            <div><label for="packing_methods">Wybierz opcje pakowania <span class='osterisk'>*</span></label></div>
            <div ><?php create_elements_for_list([
                'koperta' => 'koperta',
                'folia' => 'folia',
                'folia bąbelkowa' => 'folia_b',
                'karton' => "karton",
                'karton z usztywnieniem' => "karton_usz"
                ],'packing_methods[]','checkbox')?>
            </div>
        </p>

        <p>
            <div><label for="package_weights">Podaj wagę paczki: <span class='osterisk'>*</span></label></div>
            <div ><?php create_elements_for_list([
                'od 2kg' => '2-', 
                'od 2 do 5kg' => '2-5', 
                'od 5 do 10 kg' => '5-10',
                'od 10 do 15 kg' => '10-15'
                ],'package_weights[]','radio')?>
            </div>
        </p>

        <p>
            <div><label for="contact_mail">Email kontaktowy <span class='osterisk'>*</span></label></div>
            <div><input type='email' name='contact_mail'></div>
        </p>
        <p>
            <div><label for="addit_info">Dodatkowe informacje <span class='osterisk'>*</span></label></div>
            <div><textarea name="addit_info"></textarea>
        </p>

        <p>
            <input type='checkbox' name='data_agreement'>
            <label for="data_agreement">Zgoda na przetwarzanie danych <span class='osterisk'>*</span></label>
        </p>

        <div><input type="submit" value="Wyślij"></div>

    </form>
</body>
</html>