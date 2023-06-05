<?php

$router = [
    '' => [
        'GET' => getInfo(),
        'POST' => calculate($_REQUEST)
    ]
];

$url = $_SERVER['PATH_INFO'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];
$routeData = $router[$url][$method];

if ($routeData === null) {
    http_response_code(404);
    echo json_encode([
        'status' => false,
        'message' => 'Page not found',
    ]);
}

// var_dump($_REQUEST);

echo $routeData;