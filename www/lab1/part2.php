<?php
error_reporting(E_ALL);
header("Content-Type: text/html; charset=UTF-8");



function _print($info){
    $is_direct = basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]);
    if($is_direct){
        echo $info;
    }
}

for($i = 1; $i <= 9; $i++){
    for($j = 9; $j >= $i; $j--){
        _print($j);
    }
    _print("<br/>");
}

function easter($year){
    $g = $year % 19;
    $c = $year / 100;
    $h = ($c - intval($c / 4) -
            intval((8 * $c + 13) / 25) + 19 * $g + 15) % 30;
    $i = $h - intval($h / 28) * (1 - intval($h / 28) *
            intval(29 / ($h + 1)) * intval((21 - $g) / 11));

    $day = $i - (($year + intval($year / 4) +
                $i + 2 - $c + intval($c / 4)) % 7) + 28;
    $month = 3;

    if ($day > 31)
    {
        $month++;
        $day -= 31;
    }
    return mktime(0, 0, 0, $month, $day, $year,);
}

// easter test
for($i = 0; $i < 10; $i++){
    $date = easter(2022 + $i);
    _print(date('\E\a\s\t\e\r \i\n Y, F j', $date) . "<br/>");
}