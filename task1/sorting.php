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
    $tmp=array();

    foreach($cities as $city) {
        $tmp['name'][]=$city['name'];
        $tmp['sort'][]=$city['sort'];
    }

    array_multisort($tmp['sort'], $cities);

    return $cities;
}

$result = sorting($cities);

print_r($result);