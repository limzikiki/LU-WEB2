<?php

require __DIR__ . '/part2.php';

try{
    $start = intval($_POST['start']);
    $end = intval($_POST['end']);
}catch(Exception $e){
    return;
}

if ($end < $start){
    return;
    }

for($i=$start; $i < $end; $i++){
    $date = easter($i);
    echo date('\E\a\s\t\e\r \i\n Y, F j', $date) . "\n";
}