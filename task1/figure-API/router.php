<?php

$router = [
    '' => [
        'GET' => ['Controller', 'getInfo'],
        'POST' => ['Controller', 'calculate'],
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

// var_dump($routeData);

echo [$routeData[0], $routeData[1]]($_REQUEST);