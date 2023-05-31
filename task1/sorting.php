<?php

$cities = [
    [
        'name' => 'Пермь',
        'sort' => 400
    ],
    [
        'name' => 'Омск',
        'sort' => 500
    ],
    [
        'name' => 'Москва',
        'sort' => 50
    ],
    [
        'name' => 'Сочи',
        'sort' => 300
    ],
    [
        'name' => 'Владивосток',
        'sort' => 300
    ],
];

function sorting($cities): array {
    for ($i = 0; $i < count($cities) - 1; $i++) {
        for ($j = 0; $j < count($cities) - $i - 1; $j++) {
            if ($cities[$j]["sort"] > $cities[$j + 1]["sort"]) {
                $tmp = $cities[$j + 1];
                $cities[$j + 1] = $cities[$j];
                $cities[$j] = $tmp;
            } elseif ($cities[$j]["sort"] == $cities[$j + 1]["sort"] &&
                      strcmp($cities[$j]["name"], $cities[$j + 1]["name"])) {
                $tmp = $cities[$j + 1];
                $cities[$j + 1] = $cities[$j];
                $cities[$j] = $tmp;
            }

            
        }

    }

    return $cities;
}

$result = sorting($cities);

print_r($result);