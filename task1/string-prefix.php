<?php

$pref = 'Кто';

$arrOfStrs = [
    'Кто не успел, тот опоздал',    
    'Что посеешь, то и пожнешь',
    'Кто рано встаёт, тому Бог даёт', 
    'Куй железо, пока горячо', 
    'Лучше поздно, чем никогда', 
    'Кто много знает, тот мало верит',
    'Коней на переправе не меняют'
];

function checkStrbyPrefix($pref, $str): bool {
    
    for ($i = 0; $i < strlen($pref); $i++) {
        if ($str[$i] != $pref[$i]) {
            return false;
        } 
    }

    return true;
}

function findStrByPrefix($pref, $arrOfStrs): array {
    $arrOfStrsStartByPrefix = [];

    foreach ($arrOfStrs as $str) {
        if (checkStrbyPrefix($pref, $str)) {
            array_push($arrOfStrsStartByPrefix, $str);
        }      
    }

    return $arrOfStrsStartByPrefix;
}

$result = findStrByPrefix($pref, $arrOfStrs);

print_r($result);