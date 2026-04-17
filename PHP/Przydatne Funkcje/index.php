<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $funcs = [
        "puste_znaki" => ["func" => "trim","text" => "Usuń 'białe' znaki"],
        "ukosniki" => ["func" => "stripslashes","text" => "Usuń ukośniki (backslash)"],
        "enjce_html" => ["func" => "htmlspecialchars","text" => "Zmień znaki HTML na tzw. encje"]
    ];

    function create_inputs_for_functions($array) {
        foreach ($array as $input_name => $func_attribs) {
            ?>
            <div>
                <label for=<?=$input_name?>><?=$func_attribs['text']?></label>
                <input type="text", name=<?=$input_name?>>
            </div>
            <?php
        }
    }

    function create_text_for_inputs($array) {
        foreach ($array as $input_name => $func_attribs) {
            $input_text = isset($_POST[$input_name]) ? $_POST[$input_name] : "";
            ?>
            <div>
                Tekst z pola <i><?=$input_name?></i> bez funkcji <b><?=$func_attribs['func']?> </b> : <?php var_dump($input_text)?>
            </div>
            <?php
        }
    }

    function create_results_for_functions($array) {
        foreach ($array as $input_name => $func_attribs) {
            $input_text = isset($_POST[$input_name]) ? $func_attribs['func']($_POST[$input_name]) : "";
            ?>
            <div>
                Tekst z pola <i><?=$input_name?></i> z zastosowaniem funkcji <b><?=$func_attribs['func']?> </b> : <?php var_dump($input_text)?>
            </div>
            <?php
        }
    }
    ?>

    <form method="POST">
        <?php create_inputs_for_functions($funcs);?>
        <input type="submit">
    </form>

    <p><?php create_text_for_inputs($funcs)?></p>
    <p><?php create_results_for_functions($funcs)?></p>
</body>
</html>