<?php
error_reporting(E_ALL);
header("Content-Type: text/plain; charset=UTF-8");



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
    _print("\n");
}

function easter($year){
    $a = $year % 19;
    $b = floor($year / 100);
    $c = $year % 100;
    $d = floor($b / 4);
    $e = $b % 4;
    $f = floor(($b+8) / 25);
    $g = floor(($b-$f+1) / 3);
    $h = (19*$a+$b-$d-$g+15) % 30;
    $i = floor($c / 4);
    $k = $c % 4;
    $l = (32+2*$e+2*$i-$h-$k) % 7;
    $m = floor(($a+11*$h+22*$l) / 451);
    $n = floor(($h+$l-7*$m+114) / 31);
    $p = floor(($h+$l-7*$m+114) % 31);
    return mktime(0, 0, 0, $n, $p+1, $year,);
}

// easter test
for($i = 0; $i < 10; $i++){
    $date = easter(2022 + $i);
    _print(date('\E\a\s\t\e\r \i\n Y, F j', $date) . "\n");
}