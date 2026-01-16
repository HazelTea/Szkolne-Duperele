<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Godziny przy komputerze</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    $dates = [
        ['Poniedziałek',"12:00","23:55"],
        ['Wtorek',"08:05","10:15"],
        ['Sroda',"06:45","11:25"],
        ['Czwartek',"09:55","10:35"],
        ['Piątek',"13:50","16:10"],
        ['Sobota',"20:05","22:35"],
        ['Niedziela',"16:00","18:50"],
    ];

    function GetHeaders($dates) {
        foreach ($dates as $dateArray) {
            echo "<th>$dateArray[0]</th>";
        }
    };

    function GetHoursString($dates) {
        foreach ($dates as $dateArray) {
            echo "<td>od <span class='time'>$dateArray[1]</span> do <span class='time'>$dateArray[2]</span></td>";
        }
    };

    function GetMinutesSum($dates) {
        $sumMinutes = 0;
        foreach ($dates as $dateArray) {
            $hour1 = date_create($dateArray[1]);
            $hour2 = date_create($dateArray[2]);
            $hour_diff = date_diff($hour1,$hour2)->h;
            $minute_diff = date_diff($hour1,$hour2)->i;
            $sumMinutes += $hour_diff * 60 + $minute_diff;;
        }
        return $sumMinutes;
    };

    function GetHoursDiff($dates) {
        foreach ($dates as $dateArray) {
            $hour1 = date_create($dateArray[1]);
            $hour2 = date_create($dateArray[2]);
            $hour_diff = date_diff($hour1,$hour2)->h;
            $minute_diff = date_diff($hour1,$hour2)->i;
            $seconds = $hour_diff * 60 + $minute_diff;
            echo "<td>$hour_diff:$minute_diff (<strong>$seconds</strong> minut)</td>";
        }
    }

    $MinuteSum = GetMinutesSum($dates);
    $HourSum = $MinuteSum / 60;
    $HourSumMinutes = $MinuteSum % 60;
    ?>
    <table class="main_table">
        <tr>
            <th class=headers_left_space></th>
            <?php GetHeaders($dates)?>
        </tr>
        <tr>
            <td>Godziny Przy Komputerze</td>
            <?php GetHoursString($dates)?>
        </tr>
        <tr class="main_table__headers">
            <td>Różnica [h:m]</td>
            <?php GetHoursDiff($dates)?>
        </tr>
        <tr>
            <th class=headers_left_space></th>
            <th colspan='7' class=bottom_th>
                Suma:
                <span class=time><?=round($HourSum)?>:<?=$HourSumMinutes?></span>
                (<strong><span><?=GetMinutesSum($dates)?></span></strong> minut)
            </th>
        </tr>
    </table>
</body>
</html>