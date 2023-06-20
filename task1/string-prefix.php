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


function findStrByPrefix($pref, $arrOfStrs): array {
    $arrOfStrsStartByPrefix = [];

    foreach ($arrOfStrs as $str) {
        if (str_starts_with($str, $pref)) {
            $arrOfStrsStartByPrefix[] = $str;
        }      
    }

    return $arrOfStrsStartByPrefix;
}

$result = findStrByPrefix($pref, $arrOfStrs);

print_r($result);