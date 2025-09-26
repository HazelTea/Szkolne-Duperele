<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dobra Rada</title>
</head>
<body>
    <?php
        const DOBRA_RADA = "Bez chleba, to się nie najesz.";
        $functions = [
            ["strlen",[DOBRA_RADA]],
            ["str_word_count",[DOBRA_RADA]],
            ["strrev",[DOBRA_RADA]],
            ["strpos",[DOBRA_RADA,"to"]],
            ["str_replace",["nie","może",DOBRA_RADA]],
            ["strtolower",[DOBRA_RADA]],
            ["strtoupper",[DOBRA_RADA]],
            ["ucwords",[DOBRA_RADA]],
            ["trim",[DOBRA_RADA, "Bez"]],
            ["strstr",[DOBRA_RADA, "nie"]],
            ["substr",[DOBRA_RADA, 10,5]],
            ["str_pad",[DOBRA_RADA, 41, " -_-", STR_PAD_BOTH]],

        ];
        function listFunction($functionTable = []) {
            $function = $functionTable[0];
            $args = $functionTable[1];
            echo "<p>"."$function: ".$function(...$args)."</p>";
        }

        foreach ($functions as $functionTable) listFunction($functionTable);
    ?>
</body>
</html>