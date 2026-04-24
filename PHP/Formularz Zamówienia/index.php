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
    $is_post = $_SERVER['REQUEST_METHOD'] === 'POST';
    $validations = [
        "package_name" => false,
        "packing_methods" => false,
        "package_weights" => false,
        "contact_mail" => false,
        "addit_info" => false,
        "data_agreement" => false,
    ];

    $form_valid = true;
    if ($is_post) {
        if (isset($_POST['package_name']) and strlen($_POST['package_name']) > 0) $validations['package_name'] = true;
        if (isset($_POST['packing_methods']) and count($_POST['packing_methods']) > 0) $validations['packing_methods'] = true;
        if (isset($_POST['package_weights'])) $validations['package_weights'] = true;
        if (isset($_POST['contact_mail']) and strpos($_POST['contact_mail'],'@') !== false) $validations['contact_mail'] = true;
        if (isset($_POST['addit_info']) and strlen($_POST['addit_info']) >= 15) $validations['addit_info'] = true;
        if (isset($_POST['data_agreement'])) $validations['data_agreement'] = true;

        foreach ($validations as $key => $value) {
            if (!$value) {
                $form_valid = false;
                break;
            }
        }
    };

    function create_elements_for_list($array,$group,$input_type) {
        foreach ($array as $key_name => $value) {
            $condition = (isset($_POST[$group]) and in_array($value,$_POST[$group]));
            ?>
            <div>
                <label>
                    <input type=<?=$input_type?> name=<?=$group.'[]'?> value=<?=$value?> <?=$condition ? 'checked' : ''?>>
                    <?=$key_name?>
                </label>
            </div>
            <?php
        }
    }
    ?>
    
    <form method="POST">
        <p>
            <div><label for="package_name">Nazwa Towaru <span class='osterisk'>*</span></label></div>
            <div><input class=<?=(!$validations['package_name'] and $is_post) ? 'err_message--outline' : ''?> type='text' name='package_name' value=<?=$_POST['package_name'] ?? ''?>></div>
            <?=(!$validations['package_name'] and $is_post) ? "<div class='err_message'> Podaj nazwę produktu </div>" : ''?>
        </p>

        <p>
            <div><label for="packing_methods">Wybierz opcje pakowania <span class='osterisk'>*</span></label></div>
            <div class=<?=(!$validations['packing_methods'] and $is_post) ? 'err_message--outline' : ''?>><?php create_elements_for_list([
                'koperta' => 'koperta',
                'folia' => 'folia',
                'folia bąbelkowa' => 'folia_b',
                'karton' => "karton",
                'karton z usztywnieniem' => "karton_usz"
                ],'packing_methods','checkbox')
                ?>
            </div>
            <?=(!$validations['packing_methods'] and $is_post) ? "<div class='err_message'> Wybierz opcje pakowania </div>" : ''?>
        </p>

        <p>
            <div><label for="package_weights">Podaj wagę paczki: <span class='osterisk'>*</span></label></div>
            <div class=<?=(!$validations['package_weights'] and $is_post) ? 'err_message--outline' : ''?>><?php create_elements_for_list([
                'od 2kg' => '2-', 
                'od 2 do 5kg' => '2-5', 
                'od 5 do 10 kg' => '5-10',
                'od 10 do 15 kg' => '10-15'
                ],'package_weights','radio')?>
            </div>
            <?=(!$validations['package_weights'] and $is_post) ? "<div class='err_message'> Określ przybliżoną wagę paczki </div>" : ''?>
        </p>

        <p>
            <div><label for="contact_mail">Email kontaktowy <span class='osterisk'>*</span></label></div>
            <div><input class=<?=!$validations['contact_mail'] and $is_post ? 'err_message--outline' : ''?> type='text' name='contact_mail' value=<?=$_POST['contact_mail'] ?? ''?>></div>
            <?=(!$validations['contact_mail'] and $is_post) ? "<div class='err_message'> Podaj poprawny adres email </div>" : ''?>
        </p>
        <p>
            <div><label for="addit_info">Dodatkowe informacje <span class='osterisk'>*</span></label></div>
            <div><textarea class=<?=!$validations['addit_info'] and $is_post ? 'err_message--outline' : ''?> name="addit_info"><?=$_POST['addit_info'] ?? ''?></textarea>
            <?=(!$validations['addit_info'] and $is_post) ? "<div class='err_message'> Wiadomość musi mieć conajmniej 15 znaków </div>" : ''?>
        </p>

        <p>
            <input type='checkbox' name='data_agreement'>
            <label for="data_agreement">Zgoda na przetwarzanie danych <span class='osterisk'>*</span></label>
            <?=(!$validations['data_agreement'] and $is_post) ? "<div class='err_message'> Potwierdź swoją zgodę </div>" : ''?>
        </p>

        <div><input type="submit" value="Wyślij"></div>
        <?php
            if ($form_valid) {
                $file_name = __DIR__."/formularz_zamowienia.json";
                $data_file = fopen($file_name, "w") or die("Unable to open file!");
                $json_data = json_encode($_POST, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                if (file_put_contents($file_name,$json_data)) {
                    ?>
                    <div class="err_message">Dane z formularza zostały zapisane do pliku formularz_zamowienia.json</div>
                    <?php
                };
            };
        ?>
        <pre><?php print_r($_POST)?></pre>
    </form>
</body>
</html>