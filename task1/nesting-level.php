<?php

$arr = [
    "one" => "один",
    2, 
    '3', 
    4 => [
        "четыре" => "four",
        "vier" => "cyatro"
    ],
    "пять" => [
        5 => "five", 
        "cinque" => [
            "fünf" => "Pięć",
            "vijf" => "πέντε",
            "cúig" => [
                "cinco" => "piecas"
            ]
        ]
    ],
    "6", 
    7, 
    "восемь" => "eight",
    9 => [
        "nine" => "nueve"
    ]
];

function getStrValsFrom($arr) {
    static $strVals = [];

    foreach ($arr as $key => $value) {
        if (is_string($key)) {
            array_push($strVals, $key);
        } elseif (is_string($value)) {
            array_push($strVals, $value);
        }

        if (is_array($value)) {
            getStrValsFrom($value);
        }
    }
    return $strVals;
}

$result = getStrValsFrom($arr);

print_r($result);